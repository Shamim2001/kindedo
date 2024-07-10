<!-- header area start -->
<header>
    <div class="bd-header">
       <!-- header top area start  -->
       <div class="bd-header-top bd-header-top-2 d-none d-xl-block">
          <!-- header top clip shape  -->
          <div class="bd-header-top-clip-shape"></div>
          <div class="container">
             <div class="row">
                <div class="col-12">
                   <div class="bd-header-top-wrapper d-flex justify-content-between">
                      <div class="bd-header-top-left">
                         <div class="bd-header-meta-items-2  d-flex align-items-center">
                            <div class="bd-header-meta-item is-white d-flex align-items-center">
                               <div class="bd-header-meta-icon">
                                  <i class="fa-sharp fa-solid fa-flag"></i>
                               </div>
                               <div class="bd-header-meta-text">
                                  <p>Journey Since 1990</p>
                               </div>
                            </div>
                            <div class="bd-header-meta-item d-flex align-items-center">
                               <div class="bd-header-meta-icon">
                                  <i class="fas fa-map-marker-alt"></i>
                               </div>
                               <div class="bd-header-meta-text">
                                  <p><a href="#">1870 N State St, California, 95482 United States</a></p>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="bd-header-top-right d-flex align-items-center">
                         <div class="bd-header-meta-items d-flex align-items-center">
                            <div class="bd-header-meta-item d-flex align-items-center">
                               <div class="bd-header-meta-icon">
                                  <i class="fas fa-envelope"></i>
                               </div>
                               <div class="bd-header-meta-text">
                                  <p><a href="mailto:support@kindedo.com">support@kindedo.com</a></p>
                               </div>
                            </div>
                            <div class="bd-header-meta-item d-flex align-items-center">
                               <div class="bd-header-meta-icon">
                                  <i class="fas fa-clock"></i>
                               </div>
                               <div class="bd-header-meta-text">
                                  <p>8.00am-4.00pm</p>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <!-- header top area end -->

       <!-- header bottom area start -->
       <div id="header-sticky" class="bd-header-bottom-2">
          <!-- header bottom clip shape  -->
          <div class="bd-header-bottom-clip-shape"></div>
          <div class="container">
             <div class="mega-menu-wrapper p-relative">
                <div class="d-flex align-items-center justify-content-between">
                   <div class="bd-header-logo">
                      <a href="{{ route('front.index') }}">
                         <img src="{{ asset('frontend') }}/assets/img/logo/logo.svg" alt="logo">
                      </a>
                   </div>
                   <div class="bd-main-menu d-none d-lg-flex align-items-center">
                      <nav id="mobile-menu">
                         <ul>
                            <li class="has-dropdown">
                               <a href="{{ route('front.index') }}">Home</a>
                               <ul class="submenu">
                                  <li><a href="{{ route('front.index') }}">Home Style 1</a></li>
                                  <li><a href="index-2.html">Home Style 2</a>
                                  </li>
                                  <li><a href="index-3.html">Home Style 3</a></li>
                               </ul>
                            </li>
                            <li>
                               <a href="about.html">About</a>
                            </li>
                            <li class="has-dropdown has-mega-menu">
                               <a href="{{ route('front.programs') }}">Programs</a>
                               <ul class="mega-menu mega-menu-2">
                                  <li>
                                     <a href="javascript:void(0);" class="d-lg-none">List 1</a>
                                     <ul>
                                        <li> <a href="program-details.html" class="mega-program">
                                              <div class="mega-menu-2-inner-num"><span>01</span></div>
                                              <div class="mega-menu-2-inner-title">
                                                 <h6>Settling</h6>
                                                 <span>4-5 Yrs</span>
                                              </div>
                                           </a></li>
                                        <li> <a href="program-details.html" class="mega-program">
                                              <div class="mega-menu-2-inner-num"><span>02</span></div>
                                              <div class="mega-menu-2-inner-title">
                                                 <h6>Play Group</h6>
                                                 <span>4-5 Yrs</span>
                                              </div>
                                           </a></li>
                                        <li> <a href="program-details.html" class="mega-program">
                                              <div class="mega-menu-2-inner-num"><span>03</span></div>
                                              <div class="mega-menu-2-inner-title">
                                                 <h6>Play Group</h6>
                                                 <span>5-6 Yrs</span>
                                              </div>
                                           </a></li>
                                     </ul>
                                  </li>
                                  <li>
                                     <a href="javascript:void(0);" class="d-lg-none">List 2</a>
                                     <ul>
                                        <li> <a href="program-details.html" class="mega-program">
                                              <div class="mega-menu-2-inner-num"><span>04</span></div>
                                              <div class="mega-menu-2-inner-title">
                                                 <h6>Nuesery</h6>
                                                 <span>4-5 Yrs</span>
                                              </div>
                                           </a></li>
                                        <li> <a href="program-details.html" class="mega-program">
                                              <div class="mega-menu-2-inner-num"><span>05</span></div>
                                              <div class="mega-menu-2-inner-title">
                                                 <h6>Junior Kg</h6>
                                                 <span>4-5 Yrs</span>
                                              </div>
                                           </a></li>
                                        <li> <a href="program-details.html" class="mega-program">
                                              <div class="mega-menu-2-inner-num"><span>06</span></div>
                                              <div class="mega-menu-2-inner-title">
                                                 <h6>Senior Kg</h6>
                                                 <span>6-7 Yrs</span>
                                              </div>
                                           </a></li>
                                     </ul>
                                  </li>
                                  <li class="test">
                                     <a href="javascript:void(0);" class="d-lg-none">list 3</a>
                                     <ul>
                                        <li>
                                           <div class="mega-menu-2-inner-thumb p-relative">
                                              <img src="{{ asset('frontend') }}/assets/img/logo/mega-menu-1.png" alt="img not found!">
                                              <div class="mega-menu-2-inner-thumb-content">
                                                 <h4>Join New Program</h4>
                                                 <div class="mega-menu-2-inner-thumb-btn mb-25">
                                                    <a href="programs.html" class="mega-btn">View More</a>
                                                 </div>
                                              </div>
                                           </div>
                                        </li>
                                     </ul>
                                  </li>
                               </ul>
                            </li>
                            <li class="has-dropdown">
                               <a href="shop.html">Shop</a>
                               <ul class="submenu">
                                  <li><a href="shop.html">Shop Main</a></li>
                                  <li><a href="shop-details.html">Shop Details</a></li>
                                  <li><a href="wishlist.html">Wishlist</a></li>
                                  <li><a href="cart.html">Cart</a></li>
                                  <li><a href="checkout.html">Checkout</a></li>
                               </ul>
                            </li>
                            <li class="has-dropdown has-mega-menu">
                               <a href="#">Pages</a>
                               <ul class="mega-menu">
                                  <li><a href="javasript:void(0);" class="mega-menu-title">Page Layout 1</a>
                                     <ul>
                                        <li> <a href="programs.html">Program</a></li>
                                        <li><a href="program-details.html">Program Details</a></li>
                                        <li><a href="teacher.html">Teacher</a></li>
                                        <li><a href="teacher-details.html">Teacher Details</a></li>
                                        <li><a href="time-table.html">Time Table</a></li>
                                     </ul>
                                  </li>
                                  <li><a href="javasript:void(0);" class="mega-menu-title">Page Layout 2</a>
                                     <ul>
                                        <li><a href="testimonial.html">Testimonial</a></li>
                                        <li><a href="gallery.html">Gallery</a></li>
                                        <li><a href="faq.html">FAQ</a></li>
                                        <li><a href="classes.html">Class</a></li>
                                        <li><a href="class-details.html">Class Details</a></li>
                                     </ul>
                                  </li>
                                  <li><a href="javasript:void(0);" class="mega-menu-title">Page Layout 3</a>
                                     <ul>
                                        <li><a href="news.html">News Main</a></li>
                                        <li><a href="news-sidebar.html">News Sidebar</a></li>
                                        <li><a href="error-404.html">Error Page</a></li>
                                        <li><a href="news-classic.html">News Classic</a></li>
                                        <li><a href="news-details.html">News Details</a></li>
                                     </ul>
                                  </li>
                               </ul>
                            </li>
                            <li class="has-dropdown">
                               <a href="news.html">News</a>
                               <ul class="submenu">
                                  <li><a href="news.html">News Default</a></li>
                                  <li><a href="news-sidebar.html">News Sidebar</a></li>
                                  <li><a href="news-classic.html">News Classic</a></li>
                                  <li><a href="news-details.html">News Details</a></li>
                               </ul>
                            </li>
                            <li>
                               <a href="contact.html">Contact</a>
                            </li>
                         </ul>
                      </nav>
                      <div class="bd-search-btn-wrapper">
                         <button class="bd-search-open-btn">
                            <i class="flaticon-search"></i>
                         </button>
                      </div>
                   </div>
                   <div class="bd-header-bottom-right d-flex justify-content-end align-items-center">
                      <div class="bd-header-meta-item d-none bd-header-menu-meta d-xxl-flex align-items-center">
                         <div class="bd-header-meta-icon">
                            <i class="flaticon-phone-call"></i>
                         </div>
                         <div class="bd-header-meta-text">
                            <p><a href="tel:9072003462">907-200-3462</a></p>
                         </div>
                      </div>
                      <div class="bd-header-btn d-none d-xl-block">
                         <a href="contact.html" class="bd-btn">
                            <span class="bd-btn-inner">
                               <span class="bd-btn-normal">Apply now</span>
                               <span class="bd-btn-hover">Apply now</span>
                            </span>
                         </a>
                      </div>
                      <div class="header-hamburger">
                         <button type="button" class="hamburger-btn offcanvas-open-btn">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                         </button>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <!-- header bottom area end -->
    </div>
 </header>
 <!-- header area end here -->
