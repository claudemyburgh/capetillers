@component('mail::message')

# Hello
## {{ ucwords($name) }} contacted you via the {{ config('app.name') }} website.
<hr/>

## *Subject*
<hr/>
{{ $subject }}


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
