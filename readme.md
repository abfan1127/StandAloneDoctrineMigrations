# Stand Alone Migrations Using Doctrine Migrations Library

The intention of this repository is to allow users to manage their databases via Doctrine migrations. I wanted a method to intall the libraries via composer, update the config file, and have the migrations available via command line for deployment scripts. 

You will see that I actually am using this particular set of code for a CodeIgniter database. Within console.php, you can see I include most of the CodeIgniter index.php file to pull in my environments. Then I can pull in the proper database credentials. 

## Installation
1. Install composer (as a demo, I included the phar)
2. Install the composer components (see the composer.json)
3. update console.php to include your database credentials.
4. run migrate help to check

## Shell Script
The config file must be referenced via absolute path (at least for my config file did). To work around that, and to properly remember all of the major commands, I wrote a helper bash script. Its not glamorous, it doesn't check for arg counts, but it does remind me of the proper commands and gives me quick helper commands. 