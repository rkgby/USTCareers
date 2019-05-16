@extends('layouts.user_layout')

@section('content')
<div class="container">

    <h2>Announcements</h2>
    <div class="col-sm-3">
    {!! Form::open(['action' => 'Counselor\CounselorAnnouncementsController@searchevent', 'method' => 'POST']) !!}
     <input type="text" class="form-control round-form" name="searchevent" id="searchevent" placeholder="Search....">
     {!! Form::close() !!}
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12">
        <button id="myBtn" type="button" class="btn btn-round btn-success" data-toggle="modal" data-target="#myModal"
            style="margin-left: 110%; margin-bottom: 5%;">Create Announcement</button>
    </div>
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
                <th></th>
                <th></th>
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
                <td>{{$announcement->title}}</td>
                <td>{{$announcement->user ? $announcement->user->first_name : "Unknown"}} {{$announcement->user ? $announcement->user->last_name : ""}}</td>
                <td>{{$announcement->category ? $announcement->category->category_name : 'Uncategorized'}}</td>
                <td>{!!str_limit($announcement->body,40)!!}</td>
                <td>{{$announcement->created_at->diffForHumans()}}</td>
                <td>{{$announcement->updated_at->diffForHumans()}}</td>
                <td>
                    <a href="{{route('announcements.edit', $announcement->id)}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <button type="button" class="btn btn-danger" data-toggle="modal"
                        data-target="#promptModal" data-ann="{{$announcement->id}}">Trash</button>    
                </td>
            </tr>

            @endforeach
            @endif

        </tbody>
    </table>
    {{ $announcements->links() }}
</div>
<!--Create Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Announcement</h5>
                <button type="button" class="close but-post" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['method'=>'POST', 'action'=>
                'Counselor\CounselorAnnouncementsController@store','files'=>true])!!}
                @csrf
                @include('includes.form_error')
                <div class="form-group">
                    {!! Form::label('title', 'Title:') !!}
                    {!! Form::text('title', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('category_id', 'Category:') !!}
                    {!! Form::select('category_id', [''=> 'Choose Categories'] + $categories , null,
                    ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('photo_id', 'Photo:') !!}
                    {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('body', 'Description:') !!}
                    {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
            </div>
        </div>
    </div>

<!--Delete Modal -->
<div class="modal fade" id="promptModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Announcement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to trash this announcement?
            </div>
            <div class="modal-footer">
                <form action="{{route('announcements.destroy', 'trash')}}" method="POST">
                {{method_field('delete')}}
                @csrf
                <input type="hidden" name="ann_val" id="ann_id" value="">
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
        var ann_id = button.data('ann')   
        var modal = $(this)
        modal.find('.modal-footer #ann_id').val(ann_id)
        })
    }); 
</script>    
@endsection

@extends('layouts.user_footer')