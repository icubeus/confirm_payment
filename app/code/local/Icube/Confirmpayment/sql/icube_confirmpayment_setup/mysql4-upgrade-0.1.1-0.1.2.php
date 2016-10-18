<?php

$installer=$this;
$installer->startSetup();

$status = Mage::getModel('sales/order_status');

$status->setStatus('confirmed')->setLabel('Payment Confirmed')
    ->assignState(Mage_Sales_Model_Order::STATE_NEW) 
    ->save();

$installer->endSetup();

?>