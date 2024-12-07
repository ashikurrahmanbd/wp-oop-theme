
<?php

trait SingletonTrait {

    // Hold the class instance
    private static $instance = null;

    // Make the constructor private to prevent direct object creation
    private function __construct() {}

    // Prevent object cloning
    private function __clone() {}

    // Prevent unserializing the object
    private function __wakeup() {}

    // Get the instance of the class
    public static function get_instance() {

        if (self::$instance === null) {

            self::$instance = new self();

        }
        
        return self::$instance;
    }
}

