@component('mail::message')
# Hi, Frikkie

## {{ $name }} submited a form request form stock number {{ $product->sku }} about product {{ $product->name }} </a>

### His contact details is:

Name: {{ $name }}

Email: {{ $email }}

Phone: {{ $phone }}

## Messaage for {{ $name }}

{!! nl2br($message_body) !!}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
