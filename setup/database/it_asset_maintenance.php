<?php

// IT Assets maintenance Table


$sql = " create table if not exists `it_asset_maintenance` (

    `id` int(11) NOT NULL AUTO_INCREMENT,

    `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
    
   

    `asset_id` varchar(45)  NULL,
   
    `invoice_number` varchar(100)  NULL,

    `serial_number` varchar(100)  NULL,
    `maintenance_by` varchar(100)  NULL,

   
    `category` varchar(100)  NULL,
    `manufacture` varchar(100)  NULL,

    `model` varchar(100)  NULL,

    `condition` varchar(100)  NULL,
    
    
    `description` varchar(255)  NULL,

    `maintenance_cost` decimal(13,2) null,
    `maintenance_date`  date null,
   

    `note` varchar(255) null,
    
    `maintenance_url` varchar(255) null,

    `maintenance_photo1` varchar(255) null,

    `maintenance_photo2` varchar(255) null,

    `maintenance_photo3` varchar(255) null,

    `maintenance_photo4` varchar(255) null,

    `warranty` date null,

    

  
    
    PRIMARY KEY (`id`)
   
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";



if($conn->query($sql))
{
    echo("<p class='alert-success'> IT Assets maintenance  created successfully  </p><hr>");
}
else
{
    echo("<p class='alert-danger'>IT Assets maintenance  Not Created ! </p><hr>");
}

?>