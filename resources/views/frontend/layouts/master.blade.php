<!doctype html>
<html class="no-js" lang="zxx">


<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title>@yield('title')</title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Place favicon.ico in the root directory -->
   <link rel="shortcut icon" type="image/x-icon" href="{{ getAssetUrl($setting->favicon, 'uploads/setting') }}">

   <!-- CSS here -->
   <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/bootstrap.css">
   <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/meanmenu.css">
   <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/animate.min.css">
   <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/swiper-bundle.css">
   <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/slick.css">
   <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/nouislider.css">
   <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/backtotop.css">
   <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/magnific-popup.css">
   <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/nice-select.css">
   <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/flaticon_kindedo.css">
   <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/font-awesome-pro.css">
   <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/spacing.css">

   <link href="{{ asset('backend/assets/libs/toastify-js/src/toastify.css') }}" rel="stylesheet" />

   <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/main.css">
   <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/custom.css">
</head>

<body>
   <!-- pre loader area start -->
   {{-- <div id="loading">
      <div id="preloader">
         <div class="preloader-thumb-wrap">
            <div class="preloader-thumb">
               <div class="preloader-border"></div>
               <img src="{{ asset('frontend') }}/assets/img/bg/preloader.png" alt="img not found!">
            </div>
         </div>
      </div>
   </div> --}}
   <!-- pre loader area end -->

   <!-- back to top start -->
   <div class="progress-wrap">
      <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
         <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
      </svg>
   </div>
   <!-- back to top end -->

   @include('frontend.layouts.header')

   <!-- main area start here  -->
   <main>
        @yield('content')

   </main>
   <!-- main area end here  -->
   <!-- footer area start -->
   <footer>
      <div class="bd-footer-area fix pt-170 theme-bg-6">
         <div class="bd-wave-wrapper">
            <div class="bd-wave"></div>
            <div class="bd-wave"></div>
         </div>
         <div class="theme-bg bd-footer-wrapper p-relative pt-60">
            <div class="container">
               <!-- footer area bg here  -->
               <div class="bd-footer-bg-2" data-background="{{ asset('frontend') }}/assets/img/bg/bg-shape.jpg"></div>
               <div class="bd-footer-top">
                  <div class="row align-items-end">
                     <div class="col-lg-6">
                        <div class="bd-footer-top-widget-1 mb-60">
                           <div class="bd-footer-logo mb-15">
                              <a href="index.html"> <img src="{{ getAssetUrl($setting->footer_logo, 'uploads/setting') }}" alt="img not found!"></a>
                           </div>
                           <div class="bd-footer-widget-content is-white mb-40">
                              <p>In our Adult Participation programs, for most students, it is their first program in
                                 Kindedo.</p>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="bd-newsletter-content-2 p-relative z-index-1 mb-60">
                           <h4 class="bd-footer-widget-title is-white mb-20">Join Our Newsletter</h4>
                           <div class="bd-newsletter-form">
                              <form action="#">
                                 <div class="bd-newsletter-input bd-newsletter-input-2">
                                    <input type="text" placeholder="your email">
                                    <button type="submit" class="bd-btn">
                                       <span class="bd-btn-inner">
                                          <span class="bd-btn-normal"><i
                                                class="fa-sharp fa-solid fa-paper-plane"></i>Subscribe now</span>
                                          <span class="bd-btn-hover"><i
                                                class="fa-sharp fa-solid fa-paper-plane"></i>Subscribe now</span>
                                       </span>
                                    </button>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="bd-footer-2 pb-15 pt-60 p-relative">
                  <div class="bd-footer-shape d-none d-lg-block">
                     <img src="{{ asset('frontend') }}/assets/img/shape/white-curved-line.png" alt="img not found!">
                  </div>
                  <div class="row">
                     <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="bd-footer-widget-2 mb-50">
                           <div class="bd-footer-widget-content">
                              <h4 class="bd-footer-widget-title is-white mb-20">Quick links</h4>
                              <div class="bd-footer-list bd-footer-list-2">
                                 <ul>
                                    <li><a href="#">About</a></li>
                                    <li><a href="#">Courses</a></li>
                                    <li><a href="#">Shop</a></li>
                                    <li><a href="#">Pages</a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="#">Contact</a></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="bd-footer-widget-2 mb-50">
                           <div class="bd-footer-widget-content">
                              <h4 class="bd-footer-widget-title is-white mb-20">Programs</h4>
                              <div class="bd-footer-list bd-footer-list-2">
                                 <ul>
                                    <li><a href="#">Play School</a></li>
                                    <li><a href="#">Nursery</a></li>
                                    <li><a href="#">Junior Kg</a></li>
                                    <li><a href="#">Senior Kg</a></li>
                                    <li><a href="#">Holiday Camp</a></li>
                                    <li><a href="#">Day Care</a></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="bd-footer-widget-2 mb-50">
                           <div class="bd-footer-widget-content">
                              <h4 class="bd-footer-widget-title is-white mb-20">Programs</h4>
                              <div class="bd-footer-list bd-footer-list-2">
                                 <!-- hero area side social  -->
                                 <div class="bd-footer-social-wrapper is-white">
                                    <div class="bd-footer-social">
                                       <a href="#"><i class="fa-brands fa-facebook-f"></i>facebook</a>
                                    </div>
                                    <div class="bd-footer-social">
                                       <a href="#"><i class="fa-brands fa-twitter"></i>twitter</a>
                                    </div>
                                    <div class="bd-footer-social">
                                       <a href="#"><i class="fa-brands fa-youtube"></i>youtube</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="bd-footer-widget-2 mb-50">
                           <div class="bd-footer-widget-content">
                              <h4 class="bd-footer-widget-title is-white mb-20">Contact Us</h4>
                              <div class="bd-footer-contact is-white">
                                 <ul>
                                    <li><i class="fa-light fa-location-dot"></i><a href="#">{{$setting->address}}</a></li>
                                    <li><i class="fa-light fa-phone"></i><a href="tel:9072003462">{{$setting->phone}}</a></li>
                                    <li><i class="fa-light fa-envelope"></i><a
                                          href="mailto:{{$setting->support}}">{{$setting->support}}</a></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="bd-footer-copyright pb-5 pt-25">
                  <div class="bd-footer-copyright-wrap d-flex justify-content-center">
                     <div class="bd-footer-copyright-text is-white pb-20">
                        <p>{{$setting->copyright}}<a href=""
                              ></a>
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </footer>
   <!-- footer area end -->

   <!-- offcanvas area start -->
   <div class="offcanvas__area">
      <div class="offcanvas__bg"></div>
      <div class="offcanvas__wrapper">
         <div class="offcanvas__content">
            <div class="offcanvas__top mb-40 d-flex justify-content-between align-items-center">
               <div class="offcanvas__logo logo">
                  <a href="index.html">
                     <img src="{{ getAssetUrl($setting->main_logo, 'uploads/setting') }}" alt="logo">
                  </a>
               </div>
               <div class="offcanvas__close">
                  <button class="offcanvas__close-btn">
                     <i class="fa-thin fa-times"></i>
                  </button>
               </div>
            </div>
            <div class="offcanvas__search mb-0">
               <form action="#">
                  <button type="submit"><i class="flaticon-search"></i></button>
                  <input type="text" placeholder="Search here">
               </form>
            </div>
            <div class="mobile-menu fix mt-40"></div>
            <div class="offcanvas__about d-none d-lg-block mt-30 mb-30">
               <h4>About Kindedo</h4>
               <p>With the help of teachers and environment as the third teacher, students
                  have opportunities to confidently take risks.</p>
            </div>
            <div class="offcanvas__contact mt-30 mb-30">
               <h4>Contact Info</h4>
               <ul>
                  <li class="d-flex align-items-center gap-2">
                     <div class="offcanvas__contact-icon">
                        <a target="_blank"
                           href="https://www.google.com/maps/place/Dhaka/@23.7806207,90.3492859,12z/data=!3m1!4b1!4m5!3m4!1s0x3755b8b087026b81:0x8fa563bbdd5904c2!8m2!3d23.8104753!4d90.4119873">
                           <i class="fal fa-map-marker-alt"></i></a>
                     </div>
                     <div class="offcanvas__contact-text">
                        <a target="_blank"
                           href="https://www.google.com/maps/place/Dhaka/@23.7806207,90.3492859,12z/data=!3m1!4b1!4m5!3m4!1s0x3755b8b087026b81:0x8fa563bbdd5904c2!8m2!3d23.8104753!4d90.4119873">{{$setting->address}}</a>
                     </div>
                  </li>
                  <li class="d-flex align-items-center gap-2">
                     <div class="offcanvas__contact-icon">
                        <a href="tel:{{$setting->phone}}"><i class="far fa-phone"></i></a>
                     </div>
                     <div class="offcanvas__contact-text">
                        <a href="tel:{{$setting->phone}}">{{$setting->phone}}</a>
                     </div>
                  </li>
                  <li class="d-flex align-items-center gap-2">
                     <div class="offcanvas__contact-icon">
                        <a href="mailto:{{$setting->support}}"><i class="fal fa-envelope"></i></a>
                     </div>
                     <div class="offcanvas__contact-text">
                        <a href="mailto:{{$setting->support}}">{{$setting->support}}</a>
                     </div>
                  </li>
               </ul>
            </div>
            <div class="offcanvas__social">
               <ul>
                  <li><a target="_blank" href="https://www.facebook.com/"><i class="fa-brands fa-facebook-f"></i></a>
                  </li>
                  <li><a target="_blank" href="https://twitter.com/"><i class="fa-brands fa-twitter"></i></a></li>
                  <li><a target="_blank" href="https://www.youtube.com/"><i class="fa-brands fa-youtube"></i></a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
   <div class="body-overlay"></div>
   <!-- offcanvas area end -->

   <!-- serach popup area start here  -->
   <div class="bd-search-popup-area">
      <div class="container">
         <div class="row">
            <div class="col-12">
               <div class="bd-search-popup">
                  <div class="bd-search-form">
                     <form action="#">
                        <div class="bd-search-input">
                           <input type="search" placeholder="Type here to serach ...">
                           <div class="bd-search-submit">
                              <button type="submit"><i class="flaticon-search"></i></button>
                           </div>
                        </div>
                     </form>
                     <div class="bd-search-close">
                        <div class="bd-search-close-btn">
                           <button><i class="fa-thin fa-close"></i></button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- search popup overlay  -->
   <div class="bd-search-overlay"></div>
   <!-- serach popup area end here  -->

   <!-- JS here -->
   <script src="{{ asset('frontend') }}/assets/js/vendor/jquery.js"></script>
   <script src="{{ asset('frontend') }}/assets/js/vendor/waypoints.js"></script>
   <script src="{{ asset('frontend') }}/assets/js/bootstrap-bundle.js"></script>
   <script src="{{ asset('frontend') }}/assets/js/meanmenu.js"></script>
   <script src="{{ asset('frontend') }}/assets/js/swiper-bundle.js"></script>
   <script src="{{ asset('frontend') }}/assets/js/slick.js"></script>
   <script src="{{ asset('frontend') }}/assets/js/nouislider.js"></script>
   <script src="{{ asset('frontend') }}/assets/js/magnific-popup.js"></script>
   <script src="{{ asset('frontend') }}/assets/js/parallax.js"></script>
   <script src="{{ asset('frontend') }}/assets/js/backtotop.js"></script>
   <script src="{{ asset('frontend') }}/assets/js/nice-select.js"></script>
   <script src="{{ asset('frontend') }}/assets/js/wow.min.js"></script>
   <script src="{{ asset('frontend') }}/assets/js/gsap.min.js"></script>
   <script src="{{ asset('frontend') }}/assets/js/isotope-pkgd.js"></script>
   <script src="{{ asset('frontend') }}/assets/js/imagesloaded-pkgd.js"></script>
   <script src="{{ asset('frontend') }}/assets/js/ajax-form.js"></script>
   <script src="{{ asset('frontend') }}/assets/js/jquery.appear.js"></script>
   <script src="{{ asset('frontend') }}/assets/js/jquery.odometer.min.js"></script>
   <script src="{{ asset('frontend') }}/assets/js/main.js"></script>
   <script src='{{ asset('backend/assets/libs/toastify-js/src/toastify.js') }}'></script>
</body>


</html>
