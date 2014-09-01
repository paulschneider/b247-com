@extends('layouts.default')

@include('layouts.header')

@section('content')

	<section class="formLogin">
		<header class="modalHeader">
			<div class="grid">
				<div class="headerContent column col-16-20 colSpacing2 mobColFirst">
					<h2 class="secondaryHeader">
						<strong class="blackHighlight">Sign in</strong>
						<span class="modalSwitch">or <a href="{{ baseUrl() }}/sign-up" class="switchToRegister">Register</a></span>
					</h2>
				</div>
			</div>
			
			<hr>
		</header>

		<div class="modalBody">
			<form class="primaryForm" name="frm-login" action="login/auth" method="post">
				@if( isset($redirect) and ! is_null($redirect) )
					<input type="hidden" name="redirect" value="{{ $redirect }}" />
				@endif
				<fieldset>
					<div class="grid">
						<div class="bodyContent column col-12-20 colSpacing4 mobColFirst mobCol-18-20">
							<div class="formRow cf {{ isError('email', $errors) ? 'formRowError' : ''  }}">
								<label for="email">E-mail Address:</label>
								<div class="formElement">
									<input id="email" name="email" type="text" value="{{ isset($input['email']) ? $input['email'] : '' }}" class="text" />
									@if(isError('email', $errors))
		                                <span class="formError">{{ $errors['email'] }}</span>
		                            @endif
								</div>
							</div>

							<div class="formRow cf {{ isError('password', $errors) ? 'formRowError' : '' }}"> <!-- If error add .formRowError to .formRow container -->
								<label for="loginPassword">Password</label>
								<div class="formElement">
									<input id="loginPassword" name="loginPassword" type="password" value="" class="text">
									@if(isError('password', $errors))
		                                <span class="formError">{{ $errors['password'] }}</span>
		                            @endif
								</div>
							</div>

							<div class="formAction cf">
								<input type="submit" class="primaryButton" value="Sign in">
							</div>
							
							<p><a href="{{ baseUrl() }}/forgotten-password">I've forgotten my password</a></p>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</section>

@stop