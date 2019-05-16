@extends('layouts.user_layout')
@section('content')
<h1>Edit Colleges</h1>
{!! Form::model($college, ['method'=>'PATCH', 'action'=> ['Admin\AdminCollegesController@update' , $college->id]])!!}
@csrf
@include('includes.form_error')
<div class="form-group">
    {!! Form::label('college_name', 'Category:') !!}
    {!! Form::text('college_name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Update College', ['class'=>'btn btn-primary']) !!}
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
                <h5 class="modal-title" id="exampleModalLabel">Delete College</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this college?
            </div>
            <div class="modal-footer">
                {!! Form::open(['method'=>'DELETE', 'action'=> ['Admin\AdminCollegesController@destroy', $college->id]])!!}
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