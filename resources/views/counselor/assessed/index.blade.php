@extends('layouts.user_layout')

@section('content')

@if(count($submissions)>0)

<table class="table">
    <thead>

        <tr>

            <th>@sortablelink('studnum','Student Number')</th>
            <th>@sortablelink('fname','Full Name')</th>
            <th>@sortablelink('course_id','Course')</th>
            <th>Email</th>
            <th>@sortablelink('created_at','Submitted at')</th>
            <th></th>
            <th></th>
        </tr>

    </thead>
    <tbody>
        @foreach($submissions as $submission)
        <tr>
            <td>{{$submission->studnum}}</td>
            <td>{{$submission->fname}} {{$submission->lname}}</td>
            <td>{{$submission->course}}</td>
            <td>{{$submission->emailadd}}</td>
            <td>{{$submission->created_at->diffForHumans()}}</td>
            <td><a href="{{route('assessed.summary',[ 'id' => $submission->summary_id])}}">Summary</a></td>
            <td><a href="{{route('assessed.kill',[ 'id' => $submission->id])}}">Delete</a></td>
        </tr>

        @endforeach
        @else
        <div class="offset-1" style="background-color: white;">
            <p>No posts found</p>
        </div>
        @endif

    </tbody>
</table>


@stop

@extends('layouts.user_footer')