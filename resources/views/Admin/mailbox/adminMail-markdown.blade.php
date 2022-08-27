@component('mail::message')

Hello, {{ $data['receiver']}}.

Suite à votre dernier mail, voici notre réponse.

{{ $data['message']}}

@component('mail::button', ['url' => ''])
<!-- Button Text -->
@endcomponent

Merci pour l'intéret porté.<br>
{{ config('app.name') }}
@endcomponent
