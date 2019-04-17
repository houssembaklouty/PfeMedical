@component('mail::message')
# Bonjour {{ $patient_first_name }},
<br>

Le prochain rendez vous sera le : <strong>{{ $RdvDate }}</strong> à <strong>{{ $RdvTime }}</strong>.

Thanks,<br>
Dr: Nom et Prénom.
@endcomponent
