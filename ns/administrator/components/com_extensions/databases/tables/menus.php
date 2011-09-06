<?php
/**
 * @version     $Id: menus.php 2156 2011-07-11 12:06:35Z johanjanssens $
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Extensions
 * @copyright   Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Menus Database Table Class
 *
 * @author      Stian Didriksen <http://nooku.assembla.com/profile/stiandidriksen>
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Extensions    
 */

class ComExtensionsDatabaseTableMenus extends KDatabaseTableDefault
{
    public function  _initialize(KConfig $config) 
    {
        $config->append(array(
            'name'  => 'modules_menu',
        ));
     
        parent::_initialize($config);
    }
}