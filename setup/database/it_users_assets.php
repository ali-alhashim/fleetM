<?php

// IT users assets Table


$sql = " create table if not exists `it_users_assets` (

    `id` int(11) NOT NULL AUTO_INCREMENT,

    `asset_id` int(11) null,

    `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
    
    `user_name` varchar(100) not NULL,
    `user_id` int(11) not NULL,
    `email` varchar(100)  NULL,
    
    `handover_date` date null,

    

    `serial_number` varchar(100)  NULL,
    `location` varchar(100)  NULL,
    `department` varchar(100)  NULL,
    `category` varchar(100)  NULL,
    `manufacture` varchar(100)  NULL,
    `model` varchar(100)  NULL,
    `condition` varchar(100)  NULL,
    `computer_name` varchar(100)  NULL,
    
    `description` varchar(160)  NULL,
   

    `prepared_by` varchar(100)  NULL,
    `checked_by`  varchar(100)  NULL,

    `note` varchar(255) null,
    `asset_url` varchar(255) null,
    `received_date` date null,
    

    PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";



if($conn->query($sql))
{
    echo("<p class='alert-success'> it_users_assets Table created successfully  </p><hr>");
}
else
{
    echo("<p class='alert-danger'> it_users_assets Table Not Created ! </p><hr>");
}

?>