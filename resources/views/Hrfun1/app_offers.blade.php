<!DOCTYPE html>
<html>
<head>
  <title>Applicant' Offer</title>
  <meta charset="UTF-8">

  <link href='https://fonts.googleapis.com/css?family=Raleway:500italic,600italic,600,700,700italic,300italic,300,400,400italic,800,900' rel='stylesheet' type='text/css'>
        
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,300italic,400italic,600italic,700,900' rel='stylesheet' type='text/css'>
        
         <!-- Animate CSS -->
        <link rel="stylesheet"  href="{{ URL::asset('css/animate.css') }}">
        <!-- CSS -->
        <!--<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">-->
        <!--<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}">-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- CSS File-->
        <link rel="stylesheet"  href="{{ URL::asset('css/style.css') }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta charset=utf-8>
        <meta content="IE=edge" http-equiv=X-UA-Compatible>
        <meta content="width=device-width,initial-scale=1" name=viewport>
        {{--<link rel="stylesheet" type="text/css" href="css/bootstrap.css">--}}
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
        <style>
            td{
                text-align: center;
            }
            thead th{
                color: black;
            }
            tfoot th{
                color:black;
            }
        </style>
        {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
        {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>--}}
        {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}

</head>
<body>

  <div class="heading">
Applicants with offers
</div>
<div class="ui2">
        {{--<div class="col-md-12 col-lg-12 col-xs-12 col-xl-12" style="border-style: double;">--}}
        <div id="mytable">
            <table id="example" class="display table" cellspacing="0">
                <thead>
                <tr>
       <th>Applicant Name</th>
       <th>Job</th>
    <th>Edit Offer</th>
    <th>State of response </th>
    <th> Enter Reason of refuse </th>
    <th> View Reason of refuse </th>

                </tr>
                </thead>
                <tfoot>
                <tr>
      <th>Applicant Name</th>
      <th>job</th>
    <th>Edit Offer</th>
    <th>State of response </th>
    <th> Enter Reason of refuse </th>
    <th> View Reason of refuse </th>

                </tr>
                </tfoot>
                <tbody>
                
  @foreach($applicants as $app $jobs as $job)
  $x=1;
   <tr>
    <td>$app->first_name $app->last_name</td>
    <td>$job->job_name</td>
     <form action="app_offers" method="POST">
{{ csrf_field()}}

<td>
<?php
$id=$app->id;
$i=$id;
echo"<button type='button' class='btn btn-info' data-toggle='collapse' data-target='#$i'>Click here to Edit offer</button>
<div id='$i' class='collapse'>";
?>

  <div class="ui1">

<label for="offer">Edit Offer</label>

 <div class="form-group">
    <textarea class="form-control" name="edit_offer_description" placeholder="Write your offer"></textarea>
</div>
<br>
    <button type="submit" name="edit_offer" class="btn btn-default">Send</button>
    <br> 

  </div>
  </div>
 </td>
</form>
 <form action="app_offers" method="POST">
{{ csrf_field()}}

<td>
<?php
$id=$app->id;
$i=($id+1000)*($x+1);
echo"<button type='button' class='btn btn-info' data-toggle='collapse' data-target='#$i'>Click here to choose response </button>
<div id='$i' class='collapse'>";
?>

  <div class="ui1">
 <div class="ui1">
<label for="response">select response state</label>
<select>
  <option selected="choose response">choose response</option>
  <option>Accepted</option>
  <option>Rejected</option>
  <option>No response</option>

</select>
<br>
<br>
    <button type="submit" name="respons_state" class="btn btn-default">Send</button>

<br>

</div>
 </td>
</form>
 <form action="app_offers" method="POST">
{{ csrf_field()}}

<td>
<?php
$id=$app->id;
$i=($id+1000)*($x+2);
echo"<button type='button' class='btn btn-info' data-toggle='collapse' data-target='#$i'>Click here to Enter refuse reason</button>
<div id='$i' class='collapse'>";
?>

  <div class="ui1">

<label for="refuse">Enter Refuse Reason</label>

 <div class="form-group">
    <textarea class="form-control" name="refuse_reason" placeholder="Write reason"></textarea>
</div>
<br>
    <button type="submit" name="refuse" class="btn btn-default">Send</button>
    <br> 

  </div>
  </div>
 </td>
</form>

 <td>
<?php
$id=$app->id;
$i=($id+1000)*($x+3);
echo"<button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#$i'>Click to show refuse reason</button>

<div id='$i' class='modal fade' role='dialog'>";

?>
<!-- Trigger the modal with a button -->

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss='$i'>&times;</button>
        <h4 class="modal-title">Refuse reason</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
 
 </td>


   </tr>
   @endforeach
</tbody>
            </table>
        </div>
        {{--</div>--}}
         </div>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <script>
//            $(document).ready(function() {
//                $('#example').DataTable( {
//                    "paging":   false,
//                    "ordering": true,
//                    "info":     false,
//                    "searching": true,
//                    "ordering": false
//                } );
//            } );
            $(document).ready(function() {
                // Setup - add a text input to each footer cell
                $('#example tfoot th').each( function () {
                    var title = $(this).text();
                    $(this).html( '<input style=" width:100px"type="text" placeholder='+title+' />' );
                } );

                // DataTable
                var table = $('#example').DataTable(
                    {
                        "paging":   false,
                        "info": false
                    }
                );

                // Apply the search
                table.columns().every( function () {
                    var that = this;

                    $( 'input', this.footer() ).on( 'keyup change', function () {
                        if ( that.search() !== this.value ) {
                            that
                                .search( this.value )
                                .draw();
                        }
                    } );
                } );
            } );
        </script>
    </body>
</html>







