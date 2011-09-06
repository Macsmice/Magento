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


        define('JPATH_ROOT','/Users/babsgosgens/Sites/magento1.6/nstrunk');
        define('JPATH_LIBRARIES',JPATH_ROOT.'/libraries');
        define('JPATH_BASE',JPATH_ROOT);
        define('JPATH_SITE',JPATH_ROOT);
        define('JPATH_ADMINISTRATOR',JPATH_ROOT.'/administrator');
        define('JPATH_IMAGES', JPATH_ROOT.'/images');
        define('DS', '/');

        require_once(JPATH_LIBRARIES.'/loader.php');
        require_once(JPATH_ROOT.'/libraries/koowa/koowa.php');
        require_once(JPATH_ROOT.'/libraries/koowa/loader/loader.php');

        //Setup the loader
        KLoader::addAdapter(new KLoaderAdapterKoowa(Koowa::getPath()));
        KLoader::addAdapter(new KLoaderAdapterJoomla(JPATH_LIBRARIES));
        KLoader::addAdapter(new KLoaderAdapterModule(JPATH_BASE));
        KLoader::addAdapter(new KLoaderAdapterPlugin(JPATH_ROOT));
        KLoader::addAdapter(new KLoaderAdapterComponent(JPATH_BASE));

        //Setup the factory
        KFactory::addAdapter(new KFactoryAdapterKoowa());
        KFactory::addAdapter(new KFactoryAdapterJoomla());
        KFactory::addAdapter(new KFactoryAdapterModule());
        KFactory::addAdapter(new KFactoryAdapterPlugin());
        KFactory::addAdapter(new KFactoryAdapterComponent());

        //Setup the identifier application paths
        KIdentifier::registerApplication('site' , JPATH_SITE);
        KIdentifier::registerApplication('admin', JPATH_ADMINISTRATOR);

        //Setup the request
        KRequest::root(KRequest::base());

        //Set factory identifier aliasses
        KFactory::map('koowa:database.adapter.mysqli','com://admin/default.database.adapter.mysqli');

        var_dump(KFactory::get('joomla:user'));

//        var_dump(KFactory::get('mod://site/banners.html'));
        KFactory::get('com://admin/articles.model.articles'); // test some output
    }
}