<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitac7d3b683e7fe75c4bb2c3bc8d671b8c
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitac7d3b683e7fe75c4bb2c3bc8d671b8c', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitac7d3b683e7fe75c4bb2c3bc8d671b8c', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        \Composer\Autoload\ComposerStaticInitac7d3b683e7fe75c4bb2c3bc8d671b8c::getInitializer($loader)();

        $loader->register(true);

        $includeFiles = \Composer\Autoload\ComposerStaticInitac7d3b683e7fe75c4bb2c3bc8d671b8c::$files;
        foreach ($includeFiles as $fileIdentifier => $file) {
            composerRequireac7d3b683e7fe75c4bb2c3bc8d671b8c($fileIdentifier, $file);
        }

        return $loader;
    }
}

/**
 * @param string $fileIdentifier
 * @param string $file
 * @return void
 */
function composerRequireac7d3b683e7fe75c4bb2c3bc8d671b8c($fileIdentifier, $file)
{
    if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) {
        $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true;

        require $file;
    }
}
