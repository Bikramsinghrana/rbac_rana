# 1. create project
composer create-project laravel/laravel="10.10" rbac_app
cd rbac_app

# 2. env & key
cp .env.example .env
php artisan key:generate
# edit .env DB_* values

# 3. install Breeze for auth (Blade)
composer require laravel/breeze --dev
php artisan breeze:install blade
npm install
npm run dev

# 4. migrate DB
php artisan migrate

# 5. install spatie
composer require spatie/laravel-permission
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan migrate

# 6. create project model/controller/factory
php artisan make:model Project -m -f -c

# 7. seed roles/permissions
php artisan make:seeder RolePermissionSeeder

# 8. make admin controllers
php artisan make:controller Admin/AdminDashboardController
php artisan make:controller Admin/UserController --resource
php artisan make:controller Admin/RoleController --resource
php artisan make:controller Admin/PermissionController --resource
php artisan make:controller ProjectController --resource

# 9. migrate & seed
php artisan migrate
php artisan db:seed --class=RolePermissionSeeder

# 10. run server
php artisan serve



Task 2: Role-Based Access Control (RBAC) Admin Panel

Requirements:

Create an admin panel for managing users and roles.

Admin can assign roles and permissions dynamically.

Middleware should restrict pages based on roles.

Optional: Add basic CRUD for “Projects” accessible only to users with project-manager role.
