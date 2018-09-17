<?php

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

Breadcrumbs::for('learn', function ($trail) {
    $trail->parent('home', route('home'));
    $trail->push('Learn', route('learn'));
});

Breadcrumbs::for('login', function ($trail) {
    $trail->parent('home', route('home'));
    $trail->push('Login', route('login'));
});

Breadcrumbs::for('register', function ($trail) {
    $trail->parent('home', route('home'));
    $trail->push('Register', route('register'));
});

Breadcrumbs::for('realtime', function ($trail) {
    $trail->parent('home', route('home'));
    $trail->push('Realtime', route('realtime'));
});

Breadcrumbs::for('blog', function ($trail) {
    $trail->parent('home', route('home'));
    $trail->push('Blog', route('blog'));
});
