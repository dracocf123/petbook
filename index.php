<?php session_start();
if (isset($_GET['message'])) {
  $success_message = $_GET['message'];
} else {
  $success_message = '';
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paws-Connect</title>
    <link rel="icon" type="image/jpg" href="images/logo.png">
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
      
      <label class="logo"><img src="images/logo.png" height="25px"> Paws-Connect</label>
      <ul>
          <li><a class="nav-l" href="#home"  onclick="toggleCheckbox();">Home</a></li>
          <li><a class="nav-l" href="#about"  onclick="toggleCheckbox();">About</a></li>
          <li><a class="nav-l" href="#service"  onclick="toggleCheckbox();">Service</a></li>
          <li><a class="nav-l" href="#contact"  onclick="toggleCheckbox();">Contact</a></li>
          <li><a class="nav-l" href="signuptry.php">Sign Up</a></li>
          <li><a class="nav-l" href="#" data-bs-toggle="modal" data-bs-target="#loginmod" id="li">Log-in</a></li>
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
          <br>
          <a href="email/forgot_password.php">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div> 
 
              <section id="home">
                
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
                          <div class="card card-home text-center p-2" data-bs-toggle="modal" data-bs-target="#modcat">
                            <div class="card-body">
                              <h1 class="card-title"><i class="fa-solid fa-cat"></i></h1>
                              <p>Cat adoption</p>
                            </div>
                          </div>
                        </div>
                        </div>
                        <div class="col-md-3">
                          <div class="p-1">
                          <div class="card card-home text-center p-2" data-bs-toggle="modal" data-bs-target="#moddog">
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
                            <a class="nav-l" href="#faq">
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
                          <div class="card card-home text-center p-2" data-bs-toggle="modal" data-bs-target="#moddonate">
                            <div class="card-body">
                              <h1 class="card-title"><i class="fa-solid fa-hand-holding-heart"></i></h1>
                              <p>Donate</p>
                            </div>
                          </div>
                        </div>
                        </div>
                      </div>
                  </div>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 319">
                  <path fill="#FC4100" fill-opacity="1" d="M0,160L48,181.3C96,203,192,245,288,250.7C384,256,480,224,576,181.3C672,139,768,85,864,101.3C960,117,1056,203,1152,202.7C1248,203,1344,117,1392,74.7L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                  </svg>
              </section>

                <section id="service">
                <svg class="up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 319">
                <path fill="#FC4100" fill-opacity="1" d="M0,256L60,261.3C120,267,240,277,360,240C480,203,600,117,720,117.3C840,117,960,203,1080,229.3C1200,256,1320,224,1380,208L1440,192L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path>
              </svg>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 319">
                  <path fill="#FC4100" fill-opacity="1" d="M0,160L48,181.3C96,203,192,245,288,250.7C384,256,480,224,576,181.3C672,139,768,85,864,101.3C960,117,1056,203,1152,202.7C1248,203,1344,117,1392,74.7L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                  </svg>
                  <div class="reveal">
                  
                  <h1 class="h1-bg">Available Pets</h1>

                  <div class="d-flex flex-column align-items-center petpage">
                     <div class="filter-container-css">
                      
                        <select id="filter-dropdown" class="align-self-center">
                              <option value="">All</option>
                              <option value="Cat">Cat</option>
                              <option value="Dog">Dog</option>
                              <!-- Add more filter options as needed -->
                        </select>
                        <div class="d-flex flex-wrap justify-content-center">
                        <input type="text" id="filter-input" class="m-1" placeholder="Search...">
                        <input type="text" id="breed-input" class="m-1" placeholder="Search by breed">
                        </div>
                        
                        <button id="apply-filter" class="align-self-center">Search</button>
                     </div>
                     
                     <div class="card-container-css" id="card-container">
                        <!-- Cards will be inserted here dynamically -->
                     </div>

                     <div class="pagination-css">
                        <button id="prev" onclick="prevPage()">Prev</button>
                        <span id="page-info"></span>
                        <button id="next" onclick="nextPage()">Next</button>
                     </div>
                     
                  </div>

                  </div>
                  </section>
                
              <section id="about" style=" min-height:100vh; height: auto !important;">
              <svg class="up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 319">
                <path fill="#FC4100" fill-opacity="1" d="M0,256L60,261.3C120,267,240,277,360,240C480,203,600,117,720,117.3C840,117,960,203,1080,229.3C1200,256,1320,224,1380,208L1440,192L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path>
              </svg>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 319">
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


              <!-- Modal for Cat-->
              <div class="modal fade" id="modcat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <p class="m-0">Planning to Adopt a Cat?</p>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="container">
                        <div class="row row-cols-2 g-2">
                      <?php
                        include_once 'Class/User.php';
                        $u = new User();
                        $ptype = "Cat"; 
                        $pets = $u->petdisplay($ptype);
                          while($row = $pets->fetch_assoc()){
                            if($row['pet_gender'] == 'Male' ){
                              $gicon = '<i class="fa-solid fa-mars text-primary"></i>';
                            }else{
                              $gicon = '<i class="fa-solid fa-venus text-danger"></i>';
                            }
                            echo '
                            <div class="col">
                              <div class="pet-card-link" onclick="openNewPageWithUrl(&quot;'.$row['pet_id'].'&quot;)">
                              <div class="pet-card">
                                <div class="gradient"></div>
                                <img src="images/'.$row['pet_image'].'" class="card-img-top" alt="..." height="230px">
                                <div class="bottom-left">'.$row['pet_name'].' '.$gicon.'</div>
                              </div>
                              </div>
                            </div>
                            ';
                          }
                      ?> 
                      </div>
                      
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-dark text-white" type="button">Register</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Modal for Dog-->
              <div class="modal fade" id="moddog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <p class="m-0">Planning to Adopt a dog?</p>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <div class="container">
                        <div class="row row-cols-2 g-2">
                      <?php
                      include_once 'Class/User.php';
                        $u = new User();
                        $ptype = "Dog"; 
                        $pets = $u->petdisplay($ptype);
                          while($row = $pets->fetch_assoc()){
                            if($row['pet_gender'] == 'Male' ){
                              $gicon = '<i class="fa-solid fa-mars text-primary"></i>';
                            }else{
                              $gicon = '<i class="fa-solid fa-venus text-danger"></i>';
                            }
                            echo '
                            <div class="col">
                              <div class="pet-card-link" onclick="openNewPageWithUrl(&quot;'.$row['pet_id'].'&quot;)">
                              <div class="pet-card">
                                <div class="gradient"></div>
                                <img src="images/'.$row['pet_image'].'" class="card-img-top" alt="..." height="230px">
                                <div class="bottom-left">'.$row['pet_name'].' '.$gicon.'</div>
                              </div>
                              </div>
                            </div>
                            ';
                          }
                      ?> 
                      </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-dark text-white" type="button">Register</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Modal for Donate-->
              <div class="modal fade" id="moddonate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5>Donate? Scan the Gcash QR Code</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                    <img src="images/Gcash-payment.jpg" height="400px" alt="">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>

              <section id="adoption-process">
              <svg class="up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 319">
                <path fill="#FC4100" fill-opacity="1" d="M0,256L60,261.3C120,267,240,277,360,240C480,203,600,117,720,117.3C840,117,960,203,1080,229.3C1200,256,1320,224,1380,208L1440,192L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path>
              </svg>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 319">
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
              <svg class="up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 319">
                <path fill="#FC4100" fill-opacity="1" d="M0,256L60,261.3C120,267,240,277,360,240C480,203,600,117,720,117.3C840,117,960,203,1080,229.3C1200,256,1320,224,1380,208L1440,192L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path>
              </svg>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 319">
                  <path fill="#FC4100" fill-opacity="1" d="M0,160L48,181.3C96,203,192,245,288,250.7C384,256,480,224,576,181.3C672,139,768,85,864,101.3C960,117,1056,203,1152,202.7C1248,203,1344,117,1392,74.7L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                  </svg>
                <h1 class="h1-bg">FAQs</h1>
                <p>Got Questions? We've got answers.</p>
                <div class="container">
                  <div class="row justify-content-center">
                    <div class="col-md-8 text-start">
                  <h4>General Questions</h4>
                  <div class="accordion-css">
                    <div class="accordion-item-css">
                        <button class="accordion-header-css d-flex justify-content-between">
                          <div>Q: What is Paws-Connect? </div>
                          <div class="accordion-plus-btn">+</div>
                        </button>
                        <div class="accordion-content-css">
                            <p>A: Paws-Connect is a platform designed to help connect found pets with their rightful owners and facilitate the adoption of pets needing new homes.</p>
                        </div>
                    </div>
                    <div class="accordion-item-css">
                        <button class="accordion-header-css d-flex justify-content-between">
                          <div>Q: How do I sign up? </div>
                          <div class="accordion-plus-btn">+</div>
                        </button>
                        <div class="accordion-content-css">
                            <p>A: To sign up, click on the 'Sign Up' button on the homepage and fill in the required details.</p>
                        </div>
                    </div>
                  </div>
                  <h4 class="pt-3">For Finders</h4>
                  <div class="accordion-css">
                    <div class="accordion-item-css">
                        <button class="accordion-header-css d-flex justify-content-between">
                          <div>Q: How do I post about a found pet? </div>
                          <div class="accordion-plus-btn">+</div>
                        </button>
                        <div class="accordion-content-css">
                            <p>A: To post about a found pet, log in to your account, navigate to the 'Post Pet' section, and fill in the details about the pet. Make sure to include a clear photo and as much information as possible.</p>
                        </div>
                    </div>
                    <div class="accordion-item-css">
                        <button class="accordion-header-css d-flex justify-content-between">
                          <div>Q: What information should I include in a found pet post?</div>
                          <div class="accordion-plus-btn">+</div>
                        </button>
                        <div class="accordion-content-css">
                            <p>A: Include a clear photo of the pet, its description (such as breed), where and when it was found, and any distinguishing features. The more details you provide, the easier it will be for the owner to identify their pet.</p>
                        </div>
                    </div>
                  </div>
                  <h4 class="pt-3">For Adopters</h4>
                  <div class="accordion-css">
                    <div class="accordion-item-css">
                        <button class="accordion-header-css d-flex justify-content-between">
                          <div>Q: How do I search for pets available for adoption?</div>
                          <div class="accordion-plus-btn">+</div>
                        </button>
                        <div class="accordion-content-css">
                            <p>A: To search for pets available for adoption, go to the 'Adopt a Pet' section and use the search filters to find pets that match your preferences (e.g., species, breed, location).</p>
                        </div>
                    </div>
                    <div class="accordion-item-css">
                        <button class="accordion-header-css d-flex justify-content-between">
                          <div>Q: How do I apply to adopt a pet?</div>
                          <div class="accordion-plus-btn">+</div>
                        </button>
                        <div class="accordion-content-css">
                            <p>A: To apply to adopt a pet, click on the pet's profile and select 'Apply for Adoption.' Fill in the adoption application form and submit it. The finder or admin will review your application and contact you with the next steps.</p>
                        </div>
                    </div>
                  </div>
                      
                    </div>
                  </div>
                </div>
              </section>
              </form>  

        <section id="contact">
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
                    <form method="POST">
                      <div class="form-floating mb-3">
                      <input type="email" name="em" class="form-control" id="email1" placeholder="name@example.com" autocomplete="off">
                      <label for="email1">Email</label>
                      </div>
                      <div class="form-floating mb-3">
                      <input type="number" name="cn" class="form-control"  placeholder="contact">
                      <label for="contact1">Contact</label>
                      </div>
                      <div class="form-floating mb-3">
                      <textarea class="form-control" name="mess" placeholder="Leave a comment here" id="comment" style="height: 100px"></textarea>
                      <label for="comment">Comments</label>
                      </div>
                      <button type="submit" name="sendmess" class="btn btn-success w-100 rounded-pill p-3">Send Message</button>
                    </form> 
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
      const cardContainer = document.getElementById('card-container');
      const pageInfo = document.getElementById('page-info');
      const prevButton = document.getElementById('prev');
      const nextButton = document.getElementById('next');
      const filterDropdown = document.getElementById('filter-dropdown');
      const filterInput = document.getElementById('filter-input');
      const breedInput = document.getElementById('breed-input');
      const applyFilterButton = document.getElementById('apply-filter');

    let cards = [];
    let filteredCards = [];
    const cardsPerPage = 8;
    let currentPage = 1;

    function fetchCards() {
        fetch('paginationdata.php')
            .then(response => response.json())
            .then(data => {
                cards = data;
                filteredCards = cards; // Initialize filteredCards with all cards
                renderCards();
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    function applyFilter() {
        const selectedFilter = filterDropdown.value;
        const searchText = filterInput.value.toLowerCase();
        const breedSearchText = breedInput.value.toLowerCase();

        filteredCards = cards.filter(card => {
            const matchesType = selectedFilter === '' || card.type === selectedFilter;
            const matchesSearch = card.name.toLowerCase().includes(searchText);
            const matchesBreed = card.breed.toLowerCase().includes(breedSearchText);
            return matchesType && matchesSearch && matchesBreed;
        });

        currentPage = 1; // Reset to first page when applying filter
        animateCards();
    }

    function animateCards() {
        // Add class to fade out old cards
        const existingCards = document.querySelectorAll('.card-css');
        existingCards.forEach(card => {
            card.classList.remove('show');
            card.classList.add('fade-out');
        });

        // Wait for fade-out to complete before rendering new cards
        setTimeout(() => {
            renderCards(); // Render new cards
        }, 500); // Match this duration with CSS fade-out duration

        // Remove fade-out class after the animation
        setTimeout(() => {
            const cardsToShow = cardContainer.querySelectorAll('.card-css');
            cardsToShow.forEach(card => {
                card.classList.remove('fade-out');
            });
        }, 1000); // Allow time for cards to fade in
    }

    function renderCards() {
        cardContainer.innerHTML = ''; // Clear container

        const start = (currentPage - 1) * cardsPerPage;
        const end = start + cardsPerPage;
        const cardsToShow = filteredCards.slice(start, end);

        cardsToShow.forEach(cardData => {
            const card = document.createElement('div');
            const cardimg = document.createElement('img');
            card.className = 'card-css show'; // Add 'show' class to make it visible
            cardimg.src = cardData.petimage;
            cardimg.className = 'cardimg';
            card.appendChild(cardimg);
            cardContainer.appendChild(card);

            card.onclick = () => {
                openNewPageWithUrl(cardData.petid);
            };
        });

        updatePagination();
    }

    function openNewPageWithUrl(petid) {
        const newPageUrl = `petview.php?pet_id=${encodeURIComponent(petid)}`;
        window.open(newPageUrl, '_blank');
    }

    function updatePagination() {
        const totalPages = Math.ceil(filteredCards.length / cardsPerPage);
        pageInfo.textContent = `Page ${currentPage} of ${totalPages}`;
        prevButton.disabled = currentPage === 1;
        nextButton.disabled = currentPage === totalPages;
    }

    function nextPage() {
        if (currentPage < Math.ceil(filteredCards.length / cardsPerPage)) {
            currentPage++;
            animateCards();
        }
    }

    function prevPage() {
        if (currentPage > 1) {
            currentPage--;
            animateCards();
        }
    }

    // Add event listeners
    filterDropdown.addEventListener('change', applyFilter);
    filterInput.addEventListener('input', applyFilter);
    breedInput.addEventListener('input', applyFilter);
    applyFilterButton.addEventListener('click', applyFilter);

    document.addEventListener('DOMContentLoaded', fetchCards);


      function petview(pid){
        window.open("petview.php?pet_id="+pid,"_new");
      }

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

      document.addEventListener('DOMContentLoaded', function() {
        var acc = document.querySelectorAll('.accordion-header-css');

        acc.forEach(function(header) {
            header.addEventListener('click', function() {
                var content = this.nextElementSibling;

                // Close all other accordion items
                var allContents = document.querySelectorAll('.accordion-content-css');
                allContents.forEach(function(item) {
                    if (item !== content) {
                        item.style.maxHeight = null;
                    }
                });

                // Toggle the current accordion item
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                } else {
                    content.style.maxHeight = content.scrollHeight + 'px';
                }
            });
        });
      });
      
    </script>
 
  </body>
  
    </html>

<?php

if(isset($_POST['login'])){
  $un = $_POST['un'];
  $pw = $_POST['pw'];
  $data = $u->login($un, $pw);    
    if($row = $data->fetch_assoc()){
      $_SESSION['role'] = $row['role'];
      $_SESSION['id_num'] = $row['id_number'];
      $_SESSION['rc'] = $row['request_count'];
        if($row['role']=='user'){
          echo '
            <script>
              window.location="User/home.php";
            </script>  
          ';
    }else{
        echo '
        <script>
          alert("iNVALID ACCOUNT"); 
          window.location="index.php";
        </script>  
      ';
    }
  }else{
    echo '
    <script>
      alert("WRONG PASSWORD or USERNAME"); 
      window.location="index.php";
    </script>  
  ';
}
}else if(isset($_POST['sendmess'])){
  $em = $_POST['em'];
  $cn = $_POST['cn'];
  $mess = $_POST['mess'];
    echo '
        <script>
          alert("'.$sendfeedback = $u->contactus($em, $cn, $mess).'");  
        </script>  
      ';
}
?>