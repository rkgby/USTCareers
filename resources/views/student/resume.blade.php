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
    <!--external css-->
    <link href="{{asset('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/js/bootstrap-datepicker/css/datepicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/js/bootstrap-daterangepicker/daterangepicker.css')}}" />
        
    <!-- Custom styles for this template -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style-responsive.css')}}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <!--  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>-->
    <!--  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>-->
    <!--<![endif]-->
</head>

<body>

    <section id="container">
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
            <div id="sidebar" class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu" id="nav-accordion">

                    <h5 class="centered">Welcome,{{$stud->user->first_name}} {{$stud->user->last_name}}!</h5>

                    <li class="mt">
                        <a href="{{route('indexstudent')}}">
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
                        <a href="javascript:;">
                            <i class="fa fa-cogs"></i>
                            <span>Settings</span>

                        </a>

                        <ul class="sub">
                            <li><a href="{{route('password')}}">Change Password</a></li>
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
                <h3><i class="fa fa-angle-right"></i> My Resumes</h3>

                <div class="row mt">
                    <div class="col-md-12">
                        <div class="content-panel">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <a class="btn btn-round btn-success" href="{{route('submission.index')}}">Submit
                                    Resume</a>
                            </div>
                            <table class="table table-striped table-advance table-hover">

                                <thead>
                                    <tr>
                                        <th><i class="fa fa-bullhorn"></i> Submission #</th>
                                        <th class="hidden-phone"><i class="fa fa-question-circle"></i> Date Submitted
                                        </th>
                                        <th><i class="fa fa-question-circle"></i> Date Evaluated</th>
                                        <th><i class=" fa fa-edit"></i> Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($evaluated as $evaluate)
                                    @php($i++)
                                        <tr>
                                            <td><a href="{{route('summary',[ 'id' => $evaluate->summary_id])}}">Submission {{$i}}</a></td>
                                            <td class="hidden-phone">{{$evaluate->created_at}}</td>
                                            <td>{{$evaluate->deleted_at}}</td>
                                            @if($evaluate->deleted_at == null)
                                            <td><span class="label label-warning label-mini">Not Yet Evaluated</span>
                                            @else
                                            <td><span class="label label-success label-mini">Evaluated</span></td>
                                            @endif
                                        </tr>
                                        
                                        @endforeach
                                </tbody>
                            </table>
                        </div><!-- /content-panel -->
                    </div><!-- /col-md-12 -->
                </div><!-- /row -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create Course</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                {!! Form::open(['action' => 'StudentSubmissionController@store', 'method' => 'POST',
                                'enctype' =>
                                'multipart/form-data']) !!}
                                <div class="row gtr-uniform gtr-50">

                                    <h5 style="margin:auto;">
                                        *Please upload an image or pdf format of your résumé and name the file by your
                                        full name
                                        (ex. Dela Cruz, Juan)*
                                    </h5>

                                    <ul class="actions" style="width: 70%; margin: auto; padding-left: 25%;">
                                        <li>{{Form::file('resume', ['class' => 'choose', 'accept' => 'application/pdf'])}}
                                        </li>
                                    </ul>

                                    <a href="/download/Sample-Thomasian-Resume.pdf" target="_blank">
                                        <button type="button" class="btn btn-primary">View
                                            a Sample Thomasian Resumé</button>
                                    </a>

                                    <a href="/download/THOMASIAN RESUME FORMAT 17-18.pdf" target="_blank">
                                        <button type="button" class="btn btn-primary">View
                                            Thomasian Resumé Format Guide</button>
                                    </a>

                                    </ul>
                                    <br />

                                    <ul class="actions" style="width: 70%; margin: auto; padding-left: 25%;">
                                        <li>
                                        </li>
                                    </ul>

                                </div>
                                <div class="modal-footer">
                                    {{Form::submit('Submit', ['class' => 'btn btn-primary', 'id' => 'submit', 'enabled', 'onclick' => 'return ConfirmSubmit()'])}}
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach($student as $stud)
                    {!! Form::hidden('fname',$stud->user->first_name) !!}
                    {!! Form::hidden('lname', $stud->user->last_name) !!}
                    {!! Form::hidden('studnum', $stud->student_number) !!}
                    {!! Form::hidden('course', $stud->course) !!}
                    {!! Form::hidden('emailadd', $stud->user->email) !!}
                    @endforeach
                    {!! Form::close() !!}

            </section>
            <! --/wrapper -->
        </section><!-- /MAIN CONTENT -->

        <!--main content end-->

    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script class="include" type="text/javascript" src="{{asset('assets/js/jquery.dcjqaccordion.2.7.js')}}"></script>
    <script src="{{asset('assets/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.nicescroll.js')}}" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="{{asset('assets/js/common-scripts.js')}}"></script>

    <!--script for this page-->
    <script src="{{asset('assets/js/jquery-ui-1.9.2.custom.min.js')}}"></script>

	<!--custom switch-->
	<script src="{{asset('assets/js/bootstrap-switch.js')}}"></script>
	
	<!--custom tagsinput-->
	<script src="{{asset('assets/js/jquery.tagsinput.js')}}"></script>
	
	<!--custom checkbox & radio-->
	
    <script type="text/javascript" src="{{asset('assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/bootstrap-daterangepicker/date.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
	
	<script type="text/javascript" src="{{asset('assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js')}}"></script>
	
	<script src="{{asset('assets/js/form-component.js')}}"></script>    
    
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

</body>

</html>