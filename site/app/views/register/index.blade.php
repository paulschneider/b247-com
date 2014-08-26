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

	                    <div class="formRow cf {{ isError('email', $errors) && $form == 'login' ? 'formRowError' : ''  }}">
	                        <label for="email">Email Address</label>
	                        <div class="formElement">
	                            <input id="email" name="email" type="text" value="" class="text" />
	                            @if(isError('email', $errors) && $form == 'login')
	                                <span class="formError">{{ $errors['email'] }}</span>
	                            @endif
	                        </div>
	                    </div>

	                    <div class="formRow cf {{ isError('password', $errors) && $form == 'login' ? 'formRowError' : '' }}">
	                        <label for="password">Password</label>
	                        <div class="formElement">
	                            <input id="password" name="password" type="password" value="" class="text" />
	                            @if(isError('password', $errors) && $form == 'login')
	                                <span class="formError">{{ $errors['password'] }}</span>
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

						<div class="formRow cf {{ isError('firstName', $errors) && $form == 'registration' ? 'formRowError' : '' }}">
				            <label for="firstName">First name</label>
				            <div class="formElement">
				                <input id="firstName" name="firstName" type="text" value="" class="text" />
				                @if(isError('firstName', $errors) && $form == 'registration')
				                    <span class="formError">{{ $errors['firstName'] }}</span>
				                @endif
				            </div>
				        </div>

				        <div class="formRow cf {{ isError('lastName', $errors) && $form == 'registration' ? 'formRowError' : '' }}">
				            <label for="lastName">Surname</label>
				            <div class="formElement">
				                <input id="lastName" name="lastName" type="text" value="" class="text" />
				                @if(isError('lastName', $errors) && $form == 'registration')
				                    <span class="formError">{{ $errors['lastName'] }}</span>
				                @endif
				            </div>
				        </div>

				        <div class="formRow cf {{ isError('email', $errors) && $form == 'registration' ? 'formRowError' : '' }}">
				            <label for="email">Email</label>
				            <div class="formElement">
				                <input id="email" name="email" type="email" value="" class="text" />
				                @if(isError('email', $errors) && $form == 'registration')
				                    <span class="formError">{{ $errors['email'] }}</span>
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