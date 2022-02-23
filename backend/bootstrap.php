<?php
//AutoLoader do Composer
$loader = require __DIR__.'/vendor/autoload.php';
//vamos adicionar nossas classes ao AutoLoader
$loader->add('Entities', __DIR__.'/module/Entities');


use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;

//se for falso usa o APC como cache, se for true usa cache em arrays
$isDevMode = false;

//caminho das entidades
$paths = array(__DIR__ . '/module/Entities');
// configurações do banco de dados
$dbParams = array(
'driver' => 'pdo_mysql',
'user' => 'root',
'password' => 'root',
'dbname' => 'reddit_clone',
);

$config = Setup::createConfiguration($isDevMode);

//leitor das annotations das entidades
$driver = new AnnotationDriver(new AnnotationReader(), $paths);
$config->setMetadataDriverImpl($driver);
//registra as annotations do Doctrine
AnnotationRegistry::registerFile(
    __DIR__ . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php'
    );
    //cria o entityManager
    $entityManager = EntityManager::create($dbParams, $config);

/*
Caso necessário, alterar também a classe que chama o Entity manager:
module > Application > src > SetEntityManager.php
*/