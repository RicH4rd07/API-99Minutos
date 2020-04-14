<?php

namespace Noventaynueveminutos\NextDay\Observer;

use Magento\Framework\Event\ObserverInterface;

class CartWeight implements ObserverInterface
{

	protected $_cart;

	protected $_checkoutSession;
	
	public function __construct(
	\Magento\Checkout\Model\Cart $cartModel,
	\Magento\Checkout\Model\Session $checkoutSession)
	{
	$this->_cart = $cartModel;
	$this->_checkoutSession = $checkoutSession;
	}

	public function execute (\Magento\Framework\Event\Observer $observer)

	{

	$items = $this->_cart->getQuote()->getAllItems();
	
	$Total = $this->_cart->getQuote()->getGrandTotal();

	$weight = 0;

	foreach($items as $item)
	{
		$weight += ($item->getWeight() * $item->getQty());	
	}	
	
	$packageSize;

	if($weight<1)
	{
		$packageSize = 'xs';
	}elseif(1<=$weight && $weight<2)
	{
		$packageSize = 's';
	}elseif(2<=$weight && $weight<3)
	{
		$packageSize = 'm';
	}elseif(3<=$weight && $weight<5)
	{
		$packageSize = 'l';
	}elseif(5<=$weight && $weight<25)
	{
		$packageSize = 'xl';
	}elseif($weight> 24)
	{
		$packageSize = 'no';
	}


	$this->_checkoutSession->start();

	$this->_checkoutSession->setWeight($packageSize);

	$this->_checkoutSession->setTotal($Total);
		
	} //FINAL OBSERVER

} //FINAL CLASE