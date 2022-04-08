<?php

namespace Commercers\TiktokPixel\Block\Checkout;
use Magento\Catalog\Block\Product\Context;

class PurchaseOrder extends \Magento\Framework\View\Element\Template
{
    protected $cartFactory;
    protected $priceCurrency;
    protected $checkoutSessionFactory;
    protected $orderRepository;
    public function __construct(
        \Magento\Checkout\Model\CartFactory $cartFactory,
        \Magento\Framework\Pricing\PriceCurrencyInterface $priceCurrency,
        \Magento\Sales\Api\OrderRepositoryInterface $orderRepository,
        \Magento\Checkout\Model\SessionFactory $checkoutSessionFactory,
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = []
    ) {
        $this->cartFactory = $cartFactory;
        $this->priceCurrency = $priceCurrency;
        $this->orderRepository = $orderRepository;
        $this->checkoutSessionFactory = $checkoutSessionFactory;
        parent::__construct($context, $data);
    }


    public function orderObjectSession()
    {
        $checkoutSession = $this->checkoutSessionFactory->create();
        return $checkoutSession->getLastRealOrder();
    }

    public function getOrderItems($orderId){
        $order = $this->orderRepository->get($orderId);
        return $order->getAllItems();
    }
    public function getCurrentCurrencyCode()
    {
    return $this->priceCurrency->getCurrency()->getCurrencyCode();
    }

    public function getGrandTotalInCart()
    {
        $cart = $this->cartFactory->create();
        $grandTotal = $cart->getQuote()->getGrandTotal();
        return $grandTotal;
    }

}