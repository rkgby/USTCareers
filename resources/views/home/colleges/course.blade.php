<!DOCTYPE HTML>
<html>

<head>
    <title>USTCCC</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="/assets/css/main.css" />
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
        <div id="main" class="wrapper style1">
            <div class="container">
                <header class="major">
                    <h2 class="robotbold black">Job Lists</h2>
                    <h3 class="black">{{$course_name}}</h3>
                    {!! Form::open(['action' => 'JobController@searchjob', 'method' => 'POST']) !!}
                    <div class="row gtr-uniform gtr-50">
                        <div class="col-md-6 search-marg">
                            <input type="text" name="searchjob" id="searchjob" placeholder=" Search..." />
                        </div>
                    </div>
                    {!! Form::close() !!}
                </header>

                <!-- Text -->

                <div class="row">
                    <!--LEFT SIDE -->
                    <div class="col-md-3">


                        <h3 class="robotbold black">Colleges</h4>
                            <ul class="ast-content-ul-list">
                                @foreach($colleges as $college)
                                <li class="robotmed black mg-l"><a class="black" href="{{route('college', $college->id)}}">{{$college->college_name}}</a></li>
                                @endforeach
                            </ul>
                    </div>

                    <!--RIGHT SIDE -->
                    <div class="col-md-8">
                        <div class="container-fluid">
                            <div class="row">
                                @if($jobs->count() != 0)
                                @foreach($jobs as $job)
                                <div class="col-md-4 hover loadm">
                                    <a href="{{route('job_view', $job->id)}}}">
                                        <span class="image fit job">
                                            <img src="{{$job->photo ? $job->photo->file : 'http://placehold.it/400x400'}}" alt="" />
                                        </span>
                                        <span class="image fit job title2 job-padd">
                                            <h3 class="h1jobs robotmed"><strong>{{$job->job_title}}</strong></h3>
                                            <h4 class="h4jobs robotthin"><strong>{{$job->company}}</strong></h4>
                                        </span>
                                    </a>
                                </div>
                                @endforeach
                                @else
                                <h1 class="black">NO JOBS AVAILABLE</h1>
                                @endif
                            </div>
                        </div>
                        @if(!empty($jobs) && $jobs->count() >= 7)
                        <a href="#" id="loadMore">Load More</a>
                        @endif
                    </div>
                </div>

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
    <script>
        $(document).ready(function() {
            $(".loadm").slice(0, 6).show();
            $("#loadMore").on("click", function(e) {
                e.preventDefault();
                $(".loadm:hidden").slice(0, 3).slideDown();
                if ($(".loadm:hidden").length == 0) {
                    $("#loadMore").text("No Content").addClass("noContent");
                }
            });

        })
    </script>

</body>

</html>