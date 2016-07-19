@extends('layouts.public')

@section('content')

<div class="uk-grid uk-margin-large-top">
	<div class="uk-width-1-2 uk-push-1-4">

<div class="uk-panel uk-panel-box uk-panel-box-primary">

<h1 class="uk-text-center">WorkTop</h1>

<h2>Register</h2>

<p>Get started for free for 30 days. No credit card required.</p>

{{ Form::open(['class' => 'uk-form uk-form-stacked login']) }}

<div class="uk-form-row">
	{{ $errors->first('email') }}
	{{ Form::label('email', 'Email', ['class' => 'uk-form-label']) }}
	<div class="uk-form-controls">
	{{ Form::text('email', null, array('class' => 'uk-form-width-large')) }}
</div>
</div>

<div class="uk-form-row">
	{{ $errors->first('first_name') }}
	{{ Form::label('first_name', 'First Name', ['class' => 'uk-form-label']) }}
	<div class="uk-form-controls">
	{{ Form::text('first_name', null, array('class' => 'uk-form-width-large')) }}
	</div>
</div>

<div class="uk-form-row">
	{{ $errors->first('last_name') }}
	{{ Form::label('last_name', 'Last Name', ['class' => 'uk-form-label']) }}
	<div class="uk-form-controls">
	{{ Form::text('last_name', null, array('class' => 'uk-form-width-large')) }}
	</div>
</div>

<div class="uk-form-row">
	{{ $errors->first('password') }}
	{{ Form::label('password', 'Password', ['class' => 'uk-form-label']) }}
	<div class="uk-form-controls">
	{{ Form::password('password', array('class' => 'uk-form-width-large')) }}
	</div>
</div>

<div class="uk-form-row">
	{{ $errors->first('password_confirmation', ['class' => 'uk-form-label']) }}
	{{ Form::label('password_confirmation', 'Confirm Password', ['class' => 'uk-form-label']) }}
	<div class="uk-form-controls">
	{{ Form::password('password_confirmation', array('class' => 'uk-form-width-large')) }}
	</div>
</div>

<div class="uk-form-row">
	<button type="submit" class="uk-button uk-button-primary">Register</button>
</div>

{{ Form::close() }}

</div>

</div>
</div>

@stop