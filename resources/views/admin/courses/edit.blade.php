@extends('layouts.user_layout')
@section('content')
<h1>Edit Course</h1>
{!! Form::model($course, ['method'=>'PATCH', 'action'=> ['Admin\AdminCoursesController@update' , $course->id]])!!}
@csrf
@include('includes.form_error')
<div class="form-group">
    {!! Form::label('course_name', 'Course:') !!}
    {!! Form::text('course_name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('id', 'College:') !!}
    {!! Form::select('college_id', [''=> 'Choose College'] + $colleges, null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Update Category', ['class'=>'btn btn-primary']) !!}
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
                <h5 class="modal-title" id="exampleModalLabel">Delete Course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this course?
            </div>
            <div class="modal-footer">
                {!! Form::open(['method'=>'DELETE', 'action'=> ['Admin\AdminCoursesController@destroy', $course->id]])!!}
                @csrf
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-danger" value="Delete">
                {!! Form::close() !!}
                </form>
            </div>
        </div>
    </div>
</div>
@stop
@extends('layouts.user_footer')