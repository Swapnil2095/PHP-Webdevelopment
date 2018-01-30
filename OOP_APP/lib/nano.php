<?php
require_once('config/config.php');
require_once('database.php');
spl_autoload_register('Nano::autoload');

class Nano {
    public $post;
    public $category;
    
    public function __construct() {
        $this->post = new App\Library\Post;
        $this->category = new App\Library\Category;
    }
    
    public static function autoload($class) {
        $interfaces = array('service', 'view');
        $parts = explode('\\', $class);
        $object = strtolower(array_pop($parts));
        $folder = array_pop($parts);
        
        if ( $folder == 'Library' ) {
            if ( ! in_array( $object, $interfaces) ) {
                require_once('lib/' . $object . '/' . $object . '-service.php');
                require_once('lib/' . $object . '/' . $object . '-view.php');
                require_once('lib/' . $object . '/' . $object . '.php');
            } else {
                require_once('lib/' . $object . '.php');
            }
        }
    }
}