@extends('layouts.user_layout')

@section('content')

<div class="container">

    <h2>Trashed Announcements</h2>
    <table class="table">
        <thead>
            <tr>
                <th>@sortablelink('id','ID')</th>
                <th>Photo</th>
                <th>@sortablelink('title','Title')</th>
                <th>@sortablelink('user_id','User')</th>
                <th>@sortablelink('category_id','Category')</th>
                <th>Body</th>
                <th>@sortablelink('created_at','Created')</th>
                <th>@sortablelink('updated_at','Updated')</th>
                <th>Restore</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @if($announcements)

            @foreach($announcements as $announcement)
            <tr>
                <td>{{$announcement->id}}</td>
                <td>

                    <div class="img-cont">
                        <img class="img-fluid rounded img-thumbnail img-home-sizing"
                            src="{{$announcement->photo ? $announcement->photo->file : 'http://placehold.it/400x400'}}">
                    </div>
                </td>
                <td>{{$announcement->user ? $announcement->user->first_name : "Unknown"}}
                    {{$announcement->user ? $announcement->user->last_name : ""}}</td>
                <td>{{$announcement->category ? $announcement->category->category_name : 'Uncategorized'}}</td>
                <td>{{$announcement->title}}</td>
                <td>{!!str_limit($announcement->body,40)!!}</td>
                <td>{{$announcement->created_at->diffForHumans()}}</td>
                <td>{{$announcement->updated_at->diffForHumans()}}</td>
                <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#promptModal2"
                        data-anno="{{$announcement->id}}">Restore</button></td>
                <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#promptModal"
                        data-anno="{{$announcement->id}}">Delete</button></td>
            </tr>
            @endforeach
            @endif

        </tbody>
    </table>
</div>

<!--Restore Modal -->
<div class="modal fade" id="promptModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Restore Announcement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('announcements.restore', 'test')}}" method="GET">
                    @csrf
                    Are you sure you want to restore this announcement?
            </div>
            <div class="modal-footer">
                <input type="hidden" name="anno_val" id="anno_id" value="">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {!! Form::submit('Restore', ['class'=>'btn btn-info']) !!}
                </form>
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
                <h5 class="modal-title" id="exampleModalLabel">Delete Announcement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('announcements.kill', 'test')}}" method="GET">
                    @csrf
                    Are you sure you want to permanently delete this announcement?
            </div>
            <div class="modal-footer">
                <input type="hidden" name="anno_val" id="anno_id" value="">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#promptModal, #promptModal2').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var announcement = button.data('anno')
        var modal = $(this)
        modal.find('.modal-footer #anno_id').val(announcement)
    })
});
</script>

@endsection

@extends('layouts.user_footer')