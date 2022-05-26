
## Setup:

Requirements: PHP 8.0, MySQL 8.*, NGINX/Apache
(Works perfectly with Laravel Valet!)

- git clone
- composer install
- php artisan migrate
- in .env add variables:
  - API_KEY=your_api_key,
  - SWEET_ALERT_ALWAYS_LOAD_JS=true,
  - BUSINESS_OWNER_MAIL_ADDRESS=your_email@gmail.com (optional)
- php artisan serve

In order to inspect mail notifications provide working smtp credentials in .env file or set default mail driver to "log"
  
### Enjoy!!!
