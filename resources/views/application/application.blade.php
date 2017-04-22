<form action="/application/thanks"  enctype="multipart/form-data" method="post" >
    {{csrf_field()}}
    <input name="job_id" /><br>
    <input name="first_name" type="text" placeholder="first_name" /><br>
    <input name="last_name" type="text" placeholder="last_name" /><br>

    <input name="phone" type="text" placeholder="phone" /><br>
    <input name="email" type="text" placeholder="email" /><br>
    <input name="address" type="text" placeholder="address" /><br>

    <input name="relagion" type="text" placeholder="relagion" /><br>
    <input name="nationality" type="text" placeholder="nationality" /><br>

    <input name="gender" type="radio" value="mile" /> male
    <input name="gender" type="radio" value="female" /> female<br>

    <input id="date" type="date"><br>

    <br>Uplaod your CV :  <input id="fileupload" name="upload_file" id="upload_file" type="file" />
        <br>

    <input type="submit" value="applay"/>
</form>
