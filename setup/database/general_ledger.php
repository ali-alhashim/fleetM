<?php
$sql = " create table if not exists `general_ledger` (
    `id` int(11) NOT NULL AUTO_INCREMENT,

    `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
    `last_modified` timestamp NOT NULL DEFAULT current_timestamp(),

    `account_name` varchar(100) DEFAULT NULL,
   
    `account_number` varchar(100) DEFAULT NULL,
   
    `account_type` varchar(100) DEFAULT NULL,

    `currency` varchar(100) null,

    `account_amount` decimal(13,2) DEFAULT NULL,

    `opening_amount` decimal(13,2) DEFAULT NULL,
    

    PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";



if($conn->query($sql))
{
    echo("<p class='alert-success'> general ledger Table created successfully  </p><hr>");
}
else
{
    echo("<p class='alert-danger'> general ledger Table Not Created ! </p><hr>");
}

?>