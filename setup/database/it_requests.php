<?php

// IT requests Table


$sql = " create table if not exists `it_requests` (

    `id` int(11) NOT NULL AUTO_INCREMENT,

    `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
    
   
    `requester_id` int(11) null,
    `requester_name` varchar(160) null,
    `department` varchar(100) null,
    `badge_number` varchar(10) null,
    `request_type` varchar(100)  NULL,
    `mobile` varchar(15) null,
    `status` varchar(45) null,
    `response` varchar(45) null,

    `response_by_name` varchar(100) null,
    `response_by_id` int(11) null,
    `response_by_email` varchar(100) null,
    `'response_by_date` varchar(100) null,
    
    `response_note` varchar(200) null,
    `description` varchar(160) null,
    `justification` varchar(160) null,
    
    PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";



if($conn->query($sql))
{
    echo("<p class='alert-success'> it_requests Table created successfully  </p><hr>");
}
else
{
    echo("<p class='alert-danger'> it_requests Table Not Created ! </p><hr>");
}

?>