@extends('layouts.user_layout')

@section('content')
<div class="container">
    <h2>Users</h2>
    <table class="table">
        <thead>
            <tr>
                <th>@sortablelink('id','ID')</th>
                <th>Photo</th>
                <th>@sortablelink('first_name','Name')</th>
                <th>@sortablelink('email','Email')</th>
                <th>@sortablelink('created_at','Created')</th>
                <th>@sortablelink('updated_at', 'Updated')</th>
                <th></th>
                <th></th>
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
                <td>{{$user->created_at ? $user->created_at->diffForHumans() : 'no date'}}</td>
                <td>{{$user->updated_at ? $user->created_at->diffForHumans() : 'no date'}}</td>
                <td><button type="button" class="btn btn-info" data-toggle="modal"
                        data-target="#promptModal2" data-users="{{$user->id}}">Restore</button></td>
                <td><button type="button" class="btn btn-danger" data-toggle="modal"
                        data-target="#promptModal" data-users="{{$user->id}}">Delete</button></td>
            </tr>

            @endforeach
            @endif

        </tbody>
    </table>
</div>

<!--Restore Modal -->
<div class="modal fade" id="promptModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Restore User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('users.restore', 'test')}}" method="GET">
                @csrf
                Are you sure you want to restore this user?
                </div>
            <div class="modal-footer">
                <input type="hidden" name="user_val" id="user_id" value="">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {!! Form::submit('Restore', ['class'=>'btn btn-info']) !!}
                </form>
            </div>
        </div>
    </div>
</div>

<!--Delete Modal -->
<div class="modal fade" id="promptModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('users.kill', 'test')}}" method="GET">
                @csrf
                Are you sure you want to permanently delete this user?
                </div>
            <div class="modal-footer">
                <input type="hidden" name="user_val" id="user_id" value="">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#promptModal, #promptModal2').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var user = button.data('users') 
        var modal = $(this)
        modal.find('.modal-footer #user_id').val(user)
        })
    }); 
    
</script>

@endsection

@extends('layouts.user_footer')