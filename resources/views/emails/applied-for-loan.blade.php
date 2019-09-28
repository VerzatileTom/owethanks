@component('mail::message')
# Applied for loan

Naay gusto muutang.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
