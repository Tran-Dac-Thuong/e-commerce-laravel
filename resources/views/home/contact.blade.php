<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion Website</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <style>
          .discount_input{
            position: relative;
            text-transform: none !important;
         }
         .footer_input{
            outline: none;
            text-transform: none !important;
         }
         .dis_error{
            color: #f7444e !important;
         }
         .dis_error_2{
            color: #f7444e !important;
            margin-top: 10px !important;
            position: absolute;
            bottom: -5%;
         }
         .footer_dis_group{
            position: relative;
         }
         .btn-sub{
            outline: none !important;
         }
         .author-copy{
            color: #f7444e;
         }
         .input-contact{
            outline: none !important;
            text-transform: none !important;
         }
         .btn_submit{
            background-color: #131313;
            color: white;
            cursor: pointer;
            width: 100%;
            text-align: center;
            border: none;
            outline: none !important;
            border-radius: 3px;
            padding: 12px 0;
            font-weight: 600;
         }
         .btn_submit:hover{
            background-color: #f7444e;
            color: white;      
         }
         .form-group.invalid .input-contact {
            border-color: #f7444e;
         }

         .form-group.invalid .form-message {
            color: #f7444e;
         }
      </style>
   </head>
   <body class="sub_page">
      @include('sweetalert::alert')
      <div class="hero_area">
         <!-- header section strats -->
         <header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="{{route('index')}}"><img width="250" src="images/logo.png" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item">
                           <a class="nav-link" href="{{route('index')}}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                           <ul class="dropdown-menu">
                              <li><a href="{{route('about')}}">About</a></li>
                              <li><a href="{{route('testimonial')}}">Testimonial</a></li>
                           </ul>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{route('productPage')}}">Products</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{route('blog')}}">Blog</a>
                        </li>
                        <li class="nav-item active">
                           <a class="nav-link" href="{{route('contact')}}">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('showOrder')}}">Order</a>
                         </li>
                        @if (Route::has('login'))
                            @auth
                                
                            <li class="nav-item dropdown">                 
                                <a class="nav-link dropdown-toggle" id="user" href="" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="fa fa-user"></i></a>
                                <ul class="dropdown-menu">
                                <li><a href="{{route('logout')}}">Logout</a></li>
                                </ul>
                            </li>
                            
                            @else
                            
                            <li class="nav-item">
                                <a class="nav-link" id="login" href="{{route('login')}}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="register" href="{{route('register')}}">Register</a>
                            </li>

                            @endauth

                        @endif
                        <li class="nav-item row">
                           <a class="nav-link pr-2" href="{{route('showCart')}}">
                              <svg style="width: 28px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                                 <g>
                                    <g>
                                       <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                                          c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                                    </g>
                                 </g>
                                 <g>
                                    <g>
                                       <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                                          C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                                          c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                                          C457.728,97.71,450.56,86.958,439.296,84.91z" />
                                    </g>
                                 </g>
                                 <g>
                                    <g>
                                       <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                                          c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                                    </g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                              </svg>
                           </a>
                           @if (Route::has('login'))
                           @auth
                              <strong class="mt-1">({{$cart_count}})</strong>
                           @else
                              <strong class="mt-1"></strong>
                           @endauth
                          
                           @endif
                        </li>
                        {{-- <form class="form-inline">
                           <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                           <i class="fa fa-search" aria-hidden="true"></i>
                           </button>
                        </form> --}}
                     </ul>
                  </div>
               </nav>
            </div>
         </header>
         <!-- end header section -->
      </div>
      <!-- inner page section -->
      <section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>Contact us</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end inner page section -->
      <!-- why section -->
      <section class="why_section layout_padding">
         <div class="container">
         
            <div class="row">
               <div class="col-lg-8 offset-lg-2">
                  <div class="full">
                     <form action="" id="form-contact" method="POST">
                      
                           <div class="form-group">
                              <input type="text" class="input-contact" id="fullname" placeholder="Enter your full name" name="fullname"  />
                              <span class="form-message"></span>
                           </div>
                          <div class="form-group">
                           <input type="text" class="input-contact" id="email" placeholder="Enter your email address" name="email"  />
                           <span class="form-message"></span>
                          </div>
                          <div class="form-group">
                           <input type="text" class="input-contact" id="subject" placeholder="Enter subject" name="subject"  />
                           <span class="form-message"></span>
                          </div>
                          <div class="form-group">
                           <textarea class="input-contact" id="mess" name="mess" placeholder="Enter your message" ></textarea>
                           <span class="form-message"></span>
                          </div>

                           <button class="btn_submit">Submit</button>
                      
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end why section -->
      <!-- arrival section -->
      <section class="arrival_section">
         <div class="container">
            <div class="box">
               <div class="arrival_bg_box">
                  <img src="images/arrival-bg.png" alt="">
               </div>
               <div class="row">
                  <div class="col-md-6 ml-auto">
                     <div class="heading_container remove_line_bt">
                        <h2>
                           New Arrivals
                        </h2>
                     </div>
                     <p style="margin-top: 20px;margin-bottom: 30px;">
                        Vitae fugiat laboriosam officia perferendis provident aliquid voluptatibus dolorem, fugit ullam sit earum id eaque nisi hic? Tenetur commodi, nisi rem vel, ea eaque ab ipsa, autem similique ex unde!
                     </p>
                     {{-- <a href="">
                     Shop Now
                     </a> --}}
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end arrival section -->
      <!-- footer section -->
      <footer>
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                   <div class="full">
                      <div class="logo_footer">
                        <a href="{{route('index')}}"><img width="210" src="images/logo.png" alt="#" /></a>
                      </div>
                      <div class="information_f">
                        <p><strong>ADDRESS:</strong> Ho Chi Minh city, Viet Nam</p>
                        <p><strong>TELEPHONE:</strong> +91 987 654 3210</p>
                        <p><strong>EMAIL:</strong> 
                           hoangdeptraibodoiqua4321@gmail.com</p>
                      </div>
                   </div>
               </div>
               <div class="col-md-8">
                  <div class="row">
                  <div class="col-md-7">
                     <div class="row">
                        <div class="col-md-6">
                     <div class="widget_menu">
                        <h3>Menu</h3>
                        <ul>
                           <li><a href="{{route('index')}}">Home</a></li>
                           <li><a href="{{route('about')}}">About</a></li>
                           <li><a href="{{route('testimonial')}}">Testimonial</a></li>
                           <li><a href="{{route('blog')}}">Blog</a></li>
                           <li><a href="{{route('contact')}}">Contact</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="widget_menu">
                        <h3>Account</h3>
                        <ul>
                           <li><a href="{{route('showCart')}}">Checkout</a></li>
                           <li><a href="{{route('login')}}">Login</a></li>
                           <li><a href="{{route('register')}}">Register</a></li>
                           <li><a href="{{route('productPage')}}">Shopping</a></li>
                        </ul>
                     </div>
                  </div>
                     </div>
                  </div>     
                  <div class="col-md-5">
                     <div class="widget_menu">
                        <h3>Discount Offers</h3>
                        <div class="information_f">
                          <p>Subscribe To Get Discount Offers.</p>
                        </div>
                        <div class="form_sub">
                           <form action="{{route('discount_offer')}}" method="GET">
                              <fieldset>
                                 <div class="field footer_dis_group">
                                    <input class="footer_input" type="email" id="discount_input_2" onkeyup="Discount2()" placeholder="Enter Your Mail" name="email" />
                                    <input type="submit" value="Subscribe" onclick="return Subscribe2()"/>
                                    <span id="dis_error_2" class="dis_error_2"></span>
                                 </div>
                              </fieldset>
                           </form>
                        </div>
                     </div>
                  </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">Copyright © 2023 By <span class="author-copy">Tran Dac Thuong</span>. All Rights Reserved</p>
      </div>

     <script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
      <!-- footer section -->
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>

      <script src="js/validate.js"></script>

      <script src="js/validateContact.js"></script>

      <script>
         document.addEventListener("DOMContentLoaded", function () {
            // Mong muốn của chúng ta
            Validator({
               form: "#form-contact",
               formGroupSelector: ".form-group",
               errorSelector: ".form-message",
               rules: [
                  Validator.isRequired(
                  "#fullname",
                  "Fullname is required"
                  ),
                  Validator.isRequired(
                  "#subject",
                  "Subject is required"
                  ),
                  Validator.isRequired(
                  "#mess",
                  "Message is required"
                  ),
                  Validator.isEmail("#email", "Email is required"),
            
               ],
               onSubmit: function (data) {
                  window.location.href = "{{route('sendContactEmail')}}";
                  console.log(data);
               },
            });
         });
      </script>
   </body>
</html>