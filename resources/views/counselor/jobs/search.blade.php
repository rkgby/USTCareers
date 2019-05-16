@extends('layouts.user_layout')

@section('content')

<div class="container">

    <h2>Jobs</h2>
    <div class="col-sm-3">
    {!! Form::open(['action' => 'Counselor\CounselorJobsController@searchjob', 'method' => 'POST']) !!}
     <input type="text" class="form-control round-form" name="searchjob" id="searchjob" placeholder="Search....">
     {!! Form::close() !!}
    </div>
    <div class="container" style="margin:2% auto;">
        <div style="position:absolute; right:19%; top:18%;">
            <button id="myBtn" type="button" class="btn btn-round btn-success" data-toggle="modal"
                data-target="#myModal">Create Job</button>
        </div>
        <div style="position:absolute; right:9%; top:18%;">
            <button id="myBtn" type="button" class="btn btn-round btn-success" data-toggle="modal"
                data-target="#posterModal">Create Poster</button>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Company Photo</th>
                <th>Company</th>
                <th>Job title</th>
                <th>Description</th>
                <th>Course</th>
                <th>Created</th>
                <th>Updated</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @if($jobs)

            @foreach($jobs as $job)
            <tr>
                <td>{{$job->id}}</td>
                <td>
                    <div class="img-cont">
                        <img class="img-fluid rounded img-thumbnail img-home-sizing"
                            src="{{$job->photo ? $job->photo->file : 'http://placehold.it/400x400'}}">
                    </div>
                </td>
                <td>{{$job->company}}</td>
                <td>{{$job->job_title}}</td>
                <td>{!! str_limit($job->job_description,95)!!}</td>
                <td>{{$job->course ? $job->course->course_name : 'Uncategorized'}}</td>
                <td>{{$job->created_at->diffForHumans()}}</td>
                <td>{{$job->updated_at->diffForHumans()}}</td>
                <td>
                    <a href="{{route('jobs.edit', $job->id)}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#promptModal"
                        data-job="{{$job->id}}">Trash</button>
                </td>
            </tr>

            @endforeach
            @endif

        </tbody>
    </table>
</div>
<!--Create Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Job Listing</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['method'=>'POST', 'action'=> 'Counselor\CounselorJobsController@store', 'files'
                =>true])!!}
                @csrf
                @include('includes.form_error')
                <div class="form-group">
                    {!! Form::label('company', 'Company:') !!}
                    {!! Form::text('company', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('photo_id', 'Company Photo:') !!}
                    {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('website', 'Website:') !!}
                    {!! Form::text('website', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('is_open', 'Application status:') !!}
                    {!! Form::select('is_open', array(1 => 'Application is open', 0 => 'Application is closed'), 1,
                    ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('job_title', 'Job:') !!}
                    {!! Form::text('job_title', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('job_description', 'Description:') !!}
                    {!! Form::textarea('job_description', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('job_qualification', 'Job Qualifications:') !!}
                    {!! Form::textarea('job_qualification', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('job_requirement', 'Job Requirements:') !!}
                    {!! Form::textarea('job_requirement', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('contact_person', 'Contact Person:') !!}
                    {!! Form::textarea('contact_person', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    <select name="course_id" class="form-control">
                        <option selected="selected">Choose Course</option>
                        @foreach($colleges as $college)
                        <optgroup label="{{$college->college_name}}">
                            @foreach($courses as $course)
                            @if($college->id == $course->college_id)
                            <option name="course_id" value="{{$course->id}}">{{$course->course_name}}</option>
                            @endif
                            @endforeach
                        </optgroup>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<!--Poster Modal -->
<div class="modal fade" id="posterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Job Listing</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['method'=>'POST', 'action'=> 'Counselor\CounselorJobsController@store', 'files'
                =>true])!!}
                @csrf
                @include('includes.form_error')
                <div class="form-group">
                    {!! Form::label('company', 'Company:') !!}
                    {!! Form::text('company', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('photo_id', 'Company Photo:') !!}
                    {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    <select name="course_id" class="form-control">
                        <option selected="selected">Choose Course</option>
                        @foreach($colleges as $college)
                        <optgroup label="{{$college->college_name}}">
                            @foreach($courses as $course)
                            @if($college->id == $course->college_id)
                            <option name="course_id" value="{{$course->id}}">{{$course->course_name}}</option>
                            @endif
                            @endforeach
                        </optgroup>
                        @endforeach
                    </select>
                </div>
            </div>
            {{ Form::hidden('website', null) }}
            {{ Form::hidden('is_open', 1) }}
            {{ Form::hidden('job_title', null) }}
            {{ Form::hidden('job_description', null) }}
            {{ Form::hidden('job_qualification', null) }}
            {{ Form::hidden('job_requirement', null) }}
            {{ Form::hidden('contact_person', null) }}
            <div class="modal-footer">
                {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<!--Delete Modal -->
<div class="modal fade" id="promptModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Job Listing</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to trash this job listing?
            </div>
            <div class="modal-footer">
                <form action="{{route('jobs.destroy', 'trash')}}" method="POST">
                    {{method_field('delete')}}
                    @csrf
                    <input type="hidden" name="job_val" id="job_id" value="">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-danger" value="Trash">
                </form>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#promptModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var job_id = button.data('job')
        var modal = $(this)
        modal.find('.modal-footer #job_id').val(job_id)
    })
});
</script>
@endsection

@extends('layouts.user_footer')