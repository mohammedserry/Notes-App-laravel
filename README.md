## Notes App (Laravel)

Simple notes/posts CRUD built with Laravel. It uses SQLite by default so you can get running quickly without a MySQL server.

### Features
- Create, list, and view posts
- User relation attached to posts (via migrations)
- Ships with SQLite for zero-config local setup

### Prerequisites
- PHP 8.1+ with `pdo_sqlite`
- Composer
- Node.js + npm (only if you want to rebuild frontend assets; not required to run the backend)

### Quick start
1. Install PHP dependencies:
	```bash
	composer install
	```
2. Copy env and generate key:
	```bash
	cp .env.example .env
	php artisan key:generate
	```
3. Configure SQLite in `.env` (already set here):
	```dotenv
	DB_CONNECTION=sqlite
	DB_DATABASE="/media/serry/LocalDisk/Programming/Laravel/Notes App/database/database.sqlite"
	```
4. Create the SQLite file and run migrations:
	```bash
	touch database/database.sqlite
	php artisan migrate
	```
5. (Optional) Build assets:
	```bash
	npm install
	npm run dev
	```
6. Run the server:
	```bash
	php artisan serve
	```
	App will be available at http://127.0.0.1:8000

### Common issues
- **Database file does not exist**: ensure `DB_DATABASE` points to an existing file. Recreate with `touch database/database.sqlite` and rerun `php artisan migrate`.
- **Env not picked up**: clear config cache with `php artisan config:clear` and restart `php artisan serve`.

### Running tests
```bash
php artisan test
```

### Folder structure (high level)
- app/Http/Controllers/PostController.php — post CRUD endpoints
- database/migrations — schema for users and posts
- resources/views/posts — blade templates for listing/creating posts

### License
MIT
