<?php

namespace Vnext\RewardPoints\Plugin\Checkout\CustomerData;

use Vnext\RewardPoints\Model\ResourceModel\Earningrate\CollectionFactory;

class Cart
{
    protected $earning;

    public function __construct(CollectionFactory $earning)
    {
        $this->earning = $earning;
    }

    public function afterGetSectionData(\Magento\Checkout\CustomerData\Cart $subject, array $result)
    {
        $point = $this->earning->create();
        $total = $result['subtotalAmount'];
        foreach ($point as $data){
        $money_spent = $data->getMoneySpent();
        }
        $earning = round($total / $money_spent);
        $result['extra_data'] = $earning;

        return $result;
    }
}