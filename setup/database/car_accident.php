<?php



$sql = "
create table if not exists `car_accident` (

   `id` int(11) NOT NULL AUTO_INCREMENT,
   `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
   `last_modified` timestamp NOT NULL DEFAULT current_timestamp(),

    `driver_id` int(11) null,
    `driver_gov_id` varchar(20) default null,
    `driver_name` varchar(100) not null,
    `mobile_number` varchar(20) null,

    `car_id` int(11) not null,

     `accident_date` date not null,
     `accident_number` varchar(45) null,
      
     `insurance_company_name` varchar(100) null,
     `insurance_id` int(11) null,
      `insurance_policy_number` varchar(45) null,

      `mistake_percentage` varchar(10) null,

      `mistake_percentage_second_party` varchar(10) null,
      `location` varchar(100) null,

      `plate_number_second_party` varchar(10) null,

      `insurance_company_name_for_second_party` varchar(45) null,

      `claim_number` varchar(20) null,

      `claim_status` varchar(100) null,

      `car_accident_status` varchar(100) null,

      `attachment` varchar(255) null,
      `accident_photo_1` varchar(255) null,
      `accident_photo_2` varchar(255) null,
      `accident_photo_3` varchar(255) null,
      `accident_photo_4` varchar(255) null,

      `repair_amount` decimal(13,2) null,

      `progress_level` int(2) null default 0,
      `note` varchar(255) null,
    
     

   PRIMARY KEY (`id`)
   )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
   ";
  
  
   if($conn->query($sql))
  {
      echo("<p class='alert-success'> car_accident  Table created successfully  </p><hr>");
  }
  else
  {
      echo("<p class='alert-danger'>  car_accident Table Not Created ! </p><hr>");
  }

?>