<?php
$sql = " create table if not exists `department` (
    `id` int(11) NOT NULL AUTO_INCREMENT,

    `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
    `last_modified` timestamp NOT NULL DEFAULT current_timestamp(),

    `department_name` varchar(20) DEFAULT NULL,
   
    `manager_id` int(11) DEFAULT NULL,
   
    `manager_name` varchar(100) DEFAULT NULL,

    `company_name` varchar(100) DEFAULT NULL,
    `company_id` int(11) DEFAULT NULL,

    PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";



if($conn->query($sql))
{
    echo("<p class='alert-success'> Department Table created successfully  </p><hr>");
}
else
{
    echo("<p class='alert-danger'> Department Table Not Created ! </p><hr>");
}

?>