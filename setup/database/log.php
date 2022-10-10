<?php
/**
 * log table
 * 
 * 1-  id int(11) auto_increment not null
 * 2-  action_date datetime default current_timestamp
 * 3-  username varchare(100) not null

 * 5-  action   varchare(100) not null
 */


$sql = " create table if not exists `log` (
    `id` int(11) NOT NULL AUTO_INCREMENT,

    `action_date` timestamp NOT NULL DEFAULT current_timestamp(),
    

    `user_name` varchar(100) not NULL,
   
    `email` varchar(100) not NULL,
   
    

    `action` varchar(255) not NULL,
    
    PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";



if($conn->query($sql))
{
    echo("<p class='alert-success'> log Table created successfully  </p><hr>");
}
else
{
    echo("<p class='alert-danger'> log Table Not Created ! </p><hr>");
}

?>