<?php

$sql = "create table if not exists `delivery_note_line` (
    `id` int(11) NOT NULL AUTO_INCREMENT,

    `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
    

    `delivery_id` int(11) DEFAULT NULL,

    `item_no` varchar(100) null,
    `description` varchar(255) null,
    `po_quantity` int(11) null,
    `delivery_quantity` int(11) null, 
    
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