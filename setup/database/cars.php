<?php
/**
 * Cars Table 
 * 0- id [رقم السيارة في النظام التسلسلي] int(11) auto_increment primary key
 * 
 * 1- vid [رقم الهيكل] varchar(20) UNIQUE 
 * 2- door_number [رقم الباب] varchar(10) null
 * 3- plate_number [رقم اللوحة] varchar(10) not null
 * 4- body_type [نوع الهيكل] varchar(30) => (select list [SUV-جيب, Sedan - سيدان, ....]) get from car category table
 * 5- brand [الشركة المصنعة] varchare(100) not null
 * 6- model [طراز المركبة] varchare(10) not null
 * 6- year_make [سنة الصنع] date not null
 * 
 * 7- image_front_url [رابط صورة السيارة] varchare(255) null
 * 7- image_back_url [رابط صورة السيارة] varchare(255) null
 * 7- image_right_url [رابط صورة السيارة] varchare(255) null
 * 7- image_left_url [رابط صورة السيارة] varchare(255) null
 * 
 * 7- seats [عدد مقاعد المركبة] int(10) not null default(5)
 * 8- note [ملاحظات]varchare(250) null
 * 
 * 9- registration_expiration [تاريخ إنتهاء] date not null
 * 10- registration_url [صورة الإستمارة] varchare(255) null
 * 
 * 11- owner_name [أسم المالك] varchare(100) not null
 * 
 * 12- fuel_type   [نوع الوقود] varchare(30) null => (select list octan 91, octan 95, Diesel)
 * 

 *  
 * 15- car_status [حالة السيارة] varchare(40) => (select Working, Damage, stolen, for sale, Sold, Repairing )
 * 
 * 16- gps_tracking [ جهاز تتبع] tinyint(1) not null (yes 1 or no 0)
 * 
 * 17- purchased_price [سعر شراء السيارة] decimal(13,2) null
 * 18- purchased_date  [تاريخ الشراء] date null
 * 
 * 19- serial_number [الرقم التسلسلي] varchare(20) UNIQUE not null
 * 20- car_color [لون السيارة] varchare(40) not null
 * 21- fuel_chip [شريحة محروقات] tinyint(1) not null (yes 1 or no 0)
 * */

 $sql = "
 create table if not exists `cars` (

    `id` int(11) NOT NULL AUTO_INCREMENT,
    `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
    `last_modified` DATETIME  NULL ,
     
     `vid` varchar(20)  default null,
     `door_number` varchar(10) default null,
     `plate_number` varchar(20) default null,
     `plate_type` varchar(10) default null,
     `body_type` varchar(20) default null,
     `brand` varchar(45) default null,
     `model` varchar(45) default null,
     `year_make` varchar(10) default null,

     `image_front_url` varchar(255) default null,
     `image_back_url`  varchar(255) default null,
     `image_right_url` varchar(255) default null,
     `image_left_url`  varchar(255) default null,
     `seats` int(4)    null default(2),
      `note` varchar(255) default null,

      `registration_expiration` DATE default null,
      `registration_url` varchar(255) default null,

      `inspection_expiration` DATE default null,

      `odometer` varchar(100) default null, 

      `owner_name` varchar(100) default null,
      `owner_id` varchar(20) default null,

      `fuel_type` varchar(45) default null,
      
      `car_status` varchar(100) default null,

      `gps_tracking` tinyint(1) not null,
      `fuel_chip`    tinyint(1) not null,

      `purchased_price` decimal(13,2) null,
      `purchased_date`  date null,

      `serial_number`  varchar(20) UNIQUE not null,
      `car_color`      varchar(40)  null,
      `department`  varchar(100)  null,
     
      PRIMARY KEY (`id`)
 )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
 ";


 if($conn->query($sql))
{
    echo("<p class='alert-success'> Cars Table created successfully  </p><hr>");
}
else
{
    echo("<p class='alert-danger'> Cars Table Not Created ! </p><hr>");
}

?>