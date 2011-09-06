<?php
/**
 * @version		$Id: mappings.php 2643 2011-09-01 03:07:12Z johanjanssens $
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Weblinks
 * @copyright	Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net)
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link		http://www.nooku.org
 */

/**
 * Factory mappings
 *
 * @author    	Jeremy Wilken <http://nooku.assembla.com/profile/gnomeontherun>
 * @category 	Nooku
 * @package     Nooku_Server
 * @subpackage  Weblinks
 */

KFactory::map('com://site/weblinks.model.categories', 'com://admin/weblinks.model.categories');
KFactory::map('com://site/weblinks.model.weblinks'  , 'com://admin/weblinks.model.weblinks');