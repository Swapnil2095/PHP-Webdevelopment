<?php
namespace App\Library;

class Category extends CategoryView {
    public $name;
    public $description;
    public $slug;
    public $meta;
    
    public function __construct() {
        parent::__construct();
    }
}