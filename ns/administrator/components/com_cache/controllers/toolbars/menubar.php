<?php
/**
 * @version     $Id: menubar.php 2427 2011-08-04 14:12:50Z johanjanssens $
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Cache
 * @copyright   Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Cache Menubar Class
 *
 * @author      Johan Janssens <http://nooku.assembla.com/profile/johanjanssens>
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Cache
 */
class ComCacheControllerToolbarMenubar extends ComDefaultControllerToolbarMenubar
{
    public function getCommands()
    { 
        $name = $this->getController()->getIdentifier()->name;
        
        $this->addCommand('Items', array(
        	'href' => JRoute::_('index.php?option=com_cache&view=items'),
            'active' => ($name == 'item')
        ));
        
        $this->addCommand('Groups', array(
        	'href' => JRoute::_('index.php?option=com_cache&view=groups'),
        	'active' => ($name == 'group')
        ));
         
        return parent::getCommands();
    }
}