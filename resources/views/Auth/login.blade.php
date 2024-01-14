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
         .for-re{
            display: flex;
            justify-content: space-between;
        }
        .card-login{
            margin-top: 10%;
            margin-left: 32%;
            width: 450px;
            margin-bottom: 100px;
        }
        .re-input{
            width: 40px !important;
        }
        .re-text{
            margin-top: -39px;
            margin-bottom: 1rem;
            margin-left: 30px;
        }
        .re-box{
            margin-left: -12px;
        }
        .btn-login{
            width: 100% !important;
            padding-left: 43% !important;
        }
        form input{
            text-transform: none;
        }
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
         .headnavbar{
            position: fixed !important;
            top: 0 !important;
            width: 100%;
            background-color: white;
            z-index: 100;
         }
         .footer_links a:hover{
            color: #f7444e !important;
         }
         #spinner {
            opacity: 0;
            visibility: hidden;
            transition: opacity .5s ease-out, visibility 0s linear .5s;
            z-index: 99999;
         }

         #spinner.show {
            transition: opacity .5s ease-out, visibility 0s linear 0s;
            visibility: visible;
            opacity: 1;
         }
         body::-webkit-scrollbar{
            width: 14px;
         }
         body::-webkit-scrollbar-thumb{
            background-color: #f7444e;
         }
         body::-webkit-scrollbar-track{
            background-color: white;
         }
         .user_email_text{
            overflow: hidden;
            text-overflow: ellipsis;
         }
      </style>
   </head>
   <body class="sub_page">
      @include('sweetalert::alert')
      <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
         <div class="spinner-border text-danger" style="width: 3rem; height: 3rem;" role="status">
             <span class="sr-only">Loading...</span>
         </div>
       </div>
      <div class="hero_area">
         <!-- header section strats -->
         

    <!-- header section strats -->
    <header class="header_section headnavbar" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
      <div class="container">
         <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="{{route('index')}}"><img width="250" src="images/logo.png" alt="#" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav">
                  <li class="nav-item active">
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
                  <li class="nav-item">
                     <a class="nav-link" href="{{route('contact')}}">Contact</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="{{route('showOrder')}}">Order</a>
                  </li>
                
                      
                     <li class="nav-item">
                        <a class="nav-link" id="login" href="{{route('login')}}">Login</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="register" href="{{route('register')}}">Register</a>
                     </li>

                  
                
                  <li class="nav-item row">
                     <a class="nav-link pr-2" href="{{route('showCart')}}" title="Cart">
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
                    
                        <strong class="mt-1"></strong>
                  
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
  



         <div class="container mt-5">
            <div class="card card-login">
                <div class="card-header">
                    <h1 class="text-center">Login</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('postLogin')}}" method="POST">
                        @csrf
                        @if (session()->has('message'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{session()->get('message')}}
                        </div>       
                        @endif
                        @if (session()->has('message_reset'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{session()->get('message_reset')}}
                        </div>       
                        @endif
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Enter email...">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{$errors->first('email')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter password...">
                            @if ($errors->has('password'))
                            <span class="text-danger">{{$errors->first('password')}}</span>
                        @endif
                        </div>
                        <div class="form-group for-re">
                            <span class="re-box">
                                <input type="checkbox" class="re-input" name="remember"><p class="re-text">Remember me</p> 
                            </span>
                            
                            <a href="{{route('forgot-password')}}">Forgot password?</a>
                            
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary col-12 btn-login" value="Sign in">
                        </div>
                        <div class="form-group text-center">
                            Not a member?<a href="{{route('register')}}">Sign up now</a>
                        </div>
                    </form>
                   
                </div>
            </div>
        </div>
         <!-- end header section -->
      </div>
      <!-- inner page section -->
      
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
                     <div class="widget_menu footer_links">
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
                     <div class="widget_menu footer_links">
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
                           <form action="{{route('discount_offer')}}" method="POST">
                              @csrf
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
      <!-- footer section -->

      <script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>

      <script src="js/validate.js"></script>

      <script src="js/Spinner.js"></script>
   </body>
</html>