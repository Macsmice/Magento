<?php
/**
 * @version     $Id: executable.php 2630 2011-09-01 03:04:40Z johanjanssens $
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Users
 * @copyright   Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * User Controller Executable Behavior 
 *
 * @author      Johan Janssens <http://nooku.assembla.com/profile/johanjanssens>
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Users
 */
class ComUsersControllerBehaviorExecutable extends ComDefaultControllerBehaviorExecutable
{  
    public function canLogout()
    {
        $userid = KFactory::get('joomla:user')->id;
        
        //Allow logging out ourselves
        if($this->getModel()->getState()->id === $userid) {
             return true;
        }
        
        if(KFactory::get('joomla:user')->get('gid') > 24) {
            return true;
        }
        
        return false;
    }
}