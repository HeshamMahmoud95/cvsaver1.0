@extends('layouts.app')

@section('content')

<h1>add new job</h1>


<form href="/jobs/jobmanager" method="post">
    {{csrf_field()}}
title<input type="text" name="name"><br>
description<input type="text" name="description"><br>
<input type="submit" name="submit"><br>



</form>

    @endsection