<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $poste
 * @property string $telephone
 * @property string $adresse
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gestionnaire newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gestionnaire newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gestionnaire query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gestionnaire whereAdresse($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gestionnaire whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gestionnaire whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gestionnaire wherePoste($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gestionnaire whereTelephone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gestionnaire whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gestionnaire whereUserId($value)
 */
	class Gestionnaire extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $promoteur_id
 * @property string $titre
 * @property string $type_projet
 * @property string $forme_juridique
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $plan_affaires
 * @property-read \App\Models\Promoteur $promoteur
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Projet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Projet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Projet query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Projet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Projet whereFormeJuridique($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Projet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Projet wherePlanAffaires($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Projet wherePromoteurId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Projet whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Projet whereTitre($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Projet whereTypeProjet($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Projet whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Projet extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $utilisateur_id
 * @property string $date_naissance
 * @property string $lieu_naissance
 * @property string $numero_cni
 * @property string $cni_image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Projet> $projets
 * @property-read int|null $projets_count
 * @property-read Promoteur|null $promoteur
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Promoteur newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Promoteur newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Promoteur query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Promoteur whereCniImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Promoteur whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Promoteur whereDateNaissance($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Promoteur whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Promoteur whereLieuNaissance($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Promoteur whereNumeroCni($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Promoteur whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Promoteur whereUtilisateurId($value)
 * @mixin \Eloquent
 * @property-read \App\Models\User $user
 */
	class Promoteur extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $prenom
 * @property int|null $telephone
 * @property string $role
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Promoteur|null $promoteur
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePrenom($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereTelephone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Gestionnaire|null $gestionnaire
 */
	class User extends \Eloquent {}
}

