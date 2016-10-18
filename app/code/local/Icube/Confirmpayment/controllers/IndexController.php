<?php
/**
 *
 * @category   Icube
 * @package    Icube_Confirmpayment
 * @author     Po
 */
class Icube_Confirmpayment_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

	public function saveAction()
    {
    	if(Mage::getStoreConfig('confirmpayment/general/enabled',Mage::app()->getStore()))
        {
	        if ($data = $this->getRequest()->getPost()) 
	        {
	        	$errors = Mage::helper('confirmpayment')->validate($data);
	        
	        	if(is_array($errors))
	        	{
		        	foreach ($errors as $error) {
	                    Mage::getSingleton('core/session')->addError($error);
	                }
	                $this->_redirectReferer();
	                return;
	        	}	
	        		
				$order = Mage::getModel('sales/order')->loadByIncrementId($data['order_id']);
				if($order->getId() == '')
				{
					Mage::getSingleton('core/session')->addError("Order does not exist.");
					$this->_redirectReferer();
	                return;
				}
				
				$confirm = Mage::getModel('confirmpayment/confirmpayment')->load($data['order_id'],'order_id');
				
				if($confirm->getId())
				{
					Mage::getSingleton('core/session')->addError("Payment confirmation already existed.");
					$this->_redirectReferer();
	                return;
				}
				
                    try {

                        $date = new DateTime();
                        $data['timestamp'] = $date->getTimestamp();
        				// if($data['transfer_date'] == '') $data['transfer_date'] = date("Y-m-d") ;
                        
                        if(isset($_FILES['filename']['name']) && $_FILES['filename']['name'] != '') 
                        {
	                        Mage::getConfig()->createDirIfNotExists(Mage::helper('confirmpayment')->getWorkingDir());
	                        /* Starting upload */    
	                        $uploader = new Varien_File_Uploader('filename');
	                        $uploader->setAllowedExtensions(Mage::helper('confirmpayment')->getAllowedExt());
	                        $uploader->setAllowRenameFiles(true); 
	                        $uploader->setFilesDispersion(false);
	                        $uploaderReturnedVal = $uploader->save(Mage::helper('confirmpayment')->getWorkingDir(), $data['order_id'].'.png');
	                        
	                        if($uploaderReturnedVal["error"] == 0)
	                        {                            
	                           $data['filename'] = Icube_Confirmpayment_Helper_Data::FILE_DIR.DS.$uploaderReturnedVal['file'];
	                        }  
	                        
	                        
	                    }
                        
                        $model = Mage::getModel('confirmpayment/confirmpayment');  
     
                        $model->setData($data);
                        $model->save();
						
						$state = $order->getState();
                        /* //uncomment to change ORDER STATE
                        if($order->getState() == 'new') { $state = 'processing'; }
                        */
                        
                        /* SET ORDER STATUS as 'confirmed' */
						if($order->getStatus() == 'pending') 
						{ $status = 'confirmed'; }
						else 
						{ $status = $order->getStatus(); }
						$comment = 'Payment Confirmation';
						$isCustomerNotified = false;
						$order->setState($state, $status, $comment, $isCustomerNotified);
						$order->save();
                        

                       Mage::getSingleton('core/session')->addSuccess('The Payment Confirmation has been saved.');                 
                    } catch (Exception $e) {
                         Mage::getSingleton('core/session')->addError($e->getMessage());
                         return;
                    }
               }
            }
        else
        {
             Mage::getSingleton('core/session')->addError("Payment Confirmation utility is Disabled.");
        } 
        
        $this->_redirectReferer();  
    }
        
}
?>
