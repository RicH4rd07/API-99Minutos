<?php

namespace Noventaynueveminutos\NextDay\Model\Carrier;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\DataObject;
use Magento\Shipping\Model\Carrier\AbstractCarrier;
use Magento\Shipping\Model\Carrier\CarrierInterface;
use Magento\Shipping\Model\Config;
use Magento\Shipping\Model\Rate\ResultFactory;
use Magento\Store\Model\ScopeInterface;
use Magento\Quote\Model\Quote\Address\RateResult\ErrorFactory;
use Magento\Quote\Model\Quote\Address\RateResult\Method;
use Magento\Quote\Model\Quote\Address\RateResult\MethodFactory;
use Magento\Quote\Model\Quote\Address\RateRequest;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

class Customshipping extends AbstractCarrier implements CarrierInterface
{

protected $_checkoutSession;
/**

* Carrier's code
*
* @var string
*/

protected $_code = 'Noventaynueveminutos_NextDay';
/**
* Whether this carrier has fixed rates calculation
*
* @var bool
*/

protected $_isFixed = true;
/**
* @var ResultFactory
*/

protected $_rateResultFactory;
/**
* @var MethodFactory
*/

protected $_rateMethodFactory;
/**
* @param ScopeConfigInterface $scopeConfig
* @param ErrorFactory $rateErrorFactory
* @param LoggerInterface $logger
* @param ResultFactory $rateResultFactory
* @param MethodFactory $rateMethodFactory
* @param array $data
*/

public function __construct(
ScopeConfigInterface $scopeConfig,
ErrorFactory $rateErrorFactory,
LoggerInterface $logger,
ResultFactory $rateResultFactory,
MethodFactory $rateMethodFactory,
\Magento\Checkout\Model\Session $checkoutSession,
array $data = []
) {

$this->_rateResultFactory = $rateResultFactory;
$this->_rateMethodFactory = $rateMethodFactory;
$this->_checkoutSession = $checkoutSession;
parent::__construct($scopeConfig, $rateErrorFactory, $logger, $data);
}

/**
* Generates list of allowed carrier`s shipping methods
* Displays on cart price rules page
*
* @return array
* @api
*/

public function getAllowedMethods()
{
return [$this->getCarrierCode() => __($this->getConfigData('name'))];
}
/**
* Collect and get rates for storefront
*
* @SuppressWarnings(PHPMD.UnusedFormalParameter)
* @param RateRequest $request
* @return DataObject|bool|null
* @api
*/

public function collectRates(RateRequest $request)
{
/**
* Make sure that Shipping method is enabled
*/

if (!$this->isActive()) {
return false;
}

$this->_checkoutSession->start();
$_weight = $this->_checkoutSession->getWeight();
date_default_timezone_set("America/Mexico_City");
$postCode = $request->getDestPostcode();
$region = $request->getDestRegionCode();
$country = $request->getDestCountryId();
$time = idate('H');
if($_weight == 'no'){
    /*$error = $this->_rateErrorFactory->create();
    $error->setCarrier($this->_code);
    $error->setCarrierTitle($this->getConfigData('title'));
    $error->setErrorMessage(__($_weight));
    return $error;*/
    return false; 
        }

/** @var \Magento\Shipping\Model\Rate\Result $result */
$result = $this->_rateResultFactory->create();
$shippingPrice = $this->getConfigData('price');
$method = $this->_rateMethodFactory->create();
/**
* Set carrier's method data
*/
$method->setCarrier($this->getCarrierCode());
$method->setCarrierTitle($this->getConfigData('title'));
/**
* Displayed as shipping method under Carrier
*/

$method->setMethod($this->getCarrierCode());
$method->setMethodTitle($this->getConfigData('name'));
$method->setPrice($shippingPrice);
$method->setCost($shippingPrice);
$result->append($method);
return $result;
}
}