    $error = $this->_rateErrorFactory->create();
    $error->setCarrier($this->_code);
    $error->setCarrierTitle($this->getConfigData('title'));
    $error->setErrorMessage(__($_weight));
    return $error;
