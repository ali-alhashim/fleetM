<?php
/**insurance table
 * 
 * 1-  id [رقم التأمين التسلسلي في النظام] int(11) auto_increment not null primary key
 * 2-  policy_number [رقم الوثيقة] varchare(20) not null 
 * 
 * 3-  car_id [رقم السيارة في النظام التسلسلي] int(11)  foreign key
 * 
 * 4-  company_name [اسم شركة التأمين] varchare(100) not null
 * 13- insurance_start [تاريخ بداية التأمين] date not null
 * 14- insurance_expiration [تاريخ إنتهاء التأمين] date not null
 * 
 * 15- insurance_class [تصنيف التأمين] varchare(100) not null => (select [comprehensive,third-party] )
 * 16- insured_value [القيمة المقدرة للمركبة] decimal(13,2) not null
 * 17- type_repair [نوع الإصلاح] varchare(100) not null => (select agency, workshop)
 * 18- excess_amount [قيمة التحمل] decimal(13,2) not null default(1000,00)
 * 
 * 19- insurance_amount [قيمة التأمين] decimal(13,2) not null
 * 
 * 20- document_url [رابط صورة من التأمين] varchare(255) null
 * 21- note [ملاحظات] varchare(250) null
 * 
 */


$sql = " create table if not exists `insurance` (
    `id` int(11) NOT NULL AUTO_INCREMENT,

    `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
    

    `policy_number` varchar(100) not NULL,
    `company_name`  varchar(100) not null,

    `insurance_start` date null,
    `insurance_expiration` date null,
    `insurance_class` varchar(60) null,
    `insured_value` decimal(13,2) not null,
    `type_repair` varchar(60) null,
     `excess_amount` decimal(13,2) not null,
     `insurance_amount`  decimal(13,2) not null,
      `document_url` varchar(255) null,
      `insure_car_accessories`  TINYINT(1) NULL DEFAULT 0,
   
    `car_id` int(11) not NULL,
     
     `insurance_area` varchar(45) null,
    

    `note` varchar(255) not NULL,
    
    PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";



if($conn->query($sql))
{
    echo("<p class='alert-success'> insurance Table created successfully  </p><hr>");
}
else
{
    echo("<p class='alert-danger'> insurance Table Not Created ! </p><hr>");
}


?>