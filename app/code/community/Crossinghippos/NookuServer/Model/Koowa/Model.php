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
class Crossinghippos_Nookuserver_Model_Koowa_Model extends Crossinghippos_Nookuserver_Model_Koowa_Factory
{

    /**
     * Get the raw model
     *
     * @return mixed Model data or false when KInflector cannot determine what to return
     */
    public function getModelData()
    {
        $identifier = $this->getKObject()->getIdentifier();


        if(KInflector::isPlural($identifier->name)) {
            return $this->_getData('koowaObject')->getList();
        }
        else if(KInflector::isSingular($identifier->name)) {
            return $this->_getData('koowaObject')->getItem();
        }
        else {
            return false;
        }
    }
}
