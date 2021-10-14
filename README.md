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
run `ssh-keygen` and go through process to setup ssh key  
run  `cat ~/.ssh/id_rsa.pub` and copy all the text that gets output to the terminal starting with "ssh-rsa"  
`IMPORTANT: go to github and add the ouput to your user settings under ssh-keys`  
run `cd /var/www`  
run `git clone git@github.com:USERNAME_HERE/REPOSITORY_DIRECTORY_HERE.git` and enter git username/password when prompted  

#### Install Dependencies
run `cd REPOSITORY_DIRECTORY_HERE`  
run `sudo apt-get update && sudo apt install php-xml php-curl` and type 'y' when prompted  
run `sudo apt-get install composer`  and type 'y' when prompted  
run `composer install`  and there will probably be simple dependency related warnings - which can usually be ignored  

#### Directory Setup
run `cd var/www`  
run `chown -R web:www-data ./REPOSITORY_DIRECTORY_HERE`  
run `chown root:root ./REPOSITORY_DIRECTORY_HERE`  
run `cd REPOSITORY_DIRECTORY_HERE/public`  
run `chown root:root .htaccess`  
run `cd ../ && mkdir var`  
run `cd var && mkdir cache`  
run `chmod 777 ./cache`  
run  `cd ../ && chown -R web:www-data ./var`  
run `cd public/assets/img && chmod -R 777 ./uploads`


#### Setting Setup  
run `nano app/settings.php` this file stores the website settings in an associative array inside the DI Container  
You'll see key/value pairs such as database/username/password which can be set.  
All of which are presumed to be reset as `HeroAppreciationNetwork` for the sake of the rest of the documentation.  
Settings => Cache => Can be changed from false to `../var/cache`  
Hit `CTRL X` when finished and type "y" and hit enter when prompted  


#### Database Setup
run `mysql`  if you're root, you'll just get logged in. Which should be the case  
run `create database HeroAppreciationNetwork`  
run `CREATE USER 'HeroAppreciationNetwork'@'localhost' IDENTIFIED BY 'HeroAppreciationNetwork';`  
run `GRANT ALL PRIVILEGES ON HeroAppreciationNetwork.* TO 'HeroAppreciationNetwork'@'localhost';`  
run `FLUSH PRIVILEGES`  
run `exit`  
run `cd /var/www/REPOSITORY_DIRECTORY_HERE`
run `mysql -u HeroAppreciationNetwork -p HeroAppreciationNetwork < schema.sql` To load database schema  
run `mysql -u HeroAppreciationNetwork -p HeroAppreciationNetwork < data.sql` To load demo data  
##### If you want to verify DB Setup  
run `mysql -u HeroAppreciationNetwork -p HeroAppreciationNetwork`  
run `use HeroAppreciationNetwork`  
run `show tables`  And you should get a list of ~ 2 dozen tables in the database if all is well  

#### Apache Setup
run `cd /etc/apache2/sites-available`  
run `cp 000-default.conf HeroAppreciationNetwork.conf`  
run `sudo nano HeroAppreciationNetwork.conf`  
change `DocumentRoot` value to `/var/www/REPOSITORY_DIRECTORY_HERE/public`  
set `ServerName` to `www.HeroAppreciationNetwork.com` or add it after ServerAdmin line  
after that add `ServerAlias www.HeroAppreciationNetwork.com`  
Change `Directory` section as follows  
```
<Directory /var/www/REPOSITORY_DIRECTORY_HERE/public/>
    Options Indexes FollowSymLinks MultiViews
    AllowOverride All
    Order allow,deny
    allow from all
    Require all granted
</Directory>
```
hit `Ctl + x` while in editor to exit 
hit `y` when prompted and `enter` afterwards when it tells you what filename it's saving as 
run `sudo a2enmod rewrite`  
run `sudo a2dissite` and type '000-default' & hit enter    
run `sudo a2ensite` and type HeroAppreciationNetwork & hit enter  
run `sudo service apache2 restart`  

#### Pulling New Changes From Git  
run `git config core.sshCommand "ssh -i ~/.ssh/id_rsa -F /dev/null"`  
run `cd /var/www/REPOSITORY_DIRECTORY_HERE`  
run `git pull`    
run `cd ../`  
run `chown -R web:www-data ./REPOSITORY_DIRECTORY_HERE`  
run `chown root:root ./REPOSITORY_DIRECTORY_HERE`  
run `cd REPOSITORY_DIRECTORY_HERE/public`  
run `chown root:root .htaccess`  
run `cd ../`  
run `chmod -R 777 ./var/cache`  
run `chmod -R 777 ./public/assets/img/uploads`