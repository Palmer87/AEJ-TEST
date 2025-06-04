@component('mail::message')
# Demande de correction

Bonjour {{ $correction->projet->promoteur->user->name }},

Votre projet intitulé **"{{ $correction->projet->titre }}"** nécessite des corrections.

**Message de l’administrateur :**
{{ $correction->message }}

Merci de vous connecter à votre espace pour effectuer les modifications demandées.

@component('mail::button', ['url' => route('projets.edit', $correction->projet->id)])
Modifier le projet
@endcomponent

Merci,<br>
L’équipe AEJ
@endcomponent
