<?php


$sql = " create table if not exists `notifcations` (
    `id` int(11) NOT NULL AUTO_INCREMENT,

    `notifcation_date` timestamp NOT NULL DEFAULT current_timestamp(),
    
    `response_date` date null,

    `user_id` int(11) not NULL,
    
    `email` varchar(100) not NULL,
   
    `request_id` int(11)  null,
    
    `response` varchar(20)  NULL,

    `note` varchar(255)  NULL,

    `brief` varchar(160) null,

    `requester_name` varchar(160) null,

    PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";



if($conn->query($sql))
{
    echo("<p class='alert-success'> notifcations Table created successfully  </p><hr>");
}
else
{
    echo("<p class='alert-danger'> notifcations Table Not Created ! </p><hr>");
}

?>