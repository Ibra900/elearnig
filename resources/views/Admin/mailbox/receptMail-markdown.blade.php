@component('mail::message')

Nouveau message de {{ $data['sender']}}.

Sujet : <strong>{{ $data['subject'] }}</strong>.

Bien vouloir se connecter pour répondre

@component('mail::button', ['url' => 'elearning.test/login'])
Se connecter
@endcomponent

Thanks<br>
{{ config('app.name') }}
@endcomponent
