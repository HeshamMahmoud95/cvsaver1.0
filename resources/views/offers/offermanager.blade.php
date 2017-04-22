<h1>Names of applicants who pass all exams and ready to receive offers</h1>
<br>


@foreach($app_off as $app)

    First Name        : {{$app[0]->first_name}}<br>
    Last Name         : {{$app[0]->last_name}}<br>

   <form action="{{"/offer/add/".$app[0]->app_id}}" method="post">
       {{csrf_field()}}
       <input type="submit" name="add"  value="Add Offer">
       <input type="text"   name="add_offer"><br>

   </form>


    <input type="submit" name="open_edit" href="{{"/offer/start_edit/".$app[0]->app_id}}" value="Edit Offer"><br>
<form action="{{"/offer/edit/".$app[0]->app_id}}" method="post">
    {{csrf_field()}}
    <input type="text"   name="edit_offer">
    <input type="submit" name="save_edit"  value="Save Offer">
</form>

<form action="{{"offer/response/".$app[0]->app_id}}" method="post"><br>
    <input type="submit" name="show_response" value="show response"><br>
    Refuse Reson <input type="text"   name="response"><br>

</form>

    <a href="{{"/offer/". 1 ."/".$app[0]->app_id}}">. Accepted .</a>
    <a href="{{"/offer/". 0 ."/".$app[0]->app_id}}">. Rejected .</a>
    <a href="{{"/offer/". 2 ."/".$app[0]->app_id}}">. No Response .</a><br>


    <h2>________________________________________________</h2>



@endforeach