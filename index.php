<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paws-Connect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<script>
    function toggleCheckbox() {
      // Get the checkbox element
      var checkbox = document.getElementById("check");

      // Toggle the checkbox
      checkbox.checked = !checkbox.checked;
    }
    </script>
<body>
<form method="POST">
  <nav>
      <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
          <i class="fa-solid fa-bars"></i>  
        </label>
      <label class="logo">Paws-Connect</label>
      <ul>
          <li><a href="#home"  onclick="toggleCheckbox();">Home</a></li>
          <li><a href="#about"  onclick="toggleCheckbox();">About</a></li>
          <li><a href="#service"  onclick="toggleCheckbox();">Service</a></li>
          <li><a href="#contact"  onclick="toggleCheckbox();">Contact</a></li>
          <li><a href="signup.html">Sign Up</a></li>
          <li><a href="#" data-bs-toggle="modal" data-bs-target="#loginmod" id="li">Log-in</a></li>
      </ul>
  </nav>
 
<div class="container-fluid">
  <!-- Modal login-->
  <div class="modal fade" id="loginmod" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header border-0">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-start">
        <h1 class="modal-title text-center p-2" id="staticBackdropLabel">Login</h1>
       
          <div class="px-4">
            <div class="form-floating mb-3">
            <input type="text" class="form-control border-0 border-bottom border-5 rounded-0" name="un" id="emaillog" placeholder="name@example.com" required>
            <label for="email">Username</label>
            </div>
            <div class="form-floating">
            <input type="password" class="form-control border-0 border-bottom border-5 rounded-0" name="pw" id="passwordlog" placeholder="Password" required>
            <label for="contact">Password</label>
            </div>
          </div>
          
        </div>
        <div class="modal-footer border-0 d-flex justify-content-center pb-4">
          <button type="submit" name="login" class="btn btn-primary rounded-pill px-5"><i class="fa-solid fa-right-to-bracket"></i> Login</button>
        </div>
      </div>
    </div>
  </div> 
 
 
              <section id="home">
                <div class="bg-home">
                </div>
                
                
                <!-- <img src="images/bghome.jpg" alt="..." class="homebg"> -->
                  <div class="hometext mb-3">
                    <h1 class="fw-bold mb-4">Welcome to Paws-Connect!</h1>
                    <h3 class="fw-bold">Take yours</h3>
                    <h3 class="fw-bold">new best friend</h3>
                    <span>Start your journey towards unconditional love today!</span>
                  </div>
                    <div class="service-content">
                      <div class="row d-flex justify-content-center mx-2">
                        <div class="col-md-3">
                          <div class="p-1">
                          <div class="card card-home text-center p-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <div class="card-body">
                              <h1 class="card-title"><i class="fa-solid fa-cat"></i></h1>
                              <p>Cat adoption</p>
                            </div>
                          </div>
                        </div>
                        </div>
                        <div class="col-md-3">
                          <div class="p-1">
                          <div class="card card-home text-center p-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <div class="card-body">
                              <h1 class="card-title"><i class="fa-solid fa-dog"></i></h1>
                              <p>Dog adoption</p>
                            </div>
                          </div>
                        </div>
                        </div>
                        <div class="col-md-3">
                          <div class="p-1">
                          <div class="card card-home text-center p-2">
                            <a href="#faq">
                            <div class="card-body">
                              <h1 class="card-title"><i class="fa-regular fa-circle-question"></i></h1>
                              <p>FAQ! Need Help?</p>
                            </div>
                            </a>
                          </div>
                        </div>
                        </div>
                        <div class="col-md-3">
                          <div class="p-1">
                          <div class="card card-home text-center p-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <div class="card-body">
                              <h1 class="card-title"><i class="fa-solid fa-hand-holding-heart"></i></h1>
                              <p>Donate</p>
                            </div>
                          </div>
                        </div>
                        </div>
                      </div>
                  </div>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                  <path fill="#FC4100" fill-opacity="1" d="M0,160L48,181.3C96,203,192,245,288,250.7C384,256,480,224,576,181.3C672,139,768,85,864,101.3C960,117,1056,203,1152,202.7C1248,203,1344,117,1392,74.7L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                  </svg>
              </section>

                <section id="service">
                <svg class="up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#FC4100" fill-opacity="1" d="M0,256L60,261.3C120,267,240,277,360,240C480,203,600,117,720,117.3C840,117,960,203,1080,229.3C1200,256,1320,224,1380,208L1440,192L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path>
              </svg>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                  <path fill="#FC4100" fill-opacity="1" d="M0,160L48,181.3C96,203,192,245,288,250.7C384,256,480,224,576,181.3C672,139,768,85,864,101.3C960,117,1056,203,1152,202.7C1248,203,1344,117,1392,74.7L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                  </svg>
                  <div class="reveal">
                  
                  <h1 class="h1-bg">Available Pets</h1>
                  <div class="container">
                    <div class="row d-flex justify-content-center">
                      <div class="col-md-3 pet-card bg-danger rounded m-2" data-bs-toggle="modal"  data-bs-target="#pet-info"></div>
                      <div class="col-md-3 pet-card-d bg-danger rounded m-2" data-bs-toggle="modal" data-bs-target="#pet-info"></div>
                      <div class="col-md-3 pet-card bg-danger rounded m-2" data-bs-toggle="modal" data-bs-target="#pet-info"></div>
                    </div>
                    <div class="row d-flex justify-content-center">
                      <div class="col-md-3 pet-card-d bg-danger rounded m-2" data-bs-toggle="modal" data-bs-target="#pet-info"></div>
                      <div class="col-md-3 pet-card bg-danger rounded m-2" data-bs-toggle="modal" data-bs-target="#pet-info"></div>
                      <div class="col-md-3 pet-card-d bg-danger rounded m-2" data-bs-toggle="modal" data-bs-target="#pet-info"></div>
                      
                    </div>
                    </div>
                    
                  </div>
                  
                  </section>
                  
                  
                   <!-- Modal pet-info-->
              <div class="modal fade" id="pet-info" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h2>Planning to Adopt a Pet?</h2>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <img src="images/cat.jpg" alt="" width="100%">
                      <p>Ditto</p>
                      <p>pusa pusa pusa pusa pusa pusapusa pusa pusapusa pusa pusapusa pusa pusapusa pusa pusa</p>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-dark text-white" type="button">Register</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
                
              

              <section id="about" style=" min-height:100vh; height: auto !important;">
              <svg class="up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#FC4100" fill-opacity="1" d="M0,256L60,261.3C120,267,240,277,360,240C480,203,600,117,720,117.3C840,117,960,203,1080,229.3C1200,256,1320,224,1380,208L1440,192L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path>
              </svg>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                  <path fill="#FC4100" fill-opacity="1" d="M0,160L48,181.3C96,203,192,245,288,250.7C384,256,480,224,576,181.3C672,139,768,85,864,101.3C960,117,1056,203,1152,202.7C1248,203,1344,117,1392,74.7L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                  </svg>
                <div class="reveal">
                <h1 class="aboutus h1-bg">About us</h1>
                <div class="container about-con">
                  <div class="row">
                  <div class="col-md-4 mb-5">
                    <div class="about-text">
                      <div class="about-text-center"> 
                        <div class="about-text-title">Join Paws-Connect:</div> Your ultimate destination for pet adoption! Discover a diverse range of lovable animals waiting to find their forever homes. Every adoption through Paws-Connect not only changes a life but enriches yours too. Start your journey to unconditional love today!
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 mb-5">
                    <div class="about-text">
                      <div class="about-text-center">
                        <div class="about-text-title">Why Choose Paws-Connect:</div> At Paws-Connect, we're more than just a pet adoption platform; we're a community dedicated to creating happy tails. With our user-friendly interface and comprehensive listings, finding your perfect furry companion is easier than ever. Join us in our mission to connect animals in need with loving families, one adoption at a time.
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 mb-5">
                    <div class="about-text">
                      <div class="about-text-center">
                        <div class="about-text-title">Making a Difference:</div> When you choose Paws-Connect, you're not just adopting a pet—you're making a difference in the lives of animals everywhere. With each adoption, you're giving a deserving animal a second chance and opening your heart and home to a new family member. Experience the joy of adoption with Paws-Connect today!
                      </div>
                    </div>
                  </div>
                </div>
                </div>
                </div>
              </section>


              <!-- Modal -->
              <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h2>Planning to Adopt a Pet?</h2>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <p class="p-2"><i class="fa-solid fa-arrow-down"></i> Fill up the form bellow <i class="fa-solid fa-arrow-down"></i></p>
                      <form>
                      <div class="border border-3 text-start p-3 bg-secondary text-white overflow-auto h-75">
                        <label for="">First Name:</label>
                        <input type="text" class="form-control form-control-sm mb-3">
                        <label for="">Last Name:</label>
                        <input type="text" class="form-control form-control-sm mb-3">
                        <label for="">Address:</label>
                        <input type="text" class="form-control form-control-sm mb-3">
                        <label for="">Email:</label>
                        <input type="text" class="form-control form-control-sm mb-3">
                        <label for="">Contact:</label>
                        <input type="text" class="form-control form-control-sm mb-3">
                        <label for="">Age:</label>
                        <input type="text" class="form-control mb-3">
                  </div>
                </form>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-dark text-white" type="button">Register</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>

             


              <section id="adoption-process">
              <svg class="up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#FC4100" fill-opacity="1" d="M0,256L60,261.3C120,267,240,277,360,240C480,203,600,117,720,117.3C840,117,960,203,1080,229.3C1200,256,1320,224,1380,208L1440,192L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path>
              </svg>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                  <path fill="#FC4100" fill-opacity="1" d="M0,160L48,181.3C96,203,192,245,288,250.7C384,256,480,224,576,181.3C672,139,768,85,864,101.3C960,117,1056,203,1152,202.7C1248,203,1344,117,1392,74.7L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                  </svg>
                <h1 class="h1-bg">How to Adopt from Paws-Connect?</h1>
                <h3>Paws-Connect Adoption Process</h3>
                <div class="row d-flex justify-content-center ">
                  
                  <div class="col-md-5 text-start ">
                    <div class="ap-num">1. Fill Out Adoption Form:</div>
                    <div class="ap-des">Complete the online form with your details and preferences.</div>
                    <div class="ap-num">2. Find a Pet:</div>
                    <div class="ap-des">Browse and filter available pets to find your match.</div>
                    <div class="ap-num">3. Request to Adopt:</div>
                    <div class="ap-des">Submit an adoption request for your chosen pet.</div>
                    <div class="ap-num">4. Communicate with Finder:</div>
                    <div class="ap-des">Chat with the finder to discuss details and arrange a meeting.</div>
                    <div class="ap-num">5. Receive Your Pet:</div>
                    <div class="ap-des">Finalize the adoption and bring your new pet home!</div>
                  </div>
                  <div class="col-md-5 form-ap"></div>
                </div>
                
              </section>

              <section id="faq">
              <svg class="up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#FC4100" fill-opacity="1" d="M0,256L60,261.3C120,267,240,277,360,240C480,203,600,117,720,117.3C840,117,960,203,1080,229.3C1200,256,1320,224,1380,208L1440,192L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path>
              </svg>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                  <path fill="#FC4100" fill-opacity="1" d="M0,160L48,181.3C96,203,192,245,288,250.7C384,256,480,224,576,181.3C672,139,768,85,864,101.3C960,117,1056,203,1152,202.7C1248,203,1344,117,1392,74.7L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                  </svg>
                <h1 class="h1-bg">FAQs</h1>
                <p>Got Questions? We've got answers.</p>
                <div class="container">
                  <div class="row justify-content-center">
                    <div class="col-md-8 text-start">
                      <h3>General Questions</h3>
                      <p class="fw-bold p-3 faq-q">Q: What is Paws-Connect? </p>
                      <p class="p-3 faq-a">A: Paws-Connect is a platform designed to help connect found pets with their rightful owners and facilitate the adoption of pets needing new homes.</p>
                      
                      <p class="fw-bold p-3 faq-q">Q: How do I sign up? </p>
                      <p class="p-3 faq-a">A: To sign up, click on the 'Sign Up' button on the homepage and fill in the required details.</p>
                      
                      <h3 class="pt-3">For Finders</h3>
                      
                      <p class="fw-bold p-3 faq-q">Q: How do I post about a found pet? </p>
                      <p class="p-3 faq-a">A: To post about a found pet, log in to your account, navigate to the 'Post a Found Pet' section, and fill in the details about the pet. Make sure to include a clear photo and as much information as possible.</p>
                      
                      <p class="fw-bold p-3 faq-q">Q: What information should I include in a found pet post?</p>
                      <p class="p-3 faq-a">A: Include a clear photo of the pet, its description (such as breed, color, age), where and when it was found, and any distinguishing features. The more details you provide, the easier it will be for the owner to identify their pet.</p>
                      
                      <h3 class="pt-3">For Adopters</h3>

                      <p class="fw-bold p-3 faq-q">Q: How do I search for pets available for adoption?</p>
                      <p class="p-3 faq-a">A: To search for pets available for adoption, go to the 'Adopt a Pet' section and use the search filters to find pets that match your preferences (e.g., species, breed, age, location).</p>

                      <p class="fw-bold p-3 faq-q">Q: How do I apply to adopt a pet?</p>
                      <p class="p-3 faq-a">A: To apply to adopt a pet, click on the pet's profile and select 'Apply for Adoption.' Fill in the adoption application form and submit it. The finder or admin will review your application and contact you with the next steps.</p>

                    </div>
                  </div>
                </div>
              </section>
              
        <section id="contact">
        <svg class="up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
          <path fill="#FC4100" fill-opacity="1" d="M0,256L60,261.3C120,267,240,277,360,240C480,203,600,117,720,117.3C840,117,960,203,1080,229.3C1200,256,1320,224,1380,208L1440,192L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path>
        </svg>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#FC4100" fill-opacity="1" d="M0,160L48,181.3C96,203,192,245,288,250.7C384,256,480,224,576,181.3C672,139,768,85,864,101.3C960,117,1056,203,1152,202.7C1248,203,1344,117,1392,74.7L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>

            <h1 class="h1-bg">Message Us!</h1>
            <div class="card text-center border-0 mu-card">
            <div class="card-body">
              <div class="row">
                  <div class="col-md-6">
                   <div class="card mb-3">
                      <div class="card-body">
                          <img src="images/contact.jpeg" alt="" width="50%">
                      </div>
                   </div>
                  </div>
                  <div class="col-md-6">
                      <form id="contactform">
                      <div class="form-floating mb-3">
                      <input type="email" class="form-control" id="email1" placeholder="name@example.com" autocomplete="off">
                      <label for="email1">Email</label>
                      </div>
                      <div class="form-floating mb-3">
                      <input type="number" class="form-control" id="contact1" maxlength="11" placeholder="contact">
                      <label for="contact1">Contact</label>
                      </div>
                      <div class="form-floating mb-3">
                      <textarea class="form-control" placeholder="Leave a comment here" id="comment" style="height: 100px"></textarea>
                      <label for="comment">Comments</label>
                      </div>
                      </form>
                      <button type="button" id="sendmsg" class="btn btn-success w-100 rounded-pill p-3">Send Message</button>
                    </div>
                  </div>
                </div>
                
              </section>
  
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
            <h3>About Us</h3>
            <p>Paws-Connect aims to streamline the pet adoption process, promote responsible pet ownership, and provide a platform for pets in need to find loving homes.</p>
        </div>
        <div class="col-md-4">
            <h3>Contact Us</h3>
            <p>Email: Paws-Connectofficial@gmail.com</p>
            <p>Phone: +63 9384221257</p>
            <p>Address: Sitio Bayante, Pinagtung-ulan, San Jose, Batangas</p>
        </div>
        <div class="col-md-4">
            <h3>Follow Us</h3>
            <ul class="social-icons">
                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
            </ul>
        </div>
        </div>
    </div>
      <div class="copyright">
            <p>&copy; 2024 Paws-Connect. All Rights Reserved.</p>
        </div>
        </footer>
        </div>
    </div>
    <script type="text/javascript">
      window.addEventListener('scroll', reveal);

      function reveal(){
        var reveals = document.querySelectorAll('.reveal');

        for(var i = 0; i < reveals.length; i++){

          var windowheight = window.innerHeight;
          var revealtop = reveals[i].getBoundingClientRect().top;
          var revealpoint = 130;

          if(revealtop < windowheight - revealpoint){
            reveals[i].classList.add('active');
          }
          else{
            reveals[i].classList.remove('active');
          }
        }
      }

      window.addEventListener("scroll", function(){
         var header = document.querySelector("nav");
         header.classList.toggle("sticky", window.scrollY > 0);
      })
      
    </script>
    <!-- <script type="module">
        
          // Import the functions you need from the SDKs you need
          import { initializeApp } from "https://www.gstatic.com/firebasejs/10.10.0/firebase-app.js";
          import { getDatabase, ref, update, set, get, child } from "https://www.gstatic.com/firebasejs/10.10.0/firebase-database.js";
          import { getAuth, signInWithEmailAndPassword, setPersistence, browserLocalPersistence, onAuthStateChanged} from "https://www.gstatic.com/firebasejs/10.10.0/firebase-auth.js";
          // TODO: Add SDKs for Firebase products that you want to use
          // https://firebase.google.com/docs/web/setup#available-libraries

          // Your web app's Firebase configuration
          // For Firebase JS SDK v7.20.0 and later, measurementId is optional
          const firebaseConfig = {
            apiKey: "AIzaSyDIKgIRcoTWgWKocJ-sSI1J5uN44My0rhc",
            authDomain: "petbook-69b1e.firebaseapp.com",
            databaseURL: "https://petbook-69b1e-default-rtdb.asia-southeast1.firebasedatabase.app",
            projectId: "petbook-69b1e",
            storageBucket: "petbook-69b1e.appspot.com",
            messagingSenderId: "287346842196",
            appId: "1:287346842196:web:bf0783523ca3880fd32bc1",
            measurementId: "G-CDQD87KGXE"
          };

          // Initialize Firebase
          const app = initializeApp(firebaseConfig);
          const db = getDatabase(app);
          const auth = getAuth();

          setPersistence(auth, browserLocalPersistence)
            .then(() => {
              // Existing and future Auth states are now persisted in the current
              // session only. Closing the window would clear any existing state even
              // if a user forgets to sign out.
              // ...
              // New sign-in will be persisted with session persistence.
              console.log("Session persistence enabled successfully");
            })
            .catch((error) => {
              console.error("Error enabling persistence:", error);          
            });

            let redirectAfterSignUp = true; // Flag to control redirection after sign up
             
            // Set up onAuthStateChanged event listener
            onAuthStateChanged(auth, (user) => {
                if (user) {
                    // User is signed in
                    if (user.uid == "A69gRKhnmOfhMy72QPaQXWoXVMB3") {
                        window.location.href = "adminhomepage.html";
                    } else {
                        window.location.href = "profile.html";
                    }
                } else {
                    // No user is signed in
                    console.log("No user is signed in");
                }
            });

      //     signup.addEventListener('click', (e) => {
      //     e.preventDefault(); // Prevent default form submission behavior
      //     var email = document.getElementById('email').value;
      //     var password = document.getElementById('password').value;
      //     var confirmpassword = document.getElementById('confpassword').value;
      //     if (password === confirmpassword) {
      //         createUserWithEmailAndPassword(auth, email, password)
      //             .then((userCredential) => {
      //                 const user = userCredential.user;
      //                 set(ref(db, 'signup/' + user.uid), {
      //                     firstname: document.getElementById("firstname").value,
      //                     lastname: document.getElementById("lastname").value,
      //                     email: email,
      //                     password: password,
      //                     confirmpassword: confirmpassword
      //                 }).then(() => {
      //                     document.getElementById("signupform").reset();
      //                     alert("Sign up success!");
      //                     suclose.click();
      //                     li.click();
      //                 }).catch((error) => {
      //                     console.error("Error saving user data:", error);
      //                     alert("Error saving user data");
      //                 });
      //             })
      //             .catch((error) => {
      //                 const errorCode = error.code;
      //                 const errorMessage = error.message;
      //                 alert(errorMessage);
      //             });
      //     } else {
      //         alert("Passwords do not match!");
      //     }
      // });

          login.addEventListener('click', (e) => {

            var email = document.getElementById('emaillog').value;
            var password = document.getElementById('passwordlog').value;
            signInWithEmailAndPassword(auth, email, password)
            .then((userCredential) => {
              // Signed in 
              const user = userCredential.user;
              const dt = new Date();
              if( user.uid === "A69gRKhnmOfhMy72QPaQXWoXVMB3"){
                update(ref(db, 'signup/' + user.uid),
                {
                    last_login: dt.toString()
                });
                  alert("Login Success");
                  window.location.href = "adminhomepage.html";
              }
              else{
                update(ref(db, 'signup/' + user.uid),
                {
                    last_login: dt.toString()
                });
                  alert("Login Success");
                  window.location.href = "profile.html";
              }
          })
            .catch((error) => {
              const errorCode = error.code;
              const errorMessage = error.message;

              alert(errorMessage);
            });

          })


          document.getElementById("sendmsg").addEventListener('click', (e) => {
            e.preventDefault(); // Prevent default form submission behavior
              set(ref(db, 'contact/' + document.getElementById("contact1").value),
              {
                  email: document.getElementById("email1").value,
                  contact: document.getElementById("contact1").value,
                  comment: document.getElementById("comment").value
              })
              .catch((error) => {
              const errorCode = error.code;
              const errorMessage = error.message;

              alert(errorMessage);
            });

              document.getElementById("contactform").reset()
              alert("Message Sent!");
          })

            
    </script> -->
    </form>  
  </body>
  
    </html>

<?php
include_once 'Class/User.php';
if(isset($_POST['login'])){
    $un = $_POST['un'];
    $pw = $_POST['pw'];
    $u = new User();
    $data = $u->login($un, $pw);
    if($row=$data->fetch_assoc()){
        if($row['role']=='admin'){
            echo '
              <script>
                alert("ADMIN"); 
                window.location="adminhomepage.html";
              </script>  
            ';
        }
    }else{
        echo '
        <script>
          alert("WRONG PASSWORD"); 
          window.location="index.php";
        </script>  
      ';
    }
}
?>