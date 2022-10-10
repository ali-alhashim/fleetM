<?php

$sql = " create table if not exists `company` (
    `id` int(11) NOT NULL AUTO_INCREMENT,

    `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
    `last_modified` timestamp NOT NULL DEFAULT current_timestamp(),

    `company_name` varchar(100) DEFAULT NULL,
    `company_CR` varchar(20) DEFAULT NULL,
    
    `company_logo` varchar(255) DEFAULT NULL,
    `company_CR_URL` varchar(255) DEFAULT NULL,

    `company_CR_expiration` date DEFAULT NULL,

    `address` varchar(100) null,
    `company_email` varchar(100) null,
    `city` varchar(100) null,
    `country` varchar(100) null,
    `zip_code` varchar(10) null,



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