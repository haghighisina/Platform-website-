<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc413d71cf864bc81afb9d565d81a8587
{
    public static $classMap = array (
        'AutoloadingExample\\Database' => __DIR__ . '/../..' . '/library/database.php',
        'AutoloadingExample\\Job' => __DIR__ . '/../..' . '/library/Job.php',
        'AutoloadingExample\\Template' => __DIR__ . '/../..' . '/library/Template.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInitc413d71cf864bc81afb9d565d81a8587::$classMap;

        }, null, ClassLoader::class);
    }
}
