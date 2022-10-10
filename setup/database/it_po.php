<?php

// IT PO Table


$sql = " create table if not exists `it_po` (

    `id` int(11) NOT NULL AUTO_INCREMENT,

    `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
    
   
    `created_by_id` int(11) null,
    `created_by_name` varchar(160) null,
    `created_by_mobile` varchar(45) null,
    `approved_by` varchar(160) null,
    `job_title` varchar(160) null,

    `to_supplier_id` int(11) null,
    `to_supplier_name` varchar(160) null,

    `attn_name` varchar(100) null,
    `supplier_tel` varchar(45) null,
    `mobile` varchar(45) null,
    `email` varchar(45) null,
    

    `shipping_address` varchar(160) null,

    `no_of_items` int(11)  NULL,

    `quotation_id` varchar(45) null,

    `status` varchar(45) null,

    

    `total_vat` decimal(13,2) null,

    `total_amount` decimal(13,2) null,

    `total_amount_with_vat` decimal(13,2) null,

    `currency` varchar(45) null,

    `payment_terms` varchar(60) null,

    `note` varchar(200) null,

    `document_url` varchar(255) null,
    
    PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";



if($conn->query($sql))
{
    echo("<p class='alert-success'> it_po Table created successfully  </p><hr>");
}
else
{
    echo("<p class='alert-danger'> it_po Table Not Created ! </p><hr>");
}

?>