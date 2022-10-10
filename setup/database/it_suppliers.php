<?php

// IT suppliers Table


$sql = " create table if not exists `it_supplier` (

    `id` int(11) NOT NULL AUTO_INCREMENT,

    `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
    
   
   
    `supplier_name` varchar(160) null,
    `website` varchar(160) null,
    `contact_name` varchar(160) null,
    `contact_email` varchar(160)  NULL,
    `contact_mobile` varchar(15) null,
    `address` varchar(200) null,
    `due_payment` decimal(13,2) null,
    `payment_terms` varchar(60) null,
    `cr_number` varchar(60) null,
    `vat_id` varchar(60) null,
    
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