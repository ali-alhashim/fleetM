<?php


$sql = " create table if not exists `users_calendar` (
    `id` int(11) NOT NULL AUTO_INCREMENT,

    `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),

    `department` varchar(100) not NULL,
    
    `user_id` int(11) not NULL,

    

    `user_name` varchar(100) not NULL,

    `badge_number` varchar(100) not NULL,
   
    `user_email` varchar(100)  NULL,

    `day` date  NULL,
   
    `check_in` time null,

    `check_out` time null,
    

    `note` varchar(255) not NULL,
    
    PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";



if($conn->query($sql))
{
    echo("<p class='alert-success'> users_calendar Table created successfully  </p><hr>");
}
else
{
    echo("<p class='alert-danger'> users_calendar Table Not Created ! </p><hr>");
}

?>