<?php
namespace App\Library;

interface Service {
    public function create();
    public function read();
    public function update();
    public function delete();
}