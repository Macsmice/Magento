<?php
/**
 * @version     $Id: user.php 2630 2011-09-01 03:04:40Z johanjanssens $
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Users
 * @copyright   Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * User Database Row Class
 *
 * @author      Gergo Erdosi <http://nooku.assembla.com/profile/gergoerdosi>
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Users
 */
class ComUsersDatabaseRowUser extends KDatabaseRowDefault
{
	public function __get($column)
    {
   	 	if($column == 'params' && !($this->_data['params'] instanceof JParameter))
		{
			$xml_path	= JPATH_ADMINISTRATOR.'/components/com_users/databases/rows';
			$xml_name	= str_replace(' ', '_', strtolower($this->group_name));

			if(!file_exists($file = $xml_path.'/'.$xml_name.'.xml')) {
				$file = $xml_path.'/user.xml';
			}

			$params	= new JParameter($this->_data['params']);
			$params->loadSetupFile($file);

			$this->_data['params'] = $params;
		}

    	return parent::__get($column);
    }

	public function save()
	{
		KLoader::load('joomla.user.helper');

		// Load the old row if editing an existing user.
		if(!$this->_new)
		{
			$old_row = KFactory::get('com://admin/users.database.table.users')
				->select($this->id, KDatabase::FETCH_ROW);
		}

		$user = KFactory::get('joomla:user');

		// Validate received data.
		if(($this->_new || isset($this->_modified['name'])) && trim($this->name) == '')
		{
			$this->setStatus(KDatabase::STATUS_FAILED);
			$this->setStatusMessage(JText::_('Please enter a name!'));

			return false;
		}

		if(($this->_new || isset($this->_modified['username'])) &&  trim($this->username) == '')
		{
			$this->setStatus(KDatabase::STATUS_FAILED);
			$this->setStatusMessage(JText::_('Please enter a username!'));

			return false;
		}

		if(($this->_new || isset($this->_modified['username'])) && preg_match('#[<>"\'%;()&]#i', $this->username) || strlen(utf8_decode($this->username)) < 2)
		{
			$this->setStatus(KDatabase::STATUS_FAILED);
			$this->setStatusMessage(JText::_('Please enter a valid username. No spaces, at least 2 characters '.
				'and must contain <strong>only</strong> letters and numbers.'));

			return false;
		}

	   if(isset($this->_modified['username']))
        {
            $query  = KFactory::get('koowa:database.query')
                ->where('username', '=', $this->username)
                ->where('id', '<>', (int) $this->id);

            $total  = KFactory::get('com://admin/users.database.table.users')
                ->count($query);

            if($total)
            {
                $this->setStatus(KDatabase::STATUS_FAILED);
                $this->setStatusMessage(JText::_('This username is already in use.'));

                return false;
            }
        }

		if(($this->_new || isset($this->_modified['email'])) && (trim($this->email) == '') || !(KFactory::get('koowa:filter.email')->validate($this->email)))
		{
			$this->setStatus(KDatabase::STATUS_FAILED);
			$this->setStatusMessage(JText::_('Please enter a valid e-mail address.'));

			return false;
		}

		if(isset($this->_modified['email']))
		{
			$query	= KFactory::get('koowa:database.query')
				->where('email', '=', $this->email)
				->where('id', '<>', (int) $this->id);

			$total	= KFactory::get('com://admin/users.database.table.users')
				->count($query);

			if($total)
			{
				$this->setStatus(KDatabase::STATUS_FAILED);
				$this->setStatusMessage(JText::_('This e-mail address is already registered.'));

				return false;
			}
		}

		/*
		 * If username field is an email it has to be the same with email field.
		 * This removes the possibilitiy that a user can get locked out of her account
		 * if someone else uses that username as the email field.
		 */
		if (KFactory::get('koowa:filter.email')->validate($this->username) === true
				&& $this->username !== $this->email) {
			$this->setStatus(KDatabase::STATUS_FAILED);
			$this->setStatusMessage(JText::_('Your e-mail and username should match if you want to use an e-mail address as your username.'));

			return false;
		}

		// Don't allow users to block themselves.
		if(isset($this->_modified['enabled']) && !$this->_new && $user->id == $this->id && !$this->enabled)
		{
			$this->setStatus(KDatabase::STATUS_FAILED);
			$this->setStatusMessage(JText::_("You can't block yourself!"));

			return false;
		}

	    // Don't allow to save a user without a group.
        if(($this->_new || isset($this->_modified['users_group_id'])) && !$this->users_group_id)
        {
            $this->setStatus(KDatabase::STATUS_FAILED);
            $this->setStatusMessage(JText::_("You can't create a user without a user group."));

            return false;
        }

		// Don't allow users below super administrator to edit a super administrator.
		if(!$this->_new && $old_row->users_group_id == 25 && $user->gid != 25) {
			$this->setStatus(KDatabase::STATUS_FAILED);
			$this->setStatusMessage(JText::_("You can't edit a super administrator account."));

			return false;
		}

		// Don't allow users below super administrator to create an administrators.
		if(isset($this->_modified['users_group_id']) && $this->users_group_id == 24 && !($user->gid == 25 || ($user->id == $this->id && $user->gid == 24))) {
			$this->setStatus(KDatabase::STATUS_FAILED);
			$this->setStatusMessage(JText::_("You can't create a user with this user group level. "
				."Only super administrators have this ability."));

			return false;
		}

		// Don't allow users below super administrator to create a super administrator.
		if($this->users_group_id == 25 && $user->gid != 25)
		{
			$this->setStatus(KDatabase::STATUS_FAILED);
			$this->setStatusMessage(JText::_("You can't create a user with this user group level. "
				."Only super administrators have this ability."));

			return false;
		}

		// Don't allow users to change the user level of the last active super administrator.
		if(isset($this->_modifid['users_group_id']) && $old_row->users_group_id != 25)
		{
			$query	= KFactory::get('koowa:database.query')
				->where('users_group_id', '=', 25)
				->where('enabled', '=', 1);

			$total	= KFactory::get('com://admin/users.database.table.users')
				->count($query);

			if($total <= 1)
			{
				$this->setStatus(KDatabase::STATUS_FAILED);
				$this->setStatusMessage(JText::_("You can't change this user's group because ".
					"the user is the only active super administrator for your site."));

				return false;
			}
		}

		// Check if passwords match.
		if(isset($this->_modified['password']) && $this->password != $this->password_verify) {
			$this->setStatus(KDatabase::STATUS_FAILED);
			$this->setStatusMessage(JText::_("Passwords don't match!"));

			return false;
		}

		// Generate a random password if empty and the record is new.
		if($this->_new && !$this->password)
		{
			$this->password	= KFactory::get('com://admin/users.helper.password')
				->getRandom();

			$this->password_verify	= $this->password;
		}

		if(isset($this->_modified['password']) && $this->password)
		{
			// Encrypt password.
			$salt = KFactory::get('com://admin/users.helper.password')
				->getRandom(32);

			$password = KFactory::get('com://admin/users.helper.password')
				->getCrypted($this->password, $salt);

			$this->password	= $password.':'.$salt;
		}
		else
		{
			$this->password = $old_row->password;

			unset($this->_modified['password']);
		}

		if($this->_new) {
			$this->registered_on = gmdate('Y-m-d H:i:s', time());
		}

		$query = KFactory::get('koowa:database.query')
			->select('name')
			->where('id', '=', $this->users_group_id);

		$this->group_name = KFactory::get('com://admin/users.database.table.groups')
			->select($query, KDatabase::FETCH_FIELD);

		// Set parameters.
		if(isset($this->_modified['params']))
		{
			$params	= new JParameter('');
			$params->bind($this->_data['params']);

			$this->params = $params->toString();

			if(!$this->_new && $this->_data['params'] == $old_row->params->toString()) {
				unset($this->_modified['params']);
			}
		}

		// Need to reverse the value of 'enabled', because the mapped column is 'block'.
		if($this->_new || isset($this->_modified['enabled'])) {
			$this->enabled = $this->enabled ? 0 : 1;
		}

		if(!parent::save()) {
			return false;
		}

		// Syncronize ACL.
		if($this->_status == KDatabase::STATUS_CREATED)
		{
            $aro = KFactory::get('com://admin/groups.database.row.aro')
                ->setData(array(
                    'section_value' => 'users',
                    'value' => $this->id,
                    'name' => $this->name
                ));
            $aro->save();
            
            KFactory::get('com://admin/groups.database.row.arosgroup')
                ->setData(array(
                    'group_id' => $this->users_group_id,
                    'aro_id'   => $aro->id
                ))->save();
		}
		else
		{
            if(isset($this->_modified['name']) || isset($this->_modified['users_group_id'])) {
                $aro = KFactory::get('com://admin/groups.database.table.aros')
                    ->select(array('value' => $this->id), KDatabase::FETCH_ROW);

                if(isset($this->_modified['name'])) {
                    $aro->name = $this->name;
                    $aro->save();
                }

                if(isset($this->_modified['users_group_id'])) {
                    KFactory::get('com://admin/groups.database.table.arosgroups')
                        ->select(array('aro_id' => $aro->id), KDatabase::FETCH_ROW)
                        ->delete();
                    
                    KFactory::get('com://admin/groups.database.table.arosgroups')
                        ->select(null, KDatabase::FETCH_ROW)
                        ->setData(array(
                            'group_id' => $this->users_group_id,
                            'aro_id'   => $aro->id
                        ))
                        ->save();
                }
            }
		}

		return true;
	}

	public function delete()
	{
		$user = KFactory::get('joomla:user');

		// Don't allow users to delete themselves.
		if($user->id == $this->id)
		{
			$this->_status			= KDatabase::STATUS_FAILED;
			$this->_status_message	= JText::_("You can't delete yourself!");

			return false;
		}

		// Don't allow administrators to delete other administrators or super administrators.
		if($user->gid == 24 && ($this->users_group_id == 24 || $this->users_group_id == 25))
		{
			$this->setStatus(KDatabase::STATUS_FAILED);
			$this->setStatusMessage(JText::_("You can't delete a user with this user group level. "
				."Only super administrators have this ability."));

			return false;
		}

		if(!parent::delete()) {
			return false;
		}

        // Syncronize ACL.
		if($this->_status == KDatabase::STATUS_DELETED)
		{
            $aro = KFactory::get('com://admin/groups.database.table.aros')
                ->select(array('value' => $this->id), KDatabase::FETCH_ROW);
            $aro->delete();
         
            KFactory::get('com://admin/groups.database.table.arosgroups')
                ->select(array('aro_id' => $aro->id), KDatabase::FETCH_ROW)
                ->delete();
		}

		return true;
	}
	
	/**
     * Return an associative array of the data.
     *
     * @return array
     */
    public function toArray()
    {
        $data = parent::toArray();
        
        unset($data['password']);
        unset($data['activation']);
        
        return $data;
    }
}