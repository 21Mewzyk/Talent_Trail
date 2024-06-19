<?php if($islogin && $u_type == 3 &&  $u_verification_state < 2){?>
<div class="verify">
    <p style="margin-top:2vh;">
        To apply for a job you must complete your registration

    <a style="color:white; background-color:#112D4E;" href="/<?= $__name__ ?>/profile/?page=general_information&sub=verified">
        GET STARTED
    </a>
    </p>
</div>
<?php } ?>

<div class="header" style="background-color:#F9F7F7;">
    <div class="text">
        <a href="/<?= $__name__ ?>" class="header_logo">
            <?php if(isset($_SESSION["islogin"]) && $_SESSION["islogin"] == True){
                ?>
                    <img src="assets/images/<?php echo $job_area_logo; ?>" alt="logo">
                    <p style="color:#112D4E; margin-top:1.5vh;"><?php echo $job_area_title; ?></p>
                <?php
            }else{ ?>
            <img src="/<?= $__name__ ?>/assets/LOGO.png" alt="logo">
            <p style="color:#112D4E; margin-top:1.5vh;">Talent Trail</p>
        <?php } ?>
        </a>
        <label for="navigation-toggle" class="toggle-nav-btn">
            <i class="fa fa-bars"></i>
        </label>
    </div>
    <input type="checkbox" id="navigation-toggle" class="toggle-nav">
    <div class="navigation">
        <?php if($islogin){?>
             <ul class="notification-drop">
                <li class="item">
                <button type="button" style="border: none; background: transparent;" onclick="showNotification()">
                    <i class="fa fa-bell-o notification-bell" aria-hidden="true"></i> <span class="btn__badge pulse-button ">
                    <?php echo countNotify($con, $u_id); ?>
                    </span> 
                </button>
                  <ul>
                    <?php
                    $load_data_notificaiton = mysqli_query($con,"SELECT * FROM `tbl_notification` WHERE user_id = $u_id and `status` = 0 order by created_at desc limit 5");
                    if(hasResult($load_data_notificaiton)){
                        while($row = mysqli_fetch_assoc($load_data_notificaiton)){
                            echo "<li id='".$row["id"]."' onclick='updateNotification(this.id)' >".$row["description"]."</li>";
                        }  
                    }else{
                        echo "<li>No data..</li>";
                    }
                     ?>
                  </ul>
                </li>
              </ul>
            <?php if($u_type == 1){?>
                <a style="color:#112D4E;"href="/<?= $__name__ ?>">HOME</a>
                <a style="color:#112D4E;"href="/<?= $__name__ ?>/jobs">JOBS</a>
                <a style="color:#112D4E;"href="/<?= $__name__ ?>/contact_us.php">CONTACT US</a>
                <a style="color:#112D4E;"href="/<?= $__name__ ?>/logout.php">LOGOUT</a>
                <a style="color:#112D4E;"href="/<?= $__name__ ?>/dashboard/company" class="nav_a">
                    DASHBOARD
                </a>
            <?php }elseif($u_type == 2){?>
                <a style="color:#112D4E;"href="/<?= $__name__ ?>">HOME</a>
                <a style="color:#112D4E;"href="/<?= $__name__ ?>/contact_us.php">CONTACT US</a>
                <a style="color:#112D4E;"href="/<?= $__name__ ?>/logout.php">LOGOUT</a>
                <a style="color:white;" href="/<?= $__name__ ?>/dashboard/company" class="nav_a">
                    DASHBOARD
                </a>
            <?php }elseif($u_type == 3){?>
                <a style="color:#112D4E;"href="/<?= $__name__ ?>">HOME</a>
                <a style="color:#112D4E;"href="/<?= $__name__ ?>/jobs">JOBS</a>
                <a style="color:#112D4E;"href="/<?= $__name__ ?>/appliedjobs">TRACK APPLICATIONS</a>
                <a style="color:#112D4E;"href="/<?= $__name__ ?>/profile/?page=password" class="client_menu">Password</a>  
                <a style="color:#112D4E;"href="/<?= $__name__ ?>/profile/?page=resume"  class="client_menu">Resume</a>   
                <a style="color:#112D4E;"href="/<?= $__name__ ?>/logout.php">LOGOUT</a>
                <a style="color:white; background-color:#112D4E;" href="/<?= $__name__ ?>/profile" class="nav_a"><?= $u_email ?> <i class="fa fa-user"></i></a> 
            <?php } ?>
        <?php }else{?>
            <a style="color:#112D4E;"href="/<?= $__name__ ?>">HOME</a>
            <a style="color:#112D4E;"href="/<?= $__name__ ?>/jobs">JOBS</a>
            <a style="color:#112D4E;"href="/<?= $__name__ ?>/contact_us.php">CONTACT US</a>
            <a style="color:#112D4E;"href="/<?= $__name__ ?>/ResumePage.php">RESUME BUILDER</a>
            <a style="color:#112D4E;"href="/<?= $__name__ ?>/auth?a=already">LOGIN</a>
            <a style="color:##112D4E; background-color:#112D4E;"  href="/<?= $__name__ ?>/auth?a=join" class="nav_a">
                GET STARTED
            </a>
        <?php } ?>
    </div>


</div>
