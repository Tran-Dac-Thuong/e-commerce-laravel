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

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
      <style>
        .search-icon{
            margin-left: -4px;
            background-color: #f7444e;
            padding: 11.8px 20px 12.5px 20px;
            cursor: pointer;
            border: none;
            outline: none !important;
        }
        .search-icon i{
            font-size: 15px;
            color: white;
        }
        .search-input{
            text-transform: lowercase;
            outline: none;
        }
        .not-found{
            margin-top: 50px;
            font-size: 30px;
            margin-left: 38%;
        }
        .pagination-product{
            margin-left: 34% !important;
            position: absolute !important;
            top: 160% !important;
           
         }
         footer{
            width: 100% !important;
            position: absolute;
            top: 180%;
         }
         .copy{
            width: 100% !important;
            position: absolute;
            top: 231.5%;
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
         .quantity_input{
            width: 80px;
            margin-left: 55px;
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
         #scroll {
            position:fixed;
            right:20px;
            bottom:20px;
            cursor:pointer;
            width:50px;
            height:50px;
            background-color:#f7444e;
            text-indent:-9999px;
            display:none;
            -webkit-border-radius:60px;
            -moz-border-radius:60px;
            border-radius:60px
         }
         #scroll span {
            position:absolute;
            top:50%;
            left:50%;
            margin-left:-8px;
            margin-top:-12px;
            height:0;
            width:0;
            border:8px solid transparent;
            border-bottom-color:#ffffff;
         }
         #scroll:hover {
            background-color:#f7444e;
            opacity:1;filter:"alpha(opacity=100)";
            -ms-filter:"alpha(opacity=100)";
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
         @extends('home.layout.navbar.navbar')
         <!-- end header section -->
      </div>
      <!-- inner page section -->
      <section class="inner_page_head mt-5">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>Product Grid</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end inner page section -->
      <!-- product section -->
       <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>
            <div>
                <form action="{{route('searchProduct')}}" class="ml-2" method="GET">
                    <input type="text" class="col-4 search-input" name="search" placeholder="Search by name">
                    <button type="submit" class="search-icon">
                        <i class="fa fa-search"></i>
                    </button>
                  
                </form>
            </div>
            <div class="row">
               @forelse ($product as $item)
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{route('detailProduct', $item->id)}}" class="option1">
                           Product Detail
                           </a>
                           <form action="{{route('add_cart', $item->id)}}" method="POST">
                              @csrf
                              <div class="add-group">
                                 <input type="number" class="quantity_input" name="quantity" value="1" min="1">
                                 <input type="submit" value="Add to cart" class="option2">
                                 
                              </div>
                           </form>
                          
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="{{asset($item->image)}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{$item->title}}
                        </h5>

                        @if ($item->discount_price != null)
                           <h6 style="color: #f7444e">
                              ${{$item->discount_price}}
                           </h6>
                           <h6 style="text-decoration: line-through">
                              ${{$item->price}}
                           </h6>

                           @else

                           <h6>${{$item->price}}</h6>
                        @endif

                     
                     </div>
                  </div>
               </div>
               @empty
                  
                    <div class="not-found">No Products Found</div>                       
               @endforelse


              
            <div class="pagination-product mt-5">
               {{$product->links()}}
              
            </div>
         </div>
      </section>
      <!-- end product section -->
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
      <div class="cpy_ copy">
         <p class="mx-auto">Copyright © 2023 By <span class="author-copy">Tran Dac Thuong</span>. All Rights Reserved</p>
      </div>

      <a href="#" id="scroll" style="display: none;"><span></span></a>

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

      <script src="js/BackToTop.js"></script>
   </body>
</html>