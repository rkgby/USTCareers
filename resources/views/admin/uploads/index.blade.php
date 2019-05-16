@extends('layouts.user_layout')
@section('content')
{!! Form::open(['action' => 'Admin\AdminUploadsController@store', 'method' => 'POST', 'enctype' =>
'multipart/form-data']) !!}
<h1>Upload CSV</h1>
<div class="form-group">
    {!! Form::file('upload-file', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}

</div>
{!! Form::close() !!}
@stop
@extends('layouts.user_footer')