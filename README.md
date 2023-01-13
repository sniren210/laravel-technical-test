# Laravel Transaction Website
Transaction Website use 
- Laravel 8.83
- Mysql
- Bootstrap

## user example
```
Email: admin@gmail.com
Password: admin123
```

## Installation 
Make sure you have environment setup properly. You will need MySQL, PHP8.1, Node.js and composer.

### Install Laravel Website + API
1. Download the project (or clone using GIT)
2. Copy `.env.example` into `.env` and configure database credentials
3. Navigate to the project's root directory using terminal
4. Run `composer install`
5. Set the encryption key by executing `php artisan key:generate`
6. make database use mysql name laravel_technical_test
7. Run migrations `php artisan migrate --seed`
8. Start local server by executing `php artisan serve`
9. Open new terminal and navigate to the project root directory
10. Run `npm install`
11. Run `npm run dev` to start vite server for Laravel frontend
