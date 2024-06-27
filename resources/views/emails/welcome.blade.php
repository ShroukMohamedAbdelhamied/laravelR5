@component('mail::message')
# Welcome to Our Application

Hello {{ $user->name }},

Thank you for registering on our application.

@component('mail::button', ['url' => ''])
Visit our Website
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
