<?php
/**
 * Koowa View Controller
 *
 * @category    Crossinghippos
 * @package     Crossinghippos_Koowa
 * @author      Babs Gösgens/Crossing Hippos <babs@crossinghippos.nl>
 * @copyright   Copyright (c) 2011 Crossing Hippos (http://crossinghippos.nk)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Crossinghippos_Nookuserver_IndexController extends Mage_Core_Controller_Front_Action
{
    public function _construct()
    {
        parent::_construct();

        $this->__includeNookuserver();
    }

    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    private function __includeNookuserver()
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
