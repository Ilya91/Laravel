<?php

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

Breadcrumbs::for('learn', function ($trail) {
    $trail->parent('home', route('home'));
    $trail->push('Learn', route('learn'));
});

Breadcrumbs::for('blog', function ($trail) {
    $trail->parent('home', route('home'));
    $trail->push('Blog', route('blog'));
});
