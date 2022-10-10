
<header class="text-center header-full">
        <nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light bg-white border-bottom box-shadow mb-3">
            <div class="container ">
                <a class="navbar-brand"><img src="../../<?=$SystemLogo?>" width="100" class="animate__animated animate__headShake animate__infinite	infinite "/></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse d-sm-inline-flex justify-content-center">


                    <ul class="navbar-nav flex-grow-1 justify-content-center w-100">

                        <li class="nav-item btn-akhOrange w-100 " id="dashboardtap">
                            <a class="nav-link text-dark" href="index.php">Dashboard <br/>لوحة المعلومات   </a>
                        </li>


                        <li class="nav-item btn-akhOrange  w-100" id="cardatatap">
                            <a class="nav-link text-dark" href="RequestsList.php">Requests <br/>الطلبات </a>
                        </li>


                        <li class="nav-item btn-akhOrange  w-100" id="caraccidenttap">
                            <a class="nav-link text-dark" href="visas.php">visas <br/>التأشيرات   </a>
                        </li>

                        <li class="nav-item btn-akhOrange  w-100" id="caraccidenttap">
                            <a class="nav-link text-dark" href="Recruitment.php"> Recruitment <br/>الإستقدام</a>
                        </li>

                        <li class="nav-item btn-akhOrange  w-100" id="reporttap">
                            <a class="nav-link text-dark" href="GovernmentFee.php">Government Fee <br/> الرسوم  الحكومية  </a>

                        <li class="nav-item btn-akhOrange  w-100" id="userstap">
                            <a class="nav-link text-dark" href="Employees.php?pageNo=0">Employees <br/>الموظفين  </a>

                            <li class="nav-item btn-akhOrange  w-100" id="userstap">
                            <a class="nav-link text-dark h-100" href="Certificates.php">Certificates <br/>التراخيص و الشهادات  </a>
                        </li>
                       

                        <li class="nav-item btn-akhOrange  w-100" id="userstap">
                            <a class="nav-link text-dark" href="Reports.php">Reports <br/>التقارير  </a>
                        </li>

                        <li class="nav-item btn-akhOrange  w-100" id="settingstap">
                            <a class="nav-link text-dark" href="../../Settings.php"> Settings <br/> الإعدادات </a>
                        </li>

                      


                     

                    </ul>


               

                </div>
            </div>
            <?php
            $sql = "select count(id) from `notifcations` where user_id =".$_SESSION["id"]." and `response` = 'null' ;";
            $result = $conn->query($sql);
            $NotificationCount = $result->fetch_array(MYSQLI_NUM);

            ?>

            <a class="btn btn-outline-secondary m-1" href="../../Notifications.php?id=<?=$_SESSION["id"]?>"><i class="fa-solid fa-bell"></i><br/><span class="badge bg-danger " style="color:#000"><?=$NotificationCount[0]?></span></a>
           

           
            <ul class="nav">
            <li class="dropdown">
            <a href="#" class="dropdown-toggle btn btn-outline-secondary m-1" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">   <?=$_SESSION["full_name"]?>  <br/> <?=$_SESSION["email"]?>  </a>
            <ul class="dropdown-menu p-2 dropMenuX">
                <li><hr></li>
                <li><a class="btn btn-secondary w-100" href="profile.php?id=<?=$_SESSION["id"]?>"><i class="fa-solid fa-id-card"></i> Profile</a></li>
                <li><hr></li>
                <li><a class="btn btn-secondary w-100 " href="../../index.php"><img src="../../gallery/icons/icons8_oncoming_automobile_32px.png"/> Fleet.</a></li>
                <li><hr></li>
                <li><a class="btn btn-secondary w-100 " href="../IT/index.php"><img src="../../gallery/icons/icons8_laptop_32px.png"/> IT.</a></li>
                <li><hr></li>
                <li><a class="btn btn-secondary w-100 active" href="../Government/index.php"><img src="../../gallery/icons/icons8_saudi_arabia_32px.png"/> GRO.</a></li>
                <li><hr></li>
                <li><a class="btn btn-secondary w-100" href="../HR/index.php"><img src="../../gallery/icons/icons8_organization_chart_people_32px.png"/> HR.</a></li>
                <li><hr></li>
                <li><a class="btn btn-secondary w-100" href="../Workshop/index.php"><img src="../../gallery/icons/icons8_mechanic_32px.png"/> Workshop.</a></li>
                <li><hr></li>
                <li><a class="btn btn-secondary w-100" href="../../help.php"> <i class="fa-solid fa-circle-question"></i> Help</a></li>
                <li><hr></li>
                <li><a class="btn btn-secondary w-100" href="../../Logout.php"> <i class="fa-solid fa-right-from-bracket"></i> sign-out</a></li>
                <li><hr></li>
               
            </ul>
            </li>
            </ul>
            

            <img src="<?='../../'.$_SESSION["profile_photo"]?>" class="rounded-circle img-fluid bg-dark" style="height: 70px; width: 70px"/>
             



        </nav>
    </header>