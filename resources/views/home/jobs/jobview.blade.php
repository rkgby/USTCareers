<!DOCTYPE HTML>

<html>

<head>
    <title>USTCCC</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="/assets/css/main.css" />
    <link rel="shortcut icon" type="image/png" href="assets/images/head_logo2.png" />
    <noscript>
        <link rel="stylesheet" href="/assets/css/noscript.css" /></noscript>
    <link rel="shortcut icon" type="image/png" href="assets/images/head_logo2.png" />
</head>

<body class="is-preload">
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
                @if(auth()->guest())
                <li><a href="{{route('login')}}" class="button primary">LOGIN</a></li>
                @elseif(auth()->user()->isAdmin())
                <li><a href="{{route('indexadmin')}}" class="button primary">Admin Dashboard</a></li>
                @elseif(auth()->user()->isCounselor())
                <li><a href="{{route('indexcounselor')}}" class="button primary">Counselor Dashboard</a></li>
                @endif

                </ul>

            </nav>
        </header>

        <!-- Main -->

        <!-- Sidebar -->


        <div id="main" class="wrapper style1 black">

            <div class="row gtr-150 gtr-uniform">
                <div class="col-xs-1"></div>

                <div class="col-xs-7">
                    @if($jobs->poster == 0)
                    <!--NOT POSTER-->
                    @if($jobs->website == null)
                    <img class="image fit img-responsive"
                        src="{{$jobs->photo ? $jobs->photo->file : 'http://placehold.it/400x400'}}" alt="" />

                    @else
                    <a href=" {{$jobs->website}}"><img class="image fit img-responsive"
                            src="{{$jobs->photo ? $jobs->photo->file : 'http://placehold.it/400x400'}}" alt="" />
                    </a>
                    @endif
                    <b><h2 class="black fbold">{{$jobs->job_title}}</h2></b>
                    <h3 class="black">{{$jobs->company}}</h3>
                    <table class="alt">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Date Posted:</td>
                                <td>{{$jobs->created_at ? $jobs->created_at->diffForHumans() : 'no date'}}</td>
                            </tr>
                            <tr>
                                <td>Course:</td>
                                <td>{{$jobs->course->course_name}}</td>
                            </tr>
                            <tr>
                                <td>Application status:</td>
                                @if($jobs->is_open == 1)
                                <td>Open</td>
                                @elseif($jobs->is_open == 0)
                                <td>Closed</td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                    @if($jobs->job_description != null)
                    <h3 class="black">Job Summary:</h3>
                    {!!$jobs->job_description!!}
                    @endif
                    @if($jobs->job_qualification != null)
                    <h3 class="black">Job Qualifications:</h3>
                    {!!$jobs->job_qualification!!}
                    @endif
                    @if($jobs->job_requirement !=null)
                    <h3 class="black">Job Requirements:</h3>
                    {!!$jobs->job_requirement!!}
                    @endif
                    @if($jobs->contact_person)
                    <h3 class="black">Contact Person:</h3>
                    {!!$jobs->contact_person!!}
                    @endif
                    @endif

                    <!--POSTER -->
                    @if($jobs->poster == 1)
                    <img class="imageposter fitposter img-responsive"
                        src="{{$jobs->photo ? $jobs->photo->file : 'http://placehold.it/400x400'}}" alt="" />
                    <h3 class="black fbold">{{$jobs->company}}</h3>
                    <table class="alt">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Date Posted:</td>
                                <td>{{$jobs->created_at ? $jobs->created_at->diffForHumans() : 'no date'}}</td>
                            </tr>
                            <tr>
                                <td>Course:</td>
                                <td>{{$jobs->course->course_name}}</td>
                            </tr>
                            <tr>
                                <td>Application status:</td>
                                @if($jobs->is_open == 1)
                                <td>Open</td>
                                @elseif($jobs->is_open == 0)
                                <td>Closed</td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                    @if($jobs->job_description != null)
                    <h3 class="black">Job Summary:</h3>
                    {!!$jobs->job_description!!}
                    @endif
                    @if($jobs->job_qualification != null)
                    <h3 class="black">Job Qualifications:</h3>
                    {!!$jobs->job_qualification!!}
                    @endif
                    @if($jobs->job_requirement !=null)
                    <h3 class="black">Job Requirements:</h3>
                    {!!$jobs->job_requirement!!}
                    @endif
                    @if($jobs->contact_person)
                    <h3 class="black">Contact Person:</h3>
                    {!!$jobs->contact_person!!}
                    @endif
                    @endif

                </div>

                @if($jobs->poster == 0)
                <div class="col-xs-3 bgyel">
                <h2 class="black fbold">Other Job Listings </h2>
                    @foreach($randoms as $random)
                    <img class="imageothers img-responsive"
                 
                        src="{{$random->photo ? $random->photo->file : 'http://placehold.it/400x400'}}" alt="" />
                    <h3 class="black fbold"><a href="{{route('job_view', $random->id)}}">{{$random->job_title}}</a></h3>
                    <h4 class="black">{{$random->company}}</h4>
                    <h5 class="black">{{$random->course->course_name}}</h5>
                    <hr>
                    @endforeach
                </div>
                <div class="col-xs-1 bgyel"></div>
                @endif
                @if($jobs->poster == 1)
                <div class="col-xs-3 bgyel">
                <h2 class="black fbold">Other Job Listings </h2>
                    @foreach($randoms_poster as $random)
                    <img class="imageothers img-responsive"
                 
                        src="{{$random->photo ? $random->photo->file : 'http://placehold.it/400x400'}}" alt="" />
                    @if($random->poster == 1)
                    <h3 class="black fbold"><a href="{{route('job_view', $random->id)}}">{{$random->company}}</a></h3>
                    @endif
                    @if($random->poster == 0)
                    <h3 class="black fbold"><a href="{{route('job_view', $random->id)}}">{{$random->job_title}}</a></h3>
                    <h4 class="black">{{$random->company}}</h4>
                    @endif
                    <h5 class="black">{{$random->course->course_name}}</h5>
                    <hr>
                    @endforeach
                </div>
                <div class="col-xs-1 bgyel"></div>
                @endif
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer id="footer">

    </footer>

    </div>

    <!-- Scripts -->
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/jquery.scrolly.min.js"></script>
    <script src="/assets/js/jquery.dropotron.min.js"></script>
    <script src="/assets/js/jquery.scrollex.min.js"></script>
    <script src="/assets/js/browser.min.js"></script>
    <script src="/assets/js/breakpoints.min.js"></script>
    <script src="/assets/js/util.js"></script>
    <script src="/assets/js/main.js"></script>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5c8aa4a437e1791e">
    </script>
</body>

</html>