<?php
/**
 * @version		$Id: dashboard.php 2624 2011-09-01 03:02:47Z johanjanssens $
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Dashboard
 * @copyright	Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net)
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link		http://www.nooku.org
 */

/**
 * Component Loader
 *   
 * @author    	Jeremy Wilken <http://nooku.assembla.com/profile/gnomeontherun>
 * @category 	Nooku
 * @package     Nooku_Server
 * @subpackage  Dashboard
 */

echo KFactory::get('com://admin/dashboard.dispatcher')->dispatch();