@extends('layouts.user_layout')

@section('content')

<div class="container">

    <h2>Trashed Jobs</h2>
    <table class="table">
        <thead>
            <tr>
                <th>@sortablelink('id','ID')</th>
                <th>Company Logo</th>
                <th>@sortablelink('company','Company')</th>
                <th>@sortablelink('job_title','Job title')</th>
                <th>@sortablelink('job_description','Description')</th>
                <th>@sortablelink('course_id','Course')</th>
                <th>@sortablelink('created_at','Created')</th>
                <th>@sortablelink('updated_at','Updated')</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @if($jobs)

            @foreach($jobs as $job)
            <tr>
                <td>{{$job->id}}</td>
                <td>
                    <div class="img-cont">
                        <img class="img-fluid rounded img-thumbnail img-home-sizing"
                            src="{{$job->photo ? $job->photo->file : 'http://placehold.it/400x400'}}">
                    </div>
                </td>
                <td>{{$job->company}}</td>
                <td>{{$job->job_title}}</td>
                <td>{!! str_limit($job->job_description,95)!!}</td>
                <td>{{$job->course ? $job->course->course_name : 'Uncategorized'}}</td>
                <td>{{$job->created_at->diffForHumans()}}</td>
                <td>{{$job->updated_at->diffForHumans()}}</td>
                <td><button type="button" class="btn btn-info" data-toggle="modal"
                        data-target="#promptModal2" data-job="{{$job->id}}">Restore</button></td>
                <td><button type="button" class="btn btn-danger" data-toggle="modal"
                        data-target="#promptModal" data-job="{{$job->id}}">Delete</button></td>
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
                <h5 class="modal-title" id="exampleModalLabel">Restore Job Listing</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('jobs.restore', 'restore')}}" method="GET">
                @csrf
                Are you sure you want to restore this job listing?
                </div>
            <div class="modal-footer">
                <input type="hidden" name="job_val" id="job_id" value="">
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
                <h5 class="modal-title" id="exampleModalLabel">Delete Job Listing</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('jobs.kill', 'delete')}}" method="GET">
                @csrf
                Are you sure you want to permanently delete this job listing?
                </div>
            <div class="modal-footer">
                <input type="hidden" name="job_val" id="job_id" value="">
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
            var job = button.data('job')
            var modal = $(this)
            modal.find('.modal-footer #job_id').val(job)
        })
    }); 
    
</script>

@stop

@extends('layouts.user_footer')