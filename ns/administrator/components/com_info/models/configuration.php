<?php
/**
 * @version     $Id: configuration.php 2637 2011-09-01 03:05:52Z johanjanssens $
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Info
 * @copyright   Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Configuration Model Class
 *
 * @author      John Bell <http://nooku.assembla.com/profile/johnbell>
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Info
 */

class ComInfoModelConfiguration extends KModelAbstract
{
    public function getList()
    {
        if(!$this->_list)
        {
            require_once(JPATH_CONFIGURATION.'/configuration.php');

            $hidden = array('host', 'user', 'password', 'db', 'ftp_user', 'ftp_pass', 'smtpuser', 'smtppass');

            foreach(new JConfig as $property => $value)
            {
                $rows[] = array(
                    'setting' => $property,
                    'value'   => in_array($property, $hidden) ? '******' : $value
                );
            }

            $this->_list = KFactory::get('com://admin/info.database.rowset.configuration')
                ->addData($rows, false);
        }

        return $this->_list;
    }
}