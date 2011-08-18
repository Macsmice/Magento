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
 * @package     Mage_Eway
 * @copyright   Copyright (c) 2011 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * eWAY Shared Checkout Controller
 *
 * @category   Mage
 * @package    Mage_Eway
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Mage_Eway_SharedController extends Mage_Eway_Controller_Abstract
{
    /**
     * Redirect Block Type
     *
     * @var string
     */
    protected $_redirectBlockType = 'eway/shared_redirect';

    /**
     * Return order model for incrementId
     *
     * @param  string $incrementId
     * @return Mage_Sales_Model_Order
     */
    protected function _getOrderByIncrementId($incrementId)
    {
        $order = parent::_getOrderByIncrementId($incrementId);
        if (!$order) {
            return false;
        }
        $methodCode = $order->getPayment()->getMethodInstance()->getCode();
        if ($methodCode != Mage_Eway_Model_Shared::PAYMENT_CODE) {
            return false;
        }
        return $order;
    }
}
