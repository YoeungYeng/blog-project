## This is project blog
#### how to setup project by clone from gitub
#### clone my project in github
    ```git clone url```
#### install after clone my project
#### step 1: ```cp .env.example .env```
#### step 2: ```composer install```
#### step 3: gernerate keys
    ```php artisan key:generate```
#### step 4: setup database by default in laravel 12 use sqlite. In, my project use sqlite.
    ````php artisan migrate```
#### final use command: ```php artisan serve```