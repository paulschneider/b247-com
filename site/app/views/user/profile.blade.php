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
                        <div class="formRow cf"> <!-- If error add .formRowError to .formRow container -->
                            <label for="firstName">First name</label>
                            <div class="formElement">
                                <input id="firstName" name="firstName" type="text" value="" class="text" />
                                <!-- If error this goes here: <span class="formError">Error message</span> -->
                            </div>
                        </div>

                        <div class="formRow cf"> <!-- If error add .formRowError to .formRow container -->
                            <label for="lastName">Last name</label>
                            <div class="formElement">
                                <input id="lastName" name="lastName" type="text" value="" class="text" />
                                <!-- If error this goes here: <span class="formError">Error message</span> -->
                            </div>
                        </div>
                    </div>

                    <div class="column col-5-20 colSpacing2 tabCol-12-20 tabColSpacing4 mobCol-18-20 mobColFirst">
                        <div class="formRow cf"> <!-- If error add .formRowError to .formRow container -->
                            <label for="email">Email address</label>
                            <div class="formElement">
                                <input id="email" name="email" type="email" value="" class="text" />
                                <!-- If error this goes here: <span class="formError">Error message</span> -->
                            </div>
                        </div>

                        <div class="formRow cf"> <!-- If error add .formRowError to .formRow container -->
                            <label for="postcode">Postcode</label>
                            <div class="formElement">
                                <input id="postcode" name="postcode" type="text" value="" class="text" />
                                <!-- If error this goes here: <span class="formError">Error message</span> -->
                            </div>
                        </div>

                        <div class="formRow cf">
                            <span class="fakeLabel">Age group</span>
                            <div class="formElement formRadioGroup">
                                <input id="age18" type="radio" class="radio" value="1" name="ageGroup" />
                                <label for="age18">18 - 29</label>
                        
                                <input id="age30" type="radio" class="radio" value="2" name="ageGroup" />
                                <label for="age30">30 - 39</label>

                                <input id="age40" type="radio" class="radio" value="3" name="ageGroup" />
                                <label for="age40">40 - 49</label>

                                <input id="age50" type="radio" class="radio" value="4" name="ageGroup" />
                                <label for="age50">50+</label>
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