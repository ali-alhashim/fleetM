<?php

// IT PO line Table


$sql = " create table if not exists `it_invoice_line` (

    `id` int(11) NOT NULL AUTO_INCREMENT,

    `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
    
   
    `invoice_id` int(11) null,

    `item_no` varchar(160) null,
    `item_description` varchar(255) null,
   
    
    

   

    

    

    `quantity` int(11) null,

    `status` varchar(45) null,

    `uint_price` decimal(13,2) null,

    `vat_percentage` varchar(45) null, 

    `uint_price_with_vat` decimal(13,2) null,

    `total_price_with_vat` decimal(13,2) null,

    
    
    PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";



if($conn->query($sql))
{
    echo("<p class='alert-success'> it_invoice_line Table created successfully  </p><hr>");
}
else
{
    echo("<p class='alert-danger'> it_invoice_line Table Not Created ! </p><hr>");
}

?>