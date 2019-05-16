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
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Resumes</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="{{route('resume')}}">My Resumes</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a class="active"  href="javascript:;" >
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

          	<div class="row mt">
          		<div class="col-lg-12">
          		
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Change Password</h4>
                            {!! Form::model($user, ['method'=>'PATCH', 'action'=> ['Student\StudentPageController@changepass', $userId]])!!}
                            @csrf
                            @include('includes.form_error')
                              <div class="form-group has-success">
                                  <label class="col-sm-2 control-label col-lg-2">Input current password</label>
                                  <div class="col-lg-10">
                                    {!! Form::password('curpass', ['class'=>'form-control']) !!}
                                  </div>
                                  <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Enter new password</label>
                                  <div class="col-lg-10">
                                    {!! Form::password('password', ['class'=>'form-control']) !!}
                                  </div>
                                  <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Confirm password</label>
                                  <div class="col-lg-10">
                                    {!! Form::password('password_confirmation',  ['class'=>'form-control']) !!}
                                  </div>
                                  <div class="col-lg-10">
                                    {!! Form::submit('Update User', ['class'=>'btn btn-primary']) !!}
                                  </div>
                                </div>
                            {!! Form::close() !!}
          		
          		</div><!-- /col-lg-12 -->
          	</div><!-- /row -->
          	
       
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
