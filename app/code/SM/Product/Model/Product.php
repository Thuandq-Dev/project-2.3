<?php

namespace SM\Product\Model;

class Product implements \SM\Product\Api\ProductInterface
{

    /**
     * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
     */
    protected $productCollectionFactory;

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $storeManager;

    /**
     * @var \Magento\Framework\App\RequestInterface
     */
    protected $request;

    /**
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory
     * @param \Magento\Framework\App\RequestInterface $request
     */
    public function __construct(
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \Magento\Framework\App\RequestInterface $request
    ) {
        $this->productCollectionFactory = $productCollectionFactory;
        $this->storeManager = $storeManager;
        $this->request = $request;
    }

    /**
     * @return \Magento\Catalog\Model\ResourceModel\Product\Collection|mixed
     */
    public function getList()
    {
        $data = [];
        $collection = $this->productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->setPageSize(50);
        $collection->setCurPage(1);
        foreach ($collection as $product) {
            if ($product->getStatus() !== 0) {
                $data[$product->getId()] = $product->getData();
            }
        }
        return $data;
    }


}
