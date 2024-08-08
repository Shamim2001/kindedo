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

                 <!-- Category -->
                 <x-nav-dropdown id="category" title="Category" :active="request()->routeIs('category.*')" icon="ri-function-line">
                     <x-nav-item title="View All" icon="" :url="route('category.index')" :active="request()->routeIs('category.index')" />
                     <x-nav-item title="Add New" icon="" :url="route('category.create')" :active="request()->routeIs('category.create')" />
                 </x-nav-dropdown>


                 <!-- Slider -->
                 <x-nav-dropdown id="slider" title="Slider" :active="request()->routeIs('slider.*')" icon="ri-function-line">
                     <x-nav-item title="View All" icon="" :url="route('slider.index')" :active="request()->routeIs('slider.index')" />
                     <x-nav-item title="Add New" icon="" :url="route('slider.create')" :active="request()->routeIs('slider.create')" />
                 </x-nav-dropdown>


                 <!-- Program -->
                 <x-nav-dropdown id="program" title="Program" :active="request()->routeIs('program.*')" icon="ri-function-line">
                     <x-nav-item title="View All" icon="" :url="route('program.index')" :active="request()->routeIs('program.index')" />
                     <x-nav-item title="Add New" icon="" :url="route('program.create')" :active="request()->routeIs('program.create')" />
                 </x-nav-dropdown>

                 <!-- Faq -->
                 <x-nav-dropdown id="faq" title="Faq" :active="request()->routeIs('faq.*')" icon="ri-function-line">
                     <x-nav-item title="View All" icon="" :url="route('faq.index')" :active="request()->routeIs('faq.index')" />
                     <x-nav-item title="Add New" icon="" :url="route('faq.create')" :active="request()->routeIs('faq.create')" />
                 </x-nav-dropdown>

                 <!-- Promo -->
                 <x-nav-dropdown id="promo" title="Promo" :active="request()->routeIs('promo.*')" icon="ri-function-line">
                     <x-nav-item title="View All" icon="" :url="route('promo.index')" :active="request()->routeIs('promo.index')" />
                     <x-nav-item title="Add New" icon="" :url="route('promo.create')" :active="request()->routeIs('promo.create')" />
                 </x-nav-dropdown>

                 <!-- Page -->
                 <x-nav-dropdown id="Page" title="Page" :active="request()->routeIs('page.*')" icon=" ri-pages-fill ">
                     <x-nav-item title="View All" icon="" :url="route('page.index')" :active="request()->routeIs('page.index')" />
                     <x-nav-item title="Add New" icon="" :url="route('page.create')" :active="request()->routeIs('page.create')" />
                 </x-nav-dropdown>

                 <!-- Gallery -->
                 <x-nav-dropdown id="Gallery" title="Gallery" :active="request()->routeIs('gallery.*')" icon=" ri-gallery-upload-fill ">
                     <x-nav-item title="View All" icon="" :url="route('gallery.index')" :active="request()->routeIs('gallery.index')" />
                     <x-nav-item title="Add New" icon="" :url="route('gallery.create')" :active="request()->routeIs('gallery.create')" />
                 </x-nav-dropdown>

                 <!-- Contact -->
                 <x-nav-dropdown id="Contact" title="Contact" :active="request()->routeIs('contact.*')" icon="ri-function-line">
                     <x-nav-item title="View All" icon="" :url="route('contact.index')" :active="request()->routeIs('contact.index')" />
                 </x-nav-dropdown>

                 <!-- Setting -->
                 <x-nav-item title="Setting" icon="ri ri-settings-2-line" :url="route('setting.index')" :active="request()->routeIs('setting.index')" />



             </ul>
         </div>
         <!-- Sidebar -->
     </div>

     <div class="sidebar-background"></div>
 </div>
 <!-- Left Sidebar End -->
