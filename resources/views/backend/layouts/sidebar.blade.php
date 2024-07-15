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
                     {{-- <x-nav-item title="Add New" :url="route('slider.create')" icon="" :active="request()->routeIs('slider.create')" /> --}}
                 </x-nav-dropdown>


                 {{-- Blog --}}
                 {{-- <x-nav-dropdown id="blog" title="Blog" :active="request()->routeIs('blog.*')" icon="   ri-function-line">
                     <x-nav-item title="View All" icon="" :url="route('blog.index')" :active="request()->routeIs('blog.index')" />
                     <x-nav-item title="Add New" :url="route('blog.create')" icon="" :active="request()->routeIs('blog.create')" />
                 </x-nav-dropdown> --}}
                 <!-- Page -->
                 {{-- <x-nav-dropdown id="page" title="Page" :active="request()->routeIs('page.*')" icon="ri   ri-pages-line">
                     <x-nav-item title="View All" icon="" :url="route('page.index')" :active="request()->routeIs('page.index')" />
                     <x-nav-item title="Add New" :url="route('page.create')" icon="" :active="request()->routeIs('page.create')" />
                 </x-nav-dropdown> --}}

                 {{-- Gallery --}}
                 {{-- <x-nav-dropdown id="gallery1" title="Gallery" :active="request()->routeIs('gallery.*')" icon="  ri-gallery-line">
                     <x-nav-item title="View All" icon="" :url="route('gallery.index')" :active="request()->routeIs('gallery.index')" />
                     <x-nav-item title="Add New" :url="route('gallery.create')" icon="" :active="request()->routeIs('gallery.create')" />
                 </x-nav-dropdown> --}}
                 <!-- Order -->
                 {{-- <x-nav-dropdown id="order" title="Order" :active="request()->routeIs('order.*')" icon="ri ri-pages-line">
                     <x-nav-item title="View All" icon="" :url="route('order.index')" :active="request()->routeIs('order.index')" />
                     <x-nav-item title="Add New" :url="route('order.create')" icon="" :active="request()->routeIs('order.create')" />
                 </x-nav-dropdown> --}}

                 <!-- Product -->
                 {{-- <x-nav-dropdown id="product" title="Product" :active="request()->routeIs('product.*') ||
                     request()->routeIs('coupon.*') ||
                     request()->routeIs('category.*')" icon="ri ri-shopping-bag-2-line">

                     <x-nav-item title="View All" :url="route('product.index')" icon="" :active="request()->routeIs('product.index')" />
                     <x-nav-item title="Add New" :url="route('product.create')" icon="" :active="request()->routeIs('product.create')" />
                     <x-nav-item title="Categories" icon="" :url="route('category.index')" :active="request()->routeIs('category.index')" />
                     <x-nav-item title="Coupons" icon="" :url="route('coupon.index')" :active="request()->routeIs('coupon.index')" />
                 </x-nav-dropdown> --}}

                 {{-- <x-nav-dropdown id="category" title="Categrories" :active="request()->routeIs('category.*')" icon="ri  ri-file-list-line">
                     <x-nav-item title="View All" icon="" :url="route('category.index')" :active="request()->routeIs('category.index')" />
                     <x-nav-item title="Add New" :url="route('category.create')" icon="" :active="request()->routeIs('category.create')" />
                 </x-nav-dropdown> --}}


                 <!-- Review -->
                 {{-- <x-nav-item title="Review" icon="ri ri-settings-2-line" :url="route('review.index')" :active="request()->routeIs('review.index')" /> --}}
                 {{-- <x-nav-item title="Review" icon="ri ri-settings-2-line" :url="route('review.index')" :active="request()->routeIs('review.index')" /> --}}


                 <!-- Navigation -->
                 {{-- <x-nav-dropdown id="navigation" title="Navigation" :active="request()->routeIs('navigation.*')" icon="ri ri-pages-line">
                     <x-nav-item title="View All" icon="" :url="route('navigation.index')" :active="request()->routeIs('navigation.index')" />
                     <x-nav-item title="Add New" :url="route('navigation.create')" icon="" :active="request()->routeIs('navigation.create')" />
                 </x-nav-dropdown> --}}



                 {{-- Faq --}}
                 {{-- <x-nav-dropdown id="faq" title="Faqs" :active="request()->routeIs('faq.*')" icon="ri  ri-question-line">
                     <x-nav-item title="View All" icon="" :url="route('faq.index')" :active="request()->routeIs('faq.index')" />
                     <x-nav-item title="Add New" :url="route('faq.create')" icon="" :active="request()->routeIs('faq.create')" />
                 </x-nav-dropdown> --}}

                 {{-- Newsletter --}}
                 {{-- <x-nav-dropdown id="newsletter" title="Newsletter" :active="request()->routeIs('newsletter.*')" icon="ri-mail-send-line">
                     <x-nav-item title="View All" icon="" :url="route('newsletter.index')" :active="request()->routeIs('newsletter.index')" />
                     <x-nav-item title="Add New" :url="route('newsletter.create')" icon="" :active="request()->routeIs('newsletter.create')" />
                 </x-nav-dropdown> --}}

                 {{-- Coupon --}}
                 {{-- <x-nav-dropdown id="coupon" title="Coupon" :active="request()->routeIs('coupon.*')" icon=" ri-coupon-3-line">
                     <x-nav-item title="View All" icon="" :url="route('coupon.index')" :active="request()->routeIs('coupon.index')" />
                     <x-nav-item title="Add New" :url="route('coupon.create')" icon="" :active="request()->routeIs('coupon.create')" />
                 </x-nav-dropdown> --}}

                 {{-- Campaign --}}
                 {{-- <x-nav-dropdown id="campaign" title="Campaign" :active="request()->routeIs('campaign.*')" icon=" ri-send-plane-fill">
                     <x-nav-item title="View All" icon="" :url="route('campaign.index')" :active="request()->routeIs('campaign.index')" />
                     <x-nav-item title="Add New" :url="route('campaign.create')" icon="" :active="request()->routeIs('campaign.create')" />
                 </x-nav-dropdown> --}}


                 {{-- Customer --}}
                 {{-- <x-nav-dropdown id="Customer" title="Customer" icon="ti ti-calendar" :active="request()->routeIs('customer.*')">
                     <x-nav-item title="View all" icon="" :url="route('customer.index')" :active="request()->routeIs('customer.index') || request()->routeIs('customer.edit')" />
                     <x-nav-item title="Add New" icon="" :url="route('customer.create')" :active="request()->routeIs('customer.create')" />
                 </x-nav-dropdown> --}}



                 {{-- <x-nav-item title="Settings" :url="route('setting.index')" icon="ri ri-settings-2-line" :active="request()->routeIs('setting.index')" /> --}}
                 {{-- Page --}}
                 {{-- <x-nav-dropdown id="sidebarPage" title="Pages" icon="ti ti-calendar" :active="request()->routeIs('page.*')">
                <x-nav-item title="View all" icon="" :url="route('page.index')" :active="request()->routeIs('page.index') || request()->routeIs('page.edit')" />
                <x-nav-item title="Add New" icon="" :url="route('page.create')" :active="request()->routeIs('page.create')" />
            </x-nav-dropdown> --}}



             </ul>
         </div>
         <!-- Sidebar -->
     </div>

     <div class="sidebar-background"></div>
 </div>
 <!-- Left Sidebar End -->
