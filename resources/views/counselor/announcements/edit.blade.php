@extends('layouts.user_layout')

@section('content')
<h1>Edit Announcements</h1>
{!! Form::model($announcement, ['method'=>'PATCH', 'action'=> ['Counselor\CounselorAnnouncementsController@update', $announcement->id],'files'=>true,'class'=>'form-width'])!!}
@csrf
@include('includes.form_error')
<div class="form-group">
    <img class="img-responsive img-sizing img-rounded" src = "{{$announcement->photo ? $announcement->photo->file :'http://placehold.it/400x400'}}" alt="">
</div>
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('category_id', 'Category:') !!}
    {!! Form::select('category_id', [''=> 'Choose Categories'] + $categories , null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('photo_id', 'Photo:') !!}
    {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('body', 'Description:') !!}
    {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}
</div>
<div class="form-group">
    {!! Form::submit('Update Announcement', ['class'=>'btn btn-primary']) !!}
</div>
{!! Form::close() !!}
<div class="form-group">
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#promptModal">Trash</button>  
</div>
<!--Delete Modal -->
<div class="modal fade" id="promptModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Trash Announcement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to trash this announcement?
            </div>
            <div class="modal-footer">
                {!! Form::open(['method'=>'DELETE', 'action'=> ['Counselor\CounselorAnnouncementsController@destroy', $announcement->id]])!!}
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
