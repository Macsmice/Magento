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
class Crossinghippos_Nookuserver_Model_Koowa_Factory extends Crossinghippos_Nookuserver_Model_Application
{
    public function _construct()
    {
        parent::_construct();
    }

    /**
     * Load Koowa Object
     *
     * @var string Koowa identifier string
     * @return void
     */
    public function initKObject($identifier)
    {
        // No Error handling, let Koowa take care of it
        $this->setData('koowaObject', KFactory::get($identifier));

        return $this;
    }

    /**
     * Set object states
     *
     * @param array $state
     * @return void
     */
    public function setKState($state=array())
    {
        $_koowaObject =& $this->_getData('koowaObject');

        foreach ($state AS $state => $value) {
            $_koowaObject->set($state, $value);
        }

        return $this;
    }

    /**
     * Load Koowa Object
     *
     * @return Koowa object
     */
    public function getKObject()
    {
        return $this->_getData('koowaObject');
    }
}
