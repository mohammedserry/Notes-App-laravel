## Notes App

A lightweight notes/blog posts app built with Laravel 11. Uses SQLite by default so you can run it without setting up MySQL.

---

## What's in This Project?

✅ User auth scaffold (Login/Register)  
✅ Create, list, and view posts  
✅ Posts belong to users  
✅ Blade views for listing and creating posts  
✅ SQLite-first setup for quick local runs

---

## What You Need Before Starting

- **PHP 8.1 or higher** with `pdo_sqlite`
- **Composer** (PHP packages)
- **Node.js & npm** (only if you want to rebuild frontend assets)
- **Git** (to clone)

---

## How to Download and Run

### Step 1: Clone the Project
```bash
git clone https://github.com/mohammedserry/notes-app.git
cd "Notes App"
```

### Step 2: Install PHP Packages
```bash
composer install
```

### Step 3: Install Frontend Packages (optional)
```bash
npm install
```

### Step 4: Setup Environment File
```bash
cp .env.example .env
php artisan key:generate
```

### Step 5: Configure SQLite
Set this in `.env` (quote the path because the folder name has a space):
```dotenv
DB_CONNECTION=sqlite
DB_DATABASE="/media/serry/LocalDisk/Programming/Laravel/Notes App/database/database.sqlite"
```

### Step 6: Create Database File
```bash
touch database/database.sqlite
```

### Step 7: Setup Database
```bash
php artisan migrate --seed
```

### Step 8: Build Frontend (optional)
```bash
npm run build
```

### Step 9: Start the Server
```bash
php artisan serve
```
The app runs at **http://127.0.0.1:8000**

---

## How to Use

1. Open the home page to see posts.
2. Register or log in.
3. Create a post from the UI.
4. View posts and their owners.

---

## Troubleshooting

**Database file does not exist**  
Ensure the path is quoted and exists:
```bash
touch database/database.sqlite
php artisan migrate
```

**Env changes not applied**  
```bash
php artisan config:clear
php artisan serve
```

**Port already in use**  
```bash
php artisan serve --port=8080
```

**Assets 404**  
```bash
npm run build
php artisan serve
```

---

## Project Files Explained

```
├── app/
│   └── Http/Controllers/PostController.php   # Post CRUD actions
├── database/
│   ├── migrations/                          # Schema for users + posts
│   └── database.sqlite                      # Created after setup
├── resources/views/posts/                   # Blade templates
├── routes/web.php                           # Web routes
└── public/                                  # Public assets entry
```

---

## Technology Stack

- **Laravel 11**
- **PHP 8.1+**
- **SQLite**
- **Tailwind CSS** (via Laravel preset)
- **Vite**

---

## Author

**Mohammed Serry**  
Email: mohammedserry582@gmail.com
