<?php
session_start();
require_once 'config.php';
require_once 'functions.php';
require_once 'session.php';
require_once 'script.php';






if($islogin){
    if($u_type == 1){
        navigate("./dashboard/admin");
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
?>
<?php
$response = "";

if (isset($_POST['submit'])) {
    if (empty($_POST['email']) || empty($_POST['subject']) || empty($_POST['message'])) {
        $response = "All fields are required";
    } else {
        $sender_email = $_POST['email']; // Get sender email from form
        $response = sendMail($sender_email, $_POST['subject'], $_POST['message']);
    }
}

  
  
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="header.css">
     <link rel="stylesheet" href="notify_style.css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
     <style>
      @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700;800&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Poppins:wght@400;500;600;700&display=swap");




.services {
  background-color: var(--light-bg);
}

.services .box-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
  gap: 2rem;
}

.services .box-container .box {
  text-align: center;
  padding: 2rem;
  background-color: var(--white);
  box-shadow: var(--box-shadow);
  border-radius: .5rem;
}

.services .box-container .box img {
  margin: 1rem 0;
  height: 8rem;
}

.services .box-container .box h3 {
  font-size: 2rem;
  padding: 1rem 0;
  color: var(--black);
}

.services .box-container .box p {
  font-size: 1.5rem;
  color: var(--light-color);
  line-height: 2;
}




/* contact us */
.contact__container {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 3.5rem;
  align-items: center;
}

.contact__image img {
  max-width: 480px;
  margin: auto;
}

.contact__content form {
  width: 100%;
  margin-top: 2rem;
  display: grid;
  gap: 1.5rem;
}

.contact__content .form__group {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 2rem;
}

.contact__content :is(input, textarea) {
  width: 100%;
  padding: 1rem;
  outline: none;
  border: none;
  font-size: 1rem;
  background-color: #DBE2EF;
  border-radius: 5px;
}

.contact__content textarea {
  font-family: "Open Sans", sans-serif;
}

.contact__content input::placeholder {
  color: var(--text-light);
}

.contact__content button {
  max-width: fit-content;
  padding: 1rem 1.5rem;
  outline: none;
  border: none;
  color: var(--white);
  background-color: #3F72AF;
  cursor: pointer;
  transition: 0.3s;
}

.contact__container button:hover {
  background-color: #112D4E;
}
.section__header {
  margin-bottom: 5px;
  font-size: 2.5rem;
  font-weight: 600;
  color: var(--text-dark);
}

.section__subheader {
  color: var(--text-light);
  
}
.section__container {
  max-width: var(--max-width);
  padding: 5rem 1rem;
  margin: auto;
}

/* Hide image on screens smaller than 768px */
@media (max-width: 768px) {
  .contact__image img {
    display: none;
  }
  .contact__content {
    grid-column: span 2;
  }
}
/* contact us */





/* Footer */
.container{
	max-width: 1170px;
	margin:auto;
}
.row{
	display: flex;
	flex-wrap: wrap;
}
ul{
	list-style: none;
}
.footer{
	background-color: #112D4E;
    padding: 20px 0;
}
.footer-col{
   width: 25%;
   padding: 0 15px;
}
.footer-col h4{
	font-size: 18px;
	color: #ffffff;
	text-transform: capitalize;
	margin-bottom: 35px;
	font-weight: 500;
	position: relative;
}
.footer-col h4::before{
	content: '';
	position: absolute;
	left:0;
	bottom: -10px;
	background-color: #e91e63;
	height: 2px;
	box-sizing: border-box;
	width: 50px;
}
.footer-col ul li:not(:last-child){
	margin-bottom: 10px;
}
.footer-col ul li a{
	font-size: 16px;
	text-transform: capitalize;
	color: #ffffff;
	text-decoration: none;
	font-weight: 300;
	color: #bbbbbb;
	display: block;
	transition: all 0.3s ease;
}
.footer-col ul li a:hover{
	color: #ffffff;
	padding-left: 8px;
}
.footer-col .social-links a{
	display: inline-block;
	height: 40px;
	width: 40px;
	background-color: rgba(255,255,255,0.2);
	margin:0 10px 10px 0;
	text-align: center;
	line-height: 40px;
	border-radius: 50%;
	color: #ffffff;
	transition: all 0.5s ease;
}
.footer-col .social-links a:hover{
	color: #24262b;
	background-color: #ffffff;
}

/*responsive*/
@media(max-width: 767px){
  .footer-col{
    width: 50%;
    margin-bottom: 30px;
}
}
@media(max-width: 574px){
  .footer-col{
    width: 100%;
}
}











     </style>
 

    </style>
</head>
<body>
    <div class="main">
        <?php include 'header.php' ?>
        <div class="body">

        <!-- contact us -->
  <section class="section__container contact__container" id="contact">
    <div class="contact__image">
      <img src="assets/contact-us.png" alt="contact" />
    </div>
    <div class="contact__content">
      <h2 class="section__header">Contact Us</h2>
      <p class="section__subheader">
        Whether you're a job seeker, employer, or supporter of our mission, feel free to reach out. 
        We welcome your inquiries and collaboration as we work together to create a more inclusive and diverse job matching platform for Persons with Disabilities (PWD).
      </p>
      <form action="#" method="post" enctype="multipart/form-data">
       
        <div class="form__group">
          <input type="email" name="email" placeholder="Email Address" />
          <input type="subject" name="subject" placeholder="Subject" />
        </div>
        <textarea cols="30" rows="5" name="message" placeholder="Description"></textarea>
        <button type="submit" name="submit">SEND MESSAGE</button>

        <?php
    
        
        
        if (@$response === "success"): ?>
                    <p class="success">Email Sent Successfully</p>
                <?php elseif (@$response): ?>
                    <p class="error"><?php echo @$response; ?></p>
                <?php endif; ?>
      </form>
    </div>
  </section>
<!-- contact us -->

</main>
<br>
<br>

</div>
            <?php include 'footer.php'?>
        </div>
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