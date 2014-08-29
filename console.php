#!/usr/bin/env php
<?php 

/**
 *  include composer
 */
require './vendor/autoload.php';
/**
 * include refactored Codeigniter constants
 */
require_once '../public_html/environment.php';
/**
 *  include the CI database configs, based on environment
 */
require APPPATH . 'config/' . ENVIRONMENT . '/database.php';

$params = array(
    'dbname'   => $db['default']['database'],
    'user'     => $db['default']['username'],
    'password' => $db['default']['password'],
    'host'     => $db['default']['hostname'],
    'driver'   => 'pdo_mysql',
    'charset'  => $db['default']['char_set'],
);

$db = \Doctrine\DBAL\DriverManager::getConnection($params);
$platform = $db->getDatabasePlatform();
$platform->registerDoctrineTypeMapping('enum', 'string');

$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
    'db'     => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($db),
    'dialog' => new \Symfony\Component\Console\Helper\DialogHelper(),
));

$console = new Symfony\Component\Console\Application;
$console->setHelperSet($helperSet);
$console->addCommands(array(
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\DiffCommand,
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\ExecuteCommand,
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\GenerateCommand,
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\MigrateCommand,
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\StatusCommand,
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\VersionCommand,
));
 
$console->run();


//
// ./console.php --configuration=/Users/eric/Sites/Design/fanpilotct.com/fanpilot.git/migrations/migrations.yml  migrations:migrate --no-interaction
//