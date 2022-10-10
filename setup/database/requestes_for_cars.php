<?php
$sql = " create table if not exists `requestes_for_cars` (
    `id` int(11) NOT NULL AUTO_INCREMENT,

    `request_date` timestamp NOT NULL DEFAULT current_timestamp(),
    

    `user_id` int(11) not NULL,
   
    `full_name` varchar(100) not NULL,
   
    `badge_number` varchar(10) null,
     
    `company` varchar(100) null,
    `department` varchar(100) null,  
    `report_to`  varchar(100) null,
    `email`  varchar(100) null,
    `mobile` varchar(20) null,
    `telphone_ext` varchar(8) null,
    `file_url` varchar(255) default null,

    `request_type` varchar(45) null,

    `cost_amount`  decimal(13,2) not null,

    `status` int(2) null default 1,

   

    `transportation_response` varchar(15) null,

    `justification` varchar(255) default null,

    `note` varchar(255) not NULL,

    `response_by_id` int(11) null,
     
    `response_by_name` varchar(100) null,

    `response_by_email` varchar(100) null,

    `response_by_date` date null,

    
    PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";



if($conn->query($sql))
{
    echo("<p class='alert-success'> requestes for cars Table created successfully  </p><hr>");
}
else
{
    echo("<p class='alert-danger'> requestes_for_cars Table Not Created ! </p><hr>");
}

?>