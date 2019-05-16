<!DOCTYPE HTML>

<html>

<head>
    <title>USTCCC</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="/assets/css/main.css" />
    <link rel="stylesheet" href="/assets/css/paginationt.css">
    <link rel="shortcut icon" type="image/png" href="assets/images/head_logo2.png" />

    <noscript>
        <link rel="stylesheet" href="/assets/css/noscript.css" /></noscript>
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
                    <h2 class="robotbold black">Events and Updates</h2>
                    <h3 class="black"><span class="robotmed">Category:</span> {{$category_name}}</h3>
                    {!! Form::open(['action' => 'EventController@searchevent', 'method' => 'POST']) !!}
                    <div class="row gtr-uniform gtr-50">
                        <div class="col-md-6 search-marg">
                            <input type="text" name="searchevent" id="searchevent" placeholder=" Search..." />
                        </div>
                    </div>
                </header>
                <!--LEFT SIDE -->
                <div class="row">


                    <div class="col-md-3">
                        <strong>
                            <h3 class="robotbold black">Categories</h3>
                            <ul class="ast-content-ul-list black">
                                @foreach($categories as $category)
                                <li class="robotmed black mg-l"><a class="black" href="{{route('event_sort', $category->id)}}}">{{$category->category_name}}</a></li>
                                @endforeach
                            </ul>
                        </strong>
                    </div>

                    <!--RIGHT SIDE -->
                    <div class="col-md-8">
                        <!-- Text -->
                        <section>
                            <div class="row">
                                <!--LEFT SIDE -->
                                    <div class="container-fluid">
                                        <div class="row">
                                            @if($announcements->count() != 0)
                                            @foreach($announcements as $announcement)
                                            <div class="col-md-6 hover">
                                                <a href="{{route('event_view', $announcement->id)}}}">
                                                    <span class="image fit event">
                                                        <img src="{{$announcement->photo ? $announcement->photo->file : 'http://placehold.it/400x400'}}" alt="" />
                                                    </span>
                                                    <span class="image fit event title">
                                                        <h3><strong>{{$announcement->title}}</strong></h3>
                                                        <p class="pjobs">{{$announcement->created_at->diffForHumans()}}</p>
                                                    </span>
                                                </a>
                                            </div>
                                            @endforeach
                                            @else
                                            <h1 class="black">NO RESULTS FOUND</h1>
                                            @endif
                                            @if(!empty($announcements) && $announcements->count() >= 5)
                                            <a href="#" id="loadMore">Load More</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            
                            
                            
                            <div style="text-align:right;">
                            {{$announcements->links()}}
                            </div>
                    </div>
                </div>





                <!--RIGHT SIDE -->


                <div class="col-12">
                </div>


            </div>
        </div>
    </div>

    </section>


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
    <script>
        $(document).ready(function() {
            $(".loadm").slice(0, 4).show();
            $("#loadMore").on("click", function(e) {
                e.preventDefault();
                $(".loadm:hidden").slice(0, 3).slideDown();
                if ($(".loadm:hidden").length == 0) {
                    $("#loadMore").text("Last Results").addClass("noContent");
                }
            });

        })
    </script>
</body>

</html>