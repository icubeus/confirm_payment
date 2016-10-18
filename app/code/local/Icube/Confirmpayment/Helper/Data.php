<?php
/**
 *
 * @category   Icube
 * @package    Icube_Confirmpayment
 * @author     Po
 */
class Icube_Confirmpayment_Helper_Data extends Mage_Core_Helper_Abstract
{
	const FILE_DIR = 'icube_confirmpayment';
	
	public function validate($data)
    {
    	$errors = array();
    	if($data['order_id'] == '') $errors[] = $this->__('The order number can not be empty.');
    	//if($data['bank_from'] == '') $errors[] = $this->__('Bank name can not be empty.');
        if($data['bank_to'] == '') $errors[] = $this->__('Please choose destination bank.');
    	//if($data['account_number'] == '') $errors[] = $this->__('Account number can not be empty.');
        //if($data['holder_name'] == '') $errors[] = $this->__('Holder name can not be empty.');
        if($data['amount'] == '') $errors[] = $this->__('Transfer amount can not be empty.');
        if(!is_numeric($data['amount'])) $errors[] = $this->__('Transfer amount must be numeric.');
        if($data['transfer_date'] == '') $errors[] = $this->__('Transfer date can not be empty.');
    	
    	if (empty($errors)) {
            return true;
        }
        return $errors;
    }
    
    	
	public function getWorkingDir()
    {
        return Mage::getBaseDir(Mage_Core_Model_Store::URL_TYPE_MEDIA) . DS . self::FILE_DIR . DS;
    }
    
    public function getAllowedExt()
    {
	    return array('jpg','jpeg','gif','png','bmp','pdf');
    }
    
}