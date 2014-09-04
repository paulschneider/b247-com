@extends('layouts.default')

@include('layouts.header')

@section('content')

	<section class="user-account">
		<header class="modalHeader">
			<div class="grid">
				<div class="headerContent column col-16-20 colSpacing2 mobColFirst">
					<h2 class="secondaryHeader">
						<strong class="blackHighlight">Change My Password</strong>
					</h2>
				</div>
			</div>
			
			<hr>
		</header>

		<div class="modalBody">
			<form class="primaryForm" name="frm-password" action="password/change" method="post">
				<fieldset>
					<div class="grid">
						<div class="bodyContent column col-12-20 colSpacing4 mobColFirst mobCol-18-20">
							<div class="formRow cf {{ isError('password', $errors) ? 'formRowError' : ''  }}">
								<label for="password">Current Password:</label>
								<div class="formElement">
									<input id="password" name="password" type="password" value="" class="text" />
									@if(isError('password', $errors))
		                                <span class="formError">{{ $errors['password'] }}</span>
		                            @endif
								</div>
							</div>

							<div class="formRow cf {{ isError('password', $errors) ? 'formRowError' : '' }}"> <!-- If error add .formRowError to .formRow container -->
								<label for="password">Your New Password</label>
								<div class="formElement">
									<input id="newPassword" name="newPassword" type="password" value="" class="text" />
									@if(isError('newPassword', $errors))
		                                <span class="formError">{{ $errors['newPassword'] }}</span>
		                            @endif
								</div>
							</div>

							<div class="formAction cf">
								<input type="submit" class="primaryButton" value="Update My Password!">
							</div>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</section>

@endsection

@include('layouts.footer')