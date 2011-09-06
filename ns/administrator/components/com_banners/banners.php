<?php
/**
 * @version     $Id: banners.php 2625 2011-09-01 03:03:10Z johanjanssens $
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Banners
 * @copyright   Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Component Loader
 *
 * @author      Cristiano Cucco <http://nooku.assembla.com/profile/cristiano.cucco>
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Banners    
 */

if (!KFactory::get('joomla:user')->authorize( 'com_banners', 'manage' )) {
	KFactory::get('joomla:application')->redirect( 'index.php', JText::_('ALERTNOTAUTH') );
}

echo KFactory::get('com://admin/banners.dispatcher')->dispatch();