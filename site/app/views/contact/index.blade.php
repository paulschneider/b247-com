@extends('layouts.default')

@include('layouts.header')

@section('content')

<section class="featureArea" id="contact-form">
    <header class="centralHeader grid">
        <h1 class="primaryHeader">Contact Us</h1>
    </header>

    <div class="pageForm">
        <form class="secondaryForm" action="/contact-us" method="post">
            <fieldset>
                <div class="grid">
                    <legend class="column col-12-20 colSpacing4 mobColFirst">
                    	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>                    	
                    </legend>
                </div>
                
                <div class="grid">
                    <div class="column col-5-20 colSpacing4 tabCol-12-20 mobCol-18-20 mobColFirst">
                        <div class="formRow cf {{ isError('name', $errors) ? 'formRowError' : ''  }}">
                            <label for="name">Name</label>
                            <div class="formElement">
                                <input id="name" name="name" type="text" value="{{ isset($input['name']) ? $input['name'] : '' }}" class="text" />
                                @if(isError('name', $errors))
                                    <span class="formError">{{ $errors['name'] }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="formRow cf {{ isError('email', $errors) ? 'formRowError' : ''  }}">
                            <label for="email">Email address</label>
                            <div class="formElement">
                                <input id="email" name="email" type="email" value="{{ isset($input['email']) ? $input['email'] : '' }}" class="text" />
                                @if(isError('email', $errors))
                                    <span class="formError">{{ $errors['email'] }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="formRow cf {{ isError('tel', $errors) ? 'formRowError' : ''  }}">
                        	<label for="tel">Telephone</label>
                            <div class="formElement">
                                <input id="tel" name="tel" type="text" value="{{ isset($input['tel']) ? $input['tel'] : '' }}" class="text" />
                                @if(isError('tel', $errors))
                                    <span class="formError">{{ $errors['tel'] }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="column col-5-20 colSpacing2 tabCol-12-20 tabColSpacing4 mobCol-18-20 mobColFirst">                      
                        <div class="formRow cf {{ isError('message', $errors) ? 'formRowError' : ''  }}"> <!-- If error add .formRowError to .formRow container -->
                            <label for="message">Message</label>
                            <div class="formElement">
                            	<textarea name="message" id="message" class="textarea" rows="10">{{ isset($input['message']) ? $input['message'] : '' }}</textarea>
                                @if(isError('message', $errors))
                                    <span class="formError">{{ $errors['message'] }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="formAction cf fr">
                            <input type="submit" class="primaryButton" value="Send" />
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</section>
    
@endsection

@include('layouts.footer')