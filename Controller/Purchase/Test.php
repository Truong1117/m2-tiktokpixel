<?php
namespace Commercers\TiktokPixel\Controller\Purchase;
use Magento\Framework\App\Action\Context;
class Test extends \Magento\Framework\App\Action\Action
{
    public function __construct(
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Store\Model\Website $websiteModel,
        \Magento\Store\Model\StoreRepository $StoreRepository,
        Context $context
    ) {
        $this->_resultPageFactory = $resultPageFactory;
        $this->_websiteModel = $websiteModel;
        $this->_storeRepository = $StoreRepository;
        parent::__construct($context);
    }
    public function execute()
    {
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__(' heading '));

        $block = $resultPage->getLayout()
                ->createBlock('Commercers\TiktokPixel\Block\Checkout\PurchaseOrder')
                ->setTemplate('Commercers_TiktokPixel::tiktok-pixel/purchase.phtml')
                ->toHtml();
        $this->getResponse()->setBody($block);
    }

}