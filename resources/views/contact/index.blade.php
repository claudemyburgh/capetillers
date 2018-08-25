@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')

<div class="backgroud--mute-pattern margin--bottom-small">
	<div class="wrapper">
		<div class="row text-align-center add--padding-small">
			<div class="md-col-8 md-offset-2">
				<h1 class="text--primary primary--header">Please get in <strong>contact</strong> with us</h1>
			</div>
		</div>
	</div>	
</div>


<div class="wrapper margin--bottom-small">
	<div class="row">
		<div class="md-col-8 md-offset-2">
			<div class="panel panel--default">
				<div class="panel__header">
					Conatct Form
				</div>
				<div class="panel__body">
					<contact-form posturl="{{ route('contact.send') }}" clienturl="{{ route('list_agents') }}"></contact-form>	
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

