# user_magment_practical

I develop this project using laravel framework

Project Name : User Management System with Task Scheduler 

PHP Version : 8.0.28

Composer Version : 2.3.5


Here is steps for run this project
=================================


**Step 1: Database Configuration**

=> Change database username and password in .env file

ONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=laravel-project

DB_USERNAME=root

DB_PASSWORD=password

**Step 2: Run migration**

=> 
php artisan migrate


**Step 3: Run Seeder**
=>
php artisan db:seed --class=CreateUsersSeeder

**Step 4: Install npm & run dev**
=>  i) npm i 
       ii) npm run dev
	

**Step 5: Run Server**

=> Open new terminal and run this command
     
     php artisan serve

**** Step 6: Run laravel application ****
=>  Now goto you web browser and Type the given URL

      http://127.0.0.1:8000/





Check  scheduler for User
=============================== 
php artisan schedule:list



Login Credentials
=====================================

**For Admin**

email : admin@gmail.com
pass : 123456

**For User**

email : kalpesh@gmail.com
pass : 123456

email : hayaan@gmail.com
pass : 123456

email : alex@gmail.com
pass : 123456

email : rayan@gmail.com
pass : 123456 
