<?php
/**
 *
 * @category   Icube
 * @package    Icube_Confirmpayment
 * @author     Po
 */
class Icube_Confirmpayment_Block_Adminhtml_Tab_Detail extends Mage_Adminhtml_Block_Template
{
	public function getConfirmPaymentOrder()
	{
		$data = Mage::getModel('confirmpayment/confirmpayment')                       
                  	->load(Mage::registry('current_order')->getRealOrderId(),'order_id');
        
        return $data;
	}
	
	public function getToBankName($id)
    {
	    $data = Mage::getModel('confirmpayment/tobank')->load($id);
	    return $data->getBankName();
	}
	
}