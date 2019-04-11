@component('mail::message')
# Hey {{ $first_name }}
<ul>
	<li>E-mail : {{ $email }} </li>
	<li>Password : {{ $password }} </li>
</ul>

@endcomponent