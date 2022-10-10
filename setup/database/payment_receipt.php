<?php

// IT payment_receipt Table


$sql = " create table if not exists `payment_receipt` (

    `id` int(11) NOT NULL AUTO_INCREMENT,

    `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
    
   
    

    `payment_amount` decimal(13,2) null,

    `document` varchar(255) null,

    `note` varchar(255) null,

    `payment_method` varchar(100) null,

    `pay_from` varchar(160) null,
    `pay_to` varchar(160) null,

    `total_invoices` int(11) null,

    
    
    PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";



if($conn->query($sql))
{
    echo("<p class='alert-success'> payment_receipt Table created successfully  </p><hr>");
}
else
{
    echo("<p class='alert-danger'> payment_receipt Table Not Created ! </p><hr>");
}

?>