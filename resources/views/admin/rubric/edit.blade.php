@extends('layouts.user_layout')
@section('content')
<h1>Edit Rubric Category</h1>
{!! Form::model($rubric, ['method'=>'PATCH', 'action'=> ['Admin\AdminRubricsController@update', $rubric->id]])!!}
@csrf
@include('includes.form_error')
<div class="form-group">
    {!! Form::label('name', 'Rubric Category:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('title_id', 'Title:') !!}
    {!! Form::select('title_id', [''=> 'Choose Categories'] + $titles , null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('rating_id', 'Rating:') !!}
    {!! Form::select('rating_id', [''=> 'Choose Categories'] + $ratings , null, ['class'=>'form-control']) !!}
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
                <h5 class="modal-title" id="exampleModalLabel">Delete Rubric</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this rubric?
            </div>
            <div class="modal-footer">
                {!! Form::open(['method'=>'DELETE', 'action'=> ['Admin\AdminRubricsController@destroy', $rubric->id]])!!}
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