<h1>Спасибо за регистрацию, {{$user->name}}!</h1>
<p>Перейдите <a href='{{ url("register/confirm/{$user->token}") }}'>по ссылке </a>чтобы завершить регистрацию!</p>