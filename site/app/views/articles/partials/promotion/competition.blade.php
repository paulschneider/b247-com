<?php $competition = $article['competition'][0] ?>

@if( userIsAuthenticated() ) 

    <h2>{{ $competition['question'] }}</h2>

    <form class="secondaryForm" action="<?php echo $isMobile ? Config::get('api.baseUrl').'user/competition/enter' : '/promotion/competition/enter' ?>" method="post">
        <input type="hidden" name="competitionId" value="{{ $competition['id'] }}" />
        <input type="hidden" name="accessKey" value="{{ getAccessKey() }}" />

        <fieldset>             
            <div class="formRow cf">
                <div class="formElement formRadioGroup">
                    @foreach($competition['answers'] AS $answer) 
                        <input id="answer{{ $answer['id'] }}" type="radio" class="radio" value="{{ $answer['id'] }}" name="answerId" />
                        <label for="answer{{ $answer['id'] }}">{{ $answer['answer'] }}</label>                
                    @endforeach
                </div>
            </div>
            <div class="cf formAction">
                <input type="submit" class="primaryButton" value="Enter competition" />
            </div>
        </fieldset>
    </form> 

@else
    @if($isMobile)
        <a href="b247://signin" class="primaryButton">Log-In to enter this competition!</a>
    @else
        <a href="{{ route('login') }}" class="primaryButton">Log-In to enter this competition!</a>
    @endif    
@endif