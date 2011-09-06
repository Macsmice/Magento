<?php
/**
 * @version     $Id: configs.php 872 2011-09-01 21:35:55Z johanjanssens $
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Files
 * @copyright   Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Configurations Model Class
 *
 * @author      Ercan Ozkaya <http://nooku.assembla.com/profile/ercanozkaya>
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Files
 */
class ComFilesModelConfigs extends ComDefaultModelDefault implements KObjectInstantiatable
{
	public function __construct(KConfig $config)
	{
		parent::__construct($config);

		$this->_state->insert('container', 'identifier', null);
	}

    public static function getInstance($config = array())
    {
        static $instance;
        
        if ($instance === NULL) 
        {
            //Create the singleton
            $classname = $config->identifier->classname;
            $instance = new $classname($config);
        }
        
        return $instance;
    }

	public function getItem()
	{
		if (!isset($this->_item))
		{
			$this->_item = KFactory::get('com://admin/files.database.row.config');
			$container = KFactory::get('com://admin/files.model.containers')->id((string)$this->_state->container)->getItem();

			$this->_item->container = $container;
			$this->_item->setData(json_decode($container->parameters, true));
		}

		return parent::getItem();
	}
}