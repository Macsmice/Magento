<?php
/**
 * Koowa Model
 *
 * @category    Crossinghippos
 * @package     Crossinghippos_Nookuserver
 * @author      Babs Gösgens/Crossing Hippos <babs@crossinghippos.nl>
 * @copyright   Copyright (c) 2011 Crossing Hippos (http://crossinghippos.nk)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Crossinghippos_Nookuserver_Model_Koowa extends Mage_Core_Model_Abstract
{
    protected $_koowaObject;

    public function _construct()
    {
        parent::_construct();
    }

    /**
     * Load Koowa Object
     *
     * @var string Koowa identifier string
     */
    public function initKoowaObject($identifier)
    {
        $this->_koowaObject = KFactory::get($identifier);
    }

    public function getKoowaObject()
    {
        return $this->_koowaObject;
    }

    public function setKoowaState($state)
    {
        foreach ($state AS $state => $value) {
            $this->_koowaObject->set($state, $value);
        }
    }

    public function getData()
    {
        $identifier = $this->_koowaObject->getIdentifier();

        if(KInflector::isPlural($identifier->name)) {
            return $this->_koowaObject->getList();
        }
        else if(KInflector::isSingular($identifier->name)) {
            return $this->_koowaObject->getItem();
        }
    }
}
