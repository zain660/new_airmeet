<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airmeet</title>
    <!-- Font Awsome Icons Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <style>
        :root {
            --green-color: #24695c;
            --green-color-hover: #185146;
            --white-color: #fff;
        }

        .btn-green {
            background-color: var(--green-color) !important;
            color: var(--white-color) !important;
            outline: none !important;
            border: none !important;
            transition: 400ms;
        }

        .btn-green:hover {
            background: var(--green-color-hover) !important;
        }

        button.outlined {
            background-color: var(--white-color) !important;
            color: var(--green-color) !important;
            outline: 1px solid var(--green-color) !important;
            border: none;
            transition: 400ms;
        }

        a.green-link {
            color: var(--green-color) !important;
        }

        header {
            position: sticky;
            top: 0;
            background: var(--white-color);
            z-index: 10000;
        }


        .header {
            border-bottom: 0.5px solid white;

        }

        header nav li {
            margin: 0 10px;
        }

        header .popup {
            top: 4rem;
            width: max-content;
        }


        /* Header End */





        /* Section1 Start */

        #section1 p {
            color: #7C7891;
        }

        #section1 .btn-outline-info:hover {
            transition: 400ms;
            background: #1D1C22;
        }

        #section1 .btn-outline-info:focus {
            background: #1D1C22;
        }

        /* Section1 End */


        /* Section2 Start */

        #section2 {
            background: var(--green-color);
            color: var(--white-color);
            border-radius: 1.5rem;
        }

        #section2 img {
            width: 3.5rem;
        }

        #section2 .eventImageBox {
            font-size: 3rem;
        }

        /* Section2 End */


        /* Section3 Start */

        .nav-tabs button {
            background: none !important;
            color: black !important;
        }

        .nav-tabs button.active {
            background: var(--green-color) !important;
            color: var(--white-color) !important;
        }


        /* Section3 End */



        /* Footer Start */

        footer li a {
            transition: 300ms;
        }

        footer li a:hover {
            color: var(--green-color-hover) !important;
        }

        /* Footer End */
    </style>
</head>

<body>
    <header class="border-bottom shadow">
        <nav class="navbar navbar-expand-lg header">
            <div class="container">
                <a class="navbar-brand fs-3" href="#">Airmeet</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item position-relative">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Product
                            </a> 
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Platform
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">Customers</a>
                        </li>
                        <li class="nav-item position-relative">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Resources
                            </a>
                            <!-- <div class="container position-absolute popup">
                                <div class="row">
                                    <div class="col">
                                        <a href=""></a>
                                        <small>Host live or on-demand webinars with
                                        a strong engagement focus</small>
                                        <button class="btn-air">
                                            Try for free
                                            <i></i>
                                        </button>
                                    </div>
                                    <div class="col">asvdgavsf</div>
                                </div>
                            </div> -->
                        </li>
                    </ul>
                    @if(Auth::check())
                        @if(Auth::user()->is_social_avatar ==0)
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <img src="https://us.123rf.com/450wm/luismolinero/luismolinero1909/luismolinero190917934/130592146-handsome-young-man-in-pink-shirt-over-isolated-blue-background-keeping-the-arms-crossed-in-frontal-p.jpg?ver=6" alt="" srcset=""style="width: 41px;border-radius: 127%;height: 40px;">
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                          @else 
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_thumb" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{Auth::user()->avatar}}" alt="" srcset=""style="width: 41px;border-radius: 127%;height: 40px;">
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdown_thumb">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                         @endif 
                        @else 
                        <a href="/login" class="btn btn-primary"><i class="fa fa-sign-in"></i> Account</a>
                    @endif
                </div>
            </div>
        </nav>
    </header>


    <section id="section1" class="mt-5">
        <div class="container">
            <div class="row pt-5 align-items-center">
                <div class="col-md-5">
                    <h1 class="text-white-50">Struggling with low event engagement & ROI?</h1>
                    <h1 class="my-3 fa-3x">We can fix that.</h1>
                    <p class="lead">Use the most customizable hybrid events platform to deliver immersive and
                        interactive experiences</p>
                    <div class="d-flex flex-column gap-2">
                        <button class="btn outlined py-3">Try for Free</button>
                        <button class="btn btn-green py-3">Book a Demo</button>
                        <small class="text-center mt-2">Humanizing events for thousands of organizations
                            worldwide</small>
                    </div>
                </div>
                <div class="col-md-7">
                    <video class="elementor-video" src="https://www.airmeet.com/hub/wp-content/uploads/2022/01/Immerse-Yourself-in-the-Airmeet-Experience.mp4" autoplay="" loop="" muted="muted" playsinline="" controlslist="nodownload" poster="https://cdn-cpdoj.nitrocdn.com/bdPRQtAGdEdDThAkFvaCqXUlcEqEsAJN/assets/static/optimized/rev-9cc091c/hub/wp-content/uploads/2022/01/image-162.png" __idm_id__="262146" width="100%"></video>
                </div>
            </div>
        </div>
    </section>


    <section id="section2" class="my-5 py-5">
        <div class="container">
            <h3 class="text-center">Make Your Events Standout with Airmeet</h3>
            <div class="row gap-3 my-5">
                <div class="col-md text-center">
                    <div class="eventImageBox"><img src="https://cdn-cpdoj.nitrocdn.com/bdPRQtAGdEdDThAkFvaCqXUlcEqEsAJN/assets/static/optimized/rev-9cc091c/hub/wp-content/uploads/2021/12/Vector-1.png" alt="">98%</div>
                    <p>Engage everyone till the end</p>
                    <small>Witness a 70% jump in your sit-through rate by delivering an immersive attendee
                        experience.</small>
                </div>
                <div class="col-md text-center">
                    <div class="eventImageBox"><img src="https://cdn-cpdoj.nitrocdn.com/bdPRQtAGdEdDThAkFvaCqXUlcEqEsAJN/assets/static/optimized/rev-9cc091c/hub/wp-content/uploads/2021/12/Vector-1.png" alt="">98%</div>
                    <p>Engage everyone till the end</p>
                    <small>Witness a 70% jump in your sit-through rate by delivering an immersive attendee
                        experience.</small>
                </div>
                <div class="col-md text-center">
                    <div class="eventImageBox"><img src="https://cdn-cpdoj.nitrocdn.com/bdPRQtAGdEdDThAkFvaCqXUlcEqEsAJN/assets/static/optimized/rev-9cc091c/hub/wp-content/uploads/2021/12/Vector-1.png" alt="">98%</div>
                    <p>Engage everyone till the end</p>
                    <small>Witness a 70% jump in your sit-through rate by delivering an immersive attendee
                        experience.</small>
                </div>
            </div>
        </div>
    </section>


    <section id="section3">
        <h1 class="m-auto w-75 text-center fw-bold">Stay connected & keep your audience engaged throughout the year</h1>
        <nav class="my-5">
            <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                <button class="nav-link px-5 mx-5 border fs-4 active bg-purple" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Social Webinar</button>
                <button class="nav-link px-5 mx-5 border fs-4" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Conference</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active container" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                <div class="row pt-5 align-items-center">
                    <div class="col-md-5 p-5">
                        <h2>Spark deep attendee conversations, organically</h2>
                        <p>Host interactive webinars, community meetups, training workshops, and town halls
                            that bring everyone closer.</p>
                        <div class="d-flex flex-column">
                            <button class="btn btn-green py-3">Start for Free</button>
                        </div>
                        <div class="border-bottom mt-4">
                            <a href="" class="mt-4 nav-link green-link"> Explore Social Webinars<i class="fa-solid fa-angle-right ms-3"></i></a>
                        </div>
                    </div>
                    <div class="col-md-7 p-5">
                        <video class="elementor-video" src="https://www.airmeet.com/hub/wp-content/uploads/2022/01/Immerse-Yourself-in-the-Airmeet-Experience.mp4" autoplay="" loop="" muted="muted" playsinline="" controlslist="nodownload" poster="https://cdn-cpdoj.nitrocdn.com/bdPRQtAGdEdDThAkFvaCqXUlcEqEsAJN/assets/static/optimized/rev-9cc091c/hub/wp-content/uploads/2022/01/image-162.png" __idm_id__="262146" width="100%"></video>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade container" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                <div class="row pt-5 align-items-center">
                    <div class="col-md-7">
                        <video class="elementor-video" src="https://www.airmeet.com/hub/wp-content/uploads/2021/12/GIF_05-Conference.mp4" autoplay="" loop="" muted="muted" playsinline="" controlslist="nodownload" poster="https://cdn-cpdoj.nitrocdn.com/bdPRQtAGdEdDThAkFvaCqXUlcEqEsAJN/assets/static/optimized/rev-9cc091c/hub/wp-content/uploads/2022/01/image-162.png" __idm_id__="262146" width="100%"></video>
                    </div>
                    <div class="col-md-5 p-5">
                        <h2>Build the most memorable experiences that deliver better ROI.</h2>
                        <p>Brand your virtual and hybrid events, fairs, and summits with the most vibrant reception, networking lounge, and booth at scale.</p>
                        <div class="d-flex flex-column">
                            <button class="btn btn-green py-3">Try Now</button>
                        </div>
                        <div class="border-bottom mt-4">
                            <a href="" class="mt-4 nav-link green-link"> Book a Demo<i class="fa-solid fa-angle-right ms-3"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="section4" class="mt-5">
        <div class="container">
            <h2 class="text-center fw-bold">Why host your next event with us</h2>
            <div class="row my-5 align-items-center">
                <div class="col-md">
                    <img src="https://cdn-cpdoj.nitrocdn.com/bdPRQtAGdEdDThAkFvaCqXUlcEqEsAJN/assets/static/optimized/rev-a943f28/hub/wp-content/uploads/2021/12/image-159-2.png" class="img-fluid" alt="">
                </div>
                <div class="col-md">
                    <div class="row p-4 align-items-center border rounded-2">
                        <div class="col-8">
                            <h4>Network Anywhere, Effortlessly</h4>
                            <small>Empower your attendees to break-ice and forge a deep connection with everyone organically</small>
                        </div>
                        <div class="col">
                            <button class="btn btn-sm btn-green">Explore Networking</button>
                        </div>
                    </div>
                    <div class="row p-4 align-items-center border rounded-2 mt-3">
                        <div class="col-8">
                            <h4>Network Anywhere, Effortlessly</h4>
                            <small>Empower your attendees to break-ice and forge a deep connection with everyone organically</small>
                        </div>
                        <div class="col">
                            <button class="btn btn-sm btn-green">Explore Networking</button>
                        </div>
                    </div>
                    <div class="row p-4 align-items-center border rounded-2 mt-3">
                        <div class="col-8">
                            <h4>Network Anywhere, Effortlessly</h4>
                            <small>Empower your attendees to break-ice and forge a deep connection with everyone organically</small>
                        </div>
                        <div class="col">
                            <button class="btn btn-sm btn-green">Explore Networking</button>
                        </div>
                    </div>
                    <div class="row p-4 align-items-center border rounded-2 mt-3">
                        <div class="col-8">
                            <h4>Network Anywhere, Effortlessly</h4>
                            <small>Empower your attendees to break-ice and forge a deep connection with everyone organically</small>
                        </div>
                        <div class="col">
                            <button class="btn btn-sm btn-green">Explore Networking</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <section id="section5">
        <div class="container">
            <div class="row gap-3 align-items-center">
                <div class="col-md">
                    <video class="elementor-video" src="https://www.airmeet.com/hub/wp-content/uploads/2021/12/GIF_05-Conference.mp4" autoplay="" loop="" muted="muted" playsinline="" controlslist="nodownload" poster="https://cdn-cpdoj.nitrocdn.com/bdPRQtAGdEdDThAkFvaCqXUlcEqEsAJN/assets/static/optimized/rev-9cc091c/hub/wp-content/uploads/2022/01/image-162.png" __idm_id__="262146" width="100%"></video>
                </div>
                <div class="col-md">
                    <h4>“Airmeet is my favorite webinar & conferencing platform. It is a great tool for gathering our users and having a good
                        and friendly environment for presentations and social networking.”</h4>
                    <span>Chris Mottes</span>
                    <p>CEO & Partner at Hindenburg Systems</p>
                    <a href="" class="nav-link green-link">Read more stories <i class="fa-solid fa-angle-right ms-3"></i></a>
                </div>
            </div>
        </div>
    </section>

    <section id="section6" class="my-5">
        <div class="container">
            <h2 class="text-center fw-bold">Discover Airmeets around the world</h2>
            <div class="row mt-5">
                <div class="col-lg-4 col-md-6 col-sm">
                    <div class="card">
                        <img src="https://d2k14tloeqh93s.cloudfront.net/airmeet_4c58cbcb-3668-4afb-b90a-a4d9aa183c1b.png?w=768&h=520" class="card-img-top" alt="...">
                        <div class="card-body p-3">
                            <div class="border-bottom d-flex py-2 justify-content-between">
                                <div>
                                    <small class="text-muted">Event date</small>
                                    <h4>June 9</h4>
                                </div>
                                <div>
                                    <small class="text-muted">Start time</small>
                                    <h4>06:45 <span>IST</span></h4>
                                </div>
                            </div>
                            <div class="mt-3">
                                <p class="text-muted">GLOBAL SUPPLY CHAIN COUNCIL</p>
                                <p class="card-text">Future Warehouse Asia</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm">
                    <div class="card">
                        <img src="https://d2k14tloeqh93s.cloudfront.net/airmeet_eba6af20-632a-40d3-adff-28718903d350.png?w=768&h=520" class="card-img-top" alt="...">
                        <div class="card-body p-3">
                            <div class="border-bottom d-flex py-2 justify-content-between">
                                <div>
                                    <small class="text-muted">Event date</small>
                                    <h4>June 9</h4>
                                </div>
                                <div>
                                    <small class="text-muted">Start time</small>
                                    <h4>06:45 <span>IST</span></h4>
                                </div>
                            </div>
                            <div class="mt-3">
                                <p class="text-muted">GLOBAL SUPPLY CHAIN COUNCIL</p>
                                <p class="card-text">Future Warehouse Asia</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm">
                    <div class="card">
                        <img src="https://d2k14tloeqh93s.cloudfront.net/airmeet_59a6cdad-2a50-415a-b96c-8c65af825af8.jpg?w=768&h=520" class="card-img-top" alt="...">
                        <div class="card-body p-3">
                            <div class="border-bottom d-flex py-2 justify-content-between">
                                <div>
                                    <small class="text-muted">Event date</small>
                                    <h4>June 9</h4>
                                </div>
                                <div>
                                    <small class="text-muted">Start time</small>
                                    <h4>06:45 <span>IST</span></h4>
                                </div>
                            </div>
                            <div class="mt-3">
                                <p class="text-muted">GLOBAL SUPPLY CHAIN COUNCIL</p>
                                <p class="card-text">Future Warehouse Asia</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer class="mt-5 shadow-lg pt-5">
        <div class="container pt-5">
            <div class="row gap-md-3">
                <div class="col-lg col-md-4 col-sm-6">
                    <a class="navbar-brand fs-3" href="#">Airmeet</a>
                    <ul class="list-unstyled nav-links">
                        <li class="mt-3"><a href="" class="nav-link text-muted">About Us</a></li>
                        <li class="mt-3"><a href="" class="nav-link text-muted">Careers</a></li>
                        <li class="mt-3"><a href="" class="nav-link text-muted">Get in touch</a></li>
                        <li class="mt-3"><a href="" class="nav-link text-muted">Join our community</a></li>
                        <li class="mt-3"><a href="" class="nav-link text-muted">Become our partner</a></li>
                        <li class="mt-3"><a href="" class="nav-link text-muted">Press & Media Kit</a></li>
                        <li class="mt-3"><a href="" class="nav-link text-muted">Security & Compliance</a></li>
                        <li class="mt-3"><a href="" class="nav-link text-muted">Responsible Disclosure</a></li>
                    </ul>
                </div>
                <div class="col-lg col-md-4 col-sm-6">
                    <a class="navbar-brand fs-3" href="#">Product</a>
                    <ul class="list-unstyled nav-links">
                        <li class="mt-3"><a href="" class="nav-link text-muted">Features</a></li>
                        <li class="mt-3"><a href="" class="nav-link text-muted">Pricing</a></li>
                        <li class="mt-3"><a href="" class="nav-link text-muted">Compare</a></li>
                        <li class="mt-3"><a href="" class="nav-link text-muted">What's new</a></li>
                    </ul>
                    <ul class="list-unstyled nav-links mt-5">
                        <li class="mt-3 fw-bold">Mobile Apps</li>
                        <li class="mt-3"><a href="" class="nav-link"><img src="https://cdn-cpdoj.nitrocdn.com/bdPRQtAGdEdDThAkFvaCqXUlcEqEsAJN/assets/static/optimized/rev-a943f28/hub/wp-content/uploads/2021/03/Group-4968-1-300x87.png" width="130" alt=""></a></li>
                        <li class="mt-3"><a href="" class="nav-link"><img src="https://cdn-cpdoj.nitrocdn.com/bdPRQtAGdEdDThAkFvaCqXUlcEqEsAJN/assets/static/optimized/rev-a943f28/hub/wp-content/uploads/2021/03/Group-4969-1-300x86.png" width="130" alt=""></a></li>
                    </ul>
                </div>
                <div class="col-lg col-md-4 col-sm-6">
                    <a class="navbar-brand fs-3" href="#">Solutions</a>
                    <ul class="list-unstyled nav-links">
                        <li class="mt-3 fw-bold">Industries</li>
                        <li class="mt-3"><a href="" class="nav-link text-muted">Features</a></li>
                        <li class="mt-3"><a href="" class="nav-link text-muted">Pricing</a></li>
                        <li class="mt-3"><a href="" class="nav-link text-muted">Compare</a></li>
                        <li class="mt-3"><a href="" class="nav-link text-muted">What's new</a></li>
                    </ul>
                    <ul class="list-unstyled nav-links mt-5">
                        <li class="mt-3 fw-bold">Use cases</li>
                        <li class="mt-3"><a href="" class="nav-link text-muted">Job fairs</a></li>
                        <li class="mt-3"><a href="" class="nav-link text-muted">Award ceremonies</a></li>
                        <li class="mt-3"><a href="" class="nav-link text-muted">Conferences</a></li>
                    </ul>
                </div>
                <div class="col-lg col-md-4 col-sm-6">
                    <a class="navbar-brand fs-3" href="#">Resources</a>
                    <ul class="list-unstyled nav-links">
                        <li class="mt-3"><a href="" class="nav-link text-muted">Events</a></li>
                        <li class="mt-3"><a href="" class="nav-link text-muted">Blogs</a></li>
                        <li class="mt-3"><a href="" class="nav-link text-muted">eBooks</a></li>
                        <li class="mt-3"><a href="" class="nav-link text-muted">FAQs</a></li>
                        <li class="mt-3"><a href="" class="nav-link text-muted">Customers stories</a></li>
                        <li class="mt-3"><a href="" class="nav-link text-muted">Knowledge base</a></li>
                    </ul>
                </div>
                <div class="col-lg col-md-4 col-sm-6">
                    <a class="navbar-brand fs-3" href="#">Support</a>
                    <ul class="list-unstyled nav-links">
                        <li class="mt-3"><a href="" class="nav-link text-muted">support@airmeet.com</a></li>
                        <li class="mt-3">24×7 Support Lounge</li>
                        @if(Auth::check())
                            <li class="mt-3"><a href="{{route('user.inquiry')}}" class="nav-link text-muted">Inquiry</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row border-top mt-5">
                <div class="col">
                    <ul class="list-unstyled nav-links d-flex align-items-center">
                        <li class="mt-3 mx-3"><a href="" class="nav-link text-muted">Terms</a></li>
                        <li class="mt-3 mx-3"><a href="" class="nav-link text-muted">Privacy</a></li>
                        <li class="mt-3 mx-3"><a href="" class="nav-link text-muted">ISO 27001:2013 Certified</a></li>
                        <li class="mt-3 mx-3"><a href="" class="nav-link text-muted">Status</a></li>
                    </ul>
                </div>
                <div class="col">
                    <ul class="list-unstyled nav-links d-flex align-items-center justify-content-end ms-auto">
                        <li class="mt-3 mx-5">Connect with us on</li>
                        <li class="mt-3 mx-2"><a href="" class="nav-link text-muted fs-5"><i class="fa-brands fa-facebook"></i></a></li>
                        <li class="mt-3 mx-2"><a href="" class="nav-link text-muted fs-5"><i class="fa-brands fa-linkedin"></i></a></li>
                        <li class="mt-3 mx-2"><a href="" class="nav-link text-muted fs-5"><i class="fa-brands fa-twitter"></i></a></li>
                        <li class="mt-3 mx-2"><a href="" class="nav-link text-muted fs-5"><i class="fa-brands fa-youtube"></i></a></li>
                        <li class="mt-3 mx-2"><a href="" class="nav-link text-muted fs-5"><i class="fa-brands fa-instagram"></i></a></li>

                    </ul>
                </div>
            </div>
        </div>
    </footer>


</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</html>