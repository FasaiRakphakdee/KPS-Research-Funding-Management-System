<!--*******************
        Preloader start
    ********************-->
<div id="preloader">
    <div class="loader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
        </svg>
    </div>
</div>
<!--*******************
          Preloader end
      ********************-->


<!--**********************************
          Main wrapper start
      ***********************************-->
<div id="main-wrapper">

    <!--**********************************
              Nav header start
          ***********************************-->
    <div class="nav-header">
        <div class="brand-logo">
            <!--<a href="index.php"></a>-->
        </div>
    </div>
    <!--**********************************
              Nav header end
          ***********************************-->

    <!--**********************************
              Header start
          ***********************************-->
    <div class="header">
        <div class="header-content clearfix">

            <div class="nav-control">
                <div class="hamburger">
                    <span class="toggle-icon"><i class="icon-menu"></i></span>
                </div>
            </div>

            <div class="header-right">
                <ul class="clearfix">

                    <li class="icons dropdown">
                        <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                            <span class="activity active"></span>
                            <img src="images/user/0.png" height="40" width="40" alt="">
                        </div>
                        <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                            <div class="dropdown-content-body">
                                <ul>

                                    <hr class="my-2">

                                    <li><a href="../../logout.php"><i class="icon-key"></i> <span>Logout</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--**********************************
              Header end ti-comment-alt
          ***********************************-->

    <!--**********************************
              Sidebar start
          ***********************************-->
    <div class="nk-sidebar">
        <div class="nk-nav-scroll">
            <ul class="metismenu" id="menu">
                <?php
                if ($_SESSION["requestingGrant"] == 1) {
                    //echo $_SESSION["latestFile"];
                    echo '
                        <li>
                            <a class="menu-icon" href="./index.php" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-briefcase" viewBox="0 0 16 16">
                                <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5m1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0M1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5"/>
                                </svg><span class="nav-text menu-icon">&nbsp;ยื่นคำขอทุนวิจัยล่าสุด</span>
                            </a>
                        </li>

                        <li>
                            <a class="menu-icon" href="./formList.php" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                    <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                                </svg><span class="nav-text menu-icon">&nbsp;ประวัติการขอทุนวิจัย</span>
                            </a>
                        </li>
                        ';
                }
                if ($_SESSION["requestingGrant"] == 0) {
                    echo '
                        <li>
                            <a class="menu-icon" href="./index.php" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                    <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                                </svg><span class="nav-text menu-icon">&nbsp;ยื่นคำขอทุนวิจัย</span>
                            </a>
                        </li>
                        <li>
                            <a class="menu-icon" href="./formList.php" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                    <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                                </svg><span class="nav-text menu-icon">&nbsp;ประวัติการขอทุนวิจัย</span>
                            </a>
                        </li>
                        ';
                }
                ?>
                <?php
                if ($_SESSION["headDept"] == 1) {
                    echo "
                        
                        <li>
                        <a class=\"menu-icon\" href=\"./hdept.php\" aria-expanded=\"false\">
                            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\"
                                class=\"bi bi-person-check\" viewBox=\"0 0 16 16\">
                                <path
                                    d=\"M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z\" />
                                <path
                                    d=\"M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z\" />
                            </svg><span class=\"nav-text menu-icon\">&nbsp;อนุมัติหัวหน้าภาค</span>
                        </a>
                    </li>";

                    echo "
                        <li>
                            <a class=\"menu-icon\" href=\"./reportallforhead.php\" aria-expanded=\"false\">
                                <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-file-text\" viewBox=\"0 0 16 16\">
                                    <path d=\"M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h4.5L14 4.5ZM10 2H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V5h-3.5a.5.5 0 0 1-.5-.5V2Zm-5 6a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5Zm0 2a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5Zm0 2a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5Z\"/>
                                </svg><span class=\"nav-text menu-icon\">&nbsp;ประวัติคำขอทุนวิจัยทั้งหมด</span>
                            </a>
                        </li> 
                        <li>
                        <a class=\"menu-icon\" href=\"./reportsuccessforhead.php\" aria-expanded=\"false\">
                            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-file-text\" viewBox=\"0 0 16 16\">
                                <path d=\"M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h4.5L14 4.5ZM10 2H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V5h-3.5a.5.5 0 0 1-.5-.5V2Zm-5 6a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5Zm0 2a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5Zm0 2a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5Z\"/>
                            </svg><span class=\"nav-text menu-icon\">&nbsp;ประวัติคำขอทุนวิจัยที่เสร็จสิ้น</span>
                        </a>
                    </li>
                                             
                        ";
                    echo '
                    <li>
            <a class="menu-icon" href="./chart.php" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-bar-chart-fill" viewBox="0 0 16 16">
                    <path d="M1 11a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm5-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1z"/>
                </svg>
                <span class="nav-text menu-icon">&nbsp;กราฟ</span>
            </a>
        </li>
                    ';

                }
                ?>

                <?php

                if ($_SESSION["committee"] == 1) {

                    echo "
                    <li>
                        <a class=\"menu-icon\" href=\"./committee.php\" aria-expanded=\"false\">
                            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\"
                                class=\"bi bi-person-check\" viewBox=\"0 0 16 16\">
                                <path
                                    d=\"M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z\" />
                                <path
                                    d=\"M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z\" />
                            </svg><span class=\"nav-text menu-icon\">&nbsp;อนุมัติคณะกรรมการ</span>
                        </a>
                    </li>
                    ";
                    echo "
                    <li>
                        <a class=\"menu-icon\" href=\"./reportall.php\" aria-expanded=\"false\">
                            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-file-text\" viewBox=\"0 0 16 16\">
                                <path d=\"M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h4.5L14 4.5ZM10 2H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V5h-3.5a.5.5 0 0 1-.5-.5V2Zm-5 6a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5Zm0 2a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5Zm0 2a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5Z\"/>
                            </svg><span class=\"nav-text menu-icon\">&nbsp;ประวัติคำขอทุนวิจัยทั้งหมด</span>
                        </a>
                    </li>
                                        <li>
                        <a class=\"menu-icon\" href=\"./reportsuccess.php\" aria-expanded=\"false\">
                            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-file-text\" viewBox=\"0 0 16 16\">
                                <path d=\"M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h4.5L14 4.5ZM10 2H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V5h-3.5a.5.5 0 0 1-.5-.5V2Zm-5 6a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5Zm0 2a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5Zm0 2a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5Z\"/>
                            </svg><span class=\"nav-text menu-icon\">&nbsp;ประวัติคำขอทุนวิจัยที่เสร็จสิ้น</span>
                        </a>
                    </li>
                    
                    ";
                    echo '
                    <li>
            <a class="menu-icon" href="./chart.php" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-bar-chart-fill" viewBox="0 0 16 16">
                    <path d="M1 11a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm5-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1z"/>
                </svg>
                <span class="nav-text menu-icon">&nbsp;กราฟ</span>
            </a>
        </li>
                    ';
                }

                ?>

                <?php

                if ($_SESSION["dean"] == 1) {

                    echo "
                    
                    <li>
                    <a class=\"menu-icon\" href=\"./dean.php\" aria-expanded=\"false\">
                        <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\"
                            class=\"bi bi-person-check\" viewBox=\"0 0 16 16\">
                            <path
                                d=\"M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z\" />
                            <path
                                d=\"M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z\" />
                        </svg><span class=\"nav-text menu-icon\">&nbsp;อนุมัติคณบดี</span>
                    </a>
                </li>
                    
                    
                    ";
                    echo "
                    <li>
                        <a class=\"menu-icon\" href=\"./reportall.php\" aria-expanded=\"false\">
                            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-file-text\" viewBox=\"0 0 16 16\">
                                <path d=\"M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h4.5L14 4.5ZM10 2H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V5h-3.5a.5.5 0 0 1-.5-.5V2Zm-5 6a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5Zm0 2a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5Zm0 2a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5Z\"/>
                            </svg><span class=\"nav-text menu-icon\">&nbsp;ประวัติคำขอทุนวิจัยทั้งหมด</span>
                        </a>
                    </li>
                    <li>
                        <a class=\"menu-icon\" href=\"./reportsuccess.php\" aria-expanded=\"false\">
                            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-file-text\" viewBox=\"0 0 16 16\">
                                <path d=\"M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h4.5L14 4.5ZM10 2H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V5h-3.5a.5.5 0 0 1-.5-.5V2Zm-5 6a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5Zm0 2a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5Zm0 2a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5Z\"/>
                            </svg><span class=\"nav-text menu-icon\">&nbsp;ประวัติคำขอทุนวิจัยที่เสร็จสิ้น</span>
                        </a>
                    </li>
                    
                    ";
                    echo '
                    <li>
            <a class="menu-icon" href="./chart.php" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-bar-chart-fill" viewBox="0 0 16 16">
                    <path d="M1 11a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm5-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1z"/>
                </svg>
                <span class="nav-text menu-icon">&nbsp;กราฟ</span>
            </a>
        </li>
                    ';
                }


                ?>

                <!-- <li>
                    <a class="menu-icon" href="./hdept.php" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person-check" viewBox="0 0 16 16">
                            <path
                                d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                            <path
                                d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z" />
                        </svg><span class="nav-text menu-icon">&nbsp;อนุมัติหัวหน้าภาค</span>
                    </a>
                </li>
                <li>
                    <a class="menu-icon" href="./committee.php" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person-check" viewBox="0 0 16 16">
                            <path
                                d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                            <path
                                d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z" />
                        </svg><span class="nav-text menu-icon">&nbsp;อนุมัติคณะกรรมการ</span>
                    </a>
                </li> -->
                <!-- <li>
                    <a class="menu-icon" href="./dean.php" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person-check" viewBox="0 0 16 16">
                            <path
                                d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                            <path
                                d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z" />
                        </svg><span class="nav-text menu-icon">&nbsp;อนุมัติคณบดี</span>
                    </a>
                </li> -->


                <?php

                if ($_SESSION["staff"] == 1) {
                    echo '
        <li>
            <a class="menu-icon" href="./staff.php" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-person-gear" viewBox="0 0 16 16">
                    <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Zm3.63-4.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
                </svg>
                <span class="nav-text menu-icon">&nbsp;เจ้าหน้าที่</span>
            </a>
        </li>
        <li>
            <a class="menu-icon" href="./reportall.php" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-file-text" viewBox="0 0 16 16">
                    <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h4.5L14 4.5ZM10 2H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V5h-3.5a.5.5 0 0 1-.5-.5V2Zm-5 6a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5Zm0 2a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5Zm0 2a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5Z"/>
                </svg>
                <span class="nav-text menu-icon">&nbsp;ประวัติคำขอทุนวิจัยทั้งหมด</span>
            </a>
        </li>
        <li>
            <a class="menu-icon" href="./reportsuccess.php" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-file-text" viewBox="0 0 16 16">
                    <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h4.5L14 4.5ZM10 2H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V5h-3.5a.5.5 0 0 1-.5-.5V2Zm-5 6a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5Zm0 2a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5Zm0 2a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5Z"/>
                </svg>
                <span class="nav-text menu-icon">&nbsp;ประวัติคำขอทุนวิจัยที่เสร็จสิ้น</span>
            </a>
        </li>
        <li>
            <a class="menu-icon" href="./listhdept.php" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-person" viewBox="0 0 16 16">
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664z"/>
                </svg>
                <span class="nav-text menu-icon">&nbsp;รายชื่อหัวหน้าภาค</span>
            </a>
        </li>
        <li>
            <a class="menu-icon" href="./listcommittee.php" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-person" viewBox="0 0 16 16">
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664z"/>
                </svg>
                <span class="nav-text menu-icon">&nbsp;รายชื่อคณะกรรมการ</span>
            </a>
        </li>
        <li>
            <a class="menu-icon" href="./chart.php" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-bar-chart-fill" viewBox="0 0 16 16">
                    <path d="M1 11a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm5-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1z"/>
                </svg>
                <span class="nav-text menu-icon">&nbsp;กราฟ</span>
            </a>
        </li>
    ';
                }






                ?>

                <!-- <li>
                    <a class="menu-icon" href="./staff.php" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person-gear" viewBox="0 0 16 16">
                            <path
                                d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Zm3.63-4.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
                        </svg><span class="nav-text menu-icon">&nbsp;เจ้าหน้าที่</span>
                    </a>
                </li>

                <li>
                    <a class="menu-icon" href="./listhdept.php" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person" viewBox="0 0 16 16">
                            <path
                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664z" />
                        </svg><span class="nav-text menu-icon">&nbsp;รายชื่อหัวหน้าภาค</span>
                    </a>
                </li>
                <li>
                    <a class="menu-icon" href="./listcommittee.php" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person" viewBox="0 0 16 16">
                            <path
                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664z" />
                        </svg><span class="nav-text menu-icon">&nbsp;รายชื่อคณะกรรมการ</span>
                    </a>
                </li> -->

            </ul>
        </div>
    </div>
    <!--**********************************
              Sidebar end
          ***********************************-->