<?php $competition = $article['competition'][0] ?>

<h2>{{ $competition['question'] }}</h2>

<form class="secondaryForm" action="/promotion/competition/enter" method="post">
    <input type="hidden" name="competitionId" value="{{ $competition['id'] }}" />
    <fieldset>             
        <div class="formRow cf">
            <div class="formElement formRadioGroup">
                @foreach($competition['answers'] AS $answer) 
                    <input id="answer{{ $answer['id'] }}" type="radio" class="radio" value="{{ $answer['id'] }}" name="answer" />
                    <label for="answer{{ $answer['id'] }}">{{ $answer['answer'] }}</label>                
                @endforeach
            </div>
        </div>
        <div class="formAction cf">
            <input type="submit" class="primaryButton" value="Enter competition" />
        </div>
    </fieldset>
</form> 