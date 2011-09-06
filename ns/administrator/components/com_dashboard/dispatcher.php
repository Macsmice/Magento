<?php
/**
 * @version		$Id: dispatcher.php 2529 2011-08-22 23:32:56Z johanjanssens $
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

class ComDashboardDispatcher extends ComDefaultDispatcher
{
	protected function _initialize(KConfig $config)
    {
        $config->append(array(
        	'controller' => 'dashboard'
        ));
        parent::_initialize($config);
    }
}