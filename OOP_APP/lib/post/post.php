<?php
namespace App\Library;

class Post extends PostView {
    public $title;
    public $content;
    public $slug;
    public $meta;
    
    public function __construct() {
        parent::__construct();
    }
}