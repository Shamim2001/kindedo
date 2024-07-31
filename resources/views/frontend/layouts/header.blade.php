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
                                  <p>{{ $setting->since }}</p>
                               </div>
                            </div>
                            <div class="bd-header-meta-item d-flex align-items-center">
                               <div class="bd-header-meta-icon">
                                  <i class="fas fa-map-marker-alt"></i>
                               </div>
                               <div class="bd-header-meta-text">
                                  <p><a href="#">{{ $setting->address }}</a></p>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="bd-header-top-right d-flex align-items-center">
                         <div class="bd-header-meta-items d-flex align-items-center">


                            <div class="bd-header-meta-item d-flex align-items-center">
                               <div class="bd-header-meta-icon">
                                  <i class="flaticon-phone-call"></i>
                               </div>
                               <div class="bd-header-meta-text">
                                  <p><a href="{{ $setting->phone }}">{{ $setting->phone }}</a></p>
                               </div>
                            </div>



                            <div class="bd-header-meta-item d-flex align-items-center">
                               <div class="bd-header-meta-icon">
                                  <i class="fas fa-envelope"></i>
                               </div>
                               <div class="bd-header-meta-text">
                                  <p><a href="mailto:{{$setting->support}}">{{$setting->support}}</a></p>
                               </div>
                            </div>
                            <div class="bd-header-meta-item d-flex align-items-center">
                               <div class="bd-header-meta-icon">
                                  <i class="fas fa-clock"></i>
                               </div>
                               <div class="bd-header-meta-text">
                                  <p>{{ time() }}</p>
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
                         <img src="{{ getAssetUrl($setting->main_logo, 'uploads/setting') }}" alt="logo">
                      </a>
                   </div>
                   <div class="bd-main-menu d-none d-lg-flex align-items-center">
                      <nav id="mobile-menu">
                         <ul>
                            <!-- <li class="has-dropdown"> -->
                            <li>
                               <a href="{{ route('front.index') }}">Home</a>
                               <!-- <ul class="submenu">
                                   <li><a href="{{ route('front.index') }}">Home Style 1</a></li>
                                   <li><a href="index-2.html">Home Style 2</a>
                                   </li>
                                   <li><a href="index-3.html">Home Style 3</a></li>
                                </ul> -->
                            </li>
                            <li class="has-dropdown ">
                               <a href="#">About</a>
                               <ul class="submenu">
                                  <li><a href="#">About Our School</a></li>
                                  <li><a href="index-2.html">Message From Management</a>
                                  </li>
                                  <!-- <li><a href="index-3.html">Message from The Vice Principle</a></li> -->
                                  <li><a href="index-3.html">Governing Body</a></li>
                                  <li><a href="index-3.html">Teacher Panel</a></li>
                                  <li><a href="index-3.html">Administrative Team</a></li>
                                  <li><a href="index-3.html">Procedures and Policies</a></li>
                               </ul>
                            </li>






                            <li class="has-dropdown has-mega-menu">
                               <a href="{{ route('front.programs') }}">Academics</a>
                               <ul class="mega-menu mega-menu-2">
                                  <li>
                                     <a href="javascript:void(0);" class="d-lg-none">List 1</a>
                                     <ul>
                                        <li> <a href="program-details.html" class="mega-program">
                                              <div class="mega-menu-2-inner-num"><span>01</span></div>
                                              <div class="mega-menu-2-inner-title">
                                                 <h6>Junior Section</h6>
                                                 <span>Play Group to KG-2</span>
                                              </div>
                                           </a></li>
                                        <li> <a href="program-details.html" class="mega-program">
                                              <div class="mega-menu-2-inner-num"><span>02</span></div>
                                              <div class="mega-menu-2-inner-title">
                                                 <h6>Mid Section</h6>
                                                 <span>Class-1 to Class-5</span>
                                              </div>
                                           </a></li>
                                        <li> <a href="program-details.html" class="mega-program">
                                              <div class="mega-menu-2-inner-num"><span>03</span></div>
                                              <div class="mega-menu-2-inner-title">
                                                 <h6>Senior Section</h6>
                                                 <span>Class-6 to Class-10</span>
                                              </div>
                                           </a></li>
                                     </ul>
                                  </li>

                                  <li class="test">
                                     <a href="javascript:void(0);" class="d-lg-none">list 3</a>
                                     <ul>
                                        <li>
                                           <div class="mega-menu-2-inner-thumb p-relative">
                                              <img src="{{ asset('frontend') }}/assets/img/logo/mega-menu-1.png"
                                                 alt="img not found!">
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
                               <a href="shop.html">Admission</a>
                               <ul class="submenu">
                                  <li><a href="shop.html">Wy Choose Guidance</a></li>
                                  <li><a href="shop-details.html">Tution Fees</a></li>
                                  <li><a href="wishlist.html">How to Apply</a></li>
                                  <li><a href="cart.html">Apply Online</a></li>
                               </ul>
                            </li>
                            <li>
                               <a href="{{ route('front.index') }}">Residential information</a>
                            </li>
                            <li>
                               <a href="news.html">Our Policies</a>
                            </li>
                            <li class="has-dropdown">
                               <a href="shop.html">Activities</a>
                               <ul class="submenu">
                                  <li><a href="shop.html">Academic Calendar</a></li>
                                  <li><a href="shop-details.html">News & Updates</a></li>
                                  <li><a href="wishlist.html">Events</a></li>
                               </ul>
                            </li>

                            <li>
                               <a href="news.html">Gallery</a>
                            </li>
                            <li>
                               <a href="contact.html">Contact</a>
                            </li>
                         </ul>
                      </nav>
                   </div>
                   <div class="bd-header-bottom-right d-flex justify-content-end align-items-center">
                      <!-- <div class="bd-header-meta-item d-none bd-header-menu-meta d-xxl-flex align-items-center">
                          <div class="bd-header-meta-icon">
                             <i class="flaticon-phone-call"></i>
                          </div>
                          <div class="bd-header-meta-text">
                             <p><a href="tel:9072003462">907-200-3462</a></p>
                          </div>
                       </div> -->
                      {{-- <div class="bd-header-btn d-none d-xl-block">
                         <a href="contact.html" class="bd-btn">
                            <span class="bd-btn-inner">
                               <span class="bd-btn-normal">Apply now</span>
                               <span class="bd-btn-hover">Apply now</span>
                            </span>
                         </a>
                      </div> --}}
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
