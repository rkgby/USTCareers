@extends('layouts.user_layout')

@section('content')
<h1>Edit Job</h1>
{!! Form::model($job, ['method'=>'PATCH', 'action'=> ['Counselor\CounselorJobsController@update',
$job->id],'files'=>true,'class'=>'form-width'])!!}
@csrf
@include('includes.form_error')
<div class="form-group">
    <img height="50" src="{{$job->photo ? $job->photo->file :'http://placehold.it/400x400'}}" alt=""
        class="img-responsive img-sizing img-rounded">
</div>
<div class="form-group">
    {!! Form::label('company', 'Company:') !!}
    {!! Form::text('company', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('photo_id', 'Company Logo:') !!}
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

        @foreach($colleges as $college)
        <optgroup label="{{$college->college_name}}">
            @foreach($courses as $course)
            @if($college->id == $course->college_id)
            <option name="course_id" value="{{$course->id}}">{{$course->course_name}}</option>
            @endif
            @if($job->course_id === $course->id)
            <option selected="$course_id" name="{{$course->id}}" id="{{$course->id}}" value="{{$course->id}}">{{$course->course_name}}</option>
            @endif
            @endforeach
        </optgroup>
        @endforeach
    </select>
</div>
<div class="form-group">
    {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}

</div>
{!! Form::close() !!}
<div class="form-group">
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#promptModal">Delete</button>  
</div>
<!--Delete Modal -->
<div class="modal fade" id="promptModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Trash Job listing</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to trash this job listing?
            </div>
            <div class="modal-footer">
                {!! Form::open(['method'=>'DELETE', 'action'=> ['Counselor\CounselorJobsController@destroy', $job->id]])!!}
                @csrf
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-danger" value="Trash">
                {!! Form::close() !!}
                </form>
            </div>
        </div>
    </div>
</div>
@stop
@extends('layouts.user_footer')