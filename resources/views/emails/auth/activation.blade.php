@component('mail::message')
# Veuillez cliquer sur le bouton "Activer" pour accéder à votre compte

@component('mail::button', ['url' => route('auth.activate', [
    'token' => $user->activation_token,
    'email' =>$user->email
])])
Activer
@endcomponent

Merci,<br>

@endcomponent
