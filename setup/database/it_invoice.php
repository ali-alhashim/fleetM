<?php

// IT  Purchasing invoice Table


$sql = " create table if not exists `it_invoice` (

    `id` int(11) NOT NULL AUTO_INCREMENT,

    `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
    
   
   

    `from_supplier_id` int(11) null,
    `from_supplier_name` varchar(160) null,

   
    `supplier_tel` varchar(45) null,
    `mobile` varchar(45) null,
    `email` varchar(45) null,
    

    `shipping_address` varchar(160) null,

    `no_of_items` int(11)  NULL,

    `po_id` int(11) null,

    `status` varchar(45) null,

    

    `total_vat` decimal(13,2) null,

    `total_amount` decimal(13,2) null,

    `total_amount_with_vat` decimal(13,2) null,

    `invoice_number` varchar(200) null,

    `paid_amount` decimal(13,2) null,

    `payment_method` varchar(160) null,

    `document` varchar(255) null,

    `invoice_date` date null,

    `note` varchar(255) null,

    `currency` varchar(160) null,

    `created_by_name` varchar(160) null,

    `created_by_id` int(11) null,

    `payment_terms` varchar(100) null,
    
    
    PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";



if($conn->query($sql))
{
    echo("<p class='alert-success'> it_invoice Table created successfully  </p><hr>");
}
else
{
    echo("<p class='alert-danger'> it_invoice Table Not Created ! </p><hr>");
}

?>