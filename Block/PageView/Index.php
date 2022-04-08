<?php

namespace Commercers\TiktokPixel\Block\PageView;
use Magento\Catalog\Block\Product\Context;

class Index extends \Magento\Framework\View\Element\Template
{
    protected $cartFactory;
    protected $_requestHttp;   
    protected $_customerSession;
    protected $priceCurrency;
    protected $_pageTitle;
    protected $storeManager;
    protected $registry;
    public function __construct(
        \Magento\Checkout\Model\CartFactory $cartFactory,
        \Magento\Framework\App\Request\Http $requestHttp,
        \Magento\Customer\Model\Session $session,
        \Magento\Framework\Pricing\PriceCurrencyInterface $priceCurrency,
        \Magento\Framework\View\Page\Title $pageTitle,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = []
    ) {
        $this->cartFactory = $cartFactory;
        $this->_requestHttp = $requestHttp;
        $this->_customerSession = $session;
        $this->priceCurrency = $priceCurrency;
        $this->_pageTitle = $pageTitle;
        $this->storeManager = $storeManager;
        $this->registry = $registry;
        parent::__construct($context, $data);
    }

    public function getCurrentCurrencyCode()
    {
    return $this->priceCurrency->getCurrency()->getCurrencyCode();
    }

    public function getBaseUrl()
    {
        return $this->storeManager->getStore()->getBaseUrl();
    }
    public function getTitle()
    {
        return $this->_pageTitle->getShort();
    }
    public function isCustomerLoggedIn()
    {
        return $this->_customerSession->isLoggedIn();
    }

    public function getEmailCurrCustomer()
    {
        return $this->_customerSession->getCustomer()->getEmail();
    }

    public function getFullActionName()
    {
        return $this->_requestHttp->getFullActionName();
    }
    public function getGrandTotalInCart()
    {
        $cart = $this->cartFactory->create();
        $grandTotal = $cart->getQuote()->getGrandTotal();
        return $grandTotal;
    }
}