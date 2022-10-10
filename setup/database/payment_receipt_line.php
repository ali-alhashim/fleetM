<?php

// IT payment_receipt_line Table


$sql = " create table if not exists `payment_receipt_line` (

    `id` int(11) NOT NULL AUTO_INCREMENT,

    `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
    
   
    

    `payment_id` int(11) null,

    `invoice_id` int(11) null,

    `invoice_number` varchar(100) null,

    `invoice_date` date null,

    `invoice_amount` decimal(13,2) null,



    
    
    PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";



if($conn->query($sql))
{
    echo("<p class='alert-success'> payment_receipt_line Table created successfully  </p><hr>");
}
else
{
    echo("<p class='alert-danger'> payment_receipt_line Table Not Created ! </p><hr>");
}

?>