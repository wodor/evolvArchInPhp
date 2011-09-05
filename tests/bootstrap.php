<?php
spl_autoload_register(
function($class)
{
   if (0 === strpos($class, 'TestBefore\\')) {
        $file = __DIR__ . '/../' . str_replace('\\', '/', $class) . '.php';
        if (file_exists($file)) {
            require_once $file;
            return true;
        }
    }
});

spl_autoload_register(
function($class)
{

   if (0 === strpos($class, 'TestAfter\\')) {
        $file = __DIR__ . '/../' . str_replace('\\', '/', $class) . '.php';
        if (file_exists($file)) {
            require_once $file;
            return true;
        }
    }
});


