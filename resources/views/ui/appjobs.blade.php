

<!DOCTYPE html>
<html>
<head>
  <title>Jobs</title>
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
</head>
<body>
<div class="heading">
            Choose Your Job
        </div>
   <div class="container">

   <div class="row">
   @foreach($jobs as $job)

  <!-- <form action="" method="POST"> -->
   {{ csrf_field()}}
<!--we will iterate on all active jobs in database to view thier names -->
   <div class="col-lg-4">
   <div class="point2 ">
   <div class="point1">
     {{$job->name}}
   </div>
   <br>
   
  

<!--  <button type='submit' name='description' href="{{'/ui/description/'.$job->id}}" class='btn btn-default' >Click here for description</button>
  --> <a href="{{'/ui/description/'.$job->id}}" class="line"><input type="submit" name="description" >
       </a><!--here we will but the name of this button the same name of job we have already in database because we wiil check on the name then get the description using this name-->
       <br>

  </div>
   </div>

 
<!-- </form> -->
@endforeach
   </div>  
   </div> 

</body>
</html>
