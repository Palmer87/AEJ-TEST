<?php

namespace Database\Seeders;

use App\Models\Projet;
use App\Models\Promoteur;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{


    public function run()
    {
      $projets=Projet::updateOrCreate(

    [
        'titre' => 'EcoWash - Blanchisserie écologique',
        'description' => 'Service de blanchisserie écologique à base de produits biodégradables pour particuliers et entreprises.',
        'type_projet' => 'Services',
        'forme_juridique' => 'SARL',
        'plan_affaires' => 'Plan_EcoWash.pdf',
        'promoteur_id' => 1,
        'status'=>'en attente'
    ],);
    $projets=Projet::updateOrCreate(


    [
        'titre' => 'AgriPlus - Coopérative maraîchère',
        'description' => 'Production et commercialisation de légumes bio en circuit court.',
        'type_projet' => 'Agroalimentaire',
        'forme_juridique' => 'Coopérative',
        'plan_affaires' => 'Plan_AgriPlus.pdf',
        'promoteur_id' => 2,
        'status'=>'en attente'
    ],);
    $projets=Projet::updateOrCreate(
    [
        'titre' => 'SolarNow - Kits solaires domestiques',
        'description' => 'Distribution de kits solaires autonomes pour zones rurales non électrifiées.',
        'type_projet' => 'Énergie renouvelable',
        'forme_juridique' => 'SAS',
        'plan_affaires' => 'Plan_SolarNow.pdf',
        'promoteur_id' => 3,
        'status'=>'en attente'
    ],);
    $projets=Projet::updateOrCreate(


    [
        'titre' => 'InnovaTech - Solutions digitales PME',
        'description' => 'Développement d’applications web et mobile sur mesure pour PME locales.',
        'type_projet' => 'Technologie',
        'forme_juridique' => 'SARL',
        'plan_affaires' => 'Plan_InnovaTech.pdf',
        'promoteur_id' => 1,
        'status'=>'en attente'
    ]);
    $projets=Projet::updateOrCreate(
    [
        'titre' => 'GreenTech - Solutions énergies renouvelables',
        'description' => 'Conception et développement de projets énergies renouvelables pour les entreprises.',
        'type_projet' => 'Énergie renouvelable',
        'forme_juridique' => 'SAS',
        'plan_affaires' => 'Plan_GreenTech.pdf',
        'promoteur_id' => 2,
       'status'=>'en attente'
    ],);
    $projet=Projet::updateOrCreate(


    [
        'titre' => 'GreenPack - Emballages recyclables',
        'description' => 'Fabrication d’emballages écologiques à partir de matériaux recyclés.',
        'type_projet' => 'Industrie',
        'forme_juridique' => 'SA',
        'plan_affaires' => 'Plan_GreenPack.pdf',
        'promoteur_id' => 2,
        'status'=>'en attente'
    ],);
    $projets=Projet::updateOrCreate(
    [
        'titre' => 'MedCare - Clinique mobile rurale',
        'description' => 'Soins médicaux de base et dépistages via unités mobiles dans les zones reculées.',
        'type_projet' => 'Santé',
        'forme_juridique' => 'Association',
        'plan_affaires' => 'Plan_MedCare.pdf',
        'promoteur_id' => 1,'status'=>'en attente'

    ],);
    $projets=Projet::updateOrCreate(
    [
        'titre' => 'EduConnect - Plateforme e-learning',
        'description' => 'Offre de cours en ligne adaptés au programme national pour les lycéens.',
        'type_projet' => 'Éducation',
        'forme_juridique' => 'SASU',
        'plan_affaires' => 'Plan_EduConnect.pdf',
        'promoteur_id' => 2,
        'status'=>'en attente'
    ],);
    $projets=Projet::updateOrCreate(
    [
        'titre' => 'TerreBio - Agriculture régénérative',
        'description' => 'Exploitation agricole basée sur la permaculture et l’agroécologie.',
        'type_projet' => 'Agriculture',
        'forme_juridique' => 'EARL',
        'plan_affaires' => 'Plan_TerreBio.pdf',
        'promoteur_id' => 3,'status'=>'en attente'

    ],);
    $projets=Projet::updateOrCreate(
    [
        'titre' => 'UrbanFood - Cantine écoresponsable',
        'description' => 'Restaurant urbain proposant des plats faits maison à base de produits locaux.',
        'type_projet' => 'Restauration',
        'forme_juridique' => 'SARL',
        'plan_affaires' => 'Plan_UrbanFood.pdf',
        'promoteur_id' => 1,'status'=>'en attente'

    ],);
    $projets=Projet::updateOrCreate(
    [
        'titre' => 'SafeRide - Application VTC locale',
        'description' => 'Application mobile de transport privé pour villes de taille moyenne.',
        'type_projet' => 'Transport',
        'forme_juridique' => 'SAS',
        'plan_affaires' => 'Plan_SafeRide.pdf',
        'promoteur_id' => 2,
        'status'=>'en attente'
    ],);
    $projets=Projet::updateOrCreate(
    [
        'titre' => 'BuildIt - Constructeur modulaire',
        'description' => 'Conception de maisons écologiques préfabriquées à bas coût.',
        'type_projet' => 'Construction',
        'forme_juridique' => 'SARL',
        'plan_affaires' => 'Plan_BuildIt.pdf',
        'promoteur_id' => 1,
        'status'=>'en attente'
    ],);
    $projets=Projet::updateOrCreate(
    [
        'titre' => 'VetExpress - Soins animaliers à domicile',
        'description' => 'Service de vétérinaires mobiles pour animaux domestiques.',
        'type_projet' => 'Santé animale',
        'forme_juridique' => 'Micro-entreprise',
        'plan_affaires' => 'Plan_VetExpress.pdf',
        'promoteur_id' => 2,
        'status'=>'en attente'
    ],);
    $projets=Projet::updateOrCreate(
    [
        'titre' => 'RecyClean - Nettoyage écologique',
        'description' => 'Entreprise de nettoyage industriel utilisant des produits écologiques.',
        'type_projet' => 'Services aux entreprises',
        'forme_juridique' => 'SARL',
        'plan_affaires' => 'Plan_RecyClean.pdf',
        'promoteur_id' => 3,
        'status'=>'en attente'
    ],);
    $projets=Projet::updateOrCreate(
    [
        'titre' => 'FasoTextile - Tissage traditionnel',
        'description' => 'Valorisation du pagne tissé local à travers des produits textiles modernes.',
        'type_projet' => 'Artisanat',
        'forme_juridique' => 'Entreprise individuelle',
        'plan_affaires' => 'Plan_FasoTextile.pdf',
        'promoteur_id' => 1,
        'status'=>'en attente'
    ],);
    $projets=Projet::updateOrCreate(

    [
        'titre' => 'BioSève - Jus naturels pressés à froid',
        'description' => 'Production artisanale de jus 100% naturels sans conservateurs.',
        'type_projet' => 'Agroalimentaire',
        'forme_juridique' => 'SASU',
        'plan_affaires' => 'Plan_BioSeve.pdf',
        'promoteur_id' => 2,
        'status'=>'en attente'
    ],);
    $projets=Projet::updateOrCreate(


    [
        'titre' => 'Mobipay - Paiement mobile sans internet',
        'description' => 'Solution de paiement par USSD pour zones à faible connectivité.',
        'type_projet' => 'FinTech',
        'forme_juridique' => 'SA',
        'plan_affaires' => 'Plan_Mobipay.pdf',
        'promoteur_id' => 1,
        'status'=>'en attente'
    ],);
    $projets=Projet::updateOrCreate(
    [
        'titre' => 'Cultura - Centre de formation artistique',
        'description' => 'École de musique, théâtre et arts plastiques pour jeunes talents.',
        'type_projet' => 'Éducation / Culture',
        'forme_juridique' => 'Association',
        'plan_affaires' => 'Plan_Cultura.pdf',
        'promoteur_id' => 3,
        'status'=>'en attente'
    ],);
    $projets=Projet::updateOrCreate(
    [
        'titre' => 'CleanDrop - Purificateur d’eau solaire',
        'description' => 'Appareil de potabilisation de l’eau fonctionnant à l’énergie solaire.',
        'type_projet' => 'Technologie verte',
        'forme_juridique' => 'SARL',
        'plan_affaires' => 'Plan_CleanDrop.pdf',
        'promoteur_id' => 2,
        'status'=>'en attente'
    ],);
    $projets=Projet::updateOrCreate(
    [
        'titre' => 'QuickDoc - Téléconsultation médicale',
        'description' => 'Plateforme de téléconsultation médicale avec interface mobile simple.',
        'type_projet' => 'e-Santé',
        'forme_juridique' => 'SAS',
        'plan_affaires' => 'Plan_QuickDoc.pdf',
        'promoteur_id' => 3,
        'status'=>'en attente'
    ],);
    $projets=Projet::updateOrCreate(
    [
        'titre' => 'LogiTrack - Gestion de flotte transport',
        'description' => 'Système GPS et logiciel de suivi pour transporteurs locaux.',
        'type_projet' => 'Logistique',
        'forme_juridique' => 'SARL',
        'plan_affaires' => 'Plan_LogiTrack.pdf',
        'promoteur_id' => 2,
        'status'=>'en attente'

    ],);






    }



}
