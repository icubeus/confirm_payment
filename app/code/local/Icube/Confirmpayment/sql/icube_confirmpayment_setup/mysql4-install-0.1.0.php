<?php

$installer=$this;
$installer->startSetup();
$installer->run("
DROP TABLE IF EXISTS {$this->getTable('confirmpayment/confirmpayment')};
CREATE TABLE {$this->getTable('confirmpayment/confirmpayment')}
(
`id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`order_id` varchar(255) NOT NULL,
`name` varchar(255) NULL,
`email` varchar(255) NULL,
`bank_from` varchar(255) NULL,
`bank_to` varchar(255) NOT NULL,
`account_number` varchar(255) NULL,
`holder_name` varchar(255) NULL,
`amount` INT(11) NOT NULL,
`transfer_date` date NOT NULL,
`filename` varchar(255) NULL,
`timestamp` TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

$installer->endSetup();

?>