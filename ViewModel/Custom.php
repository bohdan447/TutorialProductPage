<?php

namespace Perspective\TutorialProductPage\ViewModel;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Perspective\TutorialProductPage\Helper\Custom as CustomHelper;
use Magento\Catalog\Model\Product;

class Custom implements ArgumentInterface
{
    /** @var CustomHelper */
    protected $customHelper;

    /** @var ProductRepositoryInterface */
    protected $productRepository;

    /** @var \Magento\Framework\Registry */
    protected $registry;

    public function __construct(
        CustomHelper $customHelper,
        ProductRepositoryInterface $productRepository,
        \Magento\Framework\Registry $registry
    ) {
        $this->customHelper = $customHelper;
        $this->productRepository = $productRepository;
        $this->registry = $registry;
    }

    /**
     * Get any value for our template
     *
     * @return string
     */
    public function getAnyCustomValue()
    {
        $currentProduct = $this->getProduct();
        $customValue = "Any Value : ";
        return $customValue . $currentProduct->getFinalPrice();
    }

    /**
     * @return bool
     */
    public function isAvailable()
    {
        $currentProduct = $this->getProduct();
        return $this->customHelper->validateProductBySku($currentProduct->getSku());
    }

    /**
     * Get the current product
     *
     * @return Product
     */
    protected function getProduct()
    {
        return $this->registry->registry('current_product');
    }
}
