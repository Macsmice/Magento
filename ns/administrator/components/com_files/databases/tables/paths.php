<?php
/**
 * @version     $Id: paths.php 870 2011-09-01 03:10:02Z johanjanssens $
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Files
 * @copyright   Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Path Database Table Class
 *
 * @author      Ercan Ozkaya <http://nooku.assembla.com/profile/ercanozkaya>
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Files
 */

class ComFilesDatabaseTablePaths extends KDatabaseTableDefault
{
	protected function _initialize(KConfig $config)
	{
		$config->append(array(
			'filters' => array(
				'identifier' => 'identifier',
				'path'       => 'com.files.filter.path',
				'parameters' => 'json'
			)
		));

		parent::_initialize($config);
	}
}
