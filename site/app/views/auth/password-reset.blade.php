@extends('layouts.default')

@include('layouts.header')

@section('content')

<section class="featureArea" id="password-reset">   
	
	<div class="pageForm">		
        <form name="frm-login" action="password/reset" method="post">

            <fieldset>
	            <div class="grid">            
	                <div class="column col-10-20 colSpacing4 tabCol-12-20 mobCol-18-20 mobColFirst">

	                	<header class="centralHeader grid">
					        <h1 class="primaryHeader">Password Reset Request</h1>
					        <p style="text-align:left">
					        	Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore 
					        	et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
					        </p>
					    </header>

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
	                    	<a href="{{ baseUrl() }}/login" class="primaryButton fl">Go Back</a>
	                        <input type="submit" class="primaryButton fr" value="Send me a new password!" />
	                    </div>
	            	</div>
	            </div>
            </fieldset>
		</form>
	</div>
	
</section>
@stop

@include('layouts.footer')