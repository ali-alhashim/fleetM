<?php
/**
 * permissions table line for login users
 * 
 * 1- id [رقم الصلاحيات] int not null auto_increment primary key
 * 2- group_id int not null foreign key
 * 3- object [المادة المطبق عليها الصلاحيات] varchare(100) not null => select (dashboard, car data , car accident, report, users, settingts)
 * 4- permissions [ الصلاحيات] varchare(2) not null => select (read only = R, Edit= E , not allowed = 0)
 * 
 */

 $sql = "
 CREATE TABLE IF NOT EXISTS `permission` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `permission_group_id` varchar(100) DEFAULT NULL,

    `module` varchar(100) not null,
    `object` varchar(100) not null,
    `permission` varchar(100) not null,

    `createdby` varchar(100) DEFAULT NULL,
    `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='permission group';
 ";


 if($conn->query($sql))
{
    echo("<p class='alert-success'> permission  Table created successfully  </p><hr>");
}
else
{
    echo("<p class='alert-danger'>permission  Table Not Created ! </p><hr>");
}




$sql = "
insert IGNORE  into permission (`id`, `permission_group_id`, `module`, `object`, `permission`, `createdby`)
values (1, 1, 'ALL', 'ALL', 'ALL', 'System'); 
";


if($conn->query($sql))
{
    echo("<p class='alert-success'> insert permission for super admin successfully  </p><hr>");
}
else
{
    echo("<p class='alert-danger'>insert permission for super admin  failed ! </p><hr>");
}

// Normal User Group

// Line #1
$sql = "
insert IGNORE  into permission (`permission_group_id`, `module`, `object`, `permission`, `createdby`)
values ( 2, 'ALL', 'Profile_page', 'R', 'System'); 
";
$conn->query($sql);

// Line #2

$sql = "
insert IGNORE  into permission (`permission_group_id`, `module`, `object`, `permission`, `createdby`)
values ( 2, 'ALL', 'Profile_Request', 'A', 'System'); 
";
$conn->query($sql);

// Line #3

$sql = "
insert IGNORE  into permission (`permission_group_id`, `module`, `object`, `permission`, `createdby`)
values ( 2, 'fleet', 'Profile_Accident', 'A', 'System'); 
";
$conn->query($sql);

echo("<p class='alert-success'> insert permission for Normal User successfully  </p><hr>");
?>