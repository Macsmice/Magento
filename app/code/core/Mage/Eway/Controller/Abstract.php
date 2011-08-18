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
 * eWAY Checkout Abstract Controller
 *
 * @category   Mage
 * @package    Mage_Eway
 * @author      Magento Core Team <core@magentocommerce.com>
 */
abstract class Mage_Eway_Controller_Abstract extends Mage_Core_Controller_Front_Action
{
    protected function _expireAjax()
    {
        if (!$this->getCheckout()->getQuote()->hasItems()) {
            $this->getResponse()->setHeader('HTTP/1.1','403 Session Expired');
            exit;
        }
    }

    /**
     * Redirect Block
     * need to be redeclared
     */
    protected $_redirectBlockType;

    /**
     * Get singleton of Checkout Session Model
     *
     * @return Mage_Checkout_Model_Session
     */
    public function getCheckout()
    {
        return Mage::getSingleton('checkout/session');
    }

    /**
     * when customer select eWay payment method
     */
    public function redirectAction()
    {
        $session = $this->getCheckout();
        $session->setEwayQuoteId($session->getQuoteId());
        $session->setEwayRealOrderId($session->getLastRealOrderId());

        $order = $this->_getOrderByIncrementId($session->getLastRealOrderId());
        if (!$order) {
            $this->_redirect('checkout/cart');
            return false;
        }
        $order->getPayment()->getMethodInstance()->generateSecureHash();
        $order->addStatusToHistory($order->getStatus(), Mage::helper('eway')->__('Customer was redirected to eWAY.'));
        $order->save();

        $this->getResponse()->setBody(
            $this->getLayout()
                ->createBlock($this->_redirectBlockType)
                ->setOrder($order)
                ->toHtml()
        );

        $session->unsQuoteId();
    }

    /**
     * eWay returns POST variables to this action
     */
    public function  successAction()
    {
        $status = $this->_checkReturnedPost();
        if ($status) {
            $session = $this->getCheckout();
            $session->unsEwayRealOrderId();
            $session->setQuoteId($session->getEwayQuoteId(true));
            $session->getQuote()->setIsActive(false)->save();

            $order = Mage::getModel('sales/order');
            $order->load($this->getCheckout()->getLastOrderId());
            if($order->getId()) {
                $order->sendNewOrderEmail();
            }
            $this->_redirect('checkout/onepage/success');
        } else {
            $this->_redirect('*/*/failure');
        }
    }

    /**
     * Display failure page if error
     *
     */
    public function failureAction()
    {
        if (!$this->getCheckout()->getEwayErrorMessage()) {
            $this->norouteAction();
            return;
        }

        $this->getCheckout()->clear();

        $this->loadLayout();
        $this->renderLayout();
    }

    /**
     * Checking POST variables.
     * Creating invoice if payment was successfull or cancel order if payment was declined
     */
    protected function _checkReturnedPost()
    {
        if (!$this->getRequest()->isPost()) {
            $this->norouteAction();
            return;
        }
        $status = true;
        $response = $this->getRequest()->getPost();

        if ($this->getCheckout()->getEwayRealOrderId() != $response['ewayTrxnNumber']) {
            $this->norouteAction();
            return;
        }

        $order = $this->_getOrderByIncrementId($response['ewayTrxnNumber']);
        if (!$order) {
            return;
        }
        if ($order->getPayment()->getMethodInstance()->getSecureHash() != $response['eWAYoption3']) {
            return;
        }

        $paymentInst = $order->getPayment()->getMethodInstance();
        $paymentInst->setResponse($response);

        if ($paymentInst->parseResponse()) {
            /**
             * We can not create an invoice automatically because we have to check the request.
             * Read chapter "Technical Transaction Process" of the documentation.
             *
             * @link http://www.eway.com.au/_files/documentation/HostedPaymentPageDoc.pdf
             */
            //if ($order->canInvoice()) {
            //    $invoice = $order->prepareInvoice();
            //    $invoice->register()->capture();
            //    Mage::getModel('core/resource_transaction')
            //        ->addObject($invoice)
            //        ->addObject($invoice->getOrder())
            //        ->save();
            //    $paymentInst->setTransactionId($response['ewayTrxnReference']);
            //    $order->addStatusToHistory($order->getStatus(), Mage::helper('eway')->__('The customer has successfully returned from eWAY.'));
            //}
            /**
             * We just create the comment about customer redirection back.
             */
            $order->addStatusToHistory($order->getStatus(), Mage::helper('eway')->__('The customer has successfully returned from eWAY.'));
        } else {
            $paymentInst->setTransactionId($response['ewayTrxnReference']);
            $order->cancel();
            $order->addStatusToHistory($order->getStatus(), Mage::helper('eway')->__('The customer was rejected by eWAY.'));
            $status = false;
            $this->getCheckout()->setEwayErrorMessage($response['eWAYresponseText']);
        }

        $order->save();

        return $status;
    }

    /**
     * Return order model for incrementId
     *
     * @param  string $incrementId
     * @return Mage_Sales_Model_Order
     */
    protected function _getOrderByIncrementId($incrementId)
    {
        $order = Mage::getModel('sales/order');
        $order->loadByIncrementId($incrementId);
        if (!$order->getId()) {
            return false;
        }
        return $order;
    }
}
