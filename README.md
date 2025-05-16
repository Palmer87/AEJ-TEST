# AEJ-TEST

Projet Laravel de base pour démarrer rapidement une application web moderne.

## Présentation
Ce projet utilise le framework Laravel (v12) et propose une structure prête à l'emploi pour développer des applications web robustes et évolutives.

## Prérequis
- PHP >= 8.2
- Composer
- Une base de données (MySQL, PostgreSQL, SQLite, etc.)
- Node.js & npm (pour la gestion des assets front-end)

## Installation
1. **Cloner le dépôt**
   ```bash
   git clone <url-du-repo>
   cd AEJ-TEST
   ```
2. **Installer les dépendances PHP**
   ```bash
   composer install
   ```
3. **Copier le fichier d'environnement**
   ```bash
   cp .env.example .env
   ```
4. **Générer la clé d'application**
   ```bash
   php artisan key:generate
   ```
5. **Configurer la base de données**
   - Modifier les variables `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` dans `.env` selon votre configuration.
6. **Exécuter les migrations**
   ```bash
   php artisan migrate
   ```
7. **Installer les dépendances front-end**
   ```bash
   npm install && npm run build
   ```

## Lancer le serveur de développement
```bash
php artisan serve
```

## Commandes utiles
- `php artisan migrate` : Exécute les migrations de la base de données
- `php artisan db:seed` : Remplit la base de données avec des données de test
- `php artisan tinker` : Console interactive pour tester le code
- `php artisan queue:work` : Lance le traitement des jobs en file d'attente

## Tests
Pour lancer les tests automatisés :
```bash
php artisan test
```

## Contribution
1. Forkez le projet
2. Créez une branche (`git checkout -b feature/ma-nouvelle-fonctionnalite`)
3. Commitez vos modifications (`git commit -am 'Ajout d'une nouvelle fonctionnalité'`)
4. Poussez la branche (`git push origin feature/ma-nouvelle-fonctionnalite`)
5. Ouvrez une Pull Request

## Licence
Ce projet est sous licence MIT.

---

Pour toute question ou suggestion, n'hésitez pas à ouvrir une issue ou à contribuer !
