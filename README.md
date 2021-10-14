# Notes  

### The following is an overview of the tech stack and dependencies used by this application  

Slim - The Router  
Twig - The CRUD Views  
Flash - Used for success/failure messages  
intl-extra - Used for human readable datetime formats  
jQuery - Front End Javascript Library  
Bootstrap - Front End Responsive libary  
Bootstrap Tables - Easy table sorting  
Sweet Alerts - Better looking errors/message popups  
Eloquent ORM - The Models  
PHP-DI  - Dependency Injection Container  
Slim Bridge - Magical autowiring (dependency object resolution, instantiation & injection)  
PHP - The controllers  


# Setup  

### The following is a detailed description of how to install the web application

#### Digital Ocean    
This is a generalized setup I use for any kind of website on Digital Ocean  
1. I go with Droplets  
2. LAMP on Ubuntu 20.x from 'Marketplace' to get basic server dependencies pre-installed   
3. Typically go with the 1st or 2nd options from the basic plan to start with & monitor server load to see if it's necessary to upgrade   
4. Always choose NVMe SSD's for the fastest read/write speeds available   
5. SF data center hosting / respective location for minimizing latency to your area    
6. SSH Keys are preferable & have far better security than passwords   
7. Enable backups for rapid redeployment in case of emergencies   

#### SSH Into The Server
run `ssh USER_NAME_HERE@HOST_NAME_HERE` and type in yes to add it to your list of known hosts, and enter your password when prompted unless you're using ssh keys in which case you'll login immediately  

#### Web User Setup
run `sudo useradd web`  
run `sudo passwd web` and set the password for web when prompted  

#### Clone Repository
run `cd /var/www`  
run `git clone https://github.com/USER_ACCOUNT_HERE/REPOSITORY_NAME_HERE.git` and enter git username/password when prompted  

#### Install Dependencies
run `cd REPOSITORY_DIRECTORY_HERE`  
run `sudo apt-get update && sudo apt install php-xml php-curl`  
run `sudo apt-get install composer`  
run `composer install`  

#### Directory Setup
run `/var/www`  
run `chown -R web:www-data ./REPOSITORY_DIRECTORY_HERE`  
run `cd REPOSITORY_DIRECTORY_HERE/public`  
run `chown root:root .htaccess`  
run `cd ../var && chmod -R 777 ./cache`  
run `cd ../` 

#### Database Setup
run `mysql`  if you're root, you'll just get logged in. Which should be the case  
run `create database HeroAppreciationNetwork`  
run `CREATE USER 'newuser'@'localhost' IDENTIFIED BY 'password'; `
run `mysql -u USER_NAME_HERE -p HeroAppreciationNetwork < data.sql`  

#### Apache Setup
run `sudo a2enmod rewrite`  
run `sudo service apache2 restart`  
run `cd /etc/apache2/sites-available`  
run `cp 000-default.conf HeroAppreciationNetwork.conf`  
run `sudo nano HeroAppreciationNetwork.conf`  
change `DocumentRoot` value to `/var/www/HeroAppreciationNetwork/public`  
set `ServerName` to `www.HeroAppreciationNetwork.com` or add it after ServerAdmin line  
after that add `ServerAlias www.HeroAppreciationNetwork.com`  
Change `Directory` as follows  
```
<Directory /var/www/HeroAppreciationNetwork/public/>
    Options Indexes FollowSymLinks MultiViews
    AllowOverride All
    Order allow,deny
    allow from all
    Require all granted
</Directory>
```
hit `Ctl + x` while in editor to exit and write updates to file  
hit `y` when prompted and `enter` afterwards when it tells you what filename it's saving as 