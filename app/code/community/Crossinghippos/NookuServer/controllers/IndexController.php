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

        Mage::helper('nookuserver/nookuserver')->initApplication();
    }

    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }
}
