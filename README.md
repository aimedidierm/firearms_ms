# firearms_ms

## About

Laravel web application which helps users to make online application for firearms and they must take online training and examination before getting approved.

**Features:**

-   A user make online application by filling details
-   Admin manages register, director and psychiatric accounts
-   User can get SMS notification about application status
-   And other many more!

## How to run this project?

1. Clone this replo `git clone https://github.com/aimedidierm/firearms_ms.git`
2. From the root directory run `composer install`
3. You must have a MySQL or PostgreSQL database running locally
4. Update the database details in `.env` to match your local setup
   `DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dbname
DB_USERNAME=dbusername
DB_PASSWORD=dbpassword`
5. Create SMS API configuration details in `.env`
   `SMS_SENDERID="yourId"
SMS_USERNAME="yourUsername"
SMS_PASSWORD="yourPassword"`
6. Run `php artisan migrate --seed` to setup the database tables and seed essentials such as Achievements and Badges which will be used.
