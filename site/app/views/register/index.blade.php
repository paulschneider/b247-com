@extends('layouts.default')

@include('layouts.header')

@section('content')

<section class="pageSection">
	<div class="grid">
		<h1>Log in</h1>

		<form name="frm-login" action="login/auth" method="post">
		@if( isset($redirect) and ! is_null($redirect) )
			<input type="hidden" name="redirect" value="{{ $redirect }}" />
		@endif
			<p>
				<label>Email Address</label>
				<input type="text" name="email" placeholder="Enter your email address" />					
			</p>

			<p>
				<label>Password</label>
				<input type="password" name="password" />
			</p>

			<p>
				<input type="submit" name="submit" value="Log-in" />
			</p>
		</form>

		<hr />

		<h1>Register</h1>

		<form name="frm-register" action="register/user" method="post">				
			<p>
				<label>First name</label>
				<input type="text" name="firstName" placeholder="Enter your firstname" />					
			</p>

			<p>
				<label>Surname</label>
				<input type="text" name="lastName" placeholder="Enter your lastname" />
			</p>

			<p>
				<label>Email</label>
				<input type="text" name="email" placeholder="Enter your email address" />
			</p>

			<p>
				<input type="submit" name="submit" value="Register" />
			</p>
		</form>
	</div>
</section>
@stop

@include('layouts.footer')