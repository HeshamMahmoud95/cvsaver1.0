@extends('layouts.app')

@section('content')

<h1>Job Manager</h1>


@foreach($job_list as $job)

    Name              : {{$job->name}}<br>
    Description       : {{$job->description}}<br>
    Announcement Date : {{$job->announcement_date}}<br>
    Active(change it) :
    <a href="{{"/jobs/disactivejob/".$job->id}}">
        <input type="checkbox" name="active" checked="checked">
    </a><br>
    <a href="{{"/jobs/editjob/".$job->job_id}}">
        <input type="submit" value="EDIT">
    </a><br>
    <h2>________________________________________________</h2>



    @endforeach
<a href="/jobs/addjob">Add New Job</a><br>



@endsection