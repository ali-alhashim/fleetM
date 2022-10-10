<?php
/**
 * car_users table
 * 
 * 1- id int(11) [رقم سجل فترة تسليم السيارة] not null auto_increment primary key
 * 
 * 2- driver_id [رقم  السائق] int(10) not null foreign key
 * 3- driver_name [اسم السائق] varchare(100) not null
 * 
 * 4- car_id [رقم السيارة في النظام التسلسلي] int(11)   foreign key
 * 
 * 5- received_date [تاريخ الاستلام] date not null
 * 6- handover_date [تاريخ التسليم] date not null
 * 
 * 7- note [ملاحظات] varchare(250) null
 * 8- company [الشركة] varchare(100) null
 * 9- department [القسم] varchare(100) null
 * 10-project [اسم المشروع] varchare(100) null 
 * 11-project_code [كود المشروع] varchare(50) null
 */


$sql = "
create table if not exists `car_users` (

   `id` int(11) NOT NULL AUTO_INCREMENT,
   `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
   `last_modified` timestamp NOT NULL DEFAULT current_timestamp(),

    `driver_id` int(11) not null,
    `driver_name` varchar(100) not null,
    `mobile_number` varchar(20) null,
    `car_id` int(11) not null,

    `received_date` date  null,
     `handover_date` date null,
     `note` varchar(255) null,
     `company` varchar(100) null,
     `department` varchar(100) null,
     `project` varchar(100) null,
     `project_code` varchar(45) null,

   PRIMARY KEY (`id`)
   )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
   ";
  
  
   if($conn->query($sql))
  {
      echo("<p class='alert-success'> car_users  Table created successfully  </p><hr>");
  }
  else
  {
      echo("<p class='alert-danger'>  car_users Table Not Created ! </p><hr>");
  }
  
?>