@component('mail::message')
#

Projet : {{ $projet->titre }}

Statut : **{{ $statut }}**

@if($statut === 'rejeté' && $justification)
**Justification :**
{{ $justification }}
@endif

@component('mail::button', ['url' => route('projets.show', $projet->id)])
Voir le projet
@endcomponent
@component('mail::panel')
**Promoteur :** {{ $projet->promoteur->user->name }}<br>
**Description :** {{ $projet->description }}<br>
**Date :** {{ $projet->updated_at }}<br>
**Statut :** {{ $projet->status }}<br>
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
