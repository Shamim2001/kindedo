<div>
    <x-breadcrumb title="Message From Management" />

    @if ($messages)
        <!-- teacher details widget start here-->
        <section class="bd-teacher-widget-area pb-70 pt-120">
            <div class="container">
                <div class="row align-items-start">
                    @foreach ($messages as $key => $message)
                        @if ($key % 2 == 0)
                            <div class="col-lg-6 mb-80">
                                <div class="bd-teacher-widget wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">
                                    <div class="bd-teacher-widget-thumb p-relative">
                                        <img src="{{ getAssetUrl($message->image, 'uploads/promos') }}"
                                            alt="{{ $message->title }}">
                                        <div class="panel wow"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-80">
                                <div class="bd-teacher-widget theme-bg-6 wow fadeInRight" data-wow-duration="1s"
                                    data-wow-delay=".3s">
                                    <div class="bd-teacher-widget-content">
                                        <h3 class="bd-teacher-widget-title">{{ $message->title }}</h3>
                                        <span class="bd-teacher-widget-tag">Teacher</span>
                                        <p>{!! $message->description !!}</p>

                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-lg-6 mb-80 order-lg-2">
                                <div class="bd-teacher-widget wow fadeInRight" data-wow-duration="1s"
                                    data-wow-delay=".3s">
                                    <div class="bd-teacher-widget-thumb p-relative">
                                        <img src="{{ getAssetUrl($message->image, 'uploads/promos') }}"
                                            alt="{{ $message->title }}">
                                        <div class="panel wow"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-80 order-lg-1">
                                <div class="bd-teacher-widget theme-bg-6 wow fadeInLeft" data-wow-duration="1s"
                                    data-wow-delay=".3s">
                                    <div class="bd-teacher-widget-content">
                                        <h3 class="bd-teacher-widget-title">{{ $message->title }}</h3>
                                        <span class="bd-teacher-widget-tag">Teacher</span>
                                        <p>{!! $message->description !!}</p>

                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
        <!-- teacher details widget end here-->

        <!-- routine area start here  -->
        {{-- <section class="bd-routine-2-area pb-120">
        <div class="container">
            <div class="row">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="bd-section-title-wrapper text-center mb-55 wow fadeInUp" data-wow-duration="1s"
                            data-wow-delay=".3s">
                            <h2 class="bd-section-title mb-0">My Time Table</h2>
                            <p>Our multi-level kindergarten programs cater to the age group of 2-5 years<br> with a
                                curriculum
                                focussing children.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bd-routine-2-wrapper wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                <div class="row">
                    <div class="col-12">
                        <div class="bd-routine-2-nav">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="all-class-tab" data-bs-toggle="tab"
                                        data-bs-target="#all-class" type="button" role="tab"
                                        aria-controls="all-class" aria-selected="true">All Class</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="sports-class-tab" data-bs-toggle="tab"
                                        data-bs-target="#sports-class" type="button" role="tab"
                                        aria-controls="sports-class" aria-selected="false">Sports
                                        Classs</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="dancing-class-tab" data-bs-toggle="tab"
                                        data-bs-target="#dancing-class" type="button" role="tab"
                                        aria-controls="dancing-class" aria-selected="false">Dancing
                                        Class</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="drawing-tab" data-bs-toggle="tab"
                                        data-bs-target="#drawing" type="button" role="tab"
                                        aria-controls="drawing" aria-selected="false">Drawing
                                        Class</button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="all-class" role="tabpanel"
                                aria-labelledby="all-class-tab">
                                <div class="bd-routine-2">
                                    <div class="table-responsive d-none d-md-block">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="clr-4">Sunday</th>
                                                    <th scope="col" class="clr-5">Monday</th>
                                                    <th scope="col" class="clr-4">Tuesday</th>
                                                    <th scope="col" class="clr-5">Wednessday</th>
                                                    <th scope="col" class="clr-4">Thursday</th>
                                                    <th scope="col" class="clr-5">Friday</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="clr-5"></td>
                                                    <td class="clr-1">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-6">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-2">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-7">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-4"></td>
                                                </tr>
                                                <tr>
                                                    <td class="clr-6">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-5"></td>
                                                    <td class="clr-3">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-5">

                                                    </td>
                                                    <td class="clr-4"></td>
                                                    <td class="clr-6">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="clr-5"></td>
                                                    <td class="clr-2">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-8">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-4"></td>
                                                    <td class="clr-1">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-4"></td>
                                                </tr>
                                                <tr>
                                                    <td class="clr-3">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-1">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-4"></td>
                                                    <td class="clr-1">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-2">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-5"></td>
                                                </tr>
                                                <tr>
                                                    <td class="clr-5"></td>
                                                    <td class="clr-6">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-2">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-4"></td>
                                                    <td class="clr-3">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-7">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="clr-1">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-5"></td>
                                                    <td class="clr-8">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-7">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-5"></td>
                                                    <td class="clr-4">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="bd-routine-list-wrap d-md-none">
                                        <div class="bd-routine-list">
                                            <h4 class="bd-routine-day">Monday</h4>
                                            <ul>
                                                <li>
                                                    <span class="class-title">Sports Class</span>
                                                    <span>8:00am - 8:30am </span>
                                                </li>
                                                <li>
                                                    <span class="class-title">Dance Class</span>
                                                    <span>8:30am - 9:00am </span>
                                                </li>
                                                <li>
                                                    <span class="class-title">Drowing Class</span>
                                                    <span>9:30am - 10:00am </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bd-routine-list">
                                            <h4 class="bd-routine-day">Tuesday</h4>
                                            <ul>
                                                <li>
                                                    <span class="class-title">Sports Class</span>
                                                    <span>8:00am - 8:30am </span>
                                                </li>
                                                <li>
                                                    <span class="class-title">Dance Class</span>
                                                    <span>8:30am - 9:00am </span>
                                                </li>
                                                <li>
                                                    <span class="class-title">Drowing Class</span>
                                                    <span>9:30am - 10:00am </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bd-routine-list">
                                            <h4 class="bd-routine-day">Wednesday</h4>
                                            <ul>
                                                <li>
                                                    <span class="class-title">Sports Class</span>
                                                    <span>8:00am - 8:30am </span>
                                                </li>
                                                <li>
                                                    <span class="class-title">Dance Class</span>
                                                    <span>8:30am - 9:00am </span>
                                                </li>
                                                <li>
                                                    <span class="class-title">Drowing Class</span>
                                                    <span>9:30am - 10:00am </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bd-routine-list">
                                            <h4 class="bd-routine-day">Thursday</h4>
                                            <ul>
                                                <li>
                                                    <span class="class-title">Sports Class</span>
                                                    <span>8:00am - 8:30am </span>
                                                </li>
                                                <li>
                                                    <span class="class-title">Dance Class</span>
                                                    <span>8:30am - 9:00am </span>
                                                </li>
                                                <li>
                                                    <span class="class-title">Drowing Class</span>
                                                    <span>9:30am - 10:00am </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bd-routine-list">
                                            <h4 class="bd-routine-day">Friday</h4>
                                            <ul>
                                                <li>
                                                    <span class="class-title">Sports Class</span>
                                                    <span>8:00am - 8:30am </span>
                                                </li>
                                                <li>
                                                    <span class="class-title">Dance Class</span>
                                                    <span>8:30am - 9:00am </span>
                                                </li>
                                                <li>
                                                    <span class="class-title">Drowing Class</span>
                                                    <span>9:30am - 10:00am </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bd-routine-list">
                                            <h4 class="bd-routine-day">Saturday</h4>
                                            <ul>
                                                <li>
                                                    <span class="class-title">Sports Class</span>
                                                    <span>8:00am - 8:30am </span>
                                                </li>
                                                <li>
                                                    <span class="class-title">Dance Class</span>
                                                    <span>8:30am - 9:00am </span>
                                                </li>
                                                <li>
                                                    <span class="class-title">Drowing Class</span>
                                                    <span>9:30am - 10:00am </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="sports-class" role="tabpanel"
                                aria-labelledby="sports-class-tab">
                                <div class="bd-routine-2">
                                    <div class="table-responsive d-none d-md-block">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="clr-4">Sunday</th>
                                                    <th scope="col" class="clr-5">Monday</th>
                                                    <th scope="col" class="clr-4">Tuesday</th>
                                                    <th scope="col" class="clr-5">Wednessday</th>
                                                    <th scope="col" class="clr-4">Thursday</th>
                                                    <th scope="col" class="clr-5">Friday</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="clr-5"></td>
                                                    <td class="clr-3">
                                                        8:00am - 8:30am
                                                        <span>Sports Class</span>
                                                    </td>
                                                    <td class="clr-6">
                                                        8:00am - 8:30am
                                                        <span>Sports Class</span>
                                                    </td>
                                                    <td class="clr-1">
                                                        8:00am - 8:30am
                                                        <span>Sports Class</span>
                                                    </td>
                                                    <td class="clr-7">
                                                        8:00am - 8:30am
                                                        <span>Sports Class</span>
                                                    </td>
                                                    <td class="clr-4"></td>
                                                </tr>
                                                <tr>
                                                    <td class="clr-6">
                                                        8:00am - 8:30am
                                                        <span>Sports Class</span>
                                                    </td>
                                                    <td class="clr-5"></td>
                                                    <td class="clr-2">
                                                        8:00am - 8:30am
                                                        <span>Sports Class</span>
                                                    </td>
                                                    <td class="clr-5">

                                                    </td>
                                                    <td class="clr-4"></td>
                                                    <td class="clr-6">
                                                        8:00am - 8:30am
                                                        <span>Sports Class</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="clr-5"></td>
                                                    <td class="clr-3">
                                                        8:00am - 8:30am
                                                        <span>Sports Class</span>
                                                    </td>
                                                    <td class="clr-8">
                                                        8:00am - 8:30am
                                                        <span>Sports Class</span>
                                                    </td>
                                                    <td class="clr-4"></td>
                                                    <td class="clr-2">
                                                        8:00am - 8:30am
                                                        <span>Sports Class</span>
                                                    </td>
                                                    <td class="clr-4"></td>
                                                </tr>
                                                <tr>
                                                    <td class="clr-3">
                                                        8:00am - 8:30am
                                                        <span>Sports Class</span>
                                                    </td>
                                                    <td class="clr-2">
                                                        8:00am - 8:30am
                                                        <span>Sports Class</span>
                                                    </td>
                                                    <td class="clr-4"></td>
                                                    <td class="clr-1">
                                                        8:00am - 8:30am
                                                        <span>Sports Class</span>
                                                    </td>
                                                    <td class="clr-2">
                                                        8:00am - 8:30am
                                                        <span>Sports Class</span>
                                                    </td>
                                                    <td class="clr-5"></td>
                                                </tr>
                                                <tr>
                                                    <td class="clr-5"></td>
                                                    <td class="clr-6">
                                                        8:00am - 8:30am
                                                        <span>Sports Class</span>
                                                    </td>
                                                    <td class="clr-2">
                                                        8:00am - 8:30am
                                                        <span>Sports Class</span>
                                                    </td>
                                                    <td class="clr-4"></td>
                                                    <td class="clr-3">
                                                        8:00am - 8:30am
                                                        <span>Sports Class</span>
                                                    </td>
                                                    <td class="clr-7">
                                                        8:00am - 8:30am
                                                        <span>Sports Class</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="clr-1">
                                                        8:00am - 8:30am
                                                        <span>Sports Class</span>
                                                    </td>
                                                    <td class="clr-5"></td>
                                                    <td class="clr-8">
                                                        8:00am - 8:30am
                                                        <span>Sports Class</span>
                                                    </td>
                                                    <td class="clr-7">
                                                        8:00am - 8:30am
                                                        <span>Sports Class</span>
                                                    </td>
                                                    <td class="clr-5"></td>
                                                    <td class="clr-4">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="bd-routine-list-wrap d-md-none">
                                        <div class="bd-routine-list">
                                            <h4 class="bd-routine-day">Monday</h4>
                                            <ul>
                                                <li>
                                                    <span class="class-title">Sports Class</span>
                                                    <span>8:00am - 8:30am </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bd-routine-list">
                                            <h4 class="bd-routine-day">Tuesday</h4>
                                            <ul>
                                                <li>
                                                    <span class="class-title">Sports Class</span>
                                                    <span>8:00am - 8:30am </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bd-routine-list">
                                            <h4 class="bd-routine-day">Wednesday</h4>
                                            <ul>
                                                <li>
                                                    <span class="class-title">Sports Class</span>
                                                    <span>8:00am - 8:30am </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bd-routine-list">
                                            <h4 class="bd-routine-day">Thursday</h4>
                                            <ul>
                                                <li>
                                                    <span class="class-title">Sports Class</span>
                                                    <span>8:00am - 8:30am </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bd-routine-list">
                                            <h4 class="bd-routine-day">Friday</h4>
                                            <ul>
                                                <li>
                                                    <span class="class-title">Sports Class</span>
                                                    <span>8:00am - 8:30am </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bd-routine-list">
                                            <h4 class="bd-routine-day">Saturday</h4>
                                            <ul>
                                                <li>
                                                    <span class="class-title">Sports Class</span>
                                                    <span>8:00am - 8:30am </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="dancing-class" role="tabpanel"
                                aria-labelledby="dancing-class-tab">
                                <div class="bd-routine-2">
                                    <div class="table-responsive d-none d-md-block">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="clr-4">Sunday</th>
                                                    <th scope="col" class="clr-5">Monday</th>
                                                    <th scope="col" class="clr-4">Tuesday</th>
                                                    <th scope="col" class="clr-5">Wednessday</th>
                                                    <th scope="col" class="clr-4">Thursday</th>
                                                    <th scope="col" class="clr-5">Friday</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="clr-5"></td>
                                                    <td class="clr-1">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-6">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-2">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-7">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-4"></td>
                                                </tr>
                                                <tr>
                                                    <td class="clr-6">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-5"></td>
                                                    <td class="clr-3">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-5">

                                                    </td>
                                                    <td class="clr-4"></td>
                                                    <td class="clr-6">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="clr-5"></td>
                                                    <td class="clr-2">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-8">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-4"></td>
                                                    <td class="clr-1">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-4"></td>
                                                </tr>
                                                <tr>
                                                    <td class="clr-3">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-1">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-4"></td>
                                                    <td class="clr-1">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-2">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-5"></td>
                                                </tr>
                                                <tr>
                                                    <td class="clr-5"></td>
                                                    <td class="clr-6">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-2">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-4"></td>
                                                    <td class="clr-3">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-7">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="clr-1">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-5"></td>
                                                    <td class="clr-8">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-7">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-5"></td>
                                                    <td class="clr-4">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="bd-routine-list-wrap d-md-none">
                                        <div class="bd-routine-list">
                                            <h4 class="bd-routine-day">Monday</h4>
                                            <ul>
                                                <li>
                                                    <span class="class-title">Dance Class</span>
                                                    <span>8:30am - 9:00am </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bd-routine-list">
                                            <h4 class="bd-routine-day">Tuesday</h4>
                                            <ul>
                                                <li>
                                                    <span class="class-title">Dance Class</span>
                                                    <span>8:30am - 9:00am </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bd-routine-list">
                                            <h4 class="bd-routine-day">Wednesday</h4>
                                            <ul>
                                                <li>
                                                    <span class="class-title">Dance Class</span>
                                                    <span>8:30am - 9:00am </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bd-routine-list">
                                            <h4 class="bd-routine-day">Thursday</h4>
                                            <ul>
                                                <li>
                                                    <span class="class-title">Dance Class</span>
                                                    <span>8:30am - 9:00am </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bd-routine-list">
                                            <h4 class="bd-routine-day">Friday</h4>
                                            <ul>
                                                <li>
                                                    <span class="class-title">Dance Class</span>
                                                    <span>8:30am - 9:00am </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bd-routine-list">
                                            <h4 class="bd-routine-day">Saturday</h4>
                                            <ul>
                                                <li>
                                                    <span class="class-title">Dance Class</span>
                                                    <span>8:30am - 9:00am </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="drawing" role="tabpanel" aria-labelledby="drawing-tab">
                                <div class="bd-routine-2">
                                    <div class="table-responsive d-none d-md-block">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="clr-4">Sunday</th>
                                                    <th scope="col" class="clr-5">Monday</th>
                                                    <th scope="col" class="clr-4">Tuesday</th>
                                                    <th scope="col" class="clr-5">Wednessday</th>
                                                    <th scope="col" class="clr-4">Thursday</th>
                                                    <th scope="col" class="clr-5">Friday</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="clr-5"></td>
                                                    <td class="clr-3">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-6">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-1">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-7">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-4"></td>
                                                </tr>
                                                <tr>
                                                    <td class="clr-6">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-5"></td>
                                                    <td class="clr-2">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-5">

                                                    </td>
                                                    <td class="clr-4"></td>
                                                    <td class="clr-6">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="clr-5"></td>
                                                    <td class="clr-1">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-8">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-4"></td>
                                                    <td class="clr-3">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-4"></td>
                                                </tr>
                                                <tr>
                                                    <td class="clr-2">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-3">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-4"></td>
                                                    <td class="clr-1">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-3">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-5"></td>
                                                </tr>
                                                <tr>
                                                    <td class="clr-5"></td>
                                                    <td class="clr-6">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-2">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-4"></td>
                                                    <td class="clr-3">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-7">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="clr-1">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-5"></td>
                                                    <td class="clr-8">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-7">
                                                        8:00am - 8:30am
                                                        <span> Play Class</span>
                                                    </td>
                                                    <td class="clr-5"></td>
                                                    <td class="clr-4">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="bd-routine-list-wrap d-md-none">
                                        <div class="bd-routine-list">
                                            <h4 class="bd-routine-day">Monday</h4>
                                            <ul>
                                                <li>
                                                    <span class="class-title">Drowing Class</span>
                                                    <span>9:30am - 10:00am </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bd-routine-list">
                                            <h4 class="bd-routine-day">Tuesday</h4>
                                            <ul>
                                                <li>
                                                    <span class="class-title">Drowing Class</span>
                                                    <span>9:30am - 10:00am </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bd-routine-list">
                                            <h4 class="bd-routine-day">Wednesday</h4>
                                            <ul>
                                                <li>
                                                    <span class="class-title">Drowing Class</span>
                                                    <span>9:30am - 10:00am </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bd-routine-list">
                                            <h4 class="bd-routine-day">Thursday</h4>
                                            <ul>
                                                <li>
                                                    <span class="class-title">Drowing Class</span>
                                                    <span>9:30am - 10:00am </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bd-routine-list">
                                            <h4 class="bd-routine-day">Friday</h4>
                                            <ul>
                                                <li>
                                                    <span class="class-title">Drowing Class</span>
                                                    <span>9:30am - 10:00am </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bd-routine-list">
                                            <h4 class="bd-routine-day">Saturday</h4>
                                            <ul>
                                                <li>
                                                    <span class="class-title">Drowing Class</span>
                                                    <span>9:30am - 10:00am </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
        <!-- routine area end here  -->
    @endif
</div>
