<?php
/**
 *
 * @category   Icube
 * @package    Icube_Confirmpayment
 * @author     Po
 */

class Icube_Confirmpayment_Block_Form extends Mage_Core_Block_Template
{
	public function getOrderById($id)
	{
		$order = Mage::getModel('sales/order')->loadByIncrementId($id);
		return $order;
	}
	
	public function getSaveAction()
    {
	    return $this->getUrl('confirmpayment/index/save');
    } 
    
    public function getToBankHtmlOptions()
    {
	    $options = Mage::getModel('confirmpayment/tobank')->getResourceCollection()->toOptionArray();
	    $name = 'bank_to';
        $id = 'bank_to';
        $title = 'Bank To';
        $html = $this->getLayout()->createBlock('core/html_select')
            ->setName($name)
            ->setId($id)
            ->setTitle($title)
            ->setClass('required-entry validate-select')
            ->setOptions($options)
            ->getHtml();

        return $html;
    }
    
}