<?php
/**
 *
 * @category   Icube
 * @package    Icube_Confirmpayment
 * @author     Po
 */
 class Icube_Confirmpayment_Model_Resource_Confirmpayment_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
 {
     
     public function _construct()
     {
         parent::_construct();
         $this->_init('confirmpayment/confirmpayment');
     }
     
     
 }

?>