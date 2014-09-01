@extends('layouts.default')

@include('layouts.header')

@section('content')

	<section class="formRegister">
		<header class="modalHeader">
			<div class="grid">
				<div class="headerContent column col-16-20 colSpacing2 mobColFirst">		
					<h2 class="secondaryHeader">
						<strong class="blackHighlight">Register</strong> to filter your content
						<span class="modalSwitch">or <a href="{{ baseUrl() }}/login">Sign in</a></span>
					</h2>
				</div>
			</div>
			
			<hr>
		</header>

		<div class="modalBody">
			<form class="primaryForm" name="frm-register" action="register/user" method="post">

				@if( isset($redirect) and ! is_null($redirect) )
		        	<input type="hidden" name="redirect" value="{{ $redirect }}" />
		      	@endif

				<fieldset>
					<div class="grid">
						<div class="bodyContent column col-12-20 colSpacing4 mobColFirst mobCol-18-20">

							<div class="formRow cf {{ isError('firstName', $errors) ? 'formRowError' : '' }}">
								<label for="firstName">Firstname</label>
								<div class="formElement">
									<input id="firstName" name="firstName" type="text" value="{{ isset($input['firstName']) ? $input['firstName'] : '' }}" class="text">
									@if(isError('firstName', $errors))
										<span class="formError">{{ $errors['firstName'] }}</span>
									@endif
								</div>
							</div>

							<div class="formRow cf {{ isError('lastName', $errors) ? 'formRowError' : '' }}">
								<label for="lastName">Surname</label>
								<div class="formElement">
									<input id="lastName" name="lastName" type="text" value="{{ isset($input['lastName']) ? $input['lastName'] : '' }}" class="text">
									@if(isError('lastName', $errors))
										<span class="formError">{{ $errors['lastName'] }}</span>
									@endif
								</div>
							</div>

							<div class="formRow cf {{ isError('email', $errors) ? 'formRowError' : ''  }}">
								<label for="email">Email address</label>
								<div class="formElement">
									<input id="email" name="email" type="email" value="{{ isset($input['email']) ? $input['email'] : '' }}" class="text">
									@if(isError('email', $errors))
										<span class="formError">{{ $errors['email'] }}</span>
									@endif
								</div>
							</div>		

							<div class="formAction cf">
								<input type="submit" class="primaryButton" value="Create account">
							</div>
							<p>
								By proceeding, you agree to our 
								<a href="{{ baseUrl() }}/terms-and-conditions">Terms of Service</a> 
								and 
								<a href="{{ baseUrl() }}/privacy-policy">Privacy Policy</a>
							</p>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</section>

@stop

@include('layouts.footer')