{% load static %}

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Vorbestellen | My Reservation</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link href="assets/img/favicon.png" rel="icon"> -->
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{% static 'vendor/animate.css/animate.min.css' %}" rel="stylesheet">
  <link href="{% static 'vendor/bootstrap/css/bootstrap.min.css' %}" rel="stylesheet">
  <link href="{% static 'vendor/bootstrap-icons/bootstrap-icons.css' %}" rel="stylesheet">
  <link href="{% static 'vendor/boxicons/css/boxicons.min.css' %}" rel="stylesheet">
  <link href="{% static 'vendor/glightbox/css/glightbox.min.css' %}" rel="stylesheet">
  <link href="{% static 'vendor/remixicon/remixicon.css' %}" rel="stylesheet">
  <link href="{% static 'vendor/swiper/swiper-bundle.min.css' %}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{% static 'css/style.css' %}" rel="stylesheet">

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="{% url 'vorbestellenapp:index_view' %}">vor<span class="highlight">best</span>ellen<span class="highlight">.</span></a></h1>
      <!-- <h1 class="logo me-auto"><a href="index.html">vorbestellen.</a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="{% url 'vorbestellenapp:index_view' %}" class="active">Home</a></li>

          <li class="dropdown"><a href="#"><span>Info</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{% url 'vorbestellenapp:about_view' %}">About Us</a></li>
              <li><a href="{% url 'vorbestellenapp:contact_view' %}">Contact Us</a></li>
            </ul>
          </li>

          <!-- Services Nav -->
          <li class="dropdown"><a href="#"><span>Services</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{% url 'vorbestellenapp:vacantrooms_view' %}">Dashboard</a></li>
              <li class="dropdown"><a href="{% url 'vorbestellenapp:pricing_view' %}" class="#"><span>Prices & Rooms</span></a>
              </li>
            </ul>
          </li>
        
          <!-- If admin kay lahi ang dropdown sa service -->
          {% if current_user == 'admin' %}
            <li class="dropdown"><a href="#"><span>Manage</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="{% url 'vorbestellenapp:rooms_view' %}">Manage Rooms</a></li>
                <li><a href="{% url 'vorbestellenapp:managebookings_view' %}">Manage Bookings</a></li>
                <li><a href="{% url 'vorbestellenapp:manageusers_view' %}">Manage User</a></li>     
                </li>
              </ul>
            </li>
          {% endif %}
          <!-- end -->

        {% if current_user %}
        <li class="dropdown"><a href="#"><span>{{current_user}}</span> <i class="bi bi-chevron-down"></i></a>
        <ul>
          {% if current_user != 'admin' %}
            <li><a href="{% url 'vorbestellenapp:myreservations_view' %}">My Reservations</a></li>
            <li><a href="{% url 'vorbestellenapp:account_view' %}">Account Settings</a></li>
          {% endif %}
          <li><a href="{% url 'vorbestellenapp:logout' %}">Logout</a></li>
        </ul>
        
        {% else %}
        <li><a href="#" class="getstarted" data-toggle="modal" data-target="#exampleModalCenter">Login</a></li>
        </ul>
        {% endif %}
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>

    <!-- Error Message (when incorrect login) -->
    {% for message in messages %}
    <div id="errorDiv"style="margin: auto; width: 300px; border-radius: 5px; position: absolute;
              background-color: white; z-index: 1; transform: translate(158%, 128%);">
    <p class="{{ message.tags }}" 
      style="color: rgb(201, 44, 44); font-weight: bold; text-align: center;
             font-family: Raleway; margin-top: 10px; padding: 5px;">
      {% if 'login' in message.tags %}
        {{ message }}
      {% else %}
        {{ message }}
      {% endif %}
      </p></div>
    {% endfor %}
    <script type="text/javascript">
        var opacity=0;
        var intervalID=0;
        window.onload=fadeout;
        function fadeout(){
              setInterval(hide, 800);
        }
        function hide(){
          var body=document.getElementById("errorDiv");
          opacity =
          Number(window.getComputedStyle(body).getPropertyValue("opacity"))
          if(opacity>0){
                opacity=opacity-0.1;
                        body.style.opacity=opacity
          }
          else{
              clearInterval(intervalID); 
          }
        } 
    </script>
    <!-- End of Error Message -->

  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">

    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <div class="carousel-item active" style="background-image: url({% static 'img/slide/slide-2.jpg' %})" >
            <!-- start -->

            <div class="container">
                <br><br><br><br><br><br><br>
                <div class="row">
                    <div class="col-md-6" style="text-align: left;">
                        <h2 class="animate__animated animate__fadeInDown">Hey Buddy! Are you ready to party?</h2>
                        <p class="animate__animated animate__fadeInUp">Keep track and check if your reservation is ready anytime</p>
                        <a href="{% url 'vorbestellenapp:pricing_view' %}" class="btn-get-started animate__animated animate__fadeInUp scrollto">Back to Home</a>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
            </div>
          <!-- end -->

        </div>
        
    </div>
    
  </section>
  <!-- End Hero -->
  <div class="container" style="position: static; text-align: left;">
    <div class="card" style="border-radius: 5px; position: static; text-align: left;">
        <h5 class="card-header" style="padding: 25px;">Your Reservation</h5>
        <div class="card-body">
          <h5 class="card-title">Special title treatment</h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="btn btn-danger">Cancel Reservation</a>
        </div>
      </div>
  </div>
  

  <main id="main">


    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">
        <br><br><br><br>
        <div class="row">
          <div class="col-md-6">
            <div class="icon-box">
              <i class="bi bi-briefcase"></i>
              <h4><a href="#">Lorem Ipsum</a></h4>
              <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="bi bi-card-checklist"></i>
              <h4><a href="#">Dolor Sitema</a></h4>
              <p>Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="bi bi-bar-chart"></i>
              <h4><a href="#">Sed ut perspiciatis</a></h4>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="bi bi-binoculars"></i>
              <h4><a href="#">Nemo Enim</a></h4>
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="bi bi-brightness-high"></i>
              <h4><a href="#">Magni Dolore</a></h4>
              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="bi bi-calendar4-week"></i>
              <h4><a href="#">Eiusmod Tempor</a></h4>
              <p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" id="all-rooms">

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-typea">Alpha</li>
              <li data-filter=".filter-typeb">Bravo</li>
              <li data-filter=".filter-typec">Charlie</li>
              <li data-filter=".filter-typed">Delta</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">

          <div class="col-lg-4 col-md-6 portfolio-item filter-typea">
            <div class="portfolio-wrap">
              <img src="{% static 'img/portfolio/cfr-4.jpg' %}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Cfr 4</h4>
                <p>Alpha</p>
                <div class="portfolio-links">
                  <a href="{% static 'img/portfolio/cfr-4.jpg' %}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Cfr 4"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-typec">
            <div class="portfolio-wrap">
              <img src="{% static 'img/portfolio/cfr-13.jpg' %}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Cfr 13</h4>
                <p>Charlie</p>
                <div class="portfolio-links">
                  <a href="{% static 'img/portfolio/cfr-13.jpg' %}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Cfr 13"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <!-- <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/cfr-12.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Cfr 12</h4>
                <p>Bravo</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/cfr-12.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Cfr 12"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div> -->

          <div class="col-lg-4 col-md-6 portfolio-item filter-typea">
            <div class="portfolio-wrap">
              <img src="{% static 'img/portfolio/cfr-3.jpg' %}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Cfr 3</h4>
                <p>Alpha</p>
                <div class="portfolio-links">
                  <a href="{% static 'img/portfolio/cfr-3.jpg' %}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Cfr 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-typed">
            <div class="portfolio-wrap">
              <img src="{% static 'img/portfolio/cfr-7.jpg' %}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Cfr 7</h4>
                <p>Delta</p>
                <div class="portfolio-links">
                  <a href="{% static 'img/portfolio/cfr-7.jpg' %}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Cfr 7"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-typeb">
            <div class="portfolio-wrap">
              <img src="{% static 'img/portfolio/cfr-6.jpg' %}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Cfr 6</h4>
                <p>Bravo</p>
                <div class="portfolio-links">
                  <a href="{% static 'img/portfolio/cfr-6.jpg' %}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Cfr 6"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-typec">
            <div class="portfolio-wrap">
              <img src="{% static 'img/portfolio/cfr-10.jpg' %}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Cfr 10</h4>
                <p>Charlie</p>
                <div class="portfolio-links">
                  <a href="{% static 'img/portfolio/cfr-10.jpg' %}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Cfr 10"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-typed">
            <div class="portfolio-wrap">
              <img src="{% static 'img/portfolio/cfr-8.jpg' %}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Cfr 8</h4>
                <p>Delta</p>
                <div class="portfolio-links">
                  <a href="{% static 'img/portfolio/cfr-8.jpg' %}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Cfr 8"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-typea">
            <div class="portfolio-wrap">
              <img src="{% static 'img/portfolio/cfr-5.jpg' %}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Cfr 5</h4>
                <p>Alpha</p>
                <div class="portfolio-links">
                  <a href="{% static 'img/portfolio/cfr-5.jpg' %}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Cfr 5"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-typeb">
            <div class="portfolio-wrap">
              <img src="{% static 'img/portfolio/cfr-1.jpg' %}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Cfr 1</h4>
                <p>Bravo</p>
                <div class="portfolio-links">
                  <a href="{% static 'img/portfolio/cfr-1.jpg' %}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Cfr 1"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-typed">
            <div class="portfolio-wrap">
              <img src="{% static 'img/portfolio/cfr-9.jpg' %}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Cfr 9</h4>
                <p>Delta</p>
                <div class="portfolio-links">
                  <a href="{% static 'img/portfolio/cfr-9.jpg' %}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Cfr 9"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-typeb">
            <div class="portfolio-wrap">
              <img src="{% static 'img/portfolio/cfr-11.jpg' %}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Cfr 11</h4>
                <p>Bravo</p>
                <div class="portfolio-links">
                  <a href="{% static 'img/portfolio/cfr-11.jpg' %}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Cfr 11"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>



        </div>

      </div>
    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Vorbestellen</h3>
              <p>
                A108 Adam Street <br>
                NY 535022, USA<br><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Info</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Conference Rooms</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Reservations</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Project Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Vorbestellen</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/sailor-free-bootstrap-theme/ -->
        <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- MODAL -->
&ensp;

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-body p-4 p-md-5">
    <div class="icon d-flex align-items-center justify-content-center">
    <span class="ion-ios-person"></span>
    </div>
    <h3 class="text-center mb-4">Sign In</h3>
    <form id="form1" action="" method="POST" autocomplete="off" enctype="multipart/form-data" class="login-form">
      {% csrf_token %}
        <div class="form-group">
        <input type="text" class="form-control rounded-left" id="username" name="username" placeholder="Username">
        </div>
      <br>
        <div class="form-group d-flex">
        <input type="password" class="form-control rounded-left" id="password" name="password" placeholder="Password">
        </div>
      <div class="form-group">
        <br><br>
        <button type="submit" class="form-control btn btn-danger rounded submit px-3">Login</button>
      </div>
      <br>

        <div class="form-group d-md-flex">
            <div class="form-check w-50">
              <label class="custom-control fill-checkbox">
                <input type="checkbox" class="fill-control-input">
                <span class="fill-control-indicator"></span>
                <span class="fill-control-description">Remember Me</span>
              </label>
            </div>
              <div class="w-50 text-md-right">
              <a href="#">Forgot Password</a>
        </div>
      </div>
    </form>
  </div>

  <div class="modal-footer justify-content-center">
      <p>Not a member? <a href="{% url 'vorbestellenapp:signup_view' %}">Create an account</a></p>
</div>
</div>
</div>

</div>

<script>
  $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>

<!-- END MODAL -->

  <!-- Vendor JS Files -->
  <script src="{% static 'vendor/bootstrap/js/bootstrap.bundle.min.js' %}"></script>
  <script src="{% static 'vendor/glightbox/js/glightbox.min.js' %}"></script>
  <script src="{% static 'vendor/isotope-layout/isotope.pkgd.min.js' %}"></script>
  <script src="{% static 'vendor/swiper/swiper-bundle.min.js' %}"></script>
  <script src="{% static 'vendor/waypoints/noframework.waypoints.js' %}"></script>
  <script src="{% static 'vendor/php-email-form/validate.js' %}"></script>

  <!-- Template Main JS File -->
  <script src="{% static 'js/main.js' %}"></script>

</body>

</html>