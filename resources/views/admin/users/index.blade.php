@extends('layouts.user_layout')

@section('content')

<div class="container">
    <h2>Users</h2>
    <div class="col-sm-3">
    {!! Form::open(['action' => 'Admin\AdminUsersController@searchuser', 'method' => 'POST']) !!}
     <input type="text" class="form-control round-form" name="searchuser" id="searchuser" placeholder="Search....">
     {!! Form::close() !!}
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12">
        <button id="myBtn" type="button" class="btn btn-round btn-success" data-toggle="modal" data-target="#myModal"
            style="margin-left: 130%; margin-bottom: 5%;">Create Counselor</button>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>@sortablelink('id','ID')</th>
                <th>Photo</th>
                <th>@sortablelink('first_name','Name')</th>
                <th>@sortablelink('email','Email')</th>
                <th>Role</th>
                <th>@sortablelink('created_at','Created')</th>
                <th>@sortablelink('updated_at', 'Updated')</th>
            </tr>
        </thead>
        <tbody>
            @if($userss)

            @foreach($userss as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td><img height="50" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}"></td>
                <td>{{$user->first_name}} {{$user->last_name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role->name}}</td>
                <td>{{$user->created_at ? $user->created_at->diffForHumans() : 'no date'}}</td>
                <td>{{$user->updated_at ? $user->updated_at->diffForHumans() : 'no date'}}</td>
                <td>
                    <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <button type="button" class="btn btn-danger" data-toggle="modal"
                        data-target="#promptModal"data-users="{{$user->id}}">Trash</button>
                </td>
            </tr>

            @endforeach
            @endif

        </tbody>
    </table>
    {{$userss->links()}}
</div>
<!--Create Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['method'=>'POST', 'action'=> 'Admin\AdminUsersController@store','files'=>true,
                'id'=>"form", 'data-parsley-validate'=>''])!!}
                @csrf
                @include('includes.form_error')
                <div class="form-group">
                    {!! Form::label('first_name', 'First Name:') !!}
                    {!! Form::text('first_name', null, ['class'=>'form-control', 'required'=>'']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('last_name', 'Last Name:') !!}
                    {!! Form::text('last_name', null, ['class'=>'form-control', 'required'=>'']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Email:') !!}
                    {!! Form::email('email', null, ['class'=>'form-control', 'required'=>'']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('is_active', 'Status:') !!}
                    {!! Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), null,
                    ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('photo_id', 'Photo:') !!}
                    {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'Password:') !!}
                    {!! Form::password('password', ['class'=>'form-control', 'required'=>'', 'minlength'=>'8']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'Confirm Password:') !!}
                    {!! Form::password('password_confirmation', ['class'=>'form-control',
                    'data-parsley-equalto'=>"#password"]) !!}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {{ Form::hidden('id', '',['id'=>'user_id']) }}
                {{ Form::hidden('role_id', '2')}}
                {!! Form::submit('Submit', ['class'=>'btn btn-primary', 'id'=>'submit']) !!}
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
                <h5 class="modal-title" id="exampleModalLabel">Trash User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to trash this user?
            </div>
            <div class="modal-footer">
                <form action="{{route('users.destroy', 'trash')}}" method="POST">
                {{method_field('delete')}}
                @csrf
                <input type="hidden" name="user_val" id="user_id" value="">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-danger" value="Trash">
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#promptModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var user = button.data('users') 
        var modal = $(this)
        modal.find('.modal-footer #user_id').val(user)
        })
    }); 
    
</script>
@endsection

@extends('layouts.user_footer')