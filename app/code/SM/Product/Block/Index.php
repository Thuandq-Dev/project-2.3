<?php

namespace SM\Product\Block;

use Magento\Framework\View\Element\Template;

class Index extends \Magento\Framework\View\Element\Template
{

    /**
     * @var \SM\Product\Api\ProductInterface
     */
    public $product;

    /**
     * @param \SM\Product\Api\ProductInterface $product
     * @param Template\Context $context
     * @param array $data
     */
    public function __construct(
        \SM\Product\Api\ProductInterface $product,
        Template\Context                  $context,
        array                             $data = []
    ){
        $this->product = $product;
        parent::__construct($context, $data);
    }

    /**
     * @return mixed
     */
    public function getListProduct()
    {
        return $this->product->getList();
    }
}
