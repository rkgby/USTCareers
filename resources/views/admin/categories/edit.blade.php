@extends('layouts.user_layout')
@section('content')
<h1>Edit Categories</h1>
{!! Form::model($category, ['method'=>'PATCH', 'action'=> ['Admin\AdminCategoriesController@update' , $category->id],'class'=>'form-width'])!!}
@csrf
@include('includes.form_error')
<div class="form-group">
    {!! Form::label('category_name', 'Category:') !!}
    {!! Form::text('category_name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Update Category', ['class'=>'btn btn-primary']) !!}
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
                <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this category?
            </div>
            <div class="modal-footer">
                {!! Form::open(['method'=>'DELETE', 'action'=> ['Admin\AdminCategoriesController@destroy', $category->id]])!!}
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
