@extends('layouts.default')

@include('layouts.header')

@section('content')

<section class="formLogin">
	<header class="modalHeader">
		<div class="grid">
			<div class="headerContent column col-16-20 colSpacing2 mobColFirst">
				<h2 class="secondaryHeader">
					<strong class="blackHighlight">Password reset request</strong>
					<span class="modalSwitch">or <a href="{{ baseUrl() }}/login" class="switchToRegister">Sign in</a></span>
				</h2>
			</div>
		</div>

		<hr />
	</header>

	<div class="modalBody">
		<form name="frm-login" action="password/reset" method="post">
			<fieldset>
				<div class="grid">
					<div class="bodyContent column col-12-20 colSpacing4 mobColFirst mobCol-18-20">
						<div class="formRow cf {{ isError('email', $errors) ? 'formRowError' : ''  }}">
							<label for="email">Email Address</label>
							<div class="formElement">
								<input id="email" name="email" type="text" value="{{ isset($input['email']) ? $input['email'] : '' }}" class="text" />
								@if(isError('email', $errors))
	                                <span class="formError">{{ $errors['email'] }}</span>
	                            @endif
							</div>
						</div>

						<div class="formAction cf">
							<input type="submit" class="primaryButton" value="Send me a new password">
						</div>
						<p>
							<a href="{{ baseUrl() }}/login">Go Back</a>
						</p>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</section>

@endsection

@include('layouts.footer')