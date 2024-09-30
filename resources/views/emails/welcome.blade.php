<x-mail::message>
# Hey {{ $user->name }},

Welcome to {{ config('app.name') }}! We're thrilled to have you on board and can't wait to see what you accomplish.

<x-mail::button :url="config('app.url')">
    Visit Website
</x-mail::button>

Thanks,<br>
{{ config('app.name') }} Team
</x-mail::message>
