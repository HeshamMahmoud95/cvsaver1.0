@extends('layouts.app')

@section('content')
<h1>Edit Job</h1>



<form href="/jobs/editjob/" method="post">
    {{csrf_field()}}
    Name :<input type="txet" name="name" value="{{$job[0]->name}}"><br>
    Description : <input type="text" name="description" value="{{$job[0]->description}}"><br>
    <input type="submit" value="Done">

</form>

@endsection