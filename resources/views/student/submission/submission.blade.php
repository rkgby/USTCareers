<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>USTCC</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="/assets/css/main.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="shortcut icon" type="image/png" href="/assets/images/head_logo2.png" />
    <noscript>
        <link rel="stylesheet" href="/assets/css/noscript.css" /></noscript>
</head>

<body class="is-preload">
    <script>
    @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
    @endif
    </script>
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
                <li><a href="{{route('indexstudent')}}" class="button primary">PROFILE</a></li>
                </ul>
            </nav>
        </header>


        <!-- Main -->
        <div id="main" class="wrapper style1">
            <div class="container">
                <header class="major">
                    <h2 class="black robotbold">SUBMIT A RESUME</h2>

                </header>
                <!-- Form -->
                <section>
                    {!! Form::open(['action' => 'StudentSubmissionController@store', 'method' => 'POST', 'enctype' =>
                    'multipart/form-data']) !!}
                    <div class="row gtr-uniform gtr-50">
                        
                        <h5 class="black robotmd" style="margin:auto;">
                            *Please upload a pdf format of your résumé and name the file by your full name
                            (ex. Dela Cruz, Juan)*
                        </h5>




                        <ul class="actions" style="width: 53%; margin: auto;">
                            <li>
                                <a href="/download/Sample-Thomasian-Resume.pdf" target="_blank">
                                    <button type="button" class="btn"
                                        style="color: white; background-color: black; margin-top: -2px; padding: 8px 30px 8px 23px">View
                                        a Sample Thomasian Resumé</button>
                                </a>
                            </li>
                            <li><a href="/download/THOMASIAN RESUME FORMAT 17-18.pdf" target="_blank">
                                    <button type="button" class="btn"
                                        style="color: white; background-color: black; margin-top: -2px; padding-top: 8px; padding-bottom: 8px">View
                                        Thomasian Resumé Format Guide
                                    </button>
                                </a>
                            </li>
                        </ul>
                        <br />

                        <ul class="actions" style="width: 70%; margin: auto; padding-left: 25%;">
                            <li>{{Form::file('resume', ['class' => 'choose black', 'accept' => 'application/pdf'])}}</li>
                        </ul>

                        <ul class="actions" style="width: 70%; margin: auto; padding-left: 25%;">
                            <li>{{Form::submit('Submit', ['class' => 'btn btn-primary', 'id' => 'submit', 'enabled', 'onclick' => 'return ConfirmSubmit()'])}}
                            </li>
                        </ul>
                    </div>
                    @foreach($student as $stud)
                    {!! Form::hidden('fname',$stud->user->first_name) !!}
                    {!! Form::hidden('lname', $stud->user->last_name) !!}
                    {!! Form::hidden('studnum', $stud->student_number) !!}
                    {!! Form::hidden('course', $stud->course) !!}
                    {!! Form::hidden('emailadd', $stud->user->email) !!}
                    @endforeach
                    {!! Form::close() !!}
                    <div class="row">
                        <div class="col-1 col-12-medium">
                        </div>
                        <!-- <div class="col-10 col-12-medium" width="100%">
                            <input type="checkbox" id="toggle">
                            <label for="toggle" class="black robotthin">I understand that the information contained in my resume may be viewed
                                by
                                the
                                Career Services Counselors, staff,
                                <br>and Career Ambassadors for resume clinic purposes, and will be stored temporarily in
                                the
                                CCC-Career Services database.</label>
                        </div> -->
                        <div class="col-1 col-12-medium">
                        </div>
                    </div>

                </section>

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
            <script>
            $('#toggle').click(function() {
                //check if checkbox is checked
                if ($(this).is(':checked')) {

                    $('#submit').removeAttr('disabled'); //enable input

                } else {
                    $('#submit').attr('disabled', true); //disable input
                }
            });

            function ConfirmSubmit() {
                var submit = confirm("Are you sure you want to submit?");
                if (submit)
                    return true;
                else
                    return false;
            }
            </script>

</body>

</html>