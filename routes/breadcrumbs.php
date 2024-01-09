<?php

Breadcrumbs::for('home', function ($trail) {
    $trail->push('خانه', route('home'));
});

Breadcrumbs::for('products', function ($trail) {
    $trail->parent('home');
    $trail->push('محصولات', route('products'));
});

Breadcrumbs::for('products.show', function ($trail, $item) {
    $trail->parent('products');
    $trail->push($item->title, route('products.show', $item->slug));
});

Breadcrumbs::for('articles', function ($trail) {
    $trail->parent('home');
    $trail->push('مقالات', route('articles'));
});

Breadcrumbs::for('articles.show', function ($trail, $item) {
    $trail->parent('articles');
    $trail->push($item->title, route('articles.show', $item->id));
});



