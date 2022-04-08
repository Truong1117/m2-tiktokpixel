<?php

namespace Commercers\TiktokPixel\Block\Product;
use Magento\Catalog\Block\Product\Context;

class AddToCart extends \Magento\Framework\View\Element\Template
{
    protected $cartFactory;
    protected $storeManager;
    protected $categoryFactory;
    protected $priceCurrency;
    protected $registry;
    public function __construct(
        \Magento\Checkout\Model\CartFactory $cartFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Catalog\Model\CategoryFactory $categoryFactory,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Pricing\PriceCurrencyInterface $priceCurrency,
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = []
    ) {
        $this->cartFactory = $cartFactory;
        $this->storeManager = $storeManager;
        $this->categoryFactory = $categoryFactory;
        $this->registry = $registry;
        $this->priceCurrency = $priceCurrency;
        parent::__construct($context, $data);
    }

    public function getCurrentCurrencyCode()
    {
    return $this->priceCurrency->getCurrency()->getCurrencyCode();
    }

    public function getCurrentProduct()
    {
        return $this->registry->registry('current_product');
    }

    public function getCategoryName($categoryId)
    {
        $category = $this->categoryFactory->create()->load($categoryId);
        return $category->getName();
    }

    public function getBaseUrl()
    {
        return $this->storeManager->getStore()->getBaseUrl();
    }

    public function getCurrentCategory()
    {
        return $this->registry->registry('current_category');
    }

    public function getGrandTotalInCart()
    {
        $cart = $this->cartFactory->create();
        $grandTotal = $cart->getQuote()->getGrandTotal();
        return $grandTotal;
    }

}