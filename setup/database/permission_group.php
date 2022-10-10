<?php
/**
 * permission_group table header
 * 
 * 1- id [الرقم التسلسلي ] int(11) not null auto_increment primary key
 * 
 * 2- group_name [اسم المجموعة] not null varchare(100) 

 * 
 * 
 */

$sql = "
CREATE TABLE IF NOT EXISTS `permission_group` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `permission_group` varchar(100) DEFAULT NULL,
    `createdby` varchar(100) DEFAULT NULL,
    `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='permission group';
";

if($conn->query($sql))
{
    echo("<p class='alert-success'> permission group Table created successfully  </p><hr>");
}
else
{
    echo("<p class='alert-danger'>permission group Table Not Created ! </p><hr>");
}


$sql = "
insert IGNORE  into permission_group (`id`, `permission_group`, `createdby`)
values (1, 'super admin', 'System'); 
";

if($conn->query($sql))
{
    echo("<p class='alert-success'> insert super admin permission group  successfully  </p><hr>");
}
else
{
    echo("<p class='alert-danger'>insert super admin permission group Not Created ! </p><hr>");
}


// insert Default Group Permisstion [Normal User] 
// this permission assigned  for synced user from AD

$sql = "
insert IGNORE  into permission_group (`id`, `permission_group`, `createdby`)
values (2, 'Normal User', 'System'); 
";

if($conn->query($sql))
{
    echo("<p class='alert-success'> insert Normal User permission group  successfully  </p><hr>");
}





?>