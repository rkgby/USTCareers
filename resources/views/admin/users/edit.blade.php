@extends('layouts.user_layout')

@section('content')
<h1>EDIT USER</h1>
{!! Form::model($user, ['method'=>'PATCH', 'action'=> ['Admin\AdminUsersController@update', $user->id],'files'=>true,'class'=>'form-width'])!!}
@csrf
@include('includes.form_error')
<div class="form-group">
    <img src = "{{$user->photo_id ? $user->photo->file :'http://placehold.it/400x400'}}" alt="" class="img-responsive img-sizing img-rounded">
</div>
<div class="form-group">
    {!! Form::label('first_name', 'Name:') !!}
    {!! Form::text('first_name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('last_name', 'Name:') !!}
    {!! Form::text('last_name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('is_active', 'Status:') !!}
    {!! Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('photo_id', 'Photo:') !!}
    {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('password', 'Change Password:') !!}
</div>
<div class="form-group">
    {!! Form::label('password', 'New Password:') !!}
    {!! Form::password('password', ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Confirm New Password:') !!}
    {!! Form::password('password_confirmation',  ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Update User', ['class'=>'btn btn-primary']) !!}
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
                <h5 class="modal-title" id="exampleModalLabel">Trash User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to trash this user?
            </div>
            <div class="modal-footer">
                {!! Form::open(['method'=>'DELETE', 'action'=> ['Admin\AdminUsersController@destroy', $user->id]])!!}
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