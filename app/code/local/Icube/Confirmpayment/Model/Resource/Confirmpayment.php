<?php
/**
 *
 * @category   Icube
 * @package    Icube_Confirmpayment
 * @author     Po
 */
class Icube_Confirmpayment_Model_Resource_Confirmpayment extends Mage_Core_Model_Mysql4_Abstract
{
    
	public function _construct()
	{    
	    $this->_init('confirmpayment/confirmpayment','id');
	}   
    
}
?>