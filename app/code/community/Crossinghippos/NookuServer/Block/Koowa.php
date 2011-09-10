<?php
/**
 * Koowa Model
 *
 * @category    Crossinghippos
 * @package     Crossinghippos_Koowa
 * @author      Babs Gösgens/Crossing Hippos <babs@crossinghippos.nl>
 * @copyright   Copyright (c) 2011 Crossing Hippos (http://crossinghippos.nk)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Crossinghippos_NookuServer_Block_Koowa extends Mage_Core_Block_Template
{

    protected $_state = array();

    public function _construct()
    {
        parent::_construct();
    }

    public function setIdentifier($value)
    {
        $this->setData('identifier', $value);

        return (bool) $this->_getData('identifier');
    }

    public function setState($state, $value)
    {
        $this->_state[$state] = $value;
        $this->setData('state', $this->_state);

        return (bool) $this->_getData('state');
    }

    public function getView()
    {
        $_helper = $this->getHelper('CrossingHippos_NookuServer_Helper_NookuServer');
        var_dump($_helper->getKoowaObject());

        $articles = KFactory::get('com://admin/articles.model.articles'); // test some output
        var_dump($articles->getList()->getData());

    }
}