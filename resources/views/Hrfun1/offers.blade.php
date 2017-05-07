<!doctype html>
<html lang="en">
    <head>
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
Applicants's Offers
</div>
<div class="ui2">
        {{--<div class="col-md-12 col-lg-12 col-xs-12 col-xl-12" style="border-style: double;">--}}
        <div id="mytable">
            <table id="example" class="display table" cellspacing="0">
                <thead>
                <tr>
                    <th>Applicant name</th>
                    <th>Job</th>
        <th> send offers</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>name</th>
                    <th>Jop</th>
                    
                </tr>
                </tfoot>
                <tbody>
                @foreach($applicants as $app $jobs as $job)
                <form action="offers" method="POST">

                <tr>
                    <td>$app->first_name $app->last_name</td>
                    <td>$job->job_name</td>
                    <td>
$id=->$app->id;
<button type="button" class="btn btn-info" data-toggle="collapse" data-target='#$id'>Click here to Send offer</button>
<div id='$id' class="collapse">


  <div class="ui1">

<label for="offer">Offer</label>

 <div class="form-group">
    <textarea class="form-control" name="offer_description" placeholder="Write your offer"></textarea>
</div>
<br>
    <button type="submit" name="send_offer" class="btn btn-default">Send</button>
    <br> 

  </div>
  </div>
 </td>
                       
                </tr>
               </form>

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
                    $(this).html( '<input style="width:50px"type="text" placeholder='+title+' />' );
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