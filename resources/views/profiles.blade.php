<div>
    <h2>Profile</h2>
@if (session('email'))
<h1>Welcome {{session('email')}}</h1>
@else
<h1>No session</h1>

@endif

<a href="logout">Logout</a>

</div>
