<?php
/**
 * @version     $Id: mod_banners.php 2641 2011-09-01 03:06:44Z johanjanssens $
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Banners
 * @copyright   Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Module Banners
 *
 * @author      Cristiano Cucco <http://nooku.assembla.com/profile/cristiano.cucco>
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Banners
 */

KLoader::load('com://site/banners.mappings');

echo KFactory::get('mod://site/banners.html')
    	->module($module)
    	->attribs($attribs)
    	->display();