<?php

$loader = new \Phalcon\Loader();

// Register some namespaces
$loader->registerNamespaces(
        [
            "mn" => $config->application->libraryDir,
        ]
);
/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
        [
            $config->application->controllersDir,
            $config->application->modelsDir,
            $config->application->libraryDir,
        ]
)->register();
