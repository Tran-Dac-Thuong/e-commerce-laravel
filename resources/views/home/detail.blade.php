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
         .pagination-product{
            margin-left: 34% !important;
            position: absolute !important;
            top: 309% !important;
           
         }
         .user-email{
            font-size: 12px;
            text-transform: lowercase;
            margin-left: 5px;
         }
         .detail-item{
            margin-left: 28% !important;
            margin-top: 15% !important;
            margin-bottom: 10% !important;
            box-shadow: 1px 2px 20px #dddd;
            border-radius: 5px;
            min-width: 700px !important;
           padding: 20px !important;
           border: 1px solid #dddd;
         }
        
         .box{
            display: flex !important;
            justify-content: space-between !important;
            gap: 50px !important;
         }
         .img-box img{
            width: 250px !important;
         }
         .strong-text{
            font-weight: bold;
         }
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
         .quantity_input{
            width: 80px;
            
         }
         .option2{
            margin-left: 0px !important;
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
         .product_name{
            display: flex;
            justify-content: space-between;
            min-width: 300px;
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
         .product_text{
            margin-right: 10px !important;
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

            <div class="col-sm-6 col-md-4 col-lg-4 detail-item">
                <div class="box">
                  
                   <div class="img-box">
                      <img src="{{asset($product->image)}}">
                   </div>
                   <div class="detail-box">
                      <h5 class="product_name">
                        <span class="strong-text product_text">Product name: </span><span>{{$product->title}}</span>
                      </h5>
    
                      @if ($product->discount_price != null)
                         <h6 style="color: #f7444e">
                            <span class="strong-text">Discount price: </span>${{$product->discount_price}}
                         </h6>
                         <h6 style="text-decoration: line-through">
                           <span class="strong-text">Price: </span>${{$product->price}}
                         </h6>
    
                         @else
    
                         <h6><span class="strong-text">Price: </span>${{$product->price}}</h6>
                      @endif
    
                   <h6><span class="strong-text">Category: </span>{{$product->category}}</h6>
                   <h6><span class="strong-text">Description: </span>{{$product->description}}</h6>
                   <h6><span class="strong-text">Quantity: </span>{{$product->quantity}}</h6>
                    <br>
                    <form action="{{route('add_cart', $product->id)}}" method="POST">
                        @csrf
                        <div class="add-group">
                           <input type="number" class="quantity_input" name="quantity" value="1" min="1">
                           <input type="submit" value="Add to cart" class="option2">
                           
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