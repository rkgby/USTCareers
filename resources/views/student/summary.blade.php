@foreach($student as $stud)
@endforeach
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Student Page</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet">

    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,300,700'>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link rel="stylesheet" href="{{asset('eval/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('eval/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/summary/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/summary/css/bootstrap.css')}}">

    <!--external css-->
    <link href="{{asset('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style-responsive.css')}}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="{{route('indexstudent')}}" class="logo"><b>STUDENT</b></a>
            <!--logo end-->
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="/logout">Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

              	  <h5 class="centered">Welcome, {{$stud->user->first_name}} {{$stud->user->last_name}}!</h5>
              	  	
                  <li class="mt">
                      <a  href="{{route('indexstudent')}}">
                          <i class="fa fa-dashboard"></i>
                          <span>Home</span>
                      </a>
                  </li>

               
                  <li class="sub-menu">
                        <a class="active" href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Resumes</span>
                        </a>
                        <ul class="sub">
                            <li class="active"><a href="{{route('resume')}}">My Resumes</a></li>
                        </ul>
                    </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                           <i class="fa fa-cogs"></i>
                          <span>Settings</span>
						 
                      </a>
                    
						  <ul class="sub">
                          <li class="active"><a href="{{route('password')}}">Change Password</a></li>
                      </ul>
                  </li>
                 

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

          <div class="w3-row">
            <div class="container">
                <section id="fancyTabWidget" class="tabs t-tabs">
                    <ul class="nav nav-tabs fancyTabs" role="tablist">

                        <li class="tab fancyTab active">
                            <div class="arrow-down">
                                <div class="arrow-down-inner"></div>
                            </div>
                            <a id="tab0" href="#tabBody0" role="tab" aria-controls="tabBody0" aria-selected="true"
                                data-toggle="tab" tabindex="0"><span class="fa fa-desktop"></span><span
                                    class="hidden-xs">Contact Information</span></a>
                            <div class="whiteBlock"></div>
                        </li>

                        <li class="tab fancyTab">
                            <div class="arrow-down">
                                <div class="arrow-down-inner"></div>
                            </div>
                            <a id="tab1" href="#tabBody1" role="tab" aria-controls="tabBody1" aria-selected="true"
                                data-toggle="tab" tabindex="0"><span class="fa fa-graduation-cap"></span><span
                                    class="hidden-xs">Education</span></a>
                            <div class="whiteBlock"></div>
                        </li>

                        <li class="tab fancyTab">
                            <div class="arrow-down">
                                <div class="arrow-down-inner"></div>
                            </div>
                            <a id="tab2" href="#tabBody2" role="tab" aria-controls="tabBody2" aria-selected="true"
                                data-toggle="tab" tabindex="0"><span class="fa fa-user-circle"></span><span
                                    class="hidden-xs">Experience</span></a>
                            <div class="whiteBlock"></div>
                        </li>

                        <li class="tab fancyTab">
                            <div class="arrow-down">
                                <div class="arrow-down-inner"></div>
                            </div>
                            <a id="tab3" href="#tabBody3" role="tab" aria-controls="tabBody3" aria-selected="true"
                                data-toggle="tab" tabindex="0"><span class="fa fa-users"></span><span
                                    class="hidden-xs">Involvement</span></a>
                            <div class="whiteBlock"></div>
                        </li>

                        <li class="tab fancyTab">
                            <div class="arrow-down">
                                <div class="arrow-down-inner"></div>
                            </div>
                            <a id="tab4" href="#tabBody4" role="tab" aria-controls="tabBody4" aria-selected="true"
                                data-toggle="tab" tabindex="0"><span class="fa fa-eye"></span><span class="hidden-xs">Visual
                                    Appeal</span></a>
                            <div class="whiteBlock"></div>
                        </li>

                        <li class="tab fancyTab">
                            <div class="arrow-down">
                                <div class="arrow-down-inner"></div>
                            </div>
                            <a id="tab5" href="#tabBody5" role="tab" aria-controls="tabBody5" aria-selected="true"
                                data-toggle="tab" tabindex="0"><span class="fa fa-sitemap"></span><span
                                    class="hidden-xs">Organization of Content</span></a>
                            <div class="whiteBlock"></div>
                        </li>


                        <li class="tab fancyTab">
                            <div class="arrow-down">
                                <div class="arrow-down-inner"></div>
                            </div>
                            <a id="tab6" href="#tabBody6" role="tab" aria-controls="tabBody6" aria-selected="true"
                                data-toggle="tab" tabindex="0"><span class="fa fa-comments"></span><span
                                    class="hidden-xs">Grammar, Spelling, and Punctuation</span></a>
                            <div class="whiteBlock"></div>
                        </li>
                    </ul>
                    <div id="myTabContent" class="tab-content fancyTabContent" aria-live="polite">
                        <div class="tab-pane  fade active in" id="tabBody0" role="tabpanel" aria-labelledby="tab0"
                            aria-hidden="false" tabindex="0">
                            <div>
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="w3-row">
                                            <!--COL 1 -->
                                            <div class="w3-col s4 ">
                                                <!-- insert content here-->
                                                <h3>Tiger Ready</h3>

                                                <p>
                                                @if($contact1 != "null")
                                                    {{$contact1}}
                                                @else
                                                    None
                                                @endif
                                                </p>

                                            </div>
                                            <!--COL 2 -->
                                            <div class="w3-col s4 ">
                                                <!-- insert content here-->
                                                <h3>Almost Ready</h3>
                                                <p>
                                                    @if($contact2 != "null")
                                                        {{$contact2}}
                                                    @else
                                                        None
                                                    @endif
                                                </p>
                                            </div>
                                            <!--COL 3 -->
                                            <div class="w3-col s4 ">
                                                <!-- insert content here-->
                                                <h3>Not Ready</h3>
                                                <p>
                                                    @if($contact3 != "null")
                                                        {{$contact3}}
                                                    @else
                                                        None
                                                    @endif
                                                </p>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-md-12">
                                        <h3>Comments:</h3>
                                        @if($contact_comment == null)
                                            None
                                        @else
                                            {{$contact_comment}}
                                        @endif
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="tab-pane  fade" id="tabBody1" role="tabpanel" aria-labelledby="tab1" aria-hidden="true"
                            tabindex="0">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="w3-row">
                                        <!--COL 1 -->
                                        <div class="w3-col s4 ">
                                            <!-- insert content here-->
                                            <h3>Tiger Ready</h3>
                                            <p>
                                                @if($educ1 != "null")
                                                    {{$educ1}}
                                                @else
                                                    None
                                                @endif    
                                            </p>
                                        </div>
                                        <!--COL 2 -->
                                        <div class="w3-col s4 ">
                                            <!-- insert content here-->
                                            <h3>Almost Ready</h3>
                                            <p>
                                                @if($educ2 != "null")
                                                    {{$educ2}}
                                                @else
                                                    None
                                                @endif
                                            </p>

                                        </div>
                                        <!--COL 3 -->
                                        <div class="w3-col s4 ">
                                            <!-- insert content here-->
                                            <h3>Not Ready</h3>
                                            <p>
                                                @if($educ3 != "null")
                                                    {{$educ3}}
                                                @else
                                                    None
                                                @endif
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <h3>Comments:</h3>
                                        @if($educ_comment == null)
                                            None
                                        @else
                                            {{$educ_comment}}
                                        @endif
                                </div>


                            </div>
                        </div>
                        <div class="tab-pane  fade" id="tabBody2" role="tabpanel" aria-labelledby="tab2" aria-hidden="true"
                            tabindex="0">
                            <div class="row">


                                <div class="col-md-12">
                                    <div class="w3-row">
                                        <!--COL 1 -->
                                        <div class="w3-col s4 ">
                                            <!-- insert content here-->
                                            <h3>Tiger Ready</h3>
                                            <p>
                                                @if($experience1 != "null")
                                                    {{$experience1}}
                                                @else
                                                    None
                                                @endif
                                            </p>

                                        </div>
                                        <!--COL 2 -->
                                        <div class="w3-col s4 ">
                                            <!-- insert content here-->
                                            <h3>Almost Ready</h3>
                                            <p>
                                                @if($experience2 != "null")
                                                    {{$experience2}}
                                                @else
                                                    None
                                                @endif
                                            </p>

                                        </div>
                                        <!--COL 3 -->
                                        <div class="w3-col s4 ">
                                            <!-- insert content here-->
                                            <h3>Not Ready</h3>
                                            <p>
                                                @if($experience3 != "null")
                                                    {{$experience3}}
                                                @else
                                                    None
                                                @endif
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <h3>Comments:</h3>
                                        @if($experience_comment == null)
                                            None
                                        @else
                                            {{$experience_comment}}
                                        @endif
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane  fade" id="tabBody3" role="tabpanel" aria-labelledby="tab3" aria-hidden="true"
                            tabindex="0">
                            <div class="row">


                                <div class="col-md-12">
                                    <div class="w3-row">
                                        <!--COL 1 -->
                                        <div class="w3-col s4 ">
                                            <!-- insert content here-->
                                            <h3>Tiger Ready</h3>
                                            <p>
                                                @if($involvement1 != "null")
                                                    {{$involvement1}}
                                                @else
                                                    None
                                                @endif
                                            </p>

                                        </div>
                                        <!--COL 2 -->
                                        <div class="w3-col s4 ">
                                            <!-- insert content here-->
                                            <h3>Almost Ready</h3>
                                            <p>
                                                @if($involvement2 != "null")
                                                    {{$involvement2}}
                                                @else
                                                    None
                                                @endif
                                            </p>

                                        </div>
                                        <!--COL 3 -->
                                        <div class="w3-col s4 ">
                                            <!-- insert content here-->
                                            <h3>Not Ready</h3>
                                            <p>
                                                @if($involvement3 != "null")
                                                    {{$involvement3}}
                                                @else
                                                    None
                                                @endif
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <h3>Comments:</h3>
                                        @if($involvement_comment == null)
                                            None
                                        @else
                                            {{$involvement_comment}}
                                        @endif
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane  fade" id="tabBody4" role="tabpanel" aria-labelledby="tab4" aria-hidden="true"
                            tabindex="0">
                            <div class="row">


                                <div class="col-md-12">
                                    <div class="w3-row">
                                        <!--COL 1 -->
                                        <div class="w3-col s4 ">
                                            <!-- insert content here-->
                                            <h3>Tiger Ready</h3>
                                            <p>
                                                @if($visual1 != "null")
                                                    {{$visual1}}
                                                @else
                                                    None
                                                @endif
                                            </p>

                                        </div>
                                        <!--COL 2 -->
                                        <div class="w3-col s4 ">
                                            <!-- insert content here-->
                                            <h3>Almost Ready</h3>
                                            <p>
                                                @if($visual2 != "null")
                                                    {{$visual2}}
                                                @else
                                                    None
                                                @endif
                                            </p>

                                        </div>
                                        <!--COL 3 -->
                                        <div class="w3-col s4 ">
                                            <!-- insert content here-->
                                            <h3>Not Ready</h3>
                                            <p>
                                                @if($visual3 != "null")
                                                    {{$visual3}}
                                                @else
                                                    None
                                                @endif
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <h3>Comments:</h3>
                                        @if($visual_comment == null)
                                            None
                                        @else
                                            {{$visual_comment}}
                                        @endif
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane  fade" id="tabBody5" role="tabpanel" aria-labelledby="tab5" aria-hidden="true"
                            tabindex="0">
                            <div class="row">


                                <div class="col-md-12">
                                    <div class="w3-row">
                                        <!--COL 1 -->
                                        <div class="w3-col s4 ">
                                            <!-- insert content here-->
                                            <h3>Tiger Ready</h3>
                                            <p>
                                                @if($organization1 != "null")
                                                    {{$organization1}}
                                                @else
                                                    None
                                                @endif
                                            </p>

                                        </div>
                                        <!--COL 2 -->
                                        <div class="w3-col s4 ">
                                            <!-- insert content here-->
                                            <h3>Almost Ready</h3>
                                            <p>
                                                @if($organization2 != "null")
                                                    {{$organization2}}
                                                @else
                                                    None
                                                @endif
                                            </p>

                                        </div>
                                        <!--COL 3 -->
                                        <div class="w3-col s4 ">
                                            <!-- insert content here-->
                                            <h3>Not Ready</h3>
                                            <p>
                                                @if($organization3 != "null")
                                                    {{$organization3}}
                                                @else
                                                    None
                                                @endif
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <h3>Comments:</h3>
                                        @if($organization_comment == null)
                                            None
                                        @else
                                            {{$organization_comment}}
                                        @endif
                                </div>

                            </div>
                        </div>

                        <div class="tab-pane  fade" id="tabBody6" role="tabpanel" aria-labelledby="tab6" aria-hidden="true"
                            tabindex="0">
                            <div class="row">


                                <div class="col-md-12">
                                    <div class="w3-row">
                                        <!--COL 1 -->
                                        <div class="w3-col s4 ">
                                            <!-- insert content here-->
                                            <h3>Tiger Ready</h3>
                                            <p>
                                                @if($grammar1 != "null")
                                                    {{$grammar1}}
                                                @else
                                                    None
                                                @endif
                                            </p>

                                        </div>
                                        <!--COL 2 -->
                                        <div class="w3-col s4 ">
                                            <!-- insert content here-->
                                            <h3>Almost Ready</h3>
                                            <p>
                                                @if($grammar2 != "null")
                                                    {{$grammar2}}
                                                @else
                                                    None
                                                @endif
                                            </p>

                                        </div>
                                        <!--COL 3 -->
                                        <div class="w3-col s4 ">
                                            <!-- insert content here-->
                                            <h3>Not Ready</h3>
                                            <p>
                                                @if($grammar3 != "null")
                                                    {{$grammar3}}
                                                @else
                                                    None
                                                @endif
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <h3>Comments:</h3>
                                        @if($grammar_comment == null)
                                            None
                                        @else
                                            {{$grammar_comment}}
                                        @endif
                                </div>

                            </div>
                        </div>
                    </div>

                </section>

            </div>
        </div>
          	
          </section>
      </section>
        
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
        <script src="{{asset('js/jquery2.1.3.min.js')}}"></script>
        <script src="{{asset('assets/summary/js/index.js')}}"></script>
        <script src="{{asset('assets/js/jquery.js')}}"></script>
        <script src="{{asset('assets/js/jquery-1.8.3.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        <script class="include" type="text/javascript" src="{{asset('assets/js/jquery.dcjqaccordion.2.7.js')}}">
        </script>
        <script src="{{asset('assets/js/jquery.scrollTo.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/js/jquery.sparkline.js')}}"></script>
        <script src="{{asset('assets/js/common-scripts.js')}}"></script>
        <script src="{{asset('assets/js/notification.js')}}"></script>

  </body>
</html>
