<?php

$sql = " create table if not exists `attendance_device` (
    `id` int(11) NOT NULL AUTO_INCREMENT,

    `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
   

    `serial_number` varchar(100) DEFAULT NULL,
    `device_name` varchar(100) DEFAULT NULL,
    `area` varchar(100) DEFAULT NULL,
    `device_ip` varchar(100) DEFAULT NULL,
    `user_quantity` int(11) DEFAULT NULL,
    `last_sync` date null,
    
  



    PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";



if($conn->query($sql))
{
    echo("<p class='alert-success'> attendance_device Table created successfully  </p><hr>");
}
else
{
    echo("<p class='alert-danger'> attendance_device Table Not Created ! </p><hr>");
}
?>