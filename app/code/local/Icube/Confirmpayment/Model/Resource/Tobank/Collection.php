<?php
/**
 *
 * @category   Icube
 * @package    Icube_Confirmpayment
 * @author     Po
 */
class Icube_Confirmpayment_Model_Resource_Tobank_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
     
	public function _construct()
    {
        parent::_construct();
        $this->_init('confirmpayment/tobank');
    }
     
    public function toOptionArray($emptyLabel = ' ')
    {
	    $options = $this->_toOptionArray('id', 'bank_name');
        if (count($options) > 0 && $emptyLabel !== false) {
            array_unshift($options, array('value' => '', 'label' => $emptyLabel));
        }

        return $options;
    }
	    
	
     
}

?>