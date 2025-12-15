Project Setup (Step by Step)

1. Download or clone the project

2. git clone:-     https://github.com/Bikramsinghrana/rbac_rana.git
cd project-folder


3. Install PHP dependencies

composer update
Install Node dependencies
npm install


4. Create environment file
cp .env.example .env

Update the database and other environment variables in the .env file.
Generate application key

5.php artisan key:generate

Ensure database service is running
Start MySQL/PostgreSQL before proceeding.

6.Run database migrations
php artisan migrate --seed

(For development url)
php artisan serve
