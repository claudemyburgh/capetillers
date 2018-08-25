@component('mail::message')

# Hello


@if($product)
## {{ ucwords($name) }} contacted you via the {{ config('app.name') }} website about product <em>{{ ucwords($product) }}</em> 
@else
## {{ ucwords($name) }} contacted you via the {{ config('app.name') }} website.
@endif

<hr/>

### Email Message

{!! nl2br($message_body) !!}
<hr/>
### Contact details of client
Name: {{ $name }} <br/>
Email: {{ $email }}<br/>
Phone: {{ $phone }}<br/>
<hr/>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
