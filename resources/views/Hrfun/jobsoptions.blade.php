  <!DOCTYPE html>
<html>
<head>
  <title>Jobs options</title>
  
<meta charset="UTF-8">

  <!-- Google Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Raleway:500italic,600italic,600,700,700italic,300italic,300,400,400italic,800,900' rel='stylesheet' type='text/css'>
        
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,300italic,400italic,600italic,700,900' rel='stylesheet' type='text/css'>
        
         <!-- Animate CSS -->
        <link rel="stylesheet"  href="{{ URL::asset('css/animate.css') }}">>
        <!-- CSS -->
        <!--<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">-->
        <!--<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}">-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- CSS File-->
        <link rel="stylesheet"  href="{{ URL::asset('css/style.css') }}">>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( ".datepicker" ).datepicker();
  } );
  </script>
</head>
<body>

<div class="heading">
Jobs Options
</div>
<div class="container">
<div class="row">
<div class="col-lg-6 col-sm-12">
<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Click here to ADD JOB</button>
<div id="demo" class="collapse">
<form action="/Hrfun/jobsoptions" method="POST">
{{ csrf_field()}}
  <div class="ui1">

  <div class="form-group">
    <label for="jobname">Job Name</label>
    <input type="Name" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter Job Name">
  </div>

  <br>

<label for="jobdescription">ADD Job description</label>
      <div class="form-group">
    <textarea class="form-control" name="description" placeholder="Write description"></textarea>
</div>

<br>

<label for="date of job">Date of anuouncement</label>
<br>
         <label class="label2" for="job_date">click to choose date</label>
        <input type="text" class="datepicker" name="announcement_date" >
                
                   <br><br>

    <button type="submit" name="job_submit" class="btn btn-default">Click here to ADD job</button>
    <br> 

  </div>
  </form>
  </div>
    </div>



<!--code for edit job-->

<div class="col-lg-6 col-sm-12">
<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo2">Click here to Edit Job</button>
<div id="demo2" class="collapse">
<!--here we will iterate on jobs in our database if he want to edit one of them-->
<form action="/Hrfun/jobsoptions2" method="POST">
 {{ csrf_field()}}
  <div class="ui1">

 <label for="job_description_edit">Choose to Edit job</label>
<select class="form-control" name="job_edit">
<option selected="Choose job">Choose job</option>
  

    @foreach($jobs as $job)
        <option>{{$job->name}}</option>
    @endforeach

</select>
     <button type="submit" name="choose_edit" class="btn btn-default">Click here to Edit job</button>

  
  </div>
  </form>
  </div>
    </div>



  </div>
  </div>
</body>
</html>