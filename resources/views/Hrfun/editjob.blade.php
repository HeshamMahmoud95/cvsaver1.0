<!DOCTYPE html>
<html>
<head>
  <title>Edit job</title>
  
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
Edit Job
</div>

<!--code for edit job-->

<div class="col-lg-12 col-sm-12">
<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo2">Click here to Edit Job</button>
<div id="demo2" class="collapse">
<!--here we will iterate on jobs in our database if he want to edit one of them-->
<form action="jobsoptions" method="POST">
 {{ csrf_field()}}
  <div class="ui1">


  <div class="modal-dialog">
<!-- we want to view the old description of job so we get the name of job from select option and get the description using name-->
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="4">&times;</button>
        <h4 class="modal-title"><?php
 // Most people refer to $key => $value
foreach ($jobs as $job) 
{

  if ($_SERVER['REQUEST_METHOD'] === 'POST') 
  {
    //something posted
    $jname=$job->job_name;
    if (isset($_POST["choose_edit"]))
    {
    $name=$_post['job_edit']
    echo $job->job_description;
    }
}
}
   
?></h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
<label for="jobdescriptionedit">Edit Job description</label>
      <div class="form-group">
    <textarea class="form-control" name="jdescription_edit" placeholder="Write description"></textarea>
</div>

<br>

<label for="date of job">Edit Date of anuouncement</label>
<br>
      
         <label class="label2" for="job_date">click to choose date</label>
        <input type="text" class="datepicker" name="job_date_edit" >           
                <br><br>
                    <label for="edit job state">Edit job state</label>
  <label class="radio-inline"><input type="radio" name="job_active" value="deactivate">deactivate</label>
  <br>
    <button type="submit" name="job_submit_edit" class="btn btn-default">Click here to Edit job</button>
    <br> 

  </div>
  </form>
  </div>
    </div>
</body>
</html>