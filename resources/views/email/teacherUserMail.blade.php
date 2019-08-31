<h3>Dear {{ $teacher->name }},</h3>

<p>
    Your email has been granted user access. Your credentials are: <br>
    <b>
        Email: {{ $teacher->email }} <br>
        Password: {{ $teacherPassword }} <br>
    </b> 
    <p>Please continue to the link: {{ url('login') }} for login.</p>
</p>
<p>Regards,</p>
<p>TIMS</p>