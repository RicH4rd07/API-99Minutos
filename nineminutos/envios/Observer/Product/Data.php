<?php
 
namespace nineminutos\envios\Observer\Product;
 
use Magento\Framework\Event\ObserverInterface;

class Data implements ObserverInterface
{
 
    /**
     * @param \Magento\Framework\Event\Observer $observer
     */

    protected $_checkoutSession;


    public function __construct(\Magento\Checkout\Model\Session $checkoutSession) {
    
            $this->_checkoutSession = $checkoutSession;
        } 
    

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $order = $this->_checkoutSession->getLastRealOrder();

        $orderId=$order->getEntityId();

        $order->getIncrementId();

        $product = $observer->getProduct();

        $originalName = $product->getName();
 
        $modifiedName = $originalName . ' - MODIFICADO POR EL OBSERVER '.$orderId;
 
        $product->setName($modifiedName);
    }
 
}