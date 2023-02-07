<?php

namespace SM\Customer\Model;

class Customer implements \SM\Customer\Api\CustomerInterface
{

    /**
     * @var \Magento\Customer\Model\ResourceModel\Customer\CollectionFactory
     */
    protected $customerCollectionFactory;

    /**
     * @param \Magento\Customer\Model\ResourceModel\Customer\CollectionFactory $customerCollectionFactory
     */
    public function __construct(
        \Magento\Customer\Model\ResourceModel\Customer\CollectionFactory $customerCollectionFactory
    ) {
        $this->customerCollectionFactory = $customerCollectionFactory;
    }

    /**
     * @return array|mixed
     */
    public function getList()
    {
        $collection = $this->customerCollectionFactory->create()->getConnection();
        $select = $collection->select()->from('customer_entity');
        return $collection->fetchAll($select);
    }

}
