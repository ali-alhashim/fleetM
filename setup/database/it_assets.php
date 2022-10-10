<?php

// IT Assets Table


$sql = " create table if not exists `it_assets` (

    `id` int(11) NOT NULL AUTO_INCREMENT,

    `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
    
   

    `po_id` varchar(45)  NULL,
    `supplier_id` int(11)  NULL,
    `supplier_name` varchar(100)  NULL,
    `invoice_number` varchar(100)  NULL,

    `serial_number` varchar(100)  NULL,
    `location` varchar(100)  NULL,

    `department` varchar(100)  NULL,
    `category` varchar(100)  NULL,
    `manufacture` varchar(100)  NULL,
    `model` varchar(100)  NULL,
    `condition` varchar(100)  NULL,
    
    
    `description` varchar(255)  NULL,
    `purchased_price` decimal(13,2) null,
    `purchased_date`  date null,
   

    `note` varchar(255) null,
    
    `asset_url` varchar(255) null,

    `asset_photo1` varchar(255) null,

    `asset_photo2` varchar(255) null,

    `asset_photo3` varchar(255) null,

    `asset_date` date null,

    `asset_photo4` varchar(255) null,

    `warranty` date null,
    `barcode` varchar(60) null,

    `depreciation_age` varchar(60) null,
    
    PRIMARY KEY (`id`),
    UNIQUE(`serial_number`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";



if($conn->query($sql))
{
    echo("<p class='alert-success'> it_assets Table created successfully  </p><hr>");
}
else
{
    echo("<p class='alert-danger'> it_assets Table Not Created ! </p><hr>");
}

?>