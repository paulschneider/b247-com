@extends('layouts.default')

@include('layouts.header')

@section('content')

<section class="featureArea">   
	
	<div class="pageForm">		
        <form name="frm-login" action="login/auth" method="post">
	        @if( isset($redirect) and ! is_null($redirect) )
				<input type="hidden" name="redirect" value="{{ $redirect }}" />
			@endif

            <fieldset>
	            <div class="grid">            
	                <div class="column col-5-20 colSpacing4 tabCol-12-20 mobCol-18-20 mobColFirst">

	                	<header class="centralHeader grid">
					        <h1 class="primaryHeader">Log in</h1>
					    </header>

	                    <div class="formRow cf {{ isset($errors->login->email) ? 'formRowError' : ''  }}">
	                        <label for="email">Email Address</label>
	                        <div class="formElement">
	                            <input id="email" name="email" type="text" value="" class="text" />
	                            @if(isset($errors->login->email))
	                                <span class="formError">{{ $errors->login->email }}</span>
	                            @endif
	                        </div>
	                    </div>

	                    <div class="formRow cf {{ isset($errors->login->password) ? 'formRowError' : ''  }}">
	                        <label for="password">Password</label>
	                        <div class="formElement">
	                            <input id="password" name="password" type="password" value="" class="text" />
	                            @if(isset($errors->login->password))
	                                <span class="formError">{{ $errors->login->password }}</span>
	                            @endif
	                        </div>
	                    </div>

	                    <div class="formAction cf">
	                        <input type="submit" class="primaryButton" value="Log-In" />
	                    </div>
	            </div>
            </fieldset>
		</form>
	</div>

	<hr />

	<div class="pageForm">
		<form name="frm-register" action="register/user" method="post">
			<fieldset>
	            <div class="grid">
	            	<div class="column col-5-20 colSpacing4 tabCol-12-20 mobCol-18-20 mobColFirst">

	            		<header class="centralHeader grid">
					        <h1 class="primaryHeader">Register</h1>
					    </header>

						<div class="formRow cf {{ isset($errors->register->firstName) ? 'formRowError' : ''  }}">
				            <label for="firstName">First name</label>
				            <div class="formElement">
				                <input id="firstName" name="firstName" type="text" value="" class="text" />
				                @if(isset($errors->register->firstName'))
				                    <span class="formError">{{ $errors->register->firstName }}</span>
				                @endif
				            </div>
				        </div>

				        <div class="formRow cf {{ isset($errors->register->lastName) ? 'formRowError' : ''  }}">
				            <label for="lastName">Surname</label>
				            <div class="formElement">
				                <input id="lastName" name="lastName" type="text" value="" class="text" />
				                @if(isset($errors->register->lastName))
				                    <span class="formError">{{ $errors->register->lastName }}</span>
				                @endif
				            </div>
				        </div>

				        <div class="formRow cf {{ isset($errors->register->email) ? 'formRowError' : ''  }}">
				            <label for="email">Email</label>
				            <div class="formElement">
				                <input id="email" name="email" type="email" value="" class="text" />
				                @if(isset($errors->register->email))
				                    <span class="formError">{{ $errors->register->email }}</span>
				                @endif
				            </div>
				        </div>

				        <div class="formAction cf">
			                <input type="submit" class="primaryButton" value="Register" />
			            </div>
		            </div>
		        </div>
		    <fieldset>
	</form>
</div>
	
</section>
@stop

@include('layouts.footer')