<?php

namespace SM\Customer\Block;

use Magento\Framework\View\Element\Template;

class Index extends \Magento\Framework\View\Element\Template
{

    /**
     * @var \SM\Customer\Api\CustomerInterface
     */
    public $customer;

    /**
     * @param \SM\Customer\Api\CustomerInterface $customer
     * @param Template\Context $context
     * @param array $data
     */
    public function __construct(
        \SM\Customer\Api\CustomerInterface $customer,
        Template\Context                  $context,
        array                             $data = []
    ){
        $this->customer = $customer;
        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
    public function getWelcome()
    {
        return 'Welcome to List Customer';
    }

    /**
     * @return \SM\Customer\Api\CustomerInterface
     */
    public function getListCustomers()
    {
        return $this->customer->getList();
    }
}
