<?php
/**
 * Koowa Helper
 *
 * @category    Crossinghippos
 * @package     Crossinghippos Koowa
 * @author      Babs Gösgens/Crossing Hippos <babs@crossinghippos.nl>
 * @copyright   Copyright (c) 2011 Crossing Hippos (http://crossinghippos.nk)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class CrossingHippos_NookuServer_Helper_NookuServer extends Mage_Core_Helper_Data
{
    public function initApplication()
    {
        if(!Mage::registry('ns')) {

            define('_JEXEC',1); //Quick Fool Joomla loaded

            define('JPATH_BASE','/Users/babsgosgens/Sites/magento1.6/ns');
            define('JPATH_LIBRARIES',JPATH_BASE.'/libraries');

            require_once(JPATH_LIBRARIES.'/joomla/environment/request.php');
            require_once(JPATH_LIBRARIES.'/joomla/version.php');

            require_once(JPATH_BASE.'/includes/defines.php');
            require_once(JPATH_BASE.'/includes/framework.php');

            $mainframe =& JFactory::getApplication('site');
            $mainframe->initialise();

            Mage::register('ns', $mainframe);
        }
    }
}
