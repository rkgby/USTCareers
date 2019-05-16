@extends('layouts.user_layout')
@section('content')
<div class="container">

    <h2>Rubric</h2>
    <div class="col-sm-3">
        {!! Form::open(['action' => 'Admin\AdminRubricsController@searchrubrics', 'method' => 'POST']) !!}
        <input type="text" class="form-control round-form" name="searchrubrics" id="searchrubrics" placeholder="Search....">
        {!! Form::close() !!}
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12">
        <button id="myBtn" type="button" class="btn btn-round btn-success" data-toggle="modal" data-target="#myModal"
            style="margin-left: 130%; margin-bottom: 5%;">Create Rubric</button>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Category</th>
                <th>Rating</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @if($rubrics)

            @foreach($rubrics as $rubric)
            <tr>
                <td>{{$rubric->id}}</td>
                <td>{{$rubric->title->name}}</td>
                <td>{{$rubric->name}}</td>
                <td>{{$rubric->rating->name}}</td>
                <td>
                    <a href="{{route('rubric.edit', $rubric->id)}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <button type="button" class="btn btn-danger" data-toggle="modal"
                        data-target="#promptModal" data-rubric="{{$rubric->id}}">Delete</button>
                </td>
            </tr>

            @endforeach
            @endif
        </tbody>
    </table>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Rubric</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('includes.form_error')
                {!! Form::open(['method'=>'POST', 'action'=> 'Admin\AdminRubricsController@storecategory'])!!}
                @csrf
                <div class="form-group">
                    {!! Form::label('name', 'Rubric Category:') !!}
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('title_id', 'Title:') !!}
                    {!! Form::select('title_id', [''=> 'Choose Categories'] + $titles , null, ['class'=>'form-control'])
                    !!}
                </div>
                <div class="form-group">
                    {!! Form::label('rating_id', 'Rating:') !!}
                    {!! Form::select('rating_id', [''=> 'Choose Categories'] + $ratings , null,
                    ['class'=>'form-control'])
                    !!}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {!! Form::submit('Submit', ['class'=>'btn btn-primary', 'id'=>'submit']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

            <!-- Delete Modal -->
            <div class="modal fade" id="promptModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
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
                                    <form action="{{route('rubric.destroy', 'delete')}}" method="POST">
                                        {{method_field('delete')}}
                                    {{csrf_field()}}
                                    <input type="hidden" name="rub_val" id="rub_id" value="">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>    

<script>
    $(document).ready(function() {
        $('#promptModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var rub_id = button.data('rubric')
        var modal = $(this)
        modal.find('.modal-footer #rub_id').val(rub_id)
        })
    }); 
    
</script>
@stop

@extends('layouts.user_footer')