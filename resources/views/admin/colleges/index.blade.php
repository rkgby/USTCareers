@extends('layouts.user_layout')
@section('content')
<div class="container">
    <h2>Colleges</h2>
    <div class="col-sm-3">
        {!! Form::open(['action' => 'Admin\AdminCollegesController@searchcolleges', 'method' => 'POST']) !!}
        <input type="text" class="form-control round-form" name="searchcolleges" id="searchcolleges" placeholder="Search....">
        {!! Form::close() !!}
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12">
        <button id="myBtn" type="button" class="btn btn-round btn-success" data-toggle="modal" data-target="#myModal"
            style="margin-left: 130%; margin-bottom: 5%;">Create College</button>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>@sortablelink('id','ID')</th>
                <th>@sortablelink('college_name','College')</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @if($colleges)

            @foreach($colleges as $college)
            <tr>
                <td>{{$college->id}}</td>
                <td>{{$college->college_name}}</td>
                <td>
                    <a href="{{route('colleges.edit', $college->id)}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <button type="button" class="btn btn-danger" data-toggle="modal"
                        data-target="#promptModal" data-college="{{$college->id}}">Delete</button>
                </td>
            </tr>

            @endforeach
            @endif

        </tbody>
    </table>
    {{$colleges->links()}}
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create College</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('includes.form_error')
                {!! Form::open(['method'=>'POST', 'action'=> 'Admin\AdminCollegesController@store'])!!}
                @csrf
                <div class="form-group">
                    {!! Form::label('college_name', 'College:') !!}
                    {!! Form::text('college_name', null, ['class'=>'form-control']) !!}
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
                                    <h5 class="modal-title" id="exampleModalLabel">Delete College</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this college?
                                </div>
                                <div class="modal-footer">
                                    <form action="{{route('colleges.destroy', 'delete')}}" method="POST">
                                        {{method_field('delete')}}
                                    {{csrf_field()}}
                                    <input type="hidden" name="col_val" id="col_id" value="">
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
        var col_id = button.data('college')   
        var modal = $(this)
        modal.find('.modal-footer #col_id').val(col_id)
        })
    }); 
    
</script>
@stop

@extends('layouts.user_footer')