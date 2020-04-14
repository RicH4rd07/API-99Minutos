<?php
namespace Noventaynueveminutos\NextDay\Controller\adminhtml\trackingid;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action 
{
    
    protected $resultPageFactory;

    public function __construct(
        Action\Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);

        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Noventaynueveminutos_NextDay::grid_list'); // ui component grid name
        $resultPage->getConfig()->getTitle()->prepend((__('Envíos 99 minutos')));
        return $resultPage;
    }

    protected function _isAllowed()
    {
        return true;
    }
}
