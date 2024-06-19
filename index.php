<?php
    session_start();
    require_once 'config.php';
    require_once 'functions.php';
    require_once 'session.php';
    
    if($islogin){
        if($u_type == 1){
            navigate("./dashboard/admin");
        }
        if($u_type == 0){
            navigate("./dashboard/superadmin");
        }
    }
    
    if(isset($_SESSION["islogin"]) && $_SESSION["islogin"] == True){
    $job_area_id = $_SESSION['data']['job_area_id'];
    $job_area_logo = "";
    $job_area_title = "";
    $sql2 = "SELECT * FROM tbl_jobareas WHERE id = '$job_area_id'";
    $result2 = mysqli_query($con, $sql2);
        if ($result2) {
            while ($row2 = mysqli_fetch_assoc($result2)) {
                $job_area_logo = $row2['logo_area'];
                $job_area_title = $row2['title_area'];
        }
    }
    }
            $result_query = mysqli_query($con,"
            SELECT
                tbl_jobs.id,
                tbl_company.c_name,
                tbl_company.c_address,
                tbl_company.c_cnum,
                tbl_company.c_logo,
                tbl_accounts.firstname,
                tbl_accounts.lastname,
                tbl_jobs.j_name,
                tbl_jobs.j_age,
                tbl_jobs.j_min,
                tbl_jobs.j_max,
                tbl_jobs.j_currency_symbol,
                tbl_jobs.j_description,
                tbl_jobs.j_created_at,
                tbl_jobs.j_job_category,
                tbl_jobs.j_pwd_type
            FROM
                tbl_jobs
            INNER JOIN tbl_company ON tbl_company.userid = tbl_jobs.userid
            INNER JOIN tbl_accounts ON tbl_accounts.id = tbl_jobs.userid
            
            ");
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta http-equiv="Content-Security-Policy">
        <meta http-equiv="X-Content-Type-Options" content="nosniff">
        <meta http-equiv="X-Frame-Options" content="DENY">
        <meta http-equiv="X-XSS-Protection" content="1; mode=block">
        <meta http-equiv="Strict-Transport-Security" content="max-age=31536000; includeSubDomains; preload">
        <meta http-equiv="Referrer-Policy" content="no-referrer-when-downgrade">
        <meta http-equiv="Feature-Policy" content="geolocation 'self'; camera 'none'">

        <link rel="icon" href="./assets/LOGO.png" >
        <title>Talent Trail</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" defer></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="verify.css">
        <link rel="stylesheet" href="header.css">
        <link rel="stylesheet" href="notify_style.css">
        <link
            href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css"
            rel="stylesheet"
            />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <style>
            .about__image {
            position: relative;
            text-align: center;
            }
            .about__image img {
            position: relative;
            top: 0;
            left: 0;
            transition: opacity 1s ease-in-out;
            }
            .button-list {
            display: flex; /* Use flexbox to align buttons in a row */
            justify-content: center; /* Center the buttons horizontally */
            margin-top: 20px; /* Adjust as needed */
            }
            .container_search2 {
            background-image: url('jobbg.jpg');
            background-size: fill;
            background-repeat: no-repeat;
            padding: 20px;
            text-align: center;
            height:60vh;
            width:99%;
            border-radius:2vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            }
            .container_search2 h1,
            .container_search2 h2 {
            color: white;
            }
            .search_form {
            margin-top: 20px;
            }
            .field {
            position: relative;
            display: inline-block;
            vertical-align: top; /* Add this line to align elements to the top */
            }
            .field input[type="text"] {
            padding: 10px;
            width: 90vh; 
            border: none;
            border-radius: 5px;
            font-size: 16px;
            }
            .field i.fa {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
            }
            button[type="submit"] {
            padding: 10px 20px;
            background-color: #337ab7;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            }
            button[type="submit"]:hover {
            background-color: #286090;
            }
            .black-glass-background {
            background-color: rgba(0, 0, 0, 0.5); /* Black with 50% opacity */
            color: white; /* Text color */
            border: none;
            border-radius: 5px;
            padding: 10px;
            width: 100%; /* Make the input field take up full width */
            font-size: 16px;
            outline: none; /* Remove default focus outline */
            }
            .black-glass-background::placeholder {
            color: white; /* Placeholder text color */
            }
            /* Media Query for Mobile Devices */
            @media only screen and (max-width: 768px) {
            .field input[type="text"],
            .black-glass-background {
            width: 90%; /* Adjust the width for smaller screens */
            max-width: none; /* Remove max-width for smaller screens */
            }
            }
            .searchbarstyle {
            height:7vh; border-radius:3vh 0 0 3vh !important; font-size:2.5vh !important; text-align:center;
            }
            .buttonstyle{
            height:7vh; border-radius:0 3vh 3vh 0 !important; !important;
            }
            /* Media Query for Mobile Devices */
            @media only screen and (max-width: 768px) {
            .searchbarstyle {
            height:7vh;border-radius: 0 !important; font-size:1.5vh !important; width:40vh !important; text-align:center;
            }
            .buttonstyle{
            height:7vh; border-radius: 0 !important; font-size:1.5vh !important; width:40vh !important;
            }
            .button-list{
            display:none;
            }
            }
            .glass-button {
            padding: 10px 20px;
            background-color: white; /* Transparent background */
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: transform 0.3s; /* Added transition */
            color:black;
            margin-top:1vh;
            margin: 0 10px; /* Add margin to separate buttons */
            }
            .glass-button:hover {
            transform: translateY(-5px); /* Move up slightly on hover */
            background-color: #112D4E; /* Transparent background */
            color:white;
            }
            .box {
            display: inline-block;
            padding: 15px 20px;
            background-color: #f0f0f0; /* Light gray background color */
            color: #333; /* Dark text color */
            text-decoration: none; /* Remove underline */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            transition: transform 0.2s, box-shadow 0.2s; /* Smooth transition for hover effects */
            width: 100%;
            margin-bottom:2vh;
            border: 1px solid gray;
            }
            .box:hover {
            transform: translateY(-2px); /* Move box up slightly on hover */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Increase shadow on hover */
            }
            .location-box {
            display: inline-block;
            padding: 5px;
            background-color: orange;
            color: black;
            border-radius: 3vh;
            width: auto; /* Adjust width as needed */
            text-align: center;
            margin: 0; /* Remove default margin */
            vertical-align: top; /* Align elements from the top */
            border: 1px solid gray;
            margin-bottom:1vh;
            font-size:1.5vh;
            }.carousel {
            position: relative;
            overflow: hidden;
            }
        </style>
    </head>
    <body>
        <main>
            <div class="main" style="height:100%;">
            <?php include 'header.php' ?>
            <section class="section__container about__container" id="about" style="margin:0;">
                <div class="">
                    <div class="row">
                        <div class="col-md-6">
                    <div class="about__image">
                        <img id="slideshow" src="assets/slidingimages/image1.jpg" alt="about" style="width:100%; max-width:100%; height:600px; border-radius:2vh;" />
                    </div>
                    <script>
                        // Array of image file names (assuming they are in the 'assets/slidingimages' folder)
                        var images = ['image1.jpg', 'image2.jpg', 'image3.jpg', 'image3.jpg']; // Add more image filenames as needed
                        
                        var currentIndex = 0;
                        var slideshow = document.getElementById('slideshow');
                        
                        // Function to change the image with fading effect
                        function changeImage() {
                            slideshow.style.opacity = 10; // Fade out
                            setTimeout(function() {
                                currentIndex++;
                                if (currentIndex >= images.length) {
                                    currentIndex = 0; // Reset index if it exceeds the array length
                                }
                                slideshow.src = 'assets/slidingimages/' + images[currentIndex]; // Change image source
                                slideshow.style.opacity = 1; // Fade in
                            }, 3000); // Wait for 1 second for the fade-out effect to complete
                        }
                        
                        // Set interval to change image every 3 seconds (adjust as needed)
                        setInterval(changeImage, 3000);
                    </script>
                </div>
                        <div class="col-md-6">
                    <div class="about__content">
                        <h2 class="section__subheader" style="margin-top:8vh;">About Us</h2>
                        <h2 class="section__header">Talent Trail: Empowering Unique Individuals Through Secure Career Connections</h2>
                        <p id="typing-text" class="paragraph"></p>
                        <button class="btn" style="background-color:#112D4E; color: white;" onclick="window.location.href = 'contact_us.php';">Contact Us</button>

                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                        // Text to be typed out
                        var text = "This website is an online employment resource dedicated to empowering unique individuals in their pursuit of meaningful employment. Our platform offers comprehensive support, including resume building, and job search assistance. Join our inclusive community to unlock a rewarding career path and help us create a more inclusive and equitable workforce.";
                        
                        var index = 0;
                        var typingSpeed = 20; // Speed of typing (milliseconds)
                        
                        function typeWriter() {
                            if (index < text.length) {
                                document.getElementById("typing-text").innerHTML += text.charAt(index);
                                index++;
                                setTimeout(typeWriter, typingSpeed);
                            }
                        }
                        
                        // Start typing animation on page load
                        typeWriter();
                        });
                    </script>
                </div>
                    </div>
                </div>
            </section>
            <br>
            <br>
            <br>
            </div>
        </main>
        <div class="row" style="margin:2vh; margin-top:-8vh; border-bottom: 2px solid #112D4E; padding-bottom:6vh;">
    <div class="col-md-4">
        <div class="about__card" style="background-size: cover; background-color:white; background-repeat: no-repeat; padding:15px; border-radius:1vh; margin-bottom:1vh; border: 2px solid #112D4E;">
            <span><i style="color:#112D4E" class="ri-pen-nib-line"></i></span>
            <div style="color:#112D4E">
                <h4>Inclusivity</h4>
                <img src="assets/inclusivity.jpg" alt="" style="max-width: 33%; height: auto; display: block; margin: 0 auto;">
                <p>
                    Our job portal promotes inclusivity, breaking down barriers for individuals of all abilities to access equal employment opportunities. We're committed to embracing diversity, ensuring everyone, regardless of disability, feels valued in their job search.
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="about__card" style="background-size: cover; background-color:#112D4E; background-repeat: no-repeat; padding:15px; border-radius:1vh; margin-bottom:1vh; border: 2px solid #112D4E;">
            <span><i style="color:white;" class="ri-layout-masonry-line"></i></span>
            <div style="color:white">
                <h4>Empowerment</h4>
                <img src="assets/empowerment.png" alt="" style="max-width: 29%; height: auto; display: block; margin: 0 auto;">
                <p>
                    We empower individuals by offering resources and support for navigating unique career journeys. Our goal is to foster independence, boost confidence, and enable job seekers to showcase their skills, ultimately helping them achieve their professional goals.
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="about__card" style="background-size: cover; background-color:white; background-repeat: no-repeat; padding:15px; border-radius:1vh; margin-bottom:1vh; border: 2px solid #112D4E;">
            <span><i style="color:#112D4E" class="ri-checkbox-line"></i></span>
            <div style="color:#112D4E">
                <h4>Opportunity</h4>
                <img src="assets/opportunity.jpg" alt="" style="max-width: 35%; height: auto; display: block; margin: 0 auto;">
                <p>
                    We open doors to a world of opportunities for unique individuals, connecting them with inclusive employers who recognize and appreciate their potential. By igniting their capabilities, we strive to create pathways to fulfilling careers and a brighter future.
                </p>
            </div>
        </div>
    </div>
</div>
        <style>
            .carousel {
            display: flex;
            overflow-x: hidden;
            width: 100%;
            }
            .carousel-inner {
            display: flex;
            }
        </style>
        <style>
.container33 {
  display: flex;
  align-items: center;
  width: 80%; /* Adjust as needed */
  margin: 4.9800796812749vh auto;
  position: relative;
}

.circle33 {
  width: 9.9601593625498vh;
  height: 9.9601593625498vh;
  border-radius: 50%;
  background-color: white; /* Adjust color as needed */
  z-index: 9999;
  border: 1px solid #212529;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  position: relative;
}

.circle-number {
  font-size: 2.3904382470119523vh;
  font-weight: bold;
  margin-top: 6vh;
  margin-bottom: 4vh;
}

.circle-label {
  font-size: 1.3944223107569722vh;
  color: #212529;
  width: 30vh;
  text-align: center;
}

.line33 {
  height: 0.398406374501992vh;
  background-color: #212529;
  flex: 1;
  position: relative; /* Ensure positioning of child elements */
}

.small-circle33 {
  width: 1.9920318725099602vh;
  height: 1.9920318725099602vh;
  border-radius: 50%;
  background-color: white; /* Adjust color as needed */
  border: 1px solid #212529;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

/* Added styles to position lines properly */
.container33 .line33:nth-child(odd) {
  margin-right: -50px; /* Half the circle width */
}

.container33 .line33:nth-child(even) {
  margin-left: -50px; /* Half the circle width */
}

@media (max-width: 768px) {
  .container33 {
    width: 90%;
    margin: 30px auto;
  }
  
  .circle33 {
    width: 60px;
    height: 60px;
  }
  
  .circle-number {
    font-size: 14px;
    margin-top: 5vh;
    margin-bottom: 3vh;
  }
  
  .circle-label {
    font-size: 10px;
    width: 100px;
  }
  
  .line33 {
    height: 2px;
  }
  
  .small-circle33 {
    width: 12px;
    height: 12px;
  }
}

        </style>
        <div class="container_title" style="font-weight:bold; font-size:3vh; text-align:center; color:#112D4E;">
            Process on finding your brighter future!
        </div>
        <center><small style="color:#112D4E; font-weight:bold;">FIND JOB NOW!</small></center>
        <div class="col-md-12">
        <div class="container33">
            <div class="circle33">
                <div class="circle-number">01</div>
                <div class="circle-label">Create Account</div>
            </div>
            <div class="line33">
                <div class="small-circle33"></div>
            </div>
            <div class="circle33">
                <div class="circle-number">02</div>
                <div class="circle-label">Create Resume</div>
            </div>
            <div class="line33">
                <div class="small-circle33"></div>
            </div>
            <div class="circle33">
                <div class="circle-number">03</div>
                <div class="circle-label">Find Jobs</div>
            </div>
            <div class="line33">
                <div class="small-circle33"></div>
            </div>
            <div class="circle33">
                <div class="circle-number">04</div>
                <div class="circle-label">Apply Jobs</div>
            </div>
        </div>
    </div>
    <style>@media (max-width: 768px) {
  #joblistid {
    display: none;
  }
}
</style>
        <br><br>
        <div id="joblistid" class="content" style="margin-top:-5vh;">
            <br>
            <div class="container recommended">
                <div class="container_title" style="font-weight:bold; font-size:3vh; text-align:center; color:#112D4E;">
                    Latest Job Offers
                </div>
                <center><small style="color:#112D4E;">Slide left and right to view job offers</small></center>
                <br>
                <div class="carousel">
                    <div class="carousel-inner">
                        <?php if(hasResult($result_query)){?>
                        <?php while($row = mysqli_fetch_assoc($result_query)){?>
                        <div class="col-md-4 col-xs-12" style="margin-top:1vh;">
                            <?php 
    if($islogin){ ?>
                            <a class="box" href="jobs/view.php?id=<?= $row["id"]?>" style="background-color:white; height:30vh;">
                            <?php }else{ ?>

                            <a class="box" href="/<?= $__name__ ?>/auth?a=already" style="background-color:white; height:30vh;">
                            <?php } ?>
                                <div class="box_header">
                                    <div class="box_header_title" style="font-weight:bold; font-size:1.2vh;">
                                        <?= $row["j_name"]?>
                                    </div>
                                    <div class="box_header_sub">
                                        <p style="font-size:1.3vh; color:gray;">
                                            <i class="fa fa-marker"></i>
                                            <?= $row["c_address"]?>
                                        </p>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p style="font-weight:bold;  font-size:1.3vh;"> 
                                                    &#8369; <?= number_format($row['j_min'])." - &#8369;  ".number_format($row['j_max']) ?>
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p style="float:right;  font-size:1.3vh;">
                                                    <i class="fa fa-calendar"></i>
                                                    <?= date("m-d-Y",strtotime($row["j_created_at"]))?>
                                                </p>
                                            </div>
                                        </div>
                                        <?php
                                            $companyname = $row["c_name"];
                                            $sql3 = "SELECT * FROM tbl_company as a inner join tbl_accounts as b on a.userid = b.id inner join tbl_jobareas as c on b.job_area_id = c.id WHERE a.c_name = '$companyname'";
                                            $result3 = mysqli_query($con, $sql3);
                                                if ($result3) {
                                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                                        $job_area_logo = $row3['logo_area'];
                                                        $job_area_title = $row3['title_area'];
                                                        $job_area_location = $row3['Location'];
                                                }
                                            }
                                            ?>
                                        <p class="location-box" style="background-color: #EBFBFF; font-size:1vh;">
                                            <i class="fa fa-map-marker"></i>
                                            <?php echo $job_area_location; ?>
                                        </p>
                                        <p class="location-box" style="background-color: #D1EFFF; font-size:1vh;">
                                            <i class="fa fa-tasks"></i>
                                            <?php echo $row["j_job_category"]; ?> Job
                                        </p>
                                        <?php if($row["j_pwd_type"] <> ''){ ?>
                                        <p class="location-box" style="background-color: #A6E0FF; font-size:1vh;">
                                            <i class="fa fa-wheelchair"></i>
                                            Open for PWD ( <?php echo $row["j_pwd_type"]; ?> )
                                        </p>
                                        <?php } ?>
                                        <hr>
                                        <?php
                                            if($row["c_logo"] == ""){
                                                $row["c_logo"] = "LOGO.png";
                                            } 
                                            ?>
                                        <img src="assets/images/<?php echo $row["c_logo"]; ?>" style="border-radius:50%; width:5vh; height:5vh; border:1px solid gray;">
                                        <?= $row["c_name"]?>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php } ?>
                        <?php } ?>
                    </div>
                </div>
                <br>
                <div class="container_title" style="font-weight:bold; font-size:2vh; text-align:center; color:#112D4E; margin-top:-2vh;">
                    <a style="border-bottom: 2px solid #112D4E;color:#112D4E;" href="/<?= $__name__ ?>/jobs">View More</a>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const carousel = document.querySelector('.carousel');
                const inner = document.querySelector('.carousel-inner');
            
                let isDragging = false;
                let startX;
                let scrollLeft;
            
                carousel.addEventListener('mousedown', (e) => {
                    isDragging = true;
                    startX = e.pageX - carousel.offsetLeft;
                    scrollLeft = inner.scrollLeft;
                });
            
                carousel.addEventListener('mouseleave', () => {
                    isDragging = false;
                });
            
                carousel.addEventListener('mouseup', () => {
                    isDragging = false;
                });
            
                carousel.addEventListener('mousemove', (e) => {
                    if (!isDragging) return;
                    e.preventDefault();
                    const x = e.pageX - carousel.offsetLeft;
                    const walk = (x - startX) * 3; // Adjust sensitivity here
                    inner.scrollLeft = scrollLeft - walk;
                });
            });
        </script>
        <br>

        <div class="row" style="margin: 2vh; border-top: 2px solid #112D4E; padding-top: 7vh;">
    <div class="col-md-6">
        <div class="about__card" style="background-color: #112D4E; background-size: 100% 100%; background-repeat: no-repeat; padding: 15px; border-radius: 1vh; min-height: 40vh; height: auto; margin-bottom: 1vh;">
            <span><i style="color: white;" class="ri-checkbox-line"></i></span>
            <div style="color: white;">
                <img src="assets/vision.png" alt="" style="max-width: 35%; height: auto; display: block; margin: 0 auto;">
                <h1>Vision</h1>
                <p>
                    "Our vision is to empower unique individuals to excel in their chosen careers, we strive for a society where equal access to employment opportunities is the norm. By breaking down barriers, challenging stereotypes, and fostering an inclusive workforce, we envision a world that values and recognizes the talents and contributions of every individual. Together, we create opportunities for professional success and fulfillment, regardless of disability."
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="about__card" style="background-color: #112D4E; background-size: 100% 100%; background-repeat: no-repeat; padding: 15px; border-radius: 1vh; min-height: 40vh; height: auto; margin-bottom: 1vh;">
            <span><i style="color: white;" class="ri-checkbox-line"></i></span>
            <div style="color: white;">
                <img src="assets/mission.png" alt="" style="max-width: 35%; height: auto; display: block; margin: 0 auto;">
                <h1>Mission</h1>
                <p>
                    "Our mission is to simplify the job search process by offering a comprehensive and user-friendly platform that aggregates diverse job opportunities worldwide. We are committed to providing personalized career guidance, fostering diversity and inclusivity in the workplace, and facilitating connections between talented individuals and innovative companies. Through our innovative technology and unwavering dedication, we aim to empower individuals to find fulfilling employment and contribute positively to the global workforce."
                </p>
            </div>
        </div>
    </div>
</div>

        </div>
        <div class="main-container" style="position: relative !important; min-height: 20vh;">
            <div class="footer" style="position: relative !important; bottom: 0; width: 100%;">
                <div class="container">
                    <div class="row">
                        <div class="footer-col">
                            <h4>Lorem Ipsum</h4>
                            <ul>
                                <li><a href="#">about us</a></li>
                                <li><a href="#">Lorem Ipsum</a></li>
                                <li><a href="#">Lorem Ipsum</a></li>
                                <li><a href="#">Lorem Ipsum</a></li>
                            </ul>
                        </div>
                        <div class="footer-col">
                            <h4>get help</h4>
                            <ul>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Lorem Ipsum</a></li>
                                <li><a href="#">Lorem Ipsum</a></li>
                                <li><a href="#">Lorem Ipsum</a></li>
                                <li><a href="#">Lorem Ipsum</a></li>
                            </ul>
                        </div>
                        <div class="footer-col">
                            <h4>Lorem Ipsum</h4>
                            <ul>
                                <li><a href="#">Lorem Ipsum</a></li>
                                <li><a href="#">Lorem Ipsum</a></li>
                                <li><a href="#">Lorem Ipsums</a></li>
                                <li><a href="#">Lorem Ipsum</a></li>
                            </ul>
                        </div>
                        <div class="footer-col">
                            <h4>follow us</h4>
                            <div class="social-links">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Closing .row -->
                </div>
                <!-- Closing .container -->
            </div>
            <!-- Closing .footer -->
        </div>
        <!-- Closing .main-container -->
    </body>
</html>
<script type="text/javascript">
    function showNotification(){
        $('.notification-drop .item').find('ul').toggle();
    }
    
    function updateNotification(id){
        $.ajax({
            url : "controller/NotificationAction.php",
            method: "post",
            data : {id:id},
            success: (res) => {
                console.log(res);
                if(res == "3" || res == "2"){
                    if(res == "3"){
                        setTimeout(() => {
                            window.location.href="./profile/?page=general_information"
                        }, 300);
                    } else {
                        setTimeout(() => {
                            window.location.href="/capstone-main/dashboard/company/?page=hire&sub=applicants"
                        }, 300);
                    }
                } else {
                    location.reload();
                }
            }
        });
    }
    
            
</script>