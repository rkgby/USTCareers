<!DOCTYPE HTML>

<html>

<head>
    <title>USTCCC</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="/assets/css/main.css" />
    <link rel="shortcut icon" type="image/png" href="assets/images/head_logo2.png" />
    <noscript>
        <link rel="stylesheet" href="/assets/css/noscript.css" />

    </noscript>
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

            <div class="row gtr-150 gtr-uniform">


                <div class="col-xs-1"></div>


                <div class="col-xs-7 cont-bl">
                    <p>

                    </p>
                    <img class="image fit" src="{{$announcements->photo ? $announcements->photo->file : 'http://placehold.it/400x400'}}" alt="" />
                    <h2 class="zero-margin black fbold">{{$announcements->title}}</h2>
                    <h3 class="min black">-{{$announcements->user->first_name}} {{$announcements->user->last_name}}</h3>
                    <h4 class="min black">{{$announcements->created_at ? $announcements->created_at->diffForHumans() : 'no date'}}</h4>
                    {!!$announcements->body!!}

                </div>



                <!-- Sidebar -->

                <div class="col-xs-3 bgyel"> 
                     <h3 class="black fbold">Other Events and Updates </h3>
                    @foreach($randoms as $random)


                    <img class="imageothers img-responsive"
                 
                        src="{{$random->photo ? $random->photo->file : 'http://placehold.it/400x400'}}" alt="" />

                    <h3 class="black">
                        <a href="{{route('event_view', $random->id)}}">{{$random->title}}</a>
                    </h3>
                    <h4 class="min black">
                        {{$random->created_at ? $random->created_at->diffForHumans() : 'no date'}}
                    </h4>

                    <footer>
                        <ul class="actions">
                            <li><a href="{{route('event_view', $random->id)}}" class="button">View Event</a>
                            </li>
                        </ul>
                    </footer>

                    <hr>
                    @endforeach
                </div>

                <div class="col-xs-1 bgyel"></div>
            </div>
        </div>
    </div>


    <!-- Footer -->
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