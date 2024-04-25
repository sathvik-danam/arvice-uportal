<h1>Hello {{ $user->name}}</h1>
<p>
    Please click the passwod reset button to reset your password_get_info
    <a href="{{ url('reset_password/'.$user->email.'/'.$code) }}">Reset Password</a>
</p>