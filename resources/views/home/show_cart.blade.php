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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
      <style>
         .list-cart{
            margin-top: 20%;
         }
         .total-price{
            position: absolute;
            top: 95%;
            right: 12%;
            
         }
         .payment-group{
           
            position: absolute;
            top: 95%;
            left: 12%;
          
         }
         .proceed{
            margin-bottom: 10px;
         }
         .order-group{
            padding-top: 10px;
         }
         .order-group .cash{
            text-decoration: none;
            color: #f7444e;
            background-color: transparent;
            padding: 12px 18px;
            border-radius: 3px;
            border: 1px solid #f7444e;
            cursor: pointer;
            transition: 0.2s;
         }
         .order-group .cash:hover{
            background-color: #f7444e;
            color: white;
         }
         .order-group .pay-card{
            position: relative;
            text-decoration: none;
            color: #f7444e;
            background-color: transparent;
            padding-top: 12px;
            padding-bottom: 12px;
            padding-left: 18px;
            padding-right: 55px;
            border-radius: 3px;
            border: 1px solid #f7444e;
            cursor: pointer;
            margin-left: 10px;
            transition: 0.2s;
         }
         .order-group .pay-card:hover{
            background-color: #f7444e;
            color: white;
         }
         .message{
            padding-top: 5%;
         }
        
         .card-icon{
           position: absolute;
            top: 5px;
         }
         .pagination-product{
            margin-left: 34% !important;
            position: absolute !important;
            top: 80% !important;
            right: 80% !important;
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
         <header class="header_section headnavbar">
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
                        <li class="nav-item">
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
                      
                        <li class="nav-item row active">
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
                           @if (Route::has('login'))
                           @auth
                              <strong class="mt-1">({{$cart_count}})</strong>
                           @else
                              <strong class="mt-1"></strong>
                           @endauth
                          
                           @endif
                        </li>
                     </ul>
                    </div>
               </nav>
            </header>
               <div class="container">
                     {{-- @if (session()->has('message'))
                     <div class="alert alert-success alert-dismissible">
                           <button type="button" class="close" data-dismiss="alert">&times;</button>
                           {{session()->get('message')}}
                     </div>       
                     @endif --}}
                     <table class="table list-cart">
                        <thead>
                           <tr>
                                 <th>Product title</th>
                                 <th>Product quantity</th>
                                 <th>Price</th>
                                 <th>Image</th>
                                 <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $total_price=0; ?>
                           @foreach ($cart as $item)
                           <tr>
                                 <td>{{$item->product_title}}</td>
                                 <td>{{$item->quantity}}</td>
                                 <td>${{$item->price}}</td>
                                 <td>
                                    <img src="{{$item->image}}" width="80px">
                                 </td>
                                 <td>
                                    <a href="{{route('deleteCart', $item->id)}}" onclick="return confirm('Are you sure want to delete this product?')"><button class="btn btn-danger">Delete</button></a>
                                    
                                 </td>
                           </tr>
                           <?php $total_price= $total_price + $item->price; ?>
                           @endforeach
                           
                        </tbody>
                     </table>
                     <div class="pagination-product mt-5">
                        {{$cart->links()}}
                       
                     </div>
               </div>
             
               <div class="total-price">
                  <h3>Total price: ${{$total_price}}</h3>
               </div>
               <div class="payment-group">
                  <h3 class="proceed">Payment methods:</h3>
                  <div class="order-group">
                     <a href="{{route('cashOrder')}}" class="cash">Pay Using Cash</a>
                     <a href="{{route('paymentstripe', $total_price)}}" class="pay-card">Pay Using Card<i class="fa fa-2x fa-cc-visa ml-2 card-icon row"></i></a>
                  </div>
               </div>
              
            </div>
      </div>
               

      <br>
      <br>
      <br>

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