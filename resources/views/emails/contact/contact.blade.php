@component('mail::message')

# Hello

## {{ $name }} contacted you via the {{ config('app.name') }} website.

Name: {{ $name }}

Email: {{ $email }}

Phone: {{ $phone }}

### Email Message:

{!! nl2br($message_body) !!}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
