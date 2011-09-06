<?php
/**
 * @version     $Id: executable.php 870 2011-09-01 03:10:02Z johanjanssens $
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Files
 * @copyright   Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Authorize Command Class
 *
 * @author      Ercan Ozkaya <http://nooku.assembla.com/profile/ercanozkaya>
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Files
 */
class ComFilesControllerBehaviorExecutable extends ComDefaultControllerBehaviorExecutable
{
	protected static $_group_map = array(
		4 => 18,
		3 => 19,
		2 => 20,
		1 => 21
	);

	protected function _authorize()
	{
		$minimum = KFactory::get('com://admin/files.model.configs')->getItem()->allowed_media_usergroup;
		$minimum = isset(self::$_group_map[$minimum]) ? self::$_group_map[$minimum] : 18;

		$result = KFactory::get('joomla:user')->get('gid') >= $minimum;

		return $result;
	}

    public function canAdd()
    {
		return $this->_authorize();
	}

	public function canEdit()
    {
		return $this->_authorize();
	}

	public function canDelete()
    {
		return $this->_authorize();
	}
}