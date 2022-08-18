@component('mail::message')

Bonjour, {{ $data['name']}}.

{{ $data['subject'] }}

@endcomponent

Thanks<br>
{{ config('app.name') }}
@endcomponent
