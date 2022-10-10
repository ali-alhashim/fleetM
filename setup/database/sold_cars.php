<?php


 $sql = "
 create table if not exists `sold_cars` (

    `id` int(11) NOT NULL AUTO_INCREMENT,
    `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
    `last_modified` DATETIME  NULL ,

    `car_id` int(11) not null,
     
     `vid` varchar(20) not null,
     `door_number` varchar(10) default null,
     `plate_number` varchar(10) default null,
    
     `brand` varchar(45) default null,
     `model` varchar(45) default null,
     `year_make` varchar(10) default null,

    
    
      `note` varchar(255) default null,

     

     

      `odometer` varchar(100) default null, 

      `owner_name` varchar(100) default null,
      `owner_id` varchar(20) default null,

       `new_owner_name` varchar(100) null,
       `new_owner_id` varchar(20) null,
       `new_owner_mobile` varchar(20) null,
       `ownership_transfer_status` varchar(30) null,
      
       

     
      `sold_price` decimal(13,2) null,
      `sold_date`  date null,

      `serial_number`  varchar(20) UNIQUE not null,
     

    PRIMARY KEY (`id`)
 )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
 ";


 if($conn->query($sql))
{
    echo("<p class='alert-success'> Sold Cars Table created successfully  </p><hr>");
}
else
{
    echo("<p class='alert-danger'> Sold Cars Table Not Created ! </p><hr>");
}

?>