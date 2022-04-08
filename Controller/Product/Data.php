<?php
namespace Commercers\TiktokPixel\Controller\Product;
use Magento\Framework\App\Action\Context;
class Data extends \Magento\Framework\App\Action\Action
{
    protected $productRepository;
    public function __construct(
        \Magento\Catalog\Model\ProductRepository $productRepository,
        Context $context
    ) {
        $this->productRepository = $productRepository;
        parent::__construct($context);
    }
    public function execute()
    {
        $productId = $this->getRequest()->getParam("product_id");
        $product = $this->productRepository->getById($productId);
        $result = [];
        $result['product_name'] = $product->getName();
        $result['product_id'] = $productId;
        $result['procut_price'] = number_format($product->getPrice(), 2, '.' , $thousands_sep = ',');
        return $this->resultFactory
        ->create(\Magento\Framework\Controller\ResultFactory::TYPE_JSON)
        ->setData($result);
    }

}