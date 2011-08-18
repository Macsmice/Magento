<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Mage
 * @package     Mage_Ogone
 * @copyright   Copyright (c) 2011 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Ogone data helper
 */
class Mage_Ogone_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * @deprecated after 1.4.2.0-beta1
     * @see Mage_Ogone_Model_Api::HASH_ALGO_SHA1
     */
    const HASH_ALGO = 'sha1';

    /**
     * @deprecated after 1.4.2.0-beta1
     * @see Mage_Ogone_Model_Api::getHash()
     * @param array $data
     * @param string $key
     * @return string
     */
    public function shaCrypt($data, $key = '')
    {
        return '';
    }

    /**
     * @deprecated after 1.4.2.0-beta1
     * @see Mage_Ogone_Model_Api::getHash()
     * @param array $data
     * @param string $hash
     * @param string $key
     * @return bool
     */
    public function shaCryptValidation($data, $hash, $key='')
    {
        return false;
    }
}
