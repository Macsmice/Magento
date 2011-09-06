<?php
/**
 * @version     $Id: articles.php 2620 2011-09-01 03:01:54Z johanjanssens $
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Articles
 * @copyright   Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Component Loader
 *
 * @author      Gergo Erdosi <http://nooku.assembla.com/profile/gergoerdosi>
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Articles
 */

/*if (!KFactory::get('joomla:user')->authorize( 'com_content', 'manage' )) {
	KFactory::get('joomla:application')->redirect( 'index.php', JText::_('ALERTNOTAUTH') );
}*/

echo KFactory::get('com://admin/articles.dispatcher')->dispatch();