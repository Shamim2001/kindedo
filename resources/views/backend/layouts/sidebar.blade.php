 <!-- ========== App Menu ========== -->
 <div class="app-menu navbar-menu">
     <!-- LOGO -->
     <div class="navbar-brand-box">
         <a href="{{ route('front.index') }}" target="_blank" class="logo logo-dark">
             <span class="logo-sm">
                 <img src="{{ asset('backend') }}/assets/images/pixcafe.png" alt="" height="22">
             </span>
             <span class="logo-lg text-white">
                 <img src="{{ asset('backend') }}/assets/images/pixcafe.png" alt="" height="45">
                 <span class="ms-1">{{ config('starter.LOGO_TEXT') }}</span>
             </span>
         </a>
         <a href="{{ route('front.index') }}" target="_blank" class="logo logo-light">
             <span class="logo-sm">
                 <img src="{{ asset('backend') }}/assets/images/pixcafe.png" alt="" height="22">
             </span>
             <span class="logo-lg text-white">
                 <img src="{{ asset('backend') }}/assets/images/pixcafe.png" alt="" height="45">
                 <span class="ms-1">{{ config('starter.LOGO_TEXT') }}</span>
             </span>
         </a>
         <button type="button" class="btn btn-sm p-0 fs-3xl header-item float-end btn-vertical-sm-hover shadow-none"
             id="vertical-hover">
             <i class="ri-record-circle-line"></i>
         </button>
     </div>

     <div id="scrollbar">
         <div class="container-fluid">

             <div id="two-column-menu">
             </div>
             <ul class="navbar-nav" id="navbar-nav">

                 <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                 <x-nav-item title="Dashboard" icon="ti ti-brand-google-home" :url="route('dashboard.index')" :active="request()->routeIs('dashboard.index')" />

                 <!-- Slider -->
                 <x-nav-dropdown id="slider" title="Slider" :active="request()->routeIs('slider.*')" icon="ri-function-line">
                     <x-nav-item title="View All" icon="" :url="route('slider.index')" :active="request()->routeIs('slider.index')" />
                 </x-nav-dropdown>


                 <!-- Program -->
                 <x-nav-dropdown id="program" title="Program" :active="request()->routeIs('program.*')" icon="ri-function-line">
                     <x-nav-item title="View All" icon="" :url="route('program.index')" :active="request()->routeIs('program.index')" />
                 </x-nav-dropdown>



             </ul>
         </div>
         <!-- Sidebar -->
     </div>

     <div class="sidebar-background"></div>
 </div>
 <!-- Left Sidebar End -->
