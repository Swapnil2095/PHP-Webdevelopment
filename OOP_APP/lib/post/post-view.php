<?php
namespace App\Library;

class PostView extends PostService implements View {
    public function __construct() {
        parent::__construct();
    }
    public function all() {
        
    }
    public function single() {
        
    }
    public function hello_world() {
        echo 'Hi! I\'m Nano. Let\'s build something.';
    }
}