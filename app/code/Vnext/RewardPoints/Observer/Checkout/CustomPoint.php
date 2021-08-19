<?php

namespace Vnext\RewardPoints\Observer\Checkout;

use Magento\Framework\App\ObjectManager;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;
use Vnext\RewardPoints\Model\ResourceModel\Earningrate\CollectionFactory;
class CustomPoint implements ObserverInterface
{
    protected $earning;
    protected $logger;
    protected $point;

    public function __construct(LoggerInterface $logger, CollectionFactory $earning,
                                \Vnext\RewardPoints\Model\ResourceModel\Point\CollectionFactory $point)
    {
        $this->logger = $logger;
        $this->earning = $earning;
        $this->point = $point;
    }

    public function execute(Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();
        $customerId = $order->getCustomerId();
        $customEmail = $order->getCustomerEmail();
        $total = $order->getSubtotal();
        $earning_point = $this->earning->create();
        if ($customerId != null) {
            foreach ($earning_point as $data) {
                $money_spent = $data->getMoneySpent();
            }

            $objectManager = ObjectManager::getInstance();
            $question = $objectManager->create('Vnext\RewardPoints\Model\Point');
            $earning = round($total / $money_spent);
            $customPointId = $question->load($customerId,'customer_id')->getCustomerId();
            if (isset($customPointId)) {
                $idPoint = $question->load($customerId,'customer_id')->getId();
                $customerPoint = $question->load($customerId,'customer_id')->getPoint();
                $postUpdate = $question->load($idPoint);
                $point_customer_one = $customerPoint + $earning;
                $postUpdate->setPoint($point_customer_one);
                $postUpdate->save();
            } else {
                $question->setPoint($earning);
                $question->setCustomerId($customerId);
                $question->setCustomerEmail($customEmail);
                $question->setPointSpent("0");
                $question->save();
            }
        }

    }
}