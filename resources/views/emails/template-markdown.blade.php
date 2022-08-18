@component('mail::message')

Salut, {{ $data['name']}}.

Nous avons reçu votre message qui parle de <strong>{{ $data['subject'] }}</strong>.

Nous tenons à vous informer que nous reviendrons vers vous dans les plus bref délai.

nous vous remercions pour l'intérêt porté à notre éguard.
@component('mail::button', ['url' => ''])
<!-- Button Text -->
@endcomponent

Thanks<br>
{{ config('app.name') }}
@endcomponent
