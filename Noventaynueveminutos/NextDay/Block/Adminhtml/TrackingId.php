<?php
namespace Noventaynueveminutos\NextDay\Block\Adminhtml;

class TrackingId extends \Magento\Backend\Block\Widget\Grid\Container
{

	protected function _construct()
	{
		$this->_controller = 'adminhtml_trackingid';
		$this->_blockGroup = 'Noventaynueveminutos_NextDay';
		$this->_headerText = __('99minutos Envíos');
		$this->_addButtonLabel = __('Create New Register');
		parent::_construct();
	}
}

