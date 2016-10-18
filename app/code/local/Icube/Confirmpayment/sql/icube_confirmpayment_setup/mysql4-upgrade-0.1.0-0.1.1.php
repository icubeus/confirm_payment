<?php

$installer=$this;
$installer->startSetup();

$installer->run("
DROP TABLE IF EXISTS {$this->getTable('confirmpayment/tobank')};
CREATE TABLE {$this->getTable('confirmpayment/tobank')}
(
`id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`bank_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

$installer->run("INSERT INTO {$this->getTable('confirmpayment/tobank')} (`bank_name`) values ('BCA'), ('BNI'), ('Mandiri'), ('CIMB Niaga'), ('BRI') ;");

$installer->endSetup();

?>