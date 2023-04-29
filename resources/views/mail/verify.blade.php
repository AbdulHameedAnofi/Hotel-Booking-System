Hello, {{ $user->name }} <br>
Please click this link below to activate you account <br>

<a href="{{ route('verify.email',$user->remember_token) }}">Activate</a>