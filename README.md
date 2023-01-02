## how to run this project

-   docker run -it --rm --name rabbitmq -p 5672:5672 -p 15672:15672 rabbitmq:3-management
-   composer install
-   cp .env.example .env
-   php artisan queue:table
-   php artisan migrate
-   php artisan db:seed

-   php artisan queue:work --queue=email
