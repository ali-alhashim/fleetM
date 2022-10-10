<?php
/**
 * users table
 * 
 * 1- id [رقم هوية السائق] varchare(10) not null primary key
 * 2- full_name [الاسم كامل]   varchare(100) not null
 * 3- department [القسم] varchare(40) null
 * 4- mobile_number [رقم الجوال] varchare(15) not null
 * 5- company [ الشركة] varchare(100) null
 * 6- badge_number [رقم الملف لـ الموظف] varchare(10) null
 * 7- note [ملاحظات] varchare(250) null
 * 8- driving_license_url [رابط صورة رخصة القيادة] varchare(255) not null
 * 9- email [البريدالإلكتروني] varchare(100) null
 * 10- creation_date [تاريخ الإنشاء] datetime default current_timestamp 
 * 11- last_login [تاريخ اخر دخول] datetime (get current time and date in login)
 * 12- status [حالة الحساب] varchare(45) =>select (active, deactive) 
 * 13- password [كلمة المرور]  varchare(20)  not null 
 * 14- permission_group [مجموعة الصلاحيات] varchare(100) => select from permission group table
 */


 $sql = "
 create table if not exists `users` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `full_name` varchar(100) not NULL,
    `arabic_name` varchar(100) null,
    `gov_id` varchar(20) default null,
    `mobile_number` varchar(20) DEFAULT NULL,

    `company` varchar(45) DEFAULT NULL,
    `company_id` varchar(20) DEFAULT NULL,

    `Branch` varchar(45) DEFAULT NULL,
    
    `department` varchar(45) DEFAULT NULL,
    `department_id` varchar(45) DEFAULT NULL,

    `job_title` varchar(50) null,
    `nationality` varchar(50) null,

    `report_to_id` int(11) DEFAULT NULL,
    `report_to` varchar(100) DEFAULT NULL,

    `badge_number` varchar(15) DEFAULT NULL, 

    `office_address` varchar(150) DEFAULT NULL,

    `telphone_ext` varchar(8) DEFAULT NULL,

    `email` varchar(150) DEFAULT NULL,
    `password` varchar(255) NOT NULL,

    `permission_group_id` int(11) NOT NULL,
    `permission_group` varchar(150) NOT NULL,

    `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),

    `last_modified` timestamp NOT NULL DEFAULT current_timestamp(),

    `last_login` datetime null,

    `join_date` DATETIME NULL,

    `date_of_birth` date null,

    `status` varchar(100) DEFAULT NULL,

    `note`  varchar(250) DEFAULT NULL,

    `driving_license_url` varchar(255) default null,

    `gender` varchar(45) null,
    `profile_photo` varchar(255) null,
     `iban` varchar(45) null,
     `iqama_job_ar` varchar(100) null,
    PRIMARY KEY (`id`),
    UNIQUE(`email`)
    )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
     
 ";




if($conn->query($sql))
{
    echo("<p class='alert-success'> Users Table created successfully  </p><hr>");
}
else
{
    echo("<p class='alert-danger'> Users Table Not Created ! </p><hr>");
}


// insert super admin user 

$sql ="
insert into users (`id`, `email`, `password`, `permission_group`, `permission_group_id`, `full_name`, `company`,`department`,`mobile_number` )
values (1, 
         '".$_POST["systemUser"]."', 
         '".password_hash($_POST["systemPassword"], PASSWORD_DEFAULT)."',
          'super admin',
           1,
            '".$_POST["FullName"]."',
            '".$_POST["company"]."',
            '".$_POST["department"]."',
            '".$_POST["mobile"]."'
         );
";



if($conn->query($sql))
{
    echo("<p class='alert-success'> super admin user  created successfully  </p><hr>");
}
else
{
    echo("<p class='alert-danger'> super admin user Not Created ! </p><hr>");
}





?>