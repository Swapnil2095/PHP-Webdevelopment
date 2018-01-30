<?php
$tables = array(
    'post', 
    'post_meta', 
    'category', 
    'category_meta', 
    'post_category'
);

$post = array(
    'ID',
    'post_title',
    'post_content',
    'post_slug',
);

$post_meta = array(
    'post_id',
    'meta_key',
    'meta_value',
);

$category = array(
    'ID',
    'category_name',
    'category_description',
    'category_slug',
);

$category_meta = array(
    'category_id',
    'meta_key',
    'meta_value',
);

$post_category = array(
    'post_category_id',
    'post_id',
    'category_id',
);