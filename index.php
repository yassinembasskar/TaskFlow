<?php
include 'config.php'
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    
    <title>TaskFlow by Othmane</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-seo-dream.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    
    <style>
      body {
  margin: 0;
  padding: 10;
  font-family: Arial, sans-serif;
}

.content {
  /* Set appropriate styles for your webpage content */
  min-height: 80vh; /* Adjust to leave space for the footer */
  padding: 10px;
}

footer {
  background-color: #99ffeb;
  color: #99ffeb;
  padding: 20px;
  width: 100%;
}

.footer-content {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}

.contact,
.taskflow-description {
 
}

h3 {
  color: #0066ff;
  font-size: 18px;
  margin-bottom: 10px;
}

p {
  color: Black;
  
}

    </style>
<!--

TemplateMo 563 SEO Dream

https://templatemo.com/tm-563-seo-dream

-->

</head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.html" class="logo">
              <h4>TaskFlow<img src="assets/images/logo-icon.png" alt=""></h4>
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
              <?php
                    if (isset($_SESSION['username'])) {
                        echo '<li class="scroll-to-section"><a href="logout.php">Log Out</a></li>';
                    } else {
                        echo '<li class="scroll-to-section"><a href="login.php">Log In</a></li>';
                        echo '<li class="scroll-to-section"><a href="signup.php">Sign Up</a></li>';
                    }
                ?>
              
              <li class="scroll-to-section"><div class="main-blue-button"><a href="taskmanager">Start managing your tasks</a></div></li> 
            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <div class="row">
                  
                  <div class="col-lg-12">
                    <h2>Helping users to manage their tasks efficiently</h2>
                  </div>
                  <div class="col-lg-12">
                    <div class="main-green-button scroll-to-section">
                      <a href="taskmanager">Get Started</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="assets/images/intro2.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow - Task Management Web Application</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>TaskFlow - Task Management Web Application</h1>
        </header>
        <br></br>
        <main>
            <section class="about">
                <h2>Introduction:</h2>
                <br></br>
                <p>TaskFlow est une application web conçue pour aider les utilisateurs à gérer efficacement leurs tâches et listes de choses à faire. Son objectif principal est de créer une plateforme conviviale et intuitive qui facilite l'organisation, la priorisation et le suivi des tâches. Grâce à des fonctionnalités telles que la création de tâches, le réglage des dates d'échéance, la catégorisation des tâches, la mise à jour de leur statut et les notifications, TaskFlow vise à améliorer la productivité en offrant une approche rationalisée et organisée de la gestion des tâches. Les utilisateurs peuvent ainsi créer facilement de nouvelles tâches, les regrouper dans des projets, définir des dates d'échéance, mettre à jour leur statut et prioriser leurs activités. Grâce aux notifications, les utilisateurs sont informés des dates d'échéance imminentes ou des mises à jour de leurs tâches, ce qui les aide à rester informés et à respecter les délais. En fin de compte, TaskFlow vise à améliorer l'efficacité et l'organisation de la gestion des tâches, permettant aux utilisateurs de se concentrer sur l'accomplissement de leurs objectifs de manière efficace et sans stress.</p>
            </section>
            
        </main>
       
    </div>
</body>
</html>


  
  <!-- <div id="contact" class="contact-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <form id="contact" action="" method="post">
            <div class="row">
              <div class="col-lg-6 offset-lg-3">
                <div class="section-heading">
                  <h6>Contact Us</h6>
                  <h2>Fill Out The Form Below To <span>Get</span> In <em>Touch</em> With Us</h2>
                </div>
              </div>
              <div class="col-lg-9">
                <div class="row">
                  <div class="col-lg-6">
                    <fieldset>
                      <input type="name" name="name" id="name" placeholder="Name" autocomplete="on" required>
                    </fieldset>
                  </div>
                  <div class="col-lg-6">
                    <fieldset>
                      <input type="surname" name="surname" id="surname" placeholder="Surname" autocomplete="on" required>
                    </fieldset>
                  </div>
                  <div class="col-lg-6">
                    <fieldset>
                      <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-6">
                    <fieldset>
                      <input type="subject" name="subject" id="subject" placeholder="Subject" autocomplete="on">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea name="message" type="text" class="form-control" id="message" placeholder="Message" required=""></textarea>  
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="main-button ">Send Message Now</button>
                    </fieldset>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="contact-info">
                  <ul>
                    <li>
                      <div class="icon">
                        <img src="assets/images/contact-icon-01.png" alt="email icon">
                      </div>
                      <a href="#">info@company.com</a>
                    </li>
                    <li>
                      <div class="icon">
                        <img src="assets/images/contact-icon-02.png" alt="phone">
                      </div>
                      <a href="#">+001-002-0034</a>
                    </li>
                    <li>
                      <div class="icon">
                        <img src="assets/images/contact-icon-03.png" alt="location">
                      </div>
                      <a href="#">26th Street, Digital Villa</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div> -->
  

  <footer>
    <div class="footer-content">
      <div class="contact">
        <h3>Contact Us:</h3>
        <p>Email: othmangam50@gmail.com</p>
        <p>Phone: +212 762483086</p>
      </div>
      <div class="taskflow-description">
        <h3>Task Flow</h3>
        <p>TaskFlow est une application web conçue pour aider les utilisateurs à gérer efficacement leurs tâches et listes de choses à faire.</p>
      </div>
    </div>
    <p>&copy; 2023 Othmane Gamghal.</p>
  </footer>


 
  <!-- Scripts -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/animation.js"></script>
  <script src="assets/js/imagesloaded.js"></script>
  <script src="assets/js/custom.js"></script>

</body>
</html>