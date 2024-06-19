
<style>
    @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700;800&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Poppins:wght@400;500;600;700&display=swap");





/* About US */
.btn {
  padding: 0.75rem 2rem;
  outline: none;
  border: none;
  font-size: 1rem;
  white-space: nowrap;
  background-color: #112D4E;
  color: white;
  border-radius: 2px;
  box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);
  cursor: pointer;
  transition: 0.3s;
}



.about__header {
  display: grid;
  gap: 3rem;
  
}

.about__image img {
  max-width: 450px;
  margin: auto;
}

.about__content .paragraph {
  margin-block: 2rem;
  color: var(--text-light);
  text-indent: 2.5em;
  
}

.about__grid {
  padding-block: 5rem;
  display: grid;
  gap: 20rem 10rem;
  border-bottom: 1px solid var(--text-light);
}

.about__card {
  display: flex;
  align-items: flex-start;
  gap: 1rem;

}

.about__card span {
  padding: 8px 15px;
  font-size: 1.75rem;
  color: var(--text-dark);
  background-color: var(--secondary-color);
  border-radius: 100%;
}

.about__card h4 {
  margin-bottom: 10px;
  font-size: 1.2rem;
  font-weight: 500;
  color: var(--text-dark);
}

.about__card p {
  color: var(--text-light);
}


/* About US */




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




@media (max-width: 1444px) {
  .navbar .links,
  .navbar .action_btn {
    display: none;
  }
  .navbar .toggle_btn{
    display: block;

  }
  .dropdown_menu{
    display: block;
  }
}

@media (max-width: 857px) {
.dropdown_menu{
  left: 2rem;
  width: unset;
}
}
/* Add media queries to adjust the layout for different screen sizes */


@media (max-width: 768px) {
 
.header
{
  display: none;
}

  .big-border-box {
    width: 90%;
    padding: 70px 90px;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .small-border-box {
    width: 100%;
    height: 200px;
    margin: 0;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }

  .radio-label {
    margin-bottom: 50px;
  }

  .create-account-button {
    margin-top: 430px;
  }
  .login-account-button {
    margin-top: 400px;
  }

  .about__header {
    grid-template-columns: repeat(2, 1fr);
    align-items: center;
  }

  .about__grid {
    grid-template-columns: repeat(3, 1fr);
    gap: 2rem;
  }


}



@media (max-width: 576px) {
  .header
  {
    display: none;
  }

  .big-border-box {
    padding: 100px 30px;
  }

  .small-border-box {
    height: 180px;
  }

  .create-account-button {
    margin-top: 400px;
  }
  .login-account-button {
    margin-top: 360px;
  }
  
  
}



@media (width > 768px) {
 




  .about__header {
    grid-template-columns: repeat(2, 1fr);
    align-items: center;
  }

  .about__grid {
    grid-template-columns: repeat(3, 1fr);
    gap: 2rem;
  }

}


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












.reviews {
  background-color: #F9F7F7;
}

.reviews .box-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(10rem, 1fr));
  gap: 2rem;
}

.reviews .box-container .box {
  background-color: var(--white);
  text-align: center;
  border-radius: .5rem;
  box-shadow: var(--box-shadow);
  padding: 2rem;
}

.reviews .box-container .box img {
  height: 15rem;
  width: 20rem;
  border-radius: 10%;
}

.reviews .box-container .box p {
  padding: 1rem 0;
  line-height: 1  ;
  margin-bottom: 0;
  font-size: 1rem;
  color: var(--text-dark);
 
}

.reviews .box-container .box .stars {
  padding: .5rem 1.5rem;
  border-radius: .5rem;
  background-color: var(--light-bg);
  margin-bottom: 2rem;
  display: inline-block;
}

.reviews .box-container .box .stars i {
  font-size: 1.5rem;
  color: var(--blue);
}

.reviews .box-container .box h3 {
  font-size: 2rem;
  color: var(--black);
}

.reviews .box-container .box span {
  color: var(--light-color);
  font-size: 1rem;
}

.heading {
  text-align: center;
  font-size: 4rem;
  color: var(--blue);
  text-transform: uppercase;
  font-weight: bolder;
  margin-bottom: 3rem;

}












</style>

<footer class="footer">
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
  </div>
</footer>
