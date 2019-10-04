<?php
namespace Autoload;

spl_autoload_register(__NAMESPACE__ . '\ClassLoader::load');

/**
 * This is the loader used for automatically including classes in the application
 * 
 * if there's a new place from the application from which classes should be loaded
 * you can extend the class with another method to handle this
 */
class ClassLoader
{
    private static $class_name;
    private static $namespace;
    private static $namespace_parts;
    private static $namespace_path;

    const APP_ROOT = APPPATH;

    public static function load($class)
    {
        self::parseClass($class);

        if (self::fromModules()) return;
        if (self::fromIncludes()) return;
    }

    /**
     * parse the requested class into it's namespace parts
     */
    private static function parseClass($class)
    {
        self::$namespace_path = trim(str_replace('\\', '/', $class), '\\/');
        self::$namespace_parts = explode('/', self::$namespace_path);
        self::$namespace = strtolower(self::$namespace_parts[0]);
        self::$class_name = self::$namespace_parts[count(self::$namespace_parts) - 1];
    }

    /**
     * load classes that are in the modules directory
     */
    private static function fromModules()
    {
        $module_names = scandir(self::APP_ROOT . '/modules');
        $module_directories = [
            'includes',
            'models',
            'controllers'
        ];

        if (in_array(self::$namespace, $module_names))
        {
            $loaded = false;
            $module_path = self::APP_ROOT . "/modules/" . self::$namespace;
            foreach ($module_directories as $dir)
            {
                $path = "$module_path/$dir/" . self::$class_name;
                $loaded = self::require($path);
                if ($loaded) return true;
            }
            return false;
        }
    }

    /**
     * load classes from the application level includes directory
     */
    private static function fromIncludes()
    {
        $path = self::APP_ROOT . '/includes/' . self::$namespace_path;
        return self::require($path);
    }

    /**
     * simple helper method for checking and requiring class files
     */
    private static function require($path)
    {
        $path = $path . '.php';

        if (file_exists($path) && is_readable($path))
        {
            require_once $path;
            return true;
        }
        return false;
    }
}
