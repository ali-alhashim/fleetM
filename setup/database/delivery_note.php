<?php

$sql = "create table if not exists `delivery_note` (
    `id` int(11) NOT NULL AUTO_INCREMENT,

    `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
    

    `po_id` int(11) DEFAULT NULL,
    `delivery_date` date DEFAULT NULL,
    
    `delivery_address` varchar(255) DEFAULT NULL,
    
     `received_by` varchar(200) null,
      
     `note` varchar(255) null,
     `total_items` int(11) null,

     `document_url` varchar(255) null,

    PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";



if($conn->query($sql))
{
    echo("<p class='alert-success'> Company Table created successfully  </p><hr>");
}
else
{
    echo("<p class='alert-danger'> Company Table Not Created ! </p><hr>");
}
?>