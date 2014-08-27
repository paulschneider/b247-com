@extends('layouts.default')

@include('layouts.header')

@section('content')

<section class="featureArea">
    <header class="centralHeader grid">
        <h1 class="primaryHeader">Profile</h1>
    </header>

    <div class="pageForm">
        <form class="secondaryForm" action="/profile" method="post">
            <fieldset>
                <div class="grid">
                    <legend class="column col-12-20 colSpacing4 mobColFirst"><h2 class="secondaryHeader">About you</h2></legend>
                </div>
                
                <div class="grid">
                    <div class="column col-5-20 colSpacing4 tabCol-12-20 mobCol-18-20 mobColFirst">
                        <div class="formRow cf {{ isError('firstName', $errors) ? 'formRowError' : ''  }}">
                            <label for="firstName">First name</label>
                            <div class="formElement">
                                <input id="firstName" name="firstName" type="text" value="{{ isset($user['firstName']) ? $user['firstName'] : '' }}" class="text" />
                                @if(isError('firstName', $errors))
                                    <span class="formError">{{ $errors['firstName'] }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="formRow cf {{ isError('lastName', $errors) ? 'formRowError' : ''  }}">
                            <label for="lastName">Last name</label>
                            <div class="formElement">
                                <input id="lastName" name="lastName" type="text" value="{{ isset($user['lastName']) ? $user['lastName'] : '' }}" class="text" />
                                @if(isError('lastName', $errors))
                                    <span class="formError">{{ $errors['lastName'] }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="column col-5-20 colSpacing2 tabCol-12-20 tabColSpacing4 mobCol-18-20 mobColFirst">
                        <div class="formRow cf {{ isError('email', $errors) ? 'formRowError' : ''  }}">
                            <label for="email">Email address</label>
                            <div class="formElement">
                                <input id="email" name="email" type="email" value="{{ isset($user['email']) ? $user['email'] : '' }}" class="text" />
                                @if(isError('email', $errors))
                                    <span class="formError">{{ $errors['email'] }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="formRow cf"> <!-- If error add .formRowError to .formRow container -->
                            <label for="postcode {{ isError('postCode', $errors) ? 'formRowError' : ''  }}">Postcode</label>
                            <div class="formElement">
                                <input id="postcode" name="postCode" type="text" value="{{ isset($user['profile']['postCode']) ? $user['profile']['postCode'] : '' }}" class="text" />
                                @if(isError('postCode', $errors))
                                    <span class="formError">{{ $errors['postCode'] }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="formRow cf">
                            <span class="fakeLabel">Age group</span>
                            <div class="formElement formRadioGroup">

                                <input id="age0" type="radio" class="radio" value="1" name="ageGroup" />
                                <label for="age0">0 - 9</label>
                        
                                <input id="age10" type="radio" class="radio" value="2" name="ageGroup" />
                                <label for="age10">10 - 19</label>

                                <input id="age20" type="radio" class="radio" value="3" name="ageGroup" />
                                <label for="age20">20 - 29</label>

                                <input id="age30" type="radio" class="radio" value="4" name="ageGroup" checked="checked" />
                                <label for="age30"> 30 - 39</label>

                                <input id="age40" type="radio" class="radio" value="5" name="ageGroup" />
                                <label for="age40">40 - 49</label>
                        
                                <input id="age50" type="radio" class="radio" value="6" name="ageGroup" />
                                <label for="age50">50 - 59</label>

                                <input id="age60" type="radio" class="radio" value="7" name="ageGroup" />
                                <label for="age60">60 - 69</label>

                                <input id="age70" type="radio" class="radio" value="8" name="ageGroup" />
                                <label for="age70"> 70 - 79</label>

                            </div>
                        </div>

                        <div class="formAction cf">
                            <input type="submit" class="primaryButton" value="Save" />
                            <span class="actionOr">Or</span>
                            <a href="#">Cancel</a>
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</section>
    
@endsection

@include('layouts.footer')