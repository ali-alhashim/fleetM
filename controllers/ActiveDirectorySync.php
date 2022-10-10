<?php
require("../share/session.php");

if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{
    //check also he have permission to  AD Sync 

    //-----------------------------------------------
    $sql = "select `module`,  `object`, `permission`  from `permission` where `permission_group_id` = ".$_SESSION["permission_group_id"].";";
    $permissionResult = "invalid";
    $result = $conn->query($sql);
    while($row = $result->fetch_array(MYSQLI_ASSOC))
    {
       if($row["object"] =="Users" && $row["permission"] =="A")
       {
        $permissionResult = "valid";
        break;
       }

       if($row["object"] =="ALL" && $row["permission"] =="ALL")
       {
        $permissionResult = "valid";
        break;
       }
    }

    //--------------------------------------------------

    if($permissionResult == "valid")
    {

    

    echo("<h1>Here you Start AD Sync Action</h1> <br/>");

    $ldap_password   = '******';
    $ldap_username   = 'desktopadmin@aktegroup.com';
    $ldap_host       = "aktegroup.com";
    $ldap_port       =  389;

    $ldap_conn = ldap_connect($ldap_host, $ldap_port) or die("That LDAP-URI was not Correct !"); 

    $bound = ldap_bind($ldap_conn, $ldap_username, $ldap_password);
     
    //----------------we have ou= AKHC, Naizak, ISG,
   
    $SearchResult = ldap_search($ldap_conn, "ou=ISG, dc=aktegroup,dc=com", "(sn=*)") or die ("Error in query");
    
    $data = ldap_get_entries($ldap_conn, $SearchResult);
    
    $TotalRecoards = ldap_count_entries($ldap_conn, $SearchResult);

    for($i=0;$i<=$TotalRecoards;$i++)
    {
    echo  $data[$i]["name"][0]  ."<br /> ";
    echo  $data[$i]["mail"][0]  ."<br/>";
    echo  $data[$i]["mobile"][0]  ."<br/>";
    echo  $data[$i]["employeeid"][0]  ."<br/>";
    echo  $data[$i]["company"][0]  ."<br/>";
    echo  $data[$i]["department"][0]  ."<br/>";
    echo  $data[$i]["title"][0]  ."<br/>";
    echo  $data[$i]["streetaddress"][0]  ."<br/>";
    echo '<hr>';


    //---------------------- add to my database ------------------------------------

    $sql="insert into users 
    (`full_name`, `gov_id`, `mobile_number`, `company`, `company_id`, 
    `department`, `department_id`, `job_title`, `report_to_id`, `report_to`, `badge_number`,
    `office_address`, `telphone_ext`, `email`, `password`, `permission_group_id`,
    `permission_group`, `join_date`, `status`, `note`, `driving_license_url`
    )
    values('".$data[$i]["name"][0]."', '-',
           '".$data[$i]["mobile"][0]."', '".$data[$i]["company"][0]."',
           'companyID', '".$data[$i]["department"][0]."', 
           'departmentID', '".$data[$i]["title"][0]."',
           'Report To ID', 'Report To Name', '".$data[$i]["employeeid"][0]."',
           '".$data[$i]["streetaddress"][0]."', 'Telphone Ext', '".$data[$i]["mail"][0]."',
           '".password_hash("Akte000001",PASSWORD_DEFAULT)."', 2,
           'Normal User', 'join date',
           'status', 'note',
           'url license'
    )
    ";

    

    try
    {
     $conn->query($sql);

    // header("Location: ../UsersList.php");

    }
    catch(Exception $e)
    {
      echo($e->getMessage());
    }

    //--------------------- end adding user to database ---------------------------


    } // end loop
    

  
    
   
    ldap_close($ldap_conn);

    echo("<hr><a href='../UsersList.php' class='btn bg-dark'>Go to User List</a>");
    
    //---------------


      // add action to log table

      $sql = "insert into `log`( `user_name`,  `email`, `action`) values('".$_SESSION["full_name"]."', '".$_SESSION["email"]."','Active Directory Sync');";
      $conn->query($sql);

    // end adding action

    }
    else
    {
      // your SESSION is valid but your permission invalid
      // redirect him to page error 400
      echo("your SESSION is valid but your permission invalid");
    }
}

?>