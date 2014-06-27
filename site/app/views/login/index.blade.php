@extends('layouts.default')

@section('content')

<div id="login-container" class="col-md-4 col-md-offset-3">

	{{ Form::open([ 'url' => 'login.auth', 'class' => 'form' ]) }}

	<div class="form-group">
	    {{ Form::label('email', 'Email:') }}
	    {{ Form::text('email', null, [ 'class' => 'form-control' ]) }}
	</div>

	<div class="form-group">
	    {{ Form::label('password', 'Password:') }}
	    {{ Form::password('password', [ 'class' => 'form-control' ]) }}
	</div>

	<div class="form-group">
	    {{ Form::submit('Log me in', [ 'class' => 'btn btn-primary pull-right' ]) }}
	</div>

	{{ Form::close() }}

</div>

@stop