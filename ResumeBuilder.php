<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="veiwport" content="width=device-width, initial-scale = 1">
        <meta http-equiv="Content-Security-Policy">
        <meta http-equiv="X-Content-Type-Options" content="nosniff">
        <meta http-equiv="X-Frame-Options" content="DENY">
        <meta http-equiv="X-XSS-Protection" content="1; mode=block">
        <meta http-equiv="Strict-Transport-Security" content="max-age=31536000; includeSubDomains; preload">
        <meta http-equiv="Referrer-Policy" content="no-referrer-when-downgrade">
        <meta http-equiv="Feature-Policy" content="geolocation 'self'; camera 'none'">
      <title>Talent Trail | Resume Builder</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
      <!-- font awesome cdn link  -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
      <!-- html2pdf library -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-JwBx+tbx/bH/ZI7r7Wc+nS4M6CGq7TcH5ktwCJGjRjZvR8L3JoYfiTvB/hrrVXqzxYfGf1dJyRcZVTZbJl7B6A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <!-- bootstrap cdn link  -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">
   </head>
   <style>
      @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
      :root{
      --clr-blue: #1A91F0;
      --clr-blue-mid: #1170CD;
      --clr-blue-dark: #1A1C6A;
      --clr-white: #fff;
      --clr-bright: #EFF2F9;
      --clr-dark: #1e2532;
      --clr-black: #000;
      --clr-grey: #656e83;
      --clr-green: #084C41;
      --font-poppins: 'Poppins', sans-serif;
      --font-manrope: 'Manrope', sans-serif;;
      --transition: all 300ms ease-in-out;
      }
      *{
      padding: 0;
      margin: 0;
      box-sizing: border-box;
      }
      html{
      font-size: 10px;
      }
      body{
      font-size: 1.6rem;
      font-family: var(--font-poppins);
      }
      button{
      border: none;
      background-color: transparent;
      outline: 0;
      cursor: pointer;
      font-family: inherit;
      }
      img{
      width: 100%;
      display: block;
      }
      a{
      text-decoration: none;
      }
      /* fonts */
      .font-poppins{font-family: var(--font-poppins);}
      .font-manrope{font-family: var(--font-manrope);}
      /* text colors */
      .text-blue{color: var(--clr-blue);}
      .text-blue-mid{color: var(--clr-blue-mid);}
      .text-blue-dark{color: var(--clr-blue-dark);}
      .text-bright{color: var(--clr-bright);}
      .text-dark{color: var(--clr-dark);}
      .text-grey{color: var(--clr-grey);}
      .text-white{color: var(--clr-white);}
      /* backgrounds */
      .bg-blue{background-color: var(--clr-blue);}
      .bg-blue-mid{background-color: var(--clr-blue-mid);}
      .bg-blue-dark{background-color: var(--clr-blue-dark);}
      .bg-bright{background-color: var(--clr-bright);}
      .bg-dark{background-color: var(--clr-dark);}
      .bg-grey{background-color: var(--clr-grey);}
      .bg-white{background-color: var(--clr-white);}
      .bg-black{background-color: var(--clr-black);}
      .bg-green{background-color: #112D4E;}
      .text-center{ text-align: center;}
      .text-left{text-align: left;}
      .text-right{text-align: right;}
      .text-uppercase{text-transform: uppercase;}
      .text-lowercase{text-transform: lowercase;}
      .text-capitalize{text-transform: capitalize;}
      .text{
      color: var(--clr-dark);
      opacity: 0.9;
      margin: 2rem 0;
      line-height: 1.6;
      }
      .fw-2{font-weight: 200;}
      .fw-3{font-weight: 300;}
      .fw-4{font-weight: 400;}
      .fw-5{font-weight: 500;}
      .fw-6{font-weight: 600;}
      .fw-7{font-weight: 700;}
      .fw-8{font-weight: 800;}
      .fs-13{font-size: 13px;}
      .fs-14{font-size: 14px;}
      .fs-15{font-size: 15px;}
      .fs-16{font-size: 16px;}
      .fs-17{font-size: 17px;}
      .fs-18{font-size: 18px;}
      .fs-19{font-size: 19px;}
      .fs-20{font-size: 20px;}
      .fs-21{font-size: 21px;}
      .fs-22{font-size: 22px;}
      .fs-23{font-size: 23px;}
      .fs-24{font-size: 24px;}
      .fs-25{font-size: 25px;}
      .ls-1{letter-spacing: 1px;}
      .ls-2{letter-spacing: 2px;}
      .container{
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 1.6rem;
      }
      /* bars button */
      .bars{
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      height: 16.5px;
      width: 25px;
      }
      .bars .bar{
      width: 100%;
      height: 2px;
      background-color: var(--clr-blue);
      transition: var(--transition);
      }
      .bars:hover .bar{
      background-color: var(--clr-dark);
      }
      /* buttons */
      .btn{
      font-size: 14.5px;
      font-weight: 600;
      padding: 1.4rem 1.6rem;
      border-radius: 4px;
      display: inline-block;
      }
      .btn-primary{
      background-color: var(--clr-blue);
      color: var(--clr-white);
      border: 1px solid var(--clr-blue);
      transition: var(--transition);
      }
      .btn-primary:hover{
      background-color: transparent;
      color: var(--clr-dark);
      border-color: var(--clr-grey);
      }
      .btn-secondary{
      background-color: transparent;
      color: var(--clr-dark);
      border: 1px solid var(--clr-grey);
      transition: var(--transition);
      }
      .btn-secondary:hover{
      background-color: var(--clr-blue);
      color: var(--clr-white);
      border-color: var(--clr-blue);
      }
      .btn-group button:first-child, .btn-group a:first-child{
      margin-right: 1rem!important;
      }
      /* navbar part */
      .navbar{
      height: 80px;
      display: flex;
      align-items: center;
      box-shadow: rgba(0, 0, 0, 0.08) 0px 3px 8px;
      }
      .navbar .container{
      width: 100%;
      }
      .navbar-brand{
      display: flex;
      align-items: center;
      justify-content: flex-start;
      font-size: 1.8rem;
      }
      .navbar-brand-text{
      color: var(--clr-dark);
      font-weight: 600;
      }
      .navbar-brand-text span{
      color: var(--clr-blue);
      }
      .navbar-brand-icon{
      width: 25px;
      margin-right: 6px;
      opacity: 0.8;
      }
      .brand-and-toggler{
      display: flex;
      align-items: center;
      justify-content: space-between;
      }
      .header{
      min-height: calc(100vh - 80px);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      }
      .header-content{
      max-width: 740px;
      margin-right: auto;
      margin-left: auto;
      }
      .header-content img{
      max-width: 760px;
      border-top-right-radius: 8px;
      border-top-left-radius: 8px;
      margin-top: 3.2rem;
      }
      .lg-title{
      margin: 1.4rem 0;
      font-size: 37px;
      line-height: 1.4;
      color: var(--clr-dark);
      }
      .header-content p{
      margin-bottom: 2.6rem;
      line-height: 1.6;
      }
      /* section one */
      .section-one{
      padding: 64px 0;
      min-height: 80vh;
      display: flex;
      align-items: center;
      }
      .section-one-l img{
      max-width: 545px;
      margin-right: auto;
      margin-left: auto;
      }
      .section-one-r{
      margin-top: 4rem;
      }
      .section-one .btn-group{
      margin-top: 2rem;
      }
      .section-one-r{
      max-width: 545px;
      margin-right: auto;
      margin-left: auto;
      }
      .section-one-r .btn-group{
      margin-top: 3rem;
      }
      /* section two */
      .section-two{
      padding: 64px 0;
      }
      .section-two .section-items{
      display: grid;
      gap: 2rem;
      }
      .section-two .section-item{
      max-width: 350px;
      text-align: center;
      margin-right: auto;
      margin-left: auto;
      }
      .section-two .section-item-icon{
      margin: 1rem 0;
      }
      .section-two .section-item-icon img{
      width: 80px;
      margin-right: auto;
      margin-left: auto;
      }
      .section-two .section-item-title{
      color: var(--clr-blue-dark);
      font-size: 1.8rem;
      font-weight: 600;
      }
      .section-two .text{
      margin: 0.9rem 0;
      }
      /* footer */
      .footer{
      padding: 3rem 0;
      }
      .footer-content p{
      color: var(--clr-grey);
      }
      .footer-content p span{
      color: var(--clr-white);
      }
      /* media queries */
      @media screen and (min-width: 768px){
      .section-two .section-items{
      grid-template-columns: repeat(2, 1fr);
      }
      }
      @media screen and (min-width: 992px){
      .section-one-content{
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      column-gap: 3rem;
      }
      .section-one-r{
      text-align: left;
      }
      .section-two .section-items{
      grid-template-columns: repeat(3, 1fr);
      }
      .section-two .section-item{
      text-align: left;
      }
      .section-two .section-item-icon img{
      margin-left: 0;
      }
      }
      /* resume page */
      #about-sc{
      padding: 64px 0;
      }
      .cv-form-row-title{
      background-color: #112D4E;
      padding: 0.8rem 1.6rem;
      margin-bottom: 2rem;
      }
      .cv-form-row-title h3{
      color: var(--clr-white);
      font-weight: 500;
      text-transform: uppercase;
      letter-spacing: 1.5px;
      font-size: 1.7rem;
      }
      .cv-form-blk{
      margin: 3rem 0;
      }
      .cv-form-row{
      padding: 3rem 2rem 0 2rem;
      border: 1px solid rgba(0, 0, 0, 0.08);
      margin-bottom: 1rem;
      position: relative;
      }
      textarea{
      resize: none;
      }
      .form-elem{
      margin-bottom: 3rem;
      position: relative;
      }
      .form-label{
      display: block;
      font-weight: 600;
      font-size: 14px;
      color: var(--clr-dark);
      margin-bottom: 0.5rem;
      }
      .form-control{
      border-radius: none;
      border: 1px solid rgba(0, 0, 0, 0.1);
      font-size: 14px;
      padding: 0.8rem 1.6rem;
      font-family: inherit;
      width: 100%;
      outline: 0;
      transition: var(--transition);
      }
      .form-control:focus{
      border-color: rgba(0, 0, 0, 0.3);
      }
      .form-text{
      color: #ca0b00;
      font-size: 12px;
      position: absolute;
      letter-spacing: 0.5px;
      top: calc(100% + 2px);
      left: 0;
      width: 100%;
      }
      .cols-3, .cols-2{
      display: grid;
      }
      .repeater-add-btn{
      width: 25px;
      height: 25px;
      background-color: var(--clr-blue-mid);
      font-size: 1.6rem;
      color: var(--clr-white);
      margin: 1rem 0;
      }
      .repeater-remove-btn{
      position: absolute;
      top: 10px;
      right: 10px;
      z-index: 999;
      width: 25px;
      height: 25px;
      border-radius: 50%;
      background-color: #ca0b00;
      color: var(--clr-white);
      font-size: 1.6rem;
      }
      /* preview section */
      .preview-cnt{
      border-radius: 5px;
      display: grid;
      grid-template-columns: 32% auto;
      box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
      overflow: hidden;
      }
      .preview-cnt-l{
      padding: 3rem 3rem 2rem 3rem;
      }
      .preview-cnt-r{
      padding: 3rem 3rem 3rem 4rem;
      }
      .preview-cnt-l .preview-blk:nth-child(1){
      text-align: center;
      }
      .preview-image{
      width: 120px;
      height: 120px;
      border-radius: 50%;
      overflow: hidden;
      margin-right: auto;
      margin-left: auto;
      }
      .preview-image img{
      width: 100%;
      height: 100%;
      object-fit: cover;
      }
      .preview-item-name{
      font-size: 2.4rem;
      font-weight: 600;
      margin: 1.8rem 0;
      position: relative;
      }
      .preview-item-name::after{
      position: absolute;
      content: "";
      bottom: -10px;
      width: 50px;
      height: 1.5px;
      background-color: rgba(255, 255, 255, 0.5);
      left: 50%;
      transform: translateX(-50%);
      }
      .preview-blk{
      padding: 1rem 0;
      margin-bottom: 1rem;
      }
      .preview-blk-title h3{
      text-transform: uppercase;
      letter-spacing: 0.5px;
      border-bottom: 0.5px solid rgba(0, 0, 0, 0.08);
      padding-bottom: 0.5rem;
      }
      .preview-blk-title{
      margin-bottom: 1rem;
      }
      .preview-blk-list .preview-item{
      font-size: 1.5rem;
      margin-bottom: 0.2rem;
      opacity: 0.95;
      }
      .preview-cnt-r .preview-blk-title{
      color: var(--clr-dark);
      }
      .preview-cnt-r .preview-blk-list .preview-item{
      margin-top: 1.8rem;
      }
      .achievements-items.preview-blk-list .preview-item span:first-child,
      .educations-items.preview-blk-list .preview-item span:first-child,
      .experiences-items.preview-blk-list .preview-item span:first-child{
      display: block;
      font-weight: 600;
      margin-bottom: 1rem;
      background-color: rgba(0, 0, 0, 0.03);
      }
      .educations-items.preview-blk-list .preview-item span:nth-child(2),
      .experiences-items.preview-blk-list .preview-item span:nth-child(2){
      font-weight: 600;
      margin-right: 1rem;
      }
      .educations-items.preview-blk-list .preview-item span:nth-child(3),
      .experiences-items.preview-blk-list .preview-item span:nth-child(3){
      font-style: italic;
      margin-right: 1rem;
      }
      .educations-items.preview-blk-list .preview-item span:nth-child(4),
      .educations-items.preview-blk-list .preview-item span:nth-child(5),
      .experiences-items.preview-blk-list .preview-item span:nth-child(4),
      .experiences-items.preview-blk-list .preview-item span:nth-child(5){
      margin-right: 1rem;
      background-color: var(--clr-green);
      color: var(--clr-white);
      padding: 0 1rem;
      border-radius: 0.6rem;
      }
      .educations-items.preview-blk-list .preview-item span:nth-child(6),
      .experiences-items.preview-blk-list .preview-item span:nth-child(6){
      font-size: 13.5px;
      display: block;
      opacity: 0.8;
      margin-top: 1rem;
      }
      .projects-items.preview-blk-list .preview-item span{
      display: block;
      }
      @media screen and (min-width: 768px){
      .cols-3{
      grid-template-columns: repeat(3, 1fr);
      column-gap: 2rem;
      }
      .cols-2{
      grid-template-columns: repeat(2, 1fr);
      column-gap: 2rem;
      }
      }
      @media screen and (min-width: 992px){
      .cv-form-row{
      padding: 3rem 3rem 0rem 3rem;
      }
      .cols-3{
      grid-template-columns: repeat(3, 1fr);
      }
      }
      .print-btn-sc{
      margin: 2rem 0 6rem 0;
      }
      /* print section */
      @media print{
      body *{
      visibility: hidden;
      }
      .non_print_area{
      display: none;
      }
      .print_area, .print_area *{
      visibility: visible;
      }
      .print_area{
      width: 100%;
      position: absolute;
      left: 0;
      top: 0;
      overflow: hidden;
      }
      }
   </style>
   <body>
      <!-- header section starts  -->
      <section id = "about-sc" class = "">
         <div class = "container">
            <div class = "about-cnt">
               <form action="" class="cv-form" id = "cv-form">
                  <div class = "cv-form-blk">
                     <div class = "cv-form-row-title">
                        <h3>about section</h3>
                     </div>
                     <div class = "cv-form-row cv-form-row-about">
                        <div class = "cols-3">
                           <div class = "form-elem">
                              <label for = "" class = "form-label">First Name</label>
                              <input name = "firstname" type = "text" class = "form-control firstname" id = "" onkeyup="generateCV()" placeholder="e.g. billy">
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <label for = "" class = "form-label">Middle Name <span class = "opt-text">(optional)</span></label>
                              <input name = "middlename" type = "text" class = "form-control middlename" id = "" onkeyup="generateCV()" placeholder="e.g. Navarro">
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <label for = "" class = "form-label">Last Name</label>
                              <input name = "lastname" type = "text" class = "form-control lastname" id = "" onkeyup="generateCV()" placeholder="e.g. Bocal">
                              <span class="form-text"></span>
                           </div>
                        </div>
                        <div class="cols-3">
                           <div class = "form-elem">
                              <label for = "" class = "form-label">Your Image</label>
                              <input name = "image" type = "file" class = "form-control image" id = "" accept = "image/*" onchange="previewImage()">
                           </div>
                           <div class = "form-elem">
                              <label for = "" class = "form-label">Types Of Disability</label>
                              <input name = "designation" type = "text" class = "form-control designation" id = "" onkeyup="generateCV()" placeholder="e.g. Visual Impairements">
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <label for = "" class = "form-label">Address</label>
                              <input name = "address" type = "text" class = "form-control address" id = "" onkeyup="generateCV()" placeholder="e.g. #05 Macopa st. ......">
                              <span class="form-text"></span>
                           </div>
                        </div>
                        <div class = "cols-3">
                           <div class = "form-elem">
                              <label for = "" class = "form-label">Email</label>
                              <input name = "email" type = "text" class = "form-control email" id = "" onkeyup="generateCV()" placeholder="e.g. bocalbilly@gmail.com">
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <label for = "" class = "form-label">Phone No:</label>
                              <input name = "phoneno" type = "text" class = "form-control phoneno" id = "" onkeyup="generateCV()" placeholder="e.g. 09618915412">
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <label for = "" class = "form-label">Summary</label>
                              <input name = "summary" type = "text" class = "form-control summary" id = "" onkeyup="generateCV()" placeholder="e.g. Doe">
                              <span class="form-text"></span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="cv-form-blk">
                     <div class = "cv-form-row-title">
                        <h3>Eligibility/Professional License</h3>
                     </div>
                     <div class = "row-separator repeater">
                        <div class = "repeater" data-repeater-list = "group-a">
                           <div data-repeater-item>
                              <div class = "cv-form-row cv-form-row-achievement">
                                 <div class = "cols-2">
                                    <div class = "form-elem">
                                       <label for = "" class = "form-label">Civil Service / Professional License (PRC) ID #</label>
                                       <input name = "achieve_title" type = "text" class = "form-control achieve_title" id = "" onkeyup="generateCV()" placeholder="e.g. XXX-XXXX-XXXX">
                                       <span class="form-text"></span>
                                    </div>
                                    <div class = "form-elem">
                                       <label for = "" class = "form-label">Date Taken (CS) / Valid Until (PRC)</label>
                                       <input name = "achieve_description" type = "date" class = "form-control achieve_description" id = "" onchange="generateCV()" placeholder="03/15/2024">
                                       <span class="form-text"></span>
                                    </div>
                                 </div>
                                 <button data-repeater-delete type = "button" class = "repeater-remove-btn">-</button>
                              </div>
                           </div>
                        </div>
                        <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn">+</button>
                     </div>
                  </div>
                  <div class="cv-form-blk">
                     <div class = "cv-form-row-title">
                        <h3>experience (optional)</h3>
                     </div>
                     <div class = "row-separator repeater">
                        <div class = "repeater" data-repeater-list = "group-b">
                           <div data-repeater-item>
                              <div class = "cv-form-row cv-form-row-experience">
                                 <div class = "cols-3">
                                    <div class = "form-elem">
                                       <label for = "" class = "form-label">Position</label>
                                       <input name = "exp_title" type = "text" class = "form-control exp_title" id = "" onkeyup="generateCV()">
                                       <span class="form-text"></span>
                                    </div>
                                    <div class = "form-elem">
                                       <label for = "" class = "form-label">Company / Organization</label>
                                       <input name = "exp_organization" type = "text" class = "form-control exp_organization" id = "" onkeyup="generateCV()">
                                       <span class="form-text"></span>
                                    </div>
                                    <div class = "form-elem">
                                       <label for = "" class = "form-label">Address (City/Municipality)</label>
                                       <input name = "exp_location" type = "text" class = "form-control exp_location" id = "" onkeyup="generateCV()">
                                       <span class="form-text"></span>
                                    </div>
                                 </div>
                                 <div class = "cols-3">
                                    <div class = "form-elem">
                                       <label for = "" class = "form-label">Start Date</label>
                                       <input name = "exp_start_date" type = "date" class = "form-control exp_start_date" id = "" onchange="generateCV()">
                                       <span class="form-text"></span>
                                    </div>
                                    <div class = "form-elem">
                                       <label for = "" class = "form-label">End Date</label>
                                       <input name = "exp_end_date" type = "date" class = "form-control exp_end_date" id = "" onchange="generateCV()">
                                       <span class="form-text"></span>
                                    </div>
                                    <div class = "form-elem">
                                       <label for = "" class = "form-label">Status</label>
                                       <select name="exp_description" class="form-control exp_description" id="" onchange="generateCV()" style="height:3vh;">
                                          <option value="">Select Status</option>
                                          <option value="Permanent">Permanent</option>
                                          <option value="Contractual">Contractual</option>
                                          <option value="Part-time">Part-time</option>
                                          <option value="Prelimitionary">Prelimitionary</option>
                                       </select>
                                       <span class="form-text"></span>
                                    </div>
                                 </div>
                                 <button data-repeater-delete type = "button" class = "repeater-remove-btn">-</button>
                              </div>
                           </div>
                        </div>
                        <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn">+</button>
                     </div>


                     <div class = "cv-form-row-title" style="height:3.5vh; background-color:gray;">
                        <p style="color:white;">Technical/Vocational and Other Training ( Include courses takens as part of college education )</p>
                     </div>
                     <div class = "cv-form-row cv-form-row-experience">
                        <div class = "cols-3">
                           <div class = "form-elem">
                              <label for = "" class = "form-label">1. Training/Vocaitonal Course</label>
                              <input name = "technical1a" type = "text" class = "form-control technical1a" id = "" onkeyup="generateCV()">
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <label for = "" class = "form-label">Hours of Training</label>
                              <input name = "technical1a" type = "number" class = "form-control technical1b" id = "" onkeyup="generateCV()">
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <label for = "" class = "form-label">Training Institution</label>
                              <input name = "technical1a" type = "text" class = "form-control technical1c" id = "" onkeyup="generateCV()">
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <label for = "" class = "form-label">Skills Acquired</label>
                              <input name = "technical1a" type = "text" class = "form-control technical1d" id = "" onkeyup="generateCV()">
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <label for = "" class = "form-label">Certificates Received</label>
                              <input name = "technical1a" type = "text" class = "form-control technical1e" id = "" onkeyup="generateCV()">
                              <span class="form-text"></span>
                           </div>
                        </div>
                     </div>
                     <div class = "cv-form-row cv-form-row-experience">
                        <div class = "cols-3">
                           <div class = "form-elem">
                              <label for = "" class = "form-label">2. Training/Vocaitonal Course</label>
                              <input name = "technical1a" type = "text" class = "form-control technical2a" id = "" onkeyup="generateCV()">
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <label for = "" class = "form-label">Hours of Training</label>
                              <input name = "technical1a" type = "number" class = "form-control technical2b" id = "" onkeyup="generateCV()">
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <label for = "" class = "form-label">Training Institution</label>
                              <input name = "technical1a" type = "text" class = "form-control technical2c" id = "" onkeyup="generateCV()">
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <label for = "" class = "form-label">Skills Acquired</label>
                              <input name = "technical1a" type = "text" class = "form-control technical2d" id = "" onkeyup="generateCV()">
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <label for = "" class = "form-label">Certificates Received</label>
                              <input name = "technical1a" type = "text" class = "form-control technical2e" id = "" onkeyup="generateCV()">
                              <span class="form-text"></span>
                           </div>
                        </div>
                     </div>
                     <div class = "cv-form-row cv-form-row-experience">
                        <div class = "cols-3">
                           <div class = "form-elem">
                              <label for = "" class = "form-label">3. Training/Vocaitonal Course</label>
                              <input name = "technical1a" type = "text" class = "form-control technical3a" id = "" onkeyup="generateCV()">
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <label for = "" class = "form-label">Hours of Training</label>
                              <input name = "technical1a" type = "number" class = "form-control technical3b" id = "" onkeyup="generateCV()">
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <label for = "" class = "form-label">Training Institution</label>
                              <input name = "technical1a" type = "text" class = "form-control technical3c" id = "" onkeyup="generateCV()">
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <label for = "" class = "form-label">Skills Acquired</label>
                              <input name = "technical1a" type = "text" class = "form-control technical3d" id = "" onkeyup="generateCV()">
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <label for = "" class = "form-label">Certificates Received</label>
                              <input name = "technical1a" type = "text" class = "form-control technical3e" id = "" onkeyup="generateCV()">
                              <span class="form-text"></span>
                           </div>
                     </div>
                   </div>
                </div>

                  <div class="cv-form-blk">
                     <div class = "cv-form-row-title">
                        <h3>education background</h3>
                     </div>
                     <div class = "cols-3">
                        <div class = "form-elem">
                           <label for="" class="form-label">Currently in School?</label>
                           <select name="edu_inschool" class="form-control edu_inschool" id="" onchange="generateCV()" style="height:3vh;">
                              <option value="">Select Answer</option>
                              <option value="Currently in School: Yes">Yes</option>
                              <option value="Currently in School: No">No</option>
                           </select>
                           <span class="form-text"></span>
                        </div>
                     </div>
                     <div class = "cv-form-row-title" style="height:3.5vh; background-color:gray;">
                        <p style="color:white;">Elementary</p>
                     </div>
                     <div class = "cv-form-row cv-form-row-experience">
                        <div class = "cols-2">
                           <div class = "form-elem">
                              <label for = "" class = "form-label">Elementary School</label>
                              <input name = "edu_school1" type = "text" class = "form-control edu_school1" id = "" onkeyup="generateCV()">
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <label for = "" class = "form-label">Level</label>
                              <select name="edu_level1" class="form-control edu_level1" id="" onchange="generateCV()" style="height:3vh;">
                                 <option value="">Select Level</option>
                                 <option value="Elementary ">Elementary</option>
                              </select>
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <label for = "" class = "form-label">From Date</label>
                              <input name = "form_edu_graduate1" type = "date" class = "form-control form_edu_graduate1" id = "" onchange="generateCV()">
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <label for = "" class = "form-label">To Date</label>
                              <input name = "to_edu_graduate1" type = "date" class = "form-control to_edu_graduate1" id = "" onchange="generateCV()">
                              <span class="form-text"></span>
                           </div>
                        </div>
                     </div>
                     <div class = "cv-form-row-title" style="height:3.5vh; background-color:gray;">
                        <p style="color:white;">Secondary</p>
                     </div>
                     <div class = "cv-form-row cv-form-row-experience">
                        <div class = "cols-2">
                           <div class = "form-elem">
                              <label for = "" class = "form-label">Secondary School</label>
                              <input name = "edu_school2" type = "text" class = "form-control edu_school2" id = "" onkeyup="generateCV()">
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <label for = "" class = "form-label">Level</label>
                              <select name="edu_level2" class="form-control edu_level2" id="" onchange="generateCV()" style="height:3vh;">
                                 <option value="">Select Level</option>
                                 <option value="Non-K-12 ">Secondary (Non-K-12)</option>
                                 <option value="K-12 ">Secondary (K-12)</option>
                                 <option value="SHS ">Senior High Stand</option>
                              </select>
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <label for = "" class = "form-label">From Date</label>
                              <input name = "form_edu_graduate2" type = "date" class = "form-control form_edu_graduate2" id = "" onchange="generateCV()">
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <label for = "" class = "form-label">To Date</label>
                              <input name = "to_edu_graduate2" type = "date" class = "form-control to_edu_graduate2" id = "" onchange="generateCV()">
                              <span class="form-text"></span>
                           </div>
                        </div>
                     </div>
                     <div class = "cv-form-row-title" style="height:3.5vh; background-color:gray;">
                        <p style="color:white;">Tertiary</p>
                     </div>
                     <div class = "row-separator repeater">
                        <div class = "repeater" data-repeater-list = "group-c">
                           <div data-repeater-item>
                              <div class = "cv-form-row cv-form-row-experience">
                                 <div class = "cols-3">
                                    <div class = "form-elem">
                                       <label for = "" class = "form-label">School</label>
                                       <input name = "edu_school" type = "text" class = "form-control edu_school" id = "" onkeyup="generateCV()">
                                       <span class="form-text"></span>
                                    </div>
                                    <div class = "form-elem">
                                       <label for = "" class = "form-label">Degree</label>
                                       <input name = "edu_degree" type = "text" class = "form-control edu_degree" id = "" onkeyup="generateCV()">
                                       <span class="form-text"></span>
                                    </div>
                                 </div>
                                 <div class = "cols-3">
                                    <div class = "form-elem">
                                       <label for = "" class = "form-label">Start Date</label>
                                       <input name = "edu_start_date" type = "date" class = "form-control edu_start_date" id = "" onchange="generateCV()">
                                       <span class="form-text"></span>
                                    </div>
                                    <div class = "form-elem">
                                       <label for = "" class = "form-label">End Date</label>
                                       <input name = "edu_graduation_date" type = "date" class = "form-control edu_graduation_date" id = "" onchange="generateCV()">
                                       <span class="form-text"></span>
                                    </div>
                                    <div class = "form-elem">
                                       <label for = "" class = "form-label">Description</label>
                                       <input name = "edu_description" type = "text" class = "form-control edu_description" id = "" onkeyup="generateCV()">
                                       <span class="form-text"></span>
                                    </div>
                                 </div>
                                 <button data-repeater-delete type = "button" class = "repeater-remove-btn">-</button>
                              </div>
                           </div>
                        </div>
                        <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn">+</button>
                     </div>


                     <div class = "cv-form-row-title" style="height:3.5vh; background-color:gray;">
                        <p style="color:white;">Graduate Studies / Post-graduate</p>
                     </div>
                     <div class = "cv-form-row cv-form-row-experience">
                        <div class = "cols-2">
                           <div class = "form-elem">
                              <label for = "" class = "form-label">School</label>
                              <input name = "edu_school3" type = "text" class = "form-control edu_school3" id = "" onkeyup="generateCV()">
                              <span class="form-text"></span>
                           </div>

                           <div class = "form-elem">
                              <label for = "" class = "form-label">Course / Studies</label>
                              <input name = "edu_level3" type = "text" class = "form-control edu_level3" id = "" onkeyup="generateCV()">
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <label for = "" class = "form-label">From Date</label>
                              <input name = "form_edu_graduate3" type = "date" class = "form-control form_edu_graduate3" id = "" onchange="generateCV()">
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <label for = "" class = "form-label">To Date</label>
                              <input name = "to_edu_graduate3" type = "date" class = "form-control to_edu_graduate3" id = "" onchange="generateCV()">
                              <span class="form-text"></span>
                           </div>
                        </div>
                     </div>



                     <div class = "cv-form-row-title" style="height:3.5vh; background-color:gray;">
                        <p style="color:white;">If Undergraduate</p>
                     </div>
                     <div class = "cv-form-row cv-form-row-experience">
                        <div class = "cols-2">
                           <div class = "form-elem">
                              <label for = "" class = "form-label">Level Reached</label>
                              <input name = "edu_school4" type = "text" class = "form-control edu_school4" id = "" onkeyup="generateCV()">
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <label for = "" class = "form-label">Last Year Attended</label>
                              <input name = "to_edu_graduate4" type = "date" class = "form-control to_edu_graduate4" id = "" onchange="generateCV()">
                              <span class="form-text"></span>
                           </div>
                        </div>
                        <div class = "cols-2">
                           <div class = "form-elem">
                              <label for = "" class = "form-label">Level Reached</label>
                              <input name = "edu_school5" type = "text" class = "form-control edu_school5" id = "" onkeyup="generateCV()">
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <label for = "" class = "form-label">Last Year Attended</label>
                              <input name = "to_edu_graduate5" type = "date" class = "form-control to_edu_graduate5" id = "" onchange="generateCV()">
                              <span class="form-text"></span>
                           </div>
                        </div>
                        <div class = "cols-2">
                           <div class = "form-elem">
                              <label for = "" class = "form-label">Level Reached</label>
                              <input name = "edu_school6" type = "text" class = "form-control edu_school6" id = "" onkeyup="generateCV()">
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <label for = "" class = "form-label">Last Year Attended</label>
                              <input name = "to_edu_graduate6" type = "date" class = "form-control to_edu_graduate6" id = "" onchange="generateCV()">
                              <span class="form-text"></span>
                           </div>
                        </div>
                     </div>


                  </div>
                  <div class="cv-form-blk">
                     <div class = "cv-form-row-title">
                        <h3>projects (optional)</h3>
                     </div>
                     <div class = "row-separator repeater">
                        <div class = "repeater" data-repeater-list = "group-d">
                           <div data-repeater-item>
                              <div class = "cv-form-row cv-form-row-experience">
                                 <div class = "cols-3">
                                    <div class = "form-elem">
                                       <label for = "" class = "form-label">Project Name</label>
                                       <input name = "proj_title" type = "text" class = "form-control proj_title" id = "" onkeyup="generateCV()">
                                       <span class="form-text"></span>
                                    </div>
                                    <div class = "form-elem">
                                       <label for = "" class = "form-label">Project link</label>
                                       <input name = "proj_link" type = "text" class = "form-control proj_link" id = "" onkeyup="generateCV()">
                                       <span class="form-text"></span>
                                    </div>
                                    <div class = "form-elem">
                                       <label for = "" class = "form-label">Description</label>
                                       <input name = "proj_description" type = "text" class = "form-control proj_description" id = "" onkeyup="generateCV()">
                                       <span class="form-text"></span>
                                    </div>
                                 </div>
                                 <button data-repeater-delete type = "button" class = "repeater-remove-btn">-</button>
                              </div>
                           </div>
                        </div>
                        <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn">+</button>
                     </div>
                  </div>
                  <div class="cv-form-blk">
                     <div class = "cv-form-row-title">
                        <h3>skills (optional)</h3>
                     </div>
                     <div class = "row-separator repeater">
                        <div class = "repeater" data-repeater-list = "group-e">
                           <div data-repeater-item>
                              <div class = "cv-form-row cv-form-row-skills">
                                 <div class = "form-elem">
                                    <label for = "" class = "form-label">Skill Acquired</label>
                                    <input name = "skill" type = "text" class = "form-control skill" id = "" placeholder="Driver, Auto Mechanic, Computer Iterate, Electrician." onkeyup="generateCV()">
                                    <span class="form-text"></span>
                                 </div>
                                 <button data-repeater-delete type = "button" class = "repeater-remove-btn">-</button>
                              </div>
                           </div>
                        </div>
                        <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn">+</button>
                     </div>
                  </div>


                  <div class="cv-form-blk">
                     <div class = "cv-form-row-title">
                        <h3>Employement Status / Type<h3>
                     </div>
                     <div class = "cv-form-row cv-form-row-experience">
                        <div class = "cols-2">
                           <div class = "form-elem">
                              <label for = "" class = "form-label" style="font-size:2vh;">If Employed</label>
                              <label for = "" class = "form-label"> - Employment Type</label>
                              
                              <select name="employement1" class="form-control employement1" id="" onchange="generateCV()" style="height:3.5vh;">
                                 <option value="">Select Type</option>
                                 <option value="Wage Employed">Wage Employed</option>
                                 <option value="Self-employed">Self-employed</option>
                              </select>
                              <span class="form-text"></span>

                               <label for = "" class = "form-label" style="margin-top:0.5vh; margin-left:2vh;"> - If Self-employed ( Please Specify )</label>
                                <input name = "employement2" type = "text" class = "form-control employement2" id = "" onchange="generateCV()" placeholder="Fisherman, Vendor, Etc." style="margin-left:2vh; width:48vh;">
                                <span class="form-text"></span>

                           </div>
                           <div class = "form-elem">
                              <label for = "" class = "form-label" style="font-size:2vh;">If Unemployed</label>
                              <label for = "" class = "form-label"> - How long have you beeing looking for work? (months)</label>
                                <input name = "employement3" type = "number" class = "form-control employement3" id = "" onchange="generateCV()" placeholder="0" style="margin-left:2vh; width:20vh; height:3.5vh;">
                                <span class="form-text"></span>


                               <label for = "" class = "form-label" style="margin-top:0.5vh; margin-left:2vh;"> - Reason of being unemployed ( Please Specify )</label>
                                <input name = "employement4" type = "text" class = "form-control employement4" id = "" onchange="generateCV()" placeholder="Finished Contract, Resigned, Terminated, Etc." style="margin-left:2vh; width:48vh;">
                                <span class="form-text"></span>
                           </div>
                        </div>
                     </div>


                     <div class = "cv-form-row cv-form-row-experience">
                        <div class = "cols-2">

                            <div class = "form-elem">
                               <label for="" class="form-label">Are you an OFW?</label>
                               <select name="employement11" class="form-control employement11" id="" onchange="generateCV()" style="height:3vh;">
                                  <option value="">Select Answer</option>
                                  <option value="OFW: Yes">Yes</option>
                                  <option value="OFW: No">No</option>
                               </select>
                               <span class="form-text"></span>

                              <label for = "" class = "form-label" style="font-size:2vh; margin-top:1vh;">If Yes ( Specify country ) </label> 
                              <input name = "employement5" type = "text" class = "form-control employement5" id = "" onchange="generateCV()" placeholder="Canada, Singapore, New Zealand, Etc." style="margin-left:2vh; width:48vh;">
                                <span class="form-text"></span>
                            </div>


                            <div class = "form-elem">
                               <label for="" class="form-label">Are you a former OFW?</label>
                               <select name="employement6" class="form-control employement6" id="" onchange="generateCV()" style="height:3vh;">
                                  <option value="">Select Answer</option>
                                  <option value="Former OFW: Yes">Yes</option>
                                  <option value="Former OFW: No">No</option>
                               </select>
                               <span class="form-text"></span>

                              <label for = "" class = "form-label" style="font-size:2vh;  margin-top:1vh;">If Unemployed</label>
                              <label for = "" class = "form-label"> - Latest country of deployment:</label>
                              <input name = "employement7" type = "text" class = "form-control employement7" id = "" onchange="generateCV()" placeholder="Canada, Singapore, New Zealand, Etc." style="margin-left:2vh; width:48vh;">
                                <span class="form-text"></span>
                              <label for = "" class = "form-label" style="margin-top:1vh;"> - Month and year of return to Philippines:</label>
                              <input name = "employement8" type = "text" class = "form-control employement8" id = "" onchange="generateCV()" placeholder="March 2023." style="margin-left:2vh; width:48vh;">
                                <span class="form-text"></span>
                            </div>
                        </div>
                    </div>

                     <div class = "cv-form-row cv-form-row-experience">
                        <div class = "cols-2">

                            <div class = "form-elem">
                               <label for="" class="form-label">Are you a 4Ps beneficiary?</label>
                               <select name="employement9" class="form-control employement9" id="" onchange="generateCV()" style="height:3vh;">
                                  <option value="">Select Answer</option>
                                  <option value="4Ps Beneficiary: Yes">Yes</option>
                                  <option value="4Ps Beneficiary: No">No</option>
                               </select>
                               <span class="form-text"></span>

                              <label for = "" class = "form-label" style="font-size:2vh;  margin-top:1vh;"> - If Yes, please provide Household ID No.</label> 
                              <input name = "employement10" type = "text" class = "form-control employement10" id = "" onchange="generateCV()" placeholder="House Hold ID: 11223." style="margin-left:2vh; width:48vh;">
                                <span class="form-text"></span>
                            </div>


                        </div>
                    </div>

                 </div>

                <div class = "cv-form-row-title">
                        <h3>Job Preference<h3>
                     </div>
                     <div class = "cv-form-row cv-form-row-experience">
                        <div class="cols-3">
                           <div class = "form-elem">
                               <label for="" class="form-label">Preferred working hours?</label>
                               <select name="preferredworkinghours1" class="form-control preferredworkinghours1" id="" onchange="generateCV()" style="height:3vh;">
                                  <option value="">Select Part-time / Full-time</option>
                                  <option value="Preferred Time: Part-time">Part-time</option>
                                  <option value="Preferred Time: Full-time">Full-time</option>
                               </select>
                           </div>
                        </div>
                        <label for="" class="form-label" style="font-size:2vh;  margin-top:1vh;">List 3 Preferred Jobs</label>
                        <div class = "cols-3">
                           <div class = "form-elem">
                              <input name = "preferredworkinghours2" type = "text" class = "form-control preferredworkinghours2" id = "" onkeyup="generateCV()">
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <input name = "preferredworkinghours3" type = "number" class = "form-control preferredworkinghours3" id = "" onkeyup="generateCV()">
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <input name = "preferredworkinghours4" type = "text" class = "form-control preferredworkinghours4" id = "" onkeyup="generateCV()">
                              <span class="form-text"></span>
                           </div>
                        </div>
                     </div>


                     <div class = "cv-form-row cv-form-row-experience">
                        <div class="cols-3">
                           <div class = "form-elem">
                               <label for="" class="form-label">Preferred working locations?</label>
                               <select name="preferredworkinglocations1" class="form-control preferredworkinglocations1" id="" onchange="generateCV()" style="height:3vh;">
                                  <option value="">Select Part-time / Full-time</option>
                                  <option value="Preferred Location: Part-time">Local</option>
                                  <option value="Preferred Location: Full-time">Overseas</option>
                               </select>
                           </div>
                        </div>
                        <label for="" class="form-label" style="font-size:2vh;  margin-top:1vh;">List 3 Preferred Work Locations</label>
                        <div class = "cols-3">
                           <div class = "form-elem">
                              <input name = "preferredworkinglocations2" type = "text" class = "form-control preferredworkinglocations2" id = "" onkeyup="generateCV()">
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <input name = "preferredworkinglocations3" type = "number" class = "form-control preferredworkinglocations3" id = "" onkeyup="generateCV()">
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <input name = "preferredworkinglocations4" type = "text" class = "form-control preferredworkinglocations4" id = "" onkeyup="generateCV()">
                              <span class="form-text"></span>
                           </div>
                        </div>
                     </div>

                   </div>


                <div class = "cv-form-row-title">
                        <h3>Language / Dialect Proficiency<h3>
                     </div>
                     <div class = "cv-form-row cv-form-row-experience">
                        <div class="cols-5">
                        <label for="" class="form-label" style="font-size:2vh;  margin-top:1vh;">English Language</label>
                        </div>
                        <div class = "cols-3">
                           <div class = "form-elem">
                              <label for="" class="form-label">Read</label>
                               <select name="language1" class="form-control language1" id="" onchange="generateCV()" style="height:3vh;">
                                  <option value="">Select Answer</option>
                                  <option value="Read English: Yes">Yes</option>
                                  <option value="Read English: No">No</option>
                               </select>
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <label for="" class="form-label">Write</label>
                               <select name="language2" class="form-control language2" id="" onchange="generateCV()" style="height:3vh;">
                                  <option value="">Select Answer</option>
                                  <option value="Write English: Yes">Yes</option>
                                  <option value="Write English: No">No</option>
                               </select>
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <label for="" class="form-label">Speak</label>

                               <select name="language3" class="form-control language3" id="" onchange="generateCV()" style="height:3vh;">
                                  <option value="">Select Answer</option>
                                  <option value="Speak English: Yes">Yes</option>
                                  <option value="Speak English: No">No</option>
                               </select>
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <label for="" class="form-label">Understand</label>
                               <select name="language4" class="form-control language4" id="" onchange="generateCV()" style="height:3vh;">
                                  <option value="">Select Answer</option>
                                  <option value="Understand English: Yes">Yes</option>
                                  <option value="Understand English: No">No</option>
                               </select>
                              <span class="form-text"></span>
                           </div>
                        </div>
                     </div>


                     <div class = "cv-form-row cv-form-row-experience">
                        <div class="cols-5">
                        <label for="" class="form-label" style="font-size:2vh;  margin-top:1vh;">Filipino Language</label>
                        </div>
                        <div class = "cols-3">
                           <div class = "form-elem">
                              <label for="" class="form-label">Read</label>
                               <select name="language4" class="form-control language5" id="" onchange="generateCV()" style="height:3vh;">
                                  <option value="">Select Answer</option>
                                  <option value="Read Filipino: Yes">Yes</option>
                                  <option value="Read Filipino: No">No</option>
                               </select>
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <label for="" class="form-label">Write</label>
                               <select name="language5" class="form-control language6" id="" onchange="generateCV()" style="height:3vh;">
                                  <option value="">Select Answer</option>
                                  <option value="Write Filipino: Yes">Yes</option>
                                  <option value="Write Filipino: No">No</option>
                               </select>
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <label for="" class="form-label">Speak</label>

                               <select name="language6" class="form-control language7" id="" onchange="generateCV()" style="height:3vh;">
                                  <option value="">Select Answer</option>
                                  <option value="Speak Filipino: Yes">Yes</option>
                                  <option value="Speak Filipino: No">No</option>
                               </select>
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <label for="" class="form-label">Understand</label>
                               <select name="language7" class="form-control language8" id="" onchange="generateCV()" style="height:3vh;">
                                  <option value="">Select Answer</option>
                                  <option value="Understand Filipino: Yes">Yes</option>
                                  <option value="Understand Filipino: No">No</option>
                               </select>
                              <span class="form-text"></span>
                           </div>
                        </div>
                     </div>


                     <div class = "cv-form-row cv-form-row-experience">
                        <div class="cols-5">
                        <label for="" class="form-label" style="font-size:2vh;  margin-top:1vh;">Mandarin Language</label>
                        </div>
                        <div class = "cols-3">
                           <div class = "form-elem">
                              <label for="" class="form-label">Read</label>
                               <select name="language8" class="form-control language9" id="" onchange="generateCV()" style="height:3vh;">
                                  <option value="">Select Answer</option>
                                  <option value="Read Mandarin: Yes">Yes</option>
                                  <option value="Read Mandarin: No">No</option>
                               </select>
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <label for="" class="form-label">Write</label>
                               <select name="language9" class="form-control language10" id="" onchange="generateCV()" style="height:3vh;">
                                  <option value="">Select Answer</option>
                                  <option value="Write Mandarin: Yes">Yes</option>
                                  <option value="Write Mandarin: No">No</option>
                               </select>
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <label for="" class="form-label">Speak</label>

                               <select name="language10" class="form-control language11" id="" onchange="generateCV()" style="height:3vh;">
                                  <option value="">Select Answer</option>
                                  <option value="Speak Mandarin: Yes">Yes</option>
                                  <option value="Speak Mandarin: No">No</option>
                               </select>
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <label for="" class="form-label">Understand</label>
                               <select name="language11" class="form-control language12" id="" onchange="generateCV()" style="height:3vh;">
                                  <option value="">Select Answer</option>
                                  <option value="Understand Mandarin: Yes">Yes</option>
                                  <option value="Understand Mandarin: No">No</option>
                               </select>
                              <span class="form-text"></span>
                           </div>
                        </div>
                     </div>


                     <div class = "cv-form-row cv-form-row-experience">
                        <div class="cols-2">
                           <div class = "form-elem">
                                <label for="" class="form-label" style="font-size:2vh;  margin-top:1vh;">Other Language</label>
                              <input name = "language12" type = "text" class = "form-control language13" id = "" onkeyup="generateCV()">
                            
                            </div>
                        </div>
                        <div class = "cols-3">
                           <div class = "form-elem">
                              <label for="" class="form-label">Read</label>
                               <select name="language13" class="form-control language14" id="" onchange="generateCV()" style="height:3vh;">
                                  <option value="">Select Answer</option>
                                  <option value="Read: Yes">Yes</option>
                                  <option value="Read: No">No</option>
                               </select>
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <label for="" class="form-label">Write</label>
                               <select name="language14" class="form-control language15" id="" onchange="generateCV()" style="height:3vh;">
                                  <option value="">Select Answer</option>
                                  <option value="Write: Yes">Yes</option>
                                  <option value="Write: No">No</option>
                               </select>
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <label for="" class="form-label">Speak</label>

                               <select name="language15" class="form-control language16" id="" onchange="generateCV()" style="height:3vh;">
                                  <option value="">Select Answer</option>
                                  <option value="Speak: Yes">Yes</option>
                                  <option value="Speak: No">No</option>
                               </select>
                              <span class="form-text"></span>
                           </div>
                           <div class = "form-elem">
                              <label for="" class="form-label">Understand</label>
                               <select name="language16" class="form-control language17" id="" onchange="generateCV()" style="height:3vh;">
                                  <option value="">Select Answer</option>
                                  <option value="Understand: Yes">Yes</option>
                                  <option value="Understand: No">No</option>
                               </select>
                              <span class="form-text"></span>
                           </div>
                        </div>
                     </div>


                   </div>
                </div>
                </div>
               </form>
            </div>
         </div>
      </section>
      <section id = "preview-sc" class = "print_area">
         <div class = "container">
            <div class = "preview-cnt">
               <div class = "preview-cnt-l bg-green text-white">
                  <div class = "preview-blk">
                     <div class = "preview-image">
                        <img src = "" alt = "" id = "image_dsp"> 
                     </div>
                     <div class = "preview-item preview-item-name">
                        <span class = "preview-item-val fw-6" id = "fullname_dsp"></span>
                     </div>
                     <div class = "preview-item">
                        <span class = "preview-item-val text-uppercase fw-6 ls-1" id = "designation_dsp"></span>
                     </div>
                  </div>
                  <div class = "preview-blk">
                     <div class = "preview-blk-title">
                        <h3>about</h3>
                     </div>
                     <div class = "preview-blk-list">
                        <div class = "preview-item">
                           <span class = "preview-item-val" id = "phoneno_dsp"></span>
                        </div>
                        <div class = "preview-item">
                           <span class = "preview-item-val" id = "email_dsp"></span>
                        </div>
                        <div class = "preview-item">
                           <span class = "preview-item-val" id = "address_dsp"></span>
                        </div>
                        <div class = "preview-item">
                           <span class = "preview-item-val" id = "summary_dsp"></span>
                        </div>
                     </div>
                  </div>
                  <div class = "preview-blk">
                     <div class = "preview-blk-title">
                        <h3>skills</h3>
                     </div>
                     <div class = "skills-items preview-blk-list" id = "skills_dsp">
                        <!-- skills list here -->
                     </div>
                  </div>
               </div>
               <div class = "preview-cnt-r bg-white">
                  <div class = "preview-blk">
                     <div class = "preview-blk-title">
                        <h3>Eligibility/Professional License</h3>
                     </div>
                     <div class = "achievements-items preview-blk-list" id = "achievements_dsp"></div>
                  </div>
                  <div class = "preview-blk">
                     <div class = "preview-blk-title">
                        <h3>educations</h3>
                     </div>
                     <div class = "educations-items preview-blk-list" id = "educations_dsp"></div>
                  </div>
                  <div class = "preview-blk">
                     <div class = "preview-blk-title">
                        <h3>experiences</h3>
                     </div>
                     <div class = "experiences-items preview-blk-list" id = "experiences_dsp"></div>
                  </div>
                  <div class = "preview-blk">
                     <div class = "preview-blk-title">
                        <h3>projects</h3>
                     </div>
                     <div class = "projects-items preview-blk-list" id = "projects_dsp"></div>
                  </div>
                  <div class = "preview-blk">
                     <div class = "preview-blk-title">
                        <h3>Employement Status/Type</h3>
                     </div>
                     <div class = "projects-items preview-blk-list" id = "employement_dsp"></div>
                  </div>
                  <div class = "preview-blk">
                     <div class = "preview-blk-title">
                        <h3>Job Preference</h3>
                     </div>
                     <div class = "projects-items preview-blk-list" id = "jobpreference_dsp"></div>
                  </div>
                  <div class = "preview-blk">
                     <div class = "preview-blk-title">
                        <h3>Language / Dialect Proficiency</h3>
                     </div>
                     <div class = "projects-items preview-blk-list" id = "language_dsp"></div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class = "print-btn-sc">
         <div class = "container">
            <button type = "button" class = "print-btn btn btn-primary" onclick="printCV()">Print CV</button>
         </div>
      </section>
      <!-- jquery cdn -->
      <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
      <!-- jquery repeater cdn -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.js" integrity="sha512-bZAXvpVfp1+9AUHQzekEZaXclsgSlAeEnMJ6LfFAvjqYUVZfcuVXeQoN5LhD7Uw0Jy4NCY9q3kbdEXbwhZUmUQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script>
         // form repeater
         $(document).ready(function() {
             $('.repeater').repeater({
                 initEmpty: false,
                 defaultValues: {
                     'text-input': ''
                 },
                 show: function() {
                     $(this).slideDown();
                 },
                 hide: function(deleteElement) {
                     $(this).slideUp(deleteElement);
                     setTimeout(() => {
                         generateCV();
                     }, 500);
                 },
                 isFirstItemUndeletable: true
             })
         })
         
         
         
         
         // regex for validation
         const strRegex =  /^[a-zA-Z\s]*$/; // containing only letters
         const emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
         const phoneRegex = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
         /* supports following number formats - (123) 456-7890, (123)456-7890, 123-456-7890, 123.456.7890, 1234567890, +31636363634, 075-63546725 */
         const digitRegex = /^\d+$/;
         
         const mainForm = document.getElementById('cv-form');
         const validType = {
         TEXT: 'text',
         TEXT_EMP: 'text_emp',
         EMAIL: 'email',
         DIGIT: 'digit',
         PHONENO: 'phoneno',
         ANY: 'any',
         }
         
         // user inputs elements
         let firstnameElem = mainForm.firstname,
         middlenameElem = mainForm.middlename,
         lastnameElem = mainForm.lastname,
         imageElem = mainForm.image,
         designationElem = mainForm.designation,
         addressElem = mainForm.address,
         emailElem = mainForm.email,
         phonenoElem = mainForm.phoneno,
         summaryElem = mainForm.summary;
         
         // display elements
         let nameDsp = document.getElementById('fullname_dsp'),
         imageDsp = document.getElementById('image_dsp'),
         phonenoDsp = document.getElementById('phoneno_dsp'),
         emailDsp = document.getElementById('email_dsp'),
         addressDsp = document.getElementById('address_dsp'),
         designationDsp = document.getElementById('designation_dsp'),
         summaryDsp = document.getElementById('summary_dsp'),
         projectsDsp = document.getElementById('projects_dsp'),
         achievementsDsp = document.getElementById('achievements_dsp'),
         skillsDsp = document.getElementById('skills_dsp'),
         educationsDsp = document.getElementById('educations_dsp'),
         experiencesDsp = document.getElementById('experiences_dsp');
         employmentDsp = document.getElementById('employement_dsp');
         jobpreference_dsp = document.getElementById('jobpreference_dsp');
         language_dsp = document.getElementById('language_dsp');

         // first value is for the attributes and second one passes the nodelists
         const fetchValues = (attrs, ...nodeLists) => {
         let elemsAttrsCount = nodeLists.length;
         let elemsDataCount = nodeLists[0].length;
         let tempDataArr = [];
         
         // first loop deals with the no of repeaters value
         for(let i = 0; i < elemsDataCount; i++){
             let dataObj = {}; // creating an empty object to fill the data
             // second loop fetches the data for each repeaters value or attributes 
             for(let j = 0; j < elemsAttrsCount; j++){
                 // setting the key name for the object and fill it with data
                 dataObj[`${attrs[j]}`] = nodeLists[j][i].value;
             }
             tempDataArr.push(dataObj);
         }
         
         return tempDataArr;
         }
         
         const getUserInputs = () => {
         
         // achivements 
         let achievementsTitleElem = document.querySelectorAll('.achieve_title'),
         achievementsDescriptionElem = document.querySelectorAll('.achieve_description');
         
         // experiences
         let expTitleElem = document.querySelectorAll('.exp_title'),
         expOrganizationElem = document.querySelectorAll('.exp_organization'),
         expLocationElem = document.querySelectorAll('.exp_location'),
         expStartDateElem = document.querySelectorAll('.exp_start_date'),
         expEndDateElem = document.querySelectorAll('.exp_end_date'),
         expDescriptionElem = document.querySelectorAll('.exp_description');

         technical1a = document.querySelectorAll('.technical1a');
         technical1b = document.querySelectorAll('.technical1b');
         technical1c = document.querySelectorAll('.technical1c');
         technical1d = document.querySelectorAll('.technical1d');
         technical1e = document.querySelectorAll('.technical1e');
         
         technical2a = document.querySelectorAll('.technical2a');
         technical2b = document.querySelectorAll('.technical2b');
         technical2c = document.querySelectorAll('.technical2c');
         technical2d = document.querySelectorAll('.technical2d');
         technical2e = document.querySelectorAll('.technical2e');

         technical3a = document.querySelectorAll('.technical3a');
         technical3b = document.querySelectorAll('.technical3b');
         technical3c = document.querySelectorAll('.technical3c');
         technical3d = document.querySelectorAll('.technical3d');
         technical3e = document.querySelectorAll('.technical3e');
         // education
         let eduSchoolElem = document.querySelectorAll('.edu_school'),
         edu_inschool = document.querySelectorAll('.edu_inschool'),
         
         edu_school1 = document.querySelectorAll('.edu_school1'),
         edu_level1 = document.querySelectorAll('.edu_level1'),
         form_edu_graduate1 = document.querySelectorAll('.form_edu_graduate1'),
         to_edu_graduate1 = document.querySelectorAll('.to_edu_graduate1'),
         
         edu_school2 = document.querySelectorAll('.edu_school2'),
         edu_level2 = document.querySelectorAll('.edu_level2'),
         form_edu_graduate2 = document.querySelectorAll('.form_edu_graduate2'),
         to_edu_graduate2 = document.querySelectorAll('.to_edu_graduate2'),

         edu_school3 = document.querySelectorAll('.edu_school3'),
         edu_level3 = document.querySelectorAll('.edu_level3'),
         form_edu_graduate3 = document.querySelectorAll('.form_edu_graduate3'),
         to_edu_graduate3 = document.querySelectorAll('.to_edu_graduate3'),
         
         edu_school4 = document.querySelectorAll('.edu_school4'),
         to_edu_graduate4 = document.querySelectorAll('.to_edu_graduate4'),
         edu_school5 = document.querySelectorAll('.edu_school5'),
         to_edu_graduate5 = document.querySelectorAll('.to_edu_graduate5'),
         edu_school6 = document.querySelectorAll('.edu_school6'),
         to_edu_graduate6 = document.querySelectorAll('.to_edu_graduate6'),
         
         eduDegreeElem = document.querySelectorAll('.edu_degree'),
         eduStartDateElem = document.querySelectorAll('.edu_start_date'),
         eduGraduationDateElem = document.querySelectorAll('.edu_graduation_date'),
         eduDescriptionElem = document.querySelectorAll('.edu_description');
         
         let projTitleElem = document.querySelectorAll('.proj_title'),
         projLinkElem = document.querySelectorAll('.proj_link'),
         projDescriptionElem = document.querySelectorAll('.proj_description');
         
         let skillElem = document.querySelectorAll('.skill');

         let employement1 = document.querySelectorAll('.employement1'), employement2 = document.querySelectorAll('.employement2'), employement3 = document.querySelectorAll('.employement3'), employement4 = document.querySelectorAll('.employement4'), employement5 = document.querySelectorAll('.employement5'), employement6 = document.querySelectorAll('.employement6'), employement7 = document.querySelectorAll('.employement7'), employement8 = document.querySelectorAll('.employement8'), employement9 = document.querySelectorAll('.employement9'), employement10 = document.querySelectorAll('.employement10')
         ,employement11 = document.querySelectorAll('.employement11');
         

         let preferredworkinghours1 = document.querySelectorAll('.preferredworkinghours1'),
         preferredworkinghours2 = document.querySelectorAll('.preferredworkinghours2'),
         preferredworkinghours3 = document.querySelectorAll('.preferredworkinghours3'),
         preferredworkinghours4 = document.querySelectorAll('.preferredworkinghours4');

         let preferredworkinglocations1 = document.querySelectorAll('.preferredworkinglocations1'),
         preferredworkinglocations2 = document.querySelectorAll('.preferredworkinglocations2'),
         preferredworkinglocations3 = document.querySelectorAll('.preferredworkinglocations3'),
         preferredworkinglocations4 = document.querySelectorAll('.preferredworkinglocations4');


         let language1 = document.querySelectorAll('.language1'),
         language2 = document.querySelectorAll('.language2'),
         language3 = document.querySelectorAll('.language3'),
         language4 = document.querySelectorAll('.language4');
         language5 = document.querySelectorAll('.language5');
         language6 = document.querySelectorAll('.language6');
         language7 = document.querySelectorAll('.language7');
         language8 = document.querySelectorAll('.language8');
         language9 = document.querySelectorAll('.language9');
         language10 = document.querySelectorAll('.language10');
         language11 = document.querySelectorAll('.language11');
         language12 = document.querySelectorAll('.language12');
         language13 = document.querySelectorAll('.language13');
         language14 = document.querySelectorAll('.language14');
         language15 = document.querySelectorAll('.language15');
         language16 = document.querySelectorAll('.language16');
         language17 = document.querySelectorAll('.language17');
//language12

         // event listeners for form validation
         firstnameElem.addEventListener('keyup', (e) => validateFormData(e.target, validType.TEXT, 'First Name'));
         middlenameElem.addEventListener('keyup', (e) => validateFormData(e.target, validType.TEXT_EMP, 'Middle Name'));
         lastnameElem.addEventListener('keyup', (e) => validateFormData(e.target, validType.TEXT, 'Last Name'));
         phonenoElem.addEventListener('keyup', (e) => validateFormData(e.target, validType.PHONENO, 'Phone Number'));
         emailElem.addEventListener('keyup', (e) => validateFormData(e.target, validType.EMAIL, 'Email'));
         addressElem.addEventListener('keyup', (e) => validateFormData(e.target, validType.ANY, 'Address'));
         designationElem.addEventListener('keyup', (e) => validateFormData(e.target, validType.TEXT, 'Designation'));
         
         achievementsTitleElem.forEach(item => item.addEventListener('keyup', (e) => validateFormData(e.target, validType.ANY, 'Title')));
         achievementsDescriptionElem.forEach(item => item.addEventListener('keyup', (e) => validateFormData(e.target, validType.ANY, 'Description')));
         expTitleElem.forEach(item => item.addEventListener('keyup', (e) => validateFormData(e.target, validType.ANY, 'Title')));
         expOrganizationElem.forEach(item => item.addEventListener('keyup', (e) => validateFormData(e.target, validType.ANY, 'Organization')));
         expLocationElem.forEach(item => item.addEventListener('keyup', (e) => validateFormData(e.target, validType.ANY, "Location")));
         expStartDateElem.forEach(item => item.addEventListener('blur', (e) => validateFormData(e.target, validType.ANY, 'End Date')));
         expEndDateElem.forEach(item => item.addEventListener('keyup', (e) => validateFormData(e.target, validType.ANY, 'End Date')));
         expDescriptionElem.forEach(item => item.addEventListener('keyup', (e) => validateFormData(e.target, validType.ANY, 'Description')));
         eduSchoolElem.forEach(item => item.addEventListener('keyup', (e) => validateFormData(e.target, validType.ANY, 'School')));
         eduDegreeElem.forEach(item => item.addEventListener('keyup', (e) => validateFormData(e.target, validType.ANY, 'Degree')));
        
         eduStartDateElem.forEach(item => item.addEventListener('blur', (e) => validateFormData(e.target, validType.ANY, 'Start Date')));
         eduGraduationDateElem.forEach(item => item.addEventListener('blur', (e) => validateFormData(e.target, validType.ANY, 'Graduation Date')));
         eduDescriptionElem.forEach(item => item.addEventListener('keyup', (e) => validateFormData(e.target, validType.ANY, 'Description')));
         projTitleElem.forEach(item => item.addEventListener('keyup', (e) => validateFormData(e.target, validType.ANY, 'Title')));
         projLinkElem.forEach(item => item.addEventListener('keyup', (e) => validateFormData(e.target, validType.ANY, 'Link')));
         projDescriptionElem.forEach(item => item.addEventListener('keyup', (e) => validateFormData(e.target, validType.ANY, 'Description')));
         skillElem.forEach(item => item.addEventListener('keyup', (e) => validateFormData(e.target, validType.ANY, 'skill')));
         
         return {
             firstname: firstnameElem.value,
             middlename: middlenameElem.value,
             lastname: lastnameElem.value,
             designation: designationElem.value,
             address: addressElem.value,
             email: emailElem.value,
             phoneno: phonenoElem.value,
             summary: summaryElem.value,
             achievements: fetchValues(['achieve_title', 'achieve_description'], achievementsTitleElem, achievementsDescriptionElem),
             experiences: fetchValues(['exp_title', 'exp_organization', 'exp_location', 'exp_start_date', 'exp_end_date', 'exp_description'], expTitleElem, expOrganizationElem, expLocationElem, expStartDateElem, expEndDateElem, expDescriptionElem),
         
            experiences1: fetchValues(['technical1a', 'technical1b','technical1c','technical1d','technical1e'], technical1a, technical1b,technical1c,technical1d,technical1e),
            experiences2: fetchValues(['technical2a', 'technical2b','technical2c','technical2d','technical2e'], technical2a, technical2b,technical2c,technical2d,technical2e),
            experiences3: fetchValues(['technical3a', 'technical3b','technical3c','technical3d','technical3e'], technical3a, technical3b,technical3c,technical3d,technical3e),

            educations: fetchValues(['edu_inschool', 'edu_school', 'edu_degree', 'edu_start_date', 'edu_graduation_date', 'edu_description'], edu_inschool, eduSchoolElem, eduDegreeElem, eduStartDateElem, eduGraduationDateElem, eduDescriptionElem),


            educations4: fetchValues(['edu_school4', 'to_edu_graduate4'], edu_school4, to_edu_graduate4),
            educations5: fetchValues(['edu_school5', 'to_edu_graduate5'], edu_school5, to_edu_graduate5),
            educations6: fetchValues(['edu_school6', 'to_edu_graduate6'], edu_school6, to_edu_graduate6),

            educations3: fetchValues(['edu_school3', 'edu_level3', 'form_edu_graduate3', 'to_edu_graduate3'], edu_school3, edu_level3, form_edu_graduate3, to_edu_graduate3),
            educations1: fetchValues(['edu_school1', 'edu_level1', 'form_edu_graduate1', 'to_edu_graduate1'], edu_school1, edu_level1, form_edu_graduate1, to_edu_graduate1),
            educations2: fetchValues(['edu_school2', 'edu_level2', 'form_edu_graduate2', 'to_edu_graduate2'], edu_school2, edu_level2, form_edu_graduate2, to_edu_graduate2),


         
             projects: fetchValues(['proj_title', 'proj_link', 'proj_description'], projTitleElem, projLinkElem, projDescriptionElem),
             skills: fetchValues(['skill'], skillElem),
            
             employement1: fetchValues(['employement1', 'employement2','employement3','employement4','employement11','employement5','employement6','employement7','employement8','employement9','employement10'], employement1, employement2, employement3, employement4,employement11, employement5, employement6, employement7, employement8, employement9, employement10),

             preferredworkinghours1: fetchValues(['preferredworkinghours1', 'preferredworkinghours2','preferredworkinghours3','preferredworkinghours4']
                , preferredworkinghours1, preferredworkinghours2, preferredworkinghours3, preferredworkinghours4),


             preferredworkinglocations1: fetchValues(['preferredworkinglocations1', 'preferredworkinglocations2','preferredworkinglocations3','preferredworkinglocations4']
                , preferredworkinglocations1, preferredworkinglocations2, preferredworkinglocations3, preferredworkinglocations4),

             language1: fetchValues(
                ['language1'
                , 'language2'
                , 'language3'
                , 'language4'
                , 'language5'
                , 'language6'
                , 'language7'
                , 'language8'
                , 'language9'
                , 'language10'
                , 'language11'
                , 'language12'
                , 'language13'
                , 'language14'
                , 'language15'
                , 'language16'
                , 'language16'
                ]
                , language1
                , language2
                , language3
                , language4
                , language5
                , language6
                , language7
                , language8
                , language9
                , language10
                , language11
                , language12
                , language13
                , language14
                , language15
                , language16
                , language17
                )
         }
         };
         
         function validateFormData(elem, elemType, elemName){
         // checking for text string and non empty string
         if(elemType == validType.TEXT){
             if(!strRegex.test(elem.value) || elem.value.trim().length == 0) addErrMsg(elem, elemName);
             else removeErrMsg(elem);
         }
         
         // checking for only text string
         if(elemType == validType.TEXT_EMP){
             if(!strRegex.test(elem.value)) addErrMsg(elem, elemName);
             else removeErrMsg(elem);
         }
         
         // checking for email
         if(elemType == validType.EMAIL){
             if(!emailRegex.test(elem.value) || elem.value.trim().length == 0) addErrMsg(elem, elemName);
             else removeErrMsg(elem);
         }
         
         // checking for phone number
         if(elemType == validType.PHONENO){
             if(!phoneRegex.test(elem.value) || elem.value.trim().length == 0) addErrMsg(elem, elemName);
             else removeErrMsg(elem);
         }
         
         // checking for only empty
         if(elemType == validType.ANY){
             if(elem.value.trim().length == 0) addErrMsg(elem, elemName);
             else removeErrMsg(elem);
         }
         }
         
         // adding the invalid text
         function addErrMsg(formElem, formElemName){
         formElem.nextElementSibling.innerHTML = `${formElemName} is invalid`;
         }
         
         // removing the invalid text 
         function removeErrMsg(formElem){
         formElem.nextElementSibling.innerHTML = "";
         }
         
         // show the list data
         const showListData = (listData, listContainer) => {
         listContainer.innerHTML = "";
         listData.forEach(listItem => {
             let itemElem = document.createElement('div');
             itemElem.classList.add('preview-item');
             
             for(const key in listItem){
                 let subItemElem = document.createElement('span');
                 subItemElem.classList.add('preview-item-val');
                 subItemElem.innerHTML = `${listItem[key]}`;
                 itemElem.appendChild(subItemElem);
             }
         
             listContainer.appendChild(itemElem);
         })
         }
         
         const displayCV = (userData) => {
             nameDsp.innerHTML = userData.firstname + " " + userData.middlename + " " + userData.lastname;
             phonenoDsp.innerHTML = userData.phoneno;
             emailDsp.innerHTML = userData.email;
             addressDsp.innerHTML = userData.address;
             designationDsp.innerHTML = userData.designation;
             summaryDsp.innerHTML = userData.summary;
             showListData(userData.projects, projectsDsp);
             showListData(userData.achievements, achievementsDsp);
             showListData(userData.skills, skillsDsp);
             showListData(userData.educations, educationsDsp);

            // Display educations2 data
            userData.educations3.forEach((education) => {
                let itemElem = document.createElement('div');
                itemElem.classList.add('preview-item');
                for (const key in education) {
                    let subItemElem = document.createElement('span');
                    subItemElem.classList.add('preview-item-val');
                    subItemElem.innerHTML = `${education[key]}`;
                    itemElem.appendChild(subItemElem);
                }
                educationsDsp.appendChild(itemElem);
            });

            // Display educations1 data
            userData.educations1.forEach((education) => {
                let itemElem = document.createElement('div');
                itemElem.classList.add('preview-item');
                for (const key in education) {
                    let subItemElem = document.createElement('span');
                    subItemElem.classList.add('preview-item-val');
                    subItemElem.innerHTML = `${education[key]}`;
                    itemElem.appendChild(subItemElem);
                }
                educationsDsp.appendChild(itemElem);
            });

            // Display educations2 data
            userData.educations2.forEach((education) => {
                let itemElem = document.createElement('div');
                itemElem.classList.add('preview-item');
                for (const key in education) {
                    let subItemElem = document.createElement('span');
                    subItemElem.classList.add('preview-item-val');
                    subItemElem.innerHTML = `${education[key]}`;
                    itemElem.appendChild(subItemElem);
                }
                educationsDsp.appendChild(itemElem);
            });

            // Display educations2 data
            userData.educations4.forEach((education) => {
                let itemElem = document.createElement('div');
                itemElem.classList.add('preview-item');
                for (const key in education) {
                    let subItemElem = document.createElement('span');
                    subItemElem.classList.add('preview-item-val');
                    subItemElem.innerHTML = `${education[key]}`;
                    itemElem.appendChild(subItemElem);
                }
                educationsDsp.appendChild(itemElem);
            });
            // Display educations2 data
            userData.educations5.forEach((education) => {
                let itemElem = document.createElement('div');
                itemElem.classList.add('preview-item');
                for (const key in education) {
                    let subItemElem = document.createElement('span');
                    subItemElem.classList.add('preview-item-val');
                    subItemElem.innerHTML = `${education[key]}`;
                    itemElem.appendChild(subItemElem);
                }
                educationsDsp.appendChild(itemElem);
            });

            // Display educations2 data
            userData.educations6.forEach((education) => {
                let itemElem = document.createElement('div');
                itemElem.classList.add('preview-item');
                for (const key in education) {
                    let subItemElem = document.createElement('span');
                    subItemElem.classList.add('preview-item-val');
                    subItemElem.innerHTML = `${education[key]}`;
                    itemElem.appendChild(subItemElem);
                }
                educationsDsp.appendChild(itemElem);
            });
             showListData(userData.experiences, experiencesDsp);


            userData.experiences1.forEach((experiences) => {
                let itemElem = document.createElement('div');
                itemElem.classList.add('preview-item');
                for (const key in experiences) {
                    let subItemElem = document.createElement('span');
                    subItemElem.classList.add('preview-item-val');
                    subItemElem.innerHTML = `${experiences[key]}`;
                    itemElem.appendChild(subItemElem);
                }
                experiencesDsp.appendChild(itemElem);
            });
            userData.experiences2.forEach((experiences) => {
                let itemElem = document.createElement('div');
                itemElem.classList.add('preview-item');
                for (const key in experiences) {
                    let subItemElem = document.createElement('span');
                    subItemElem.classList.add('preview-item-val');
                    subItemElem.innerHTML = `${experiences[key]}`;
                    itemElem.appendChild(subItemElem);
                }
                experiencesDsp.appendChild(itemElem);
            });
            userData.experiences3.forEach((experiences) => {
                let itemElem = document.createElement('div');
                itemElem.classList.add('preview-item');
                for (const key in experiences) {
                    let subItemElem = document.createElement('span');
                    subItemElem.classList.add('preview-item-val');
                    subItemElem.innerHTML = `${experiences[key]}`;
                    itemElem.appendChild(subItemElem);
                }
                experiencesDsp.appendChild(itemElem);
            });

            // Clear existing content in employmentDsp
            employmentDsp.innerHTML = "";

            // Check if employment1 has any value selected
           if (userData.employement1.length > 0) {
                userData.employement1.forEach((employement) => {
                    let itemElem = document.createElement('div');
                    itemElem.classList.add('preview-item');
                    for (const key in employement) {
                        let subItemElem = document.createElement('span');
                        subItemElem.classList.add('preview-item-val');
                        if (key === 'employement3' && employement[key]) { // Check if employement3 is not empty
                            subItemElem.innerHTML = `${employement[key]} Month/s Unemployed & Looking for work`;
                        }
                        else if(key === 'employement2' && employement[key])
                        {

                            subItemElem.innerHTML = `Self Employed As: ${employement[key]} <br><br>`;
                        } 
                        else if(key === 'employement4' && employement[key]){

                            subItemElem.innerHTML = `Reason of Unemployement: ${employement[key]} <br><br>`;
                        }
                        else if(key === 'employement5' && employement[key]){

                            subItemElem.innerHTML = `Currently in: ${employement[key]} <br><br>`;
                        }
                        else if(key === 'employement7' && employement[key]){

                            subItemElem.innerHTML = `Latest country of deployment: ${employement[key]}`;
                        }
                        else if(key === 'employement8' && employement[key]){

                            subItemElem.innerHTML = `Month & Year of return: ${employement[key]} <br><br>`;
                        }
                        else if(key === 'employement10' && employement[key]){

                            subItemElem.innerHTML = `House Hold ID: ${employement[key]} <br><br>`;
                        }
                        else 
                        {
                            subItemElem.innerHTML = employement[key];
                        }

                        itemElem.appendChild(subItemElem);
                    }
                    employmentDsp.appendChild(itemElem);
                });
            }



            // Clear existing content in employmentDsp
            jobpreference_dsp.innerHTML = "";

            // Check if employment1 has any value selected
           if (userData.preferredworkinghours1.length > 0) {
                userData.preferredworkinghours1.forEach((workinghours) => {
                    let itemElem = document.createElement('div');
                    itemElem.classList.add('preview-item');
                    for (const key in workinghours) {
                        let subItemElem = document.createElement('span');
                        subItemElem.classList.add('preview-item-val');
                        if (key === 'preferredworkinghours4' && workinghours[key]) { // Check if employement3 is not empty
                            subItemElem.innerHTML = `- ${workinghours[key]} <br><br>`;
                        }
                        else if (key === 'preferredworkinghours3' && workinghours[key]) { // Check if employement3 is not empty
                            subItemElem.innerHTML = `- ${workinghours[key]}`;
                        }
                        else if (key === 'preferredworkinghours2' && workinghours[key]) { // Check if employement3 is not empty
                            subItemElem.innerHTML = `- ${workinghours[key]}`;
                        }
                        else
                        {
                            subItemElem.innerHTML = workinghours[key];
                        }

                        itemElem.appendChild(subItemElem);
                    }
                    jobpreference_dsp.appendChild(itemElem);
                });
            }

            // Check if employment1 has any value selected
           if (userData.preferredworkinglocations1.length > 0) {
                userData.preferredworkinglocations1.forEach((workinglocations) => {
                    let itemElem = document.createElement('div');
                    itemElem.classList.add('preview-item');
                    for (const key in workinglocations) {
                        let subItemElem = document.createElement('span');
                        subItemElem.classList.add('preview-item-val');
                        if (key === 'preferredworkinglocations4' && workinglocations[key]) { // Check if employement3 is not empty
                            subItemElem.innerHTML = `- ${workinglocations[key]} <br><br>`;
                        }
                        else if (key === 'preferredworkinglocations3' && workinglocations[key]) { // Check if employement3 is not empty
                            subItemElem.innerHTML = `- ${workinglocations[key]}`;
                        }
                        else if (key === 'preferredworkinglocations2' && workinglocations[key]) { // Check if employement3 is not empty
                            subItemElem.innerHTML = `- ${workinglocations[key]}`;
                        }
                        else
                        {
                            subItemElem.innerHTML = workinglocations[key];
                        }

                        itemElem.appendChild(subItemElem);
                    }
                    jobpreference_dsp.appendChild(itemElem);
                });
            }


            // Clear existing content in employmentDsp
            language_dsp.innerHTML = "";

           if (userData.language1.length > 0) {
                userData.language1.forEach((language) => {
                    let itemElem = document.createElement('div');
                    itemElem.classList.add('preview-item');
                    for (const key in language) {
                        let subItemElem = document.createElement('span');
                        subItemElem.classList.add('preview-item-val');
                        if (key === 'language4' && language[key]) { // Check if employement3 is not empty
                            subItemElem.innerHTML = `${language[key]} <br><br>`;
                        }
                        else if (key === 'language8' && language[key]) { // Check if employement3 is not empty
                            subItemElem.innerHTML = `${language[key]} <br><br>`;
                        }
                        else if (key === 'language12' && language[key]) { // Check if employement3 is not empty
                            subItemElem.innerHTML = `${language[key]} <br><br>`;
                        }
                        else if (key === 'language13' && language[key]) { // Check if employement3 is not empty
                            subItemElem.innerHTML = `${language[key]} Language`;
                        }
                        else if (key === 'language17' && language[key]) { // Check if employement3 is not empty
                            subItemElem.innerHTML = `${language[key]} <br><br>`;
                        }
                        else
                        {
                            subItemElem.innerHTML = language[key];
                        }

                        itemElem.appendChild(subItemElem);
                    }
                    language_dsp.appendChild(itemElem);
                });
            }

         }
         
         // generate CV
         const generateCV = () => {
         let userData = getUserInputs();
         displayCV(userData);
         console.log(userData);
         }
         
         function previewImage(){
         let oFReader = new FileReader();
         oFReader.readAsDataURL(imageElem.files[0]);
         oFReader.onload = function(ofEvent){
             imageDsp.src = ofEvent.target.result;
         }
         }
         
         // print CV
         function printCV(){
         window.print();
         }
      </script>
   </body>
</html>