<!DOCTYPE HTML>
<html>
    <head>
        <title>USTCCC</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="/assets/css/main.css" />
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
        <link rel="shortcut icon" type="image/png" href="assets/images/head_logo2.png" />
        <noscript>
            <link rel="stylesheet" href="/assets/css/noscript.css" /></noscript>
    </head>
<body class="is-preload landing main">
    <div id="page-wrapper">
        <!-- Header -->
        <header id="header">
     
            <h1 id="logo"><span class="usthead"><a href="/">UST</span>
                <span class="usthead2">COUNSELING AND CAREER</a></span>
            </h1>
            <nav id="nav">
                <ul>
                  
    
                    <li> <a href="{{route('events')}}">EVENTS AND UPDATES</a> </li>
                    <li> <a href="{{route('jobs')}}">JOB LISTINGS</a> </li>
                        @if(auth()->guest())
                        <li>    <a href="{{route('login')}}">RESUME CLINIC</a> </li>
                            @elseif(auth()->user()->isStudent())
                            <li>    <a href="{{route('submission.index')}}">RESUME CLINIC</a> </li>
                         @endif
                            <!-- NOSIDEBAR 
                        <ul>
                         
                            <li><a href="{{route('events')}}">EVENTS AND UPDATES</a></li>
                            <li><a href="{{route('jobs')}}">JOB LISTINGS</a></li>
                            @if(auth()->guest())
                            <li><a href="{{route('login')}}">RESUME CLINIC</a></li>
                            @elseif(auth()->user()->isStudent())
                            <li><a href="{{route('submission.index')}}">RESUME CLINIC</a></li>
                            @endif
                       
                        </ul>
                            FORMER SUBMENU -->
                 
                @if(auth()->guest())
                <li><a href="{{ route('login') }}" class="button primary">Login</a></li>
                @elseif(auth()->user()->isAdmin())
                <li><a href="{{route('indexadmin')}}" class="button primary">Admin Dashboard</a></li>
                @elseif(auth()->user()->isCounselor())
                <li><a href="{{route('indexcounselor')}}" class="button primary">Counselor Dashboard</a></li>
                @elseif(auth()->user()->isStudent())
                <li><a href="{{route('indexstudent')}}" class="button primary">Profile</a></li>
                @endif
                </ul>
            </nav>
        </header>

        <!-- Banner -->
        <section id="banner">
            <div class="content">
                <header>
                    <img src="{{url('assets/images/headlogo.png')}}" class="lcenter" >
                    <h2 align="left">University of Santo Tomas</h2>
                    <h2 class="usttitle" align="left">{{$settings->site_name}}</h2>
                    <P align="left">Empowering Thomasians to MAP(Meaningful and Purposeful) Careers</P>
                </header>
            </div>
            <a href="#one" class="goto-next scrolly">Next</a>
        </section>

        <!-- One -->
        <section id="one" class="spotlight style1 bottom">
            <span class="image fit main"><img src="{{url('assets/images/services.jpg')}}" alt="" /></span>
            <div class="content">
                <div class="container">
                    <header class="major">
                        <h2>SERVICES OFFERED</h2>
                    </header>
                    <div class="row">
                        <div class="col-4 col-12-medium">
                            <h3>Career Development and Training </h3>
                            <br>
                            <ul>
                                <li>Thomasian has G.U.T.S: Gear-up Tools for Success (ThomGUTS)</li>
                                <li>Mock Interview Sessions</li>
                                <li>Resume Clinic</li>
                                <li>OJT/Practicum/Internship Orientation</li>
                                <li>Career Information for Students – employment and internship postings</li>
                            </ul>
                        </div>
                        <div class="col-4 col-12-medium">
                            <h3>Employer Partnership Program</h3>
                            <br>
                            <ul>
                                <li>University-Wide Career Fair</li>
                                <li>Information sessions</li>
                                <li>On-campus interviews and recruitment</li>
                            </ul>
                        </div>
                        <div class="col-4 col-12-medium">
                            <h3>Career Ambassadors’ Training Program</h3>
                            <ul>
                                <li>Recruitment</li>
                                <li>Basic Training for New Career Ambassadors</li>
                                <li>Advanced Training for current Career Ambassadors</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#two" class="goto-next scrolly">Next</a>
        </section>

        <!-- Two -->
        <section id="two" class="spotlight style2 right">
            <span class="image fit main"><img src="{{url('assets/images/ustccc1.jpg')}}" alt="" /></span>
            <div class="content">
                <div class="events">
                    <div class="events-content">
                        <header class="major">
                            <h2 class="nospace">About Us</h2>
                        </header>
                        <strong>
                            <h4 class="robotthin">As part of the University of Santo Tomas Community, the Counseling and
                                Career Center –
                                Career Services contributes
                                to Thomasians’ Career Readiness and Employability through the provision of comprehensive
                                and developmental career
                                programs and services. These are carried out in collaboration with different
                                stakeholders within the University and
                                partnerships with key sectors of society (i.e. industry, academe, and government) to
                                ensure students’ career success.
                            </h4>
                        </strong>
                    </div>
                </div>
            </div>
            <a href="#three" class="goto-next scrolly">Next</a>
        </section>

        <!-- Three -->
        <section id="three" class="spotlight style3 left">
            <span class="image fit main bottom"><img src="{{url('assets/images/patt.jpg')}}" alt=""
                    class="img-responsive" /></span>
            <div class="content">
                <header class="major home">
                    <h2 class="nospace">Events and Updates</h2>
                </header>
                @if($announcements->count() != null)
                @foreach($announcements as $announcement)
                <div class="col-md-2">
                </div>
                <a href="{{route('event_view', $announcement->id)}}">
                    <div class="col-md-8 hover">
                        <span class="image fit eventhome"> <img
                                src="{{$announcement->photo ? $announcement->photo->file : 'http://placehold.it/400x400'}}"
                                alt="" />
                        </span>
                        <span class="image fit eventhome title">
                            <h3 class="robotmed txt-title">{{$announcement->title}}</h3>
                            <div class="robotthin txt-bod">
                                <h5>{!!str_limit($announcement->body, 150)!!}</h5>
                            </div>
                        </span>
                    </div>
                </a>
                <footer class="major">
                    <ul class="actions special home">
                        <li><a href="/events" class="button">See more</a></li>
                    </ul>
                </footer>
            </div>
        @endforeach
        @else
        <div class="cont">
            <strong>No announcements has been posted yet</strong>
        </div>    
        @endif
        <a href="#four" class="goto-next scrolly">Next</a>
    </section>

    <!-- Four -->
    <section id="four" class="spotlight style3 middle">
        <div class="content">
            <div class="container">
                <header class="major">
                    <h2 class="nospace">Job Listing available</h2>
                </header>
                <div class="box alt">
                    <div class="row gtr-uniform">
                        @foreach($jobs as $job)


                        <div class="col-md-4 hover">
                            <a href="{{route('job_view', $job->id)}}">
                                <span class="image fit event"> <img src="{{$job->photo ? $job->photo->file : 'http://placehold.it/400x400'}}" alt="" />


                                </span>
                                <span class="image fit event title job-home-padding">
                                    <h1 class="home-jobtitle robotmed zero-margin"><strong>{{$job->company}}</strong></h1>
                                    <h3 class="home-company robotthin zero-margin"><strong>{{$job->job_title}}</strong></h3>
                                    <h5 class="pjobs">{{$job->created_at->diffForHumans()}}</h5>
                                </span>

                            </a>
                        </div>

                        @endforeach
                    </div>
                </div>
                <footer class="major">
                    <ul class="actions special home">
                        <li><a href="/jobs" class="button">See more</a></li>
                    </ul>
                </footer>
            </div>
        </div>
    </section>

    <!-- Five -->
    <section id="five" class="wrapper  style3 special fade-up">
        <div class="content">
            <div class="container">
                <header class="major">
                    <h1 class="tigerready">ARE YOU TIGER READY?</h1>
                </header>
                <div class="box alt">
                    <footer class="major">
                        <ul class="actions special">
                            @if(auth()->guest() || auth()->user()->isCounselor() || auth()->user()->isAdmin())
                            <li><a href="/login" class="button ready">Submit Resumé</a></li>
                            @elseif(auth()->user()->isStudent())
                            <li><a href="/student/submission" class="button ready">Submit Resumé</a></li>
                            @endif
                        </ul>
                    </footer>
                </div>
            </div>
        </div>

        <a href="#five" class="goto-next scrolly">Next</a>
    </section>


    <!-- Footer -->
    <footer id="footer">
        <div class="content">
            <div class="container footerd">
                <div class="row">
                    <!-- left -->
                    <div class="col-1 col-12-medium">
                    </div>

                    <div class="col-5 col-6-medium">
                        <div class="content">
                            <div class="container">
                                <div class="row">
                                    <header>
                                        <h3 style="margin-bottom: -5px;"><strong>UNIVERSITY OF SANTO TOMAS</strong>
                                        </h3>

                                    </header>
                                    <p style="padding-bottom: 25px;">UST CAREER AND COUNSELING CENTER</p>
                                    <!-- next line col -->
                                    <div class="col-12 col-12-medium">
                                    </div>
                                    <img src="{{url('assets/images/pqa_logo.png')}}" class="footerz"
                                        alt="{{url('assets/images/pqa_logo.png')}}">

                                    <img src="{{url('assets/images/iso_logo.png')}}" class="footerz"
                                        alt="{{url('assets/images/iso_logo.png')}}">

                                    <img src="{{url('assets/images/QS_Stars_4Star.png')}}" class="footerz"
                                        style="padding-top: 12px" alt="{{url('assets/images/iso_logo.png')}}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- right -->
                    <div class="col-5 col-8-medium">
                        <div class="content">
                            <div class="container footerd">
                                <div class="row">

                                    <!-- LOCATION -->
                                    <div class="col-1 col-1-medium">
                                        <span class="fa fa-map-marker"></span>
                                    </div>

                                    <div class="col-8 col-4-medium">

                                        <p class="footerp">{{$settings->address}}
                                        </p>
                                    </div>

                                    <!-- next line col -->
                                    <div class="col-12 col-12-medium">
                                    </div>

                                    <!-- phone -->
                                    <div class="col-1 col-1-medium">
                                        <span class="fa fa-phone-square"></span>
                                    </div>

                                    <div class="col-8 col-4-medium">
                                        <p class="footerp">{{$settings->contact_number}}
                                        </p>
                                    </div>


                                    <!-- next line col -->
                                    <div class="col-12 col-12-medium">
                                    </div>



                                    <!-- mail -->
                                    <div class="col-1 col-1-medium">
                                        <span class="fa fa-envelope"></span>
                                    </div>

                                    <div class="col-8 col-4-medium">
                                        <p class="footerp">{{$settings->contact_email}}
                                        </p>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <footer id="footer">
        <ul class="icons">
            <li><a href="#" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="#" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li>
        </ul>
        <ul class="copyright">
            <li>&copy; Capstoned. All rights reserved.</li>
        </ul>
    </footer>

    </div>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/jquery.dropotron.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>