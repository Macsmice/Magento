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
class Crossinghippos_Nookuserver_Model_Joomla_Factory extends Crossinghippos_Nookuserver_Model_Application
{
    public function _construct()
    {
        parent::_construct();


        $mainframe = Mage::registry('ns');

        var_dump($mainframe->get('controller'));

        var_dump(get_class_methods($mainframe));
        echo $url = JURI::root() . '/ns/index.php?option=com_newsfeeds&view=categories&template=component';
//        var_dump( readfile($url) );
        echo file_get_contents($url);
    }
}
