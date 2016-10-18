<?php
/**
 *
 * @category   Icube
 * @package    Icube_Confirmpayment
 * @author     Po
 */
class Icube_Confirmpayment_Model_Observer_Order
{
	public function injectTabs(Varien_Event_Observer $observer)
    {
	  $block = $observer->getEvent()->getBlock();
	  if (Mage::getStoreConfig('confirmpayment/general/enabled',Mage::app()->getStore()) && $block instanceof Mage_Adminhtml_Block_Sales_Order_View_Tabs)  
	  {
			$order = Mage::getModel('sales/order')
        		->getCollection()
        		->addFieldToSelect('*')
        		->addFieldToFilter('entity_id', Mage::app()->getRequest()->getParam('order_id'))
        		->getFirstItem();

            $block->addTabAfter('custom-order-tab-01', array(
                'label'     => 'Payment Confirmation',
                'content'   => $block->getLayout()->createBlock('confirmpayment/adminhtml_tab_detail', 'custom-tab-content', array('template' => 'icube/confirmpayment/tab/detail.phtml'))->toHtml())
                ,'order_info');

	    }
   
	}
}