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
class Crossinghippos_NookuServer_Block_Koowa_View extends Crossinghippos_NookuServer_Block_Koowa
{
    public function getView()
    {
        return $this->_setKObject()->_getData('koowaObject');
    }
}