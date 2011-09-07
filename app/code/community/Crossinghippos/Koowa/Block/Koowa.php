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
class Crossinghippos_Koowa_Block_Koowa extends Mage_Core_Block_Template
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
        $_helper = $this->getHelper('Crossinghippos_Koowa_Helper_Koowa');
        var_dump($_helper->getKoowaObject());

        error_reporting(E_ALL); //Quick debug problems.

        define('_JEXEC',1); //Quick Fool Joomla loaded
        define('JPATH_BASE','/Users/babsgosgens/Sites/magento1.6/ns');
        define('JPATH_LIBRARIES',JPATH_BASE.'/libraries');

        require_once(JPATH_LIBRARIES.'/joomla/environment/request.php');
        require_once(JPATH_LIBRARIES.'/joomla/version.php');

        require_once(JPATH_BASE.'/includes/defines.php');
        require_once(JPATH_BASE.'/includes/framework.php');

        JFactory::getApplication('site')->initialise();

        $articles = KFactory::get('com://admin/articles.model.articles'); // test some output
        var_dump($articles->getList()->getData());
    }
}