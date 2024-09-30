<x-mail::message>
# Hey {{ $user->name }},

Welcome to {{ config('app.name') }}!

Your subscription has been created successfully. You can now access all the features of our platform.

<x-mail::button :url="config('app.url')">
    Visit Website
</x-mail::button>

Thanks,<br>
{{ config('app.name') }} Team
</x-mail::message>
