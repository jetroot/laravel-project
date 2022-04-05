## Project Description
This project created only for storing and saving people data, where there is one admin and he can add multiple persons (collaboraters).

## How to install ?

1. run **composer update** command.
2. run **composer install** command.
3. run **php artisan migrate** command.
4. insert two records to users table: One admin, Two not admin
![alt text](/public/screenshots/records.png "records screenshot")

5. run **php artisan serve** command. 

## How to use ?
###### if you are the admin:

    1. You can search users.
![alt text](/public/screenshots/search.png "search screenshot")
    
    2. You can register data.
![alt text](/public/screenshots/register.png "register user data screenshot")

    3. You can read data.
![alt text](/public/screenshots/read.png "read user data screenshot")

    4. You can update data.
![alt text](/public/screenshots/update.png "update user data screenshot")

    5. You can delete data.

    6. You can show collaboraters
![alt text](/public/screenshots/show_collabs.png "show collab users data screenshot")

    7. You can add person (Collaborater)
![alt text](/public/screenshots/add_new_person.png "add new collaborater screenshot")

###### if you are not the admin:

    1. You can search users.
![alt text](/public/screenshots/search_not_admin.png "search for users screenshot")

    2. You can register data.
![alt text](/public/screenshots/register_not_admin.png "register new users screenshot")
