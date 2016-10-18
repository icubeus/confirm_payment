<?php
/**
 *
 * @category   Icube
 * @package    Icube_Confirmpayment
 * @author     Po
 */
class Icube_Confirmpayment_Model_Confirmpayment extends Mage_Core_Model_Abstract
{
    
    public function _construct()
    {
        parent::_construct();
        $this->_init('confirmpayment/confirmpayment');
    }
    
    
}


?>