<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <base href="/public">
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
        
         .add-cart{
            
            background-color: #f7444e;
            color: white;
            text-decoration: none;
            cursor: pointer;
            border-radius: 3px;
            padding: 10px 20px;
            transition: 0.5s;
         }
         .add-cart:hover{
            background-color: white;
            border: 1px solid #f7444e;
            color: #f7444e;
         }
        
         .pay-btn{
            cursor: pointer;
            width: 100% !important;
            padding-left: 45% !important; 
         }
         .input-message{
            position: relative;
         }
         .input-message .error{
            position: absolute;
            top: 70px;
            left: 0;
            color: red;
        }
        .input-message i{
         color: green;
         position: absolute;
         right: -1080px;
         top: -28px;
         font-size: 18px;
        }
        #alert_message{
         display: none;
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
         .sec_stripe{
            margin-top: 150px !important;
            margin-bottom: 100px !important;
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
   <body>
      @include('sweetalert::alert')
      <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
         <div class="spinner-border text-danger" style="width: 3rem; height: 3rem;" role="status">
             <span class="sr-only">Loading...</span>
         </div>
       </div>
      <div class="hero_area">
         <!-- header section strats -->
         @extends('home.layout.navbar.navbar')
            <div class="container sec_stripe">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Pay using card</h3>
                    </div>
                    <div class="card-body">
                        @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                              {{session()->get('message')}}
                        </div>       
                        @endif
                        
                        <div class="alert alert-danger alert-dismissible" id="alert_message">
                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                              Your total price is $0. Please add to cart before payment!
                        </div>       
                        
                        <form action="{{route('postpaymentstripe', $totalprice)}}" id="form" method="POST">
                            @csrf
                           
                            <div class="form-group input-message">
                                <label for="">Card number:</label>
                                <input type="text" class="form-control" id="card" name="card_number" onkeyup="Card()" placeholder="Enter Visa card">
                                <span class="error" id="card_error"></span>
                            </div>
                            <div class="form-group input-message">
                                <label for="">CVV:</label>
                                <input type="text" class="form-control" id="cvv" name="cvv" onkeyup="Cvv()" placeholder="Enter 3 random numbers">
                                <span class="error" id="cvv_error"></span>
                            </div>
                            <div class="form-group input-message">
                                <label for="">Expiration month:</label>
                                <input type="text" class="form-control" id="expiration_month" onkeyup="Month()" name="expiration_month" placeholder="MM">
                                <span class="error" id="month_error"></span>
                            </div>
                            <div class="form-group input-message">
                                <label for="">Expiration year:</label>
                                <input type="text" class="form-control" id="expiration_year" onkeyup="Year()" name="expiration_year" placeholder="YYYY">
                                <span class="error" id="year_error"></span>
                                 
                            </div>
                            <br>
                            <div class="form-group">
                              <input type="hidden" class="form-control" id="amount" name="amount" value="{{$totalprice}}">
                                <h5>Total price: ${{$totalprice}}</h5>
                            </div>
                            <div class="form-group">
                                <input type="submit" onclick="return Submit()" class="pay-btn" value="Payment">
                            </div>
                        </form>
                    </div>
            </div>
           
            </div>
            


        </div>    

        

      <!-- footer start -->
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