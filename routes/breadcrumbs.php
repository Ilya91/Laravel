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

Breadcrumbs::for('template', function ($trail) {
    $trail->parent('realtime', route('realtime'));
    $trail->push('Template', route('template'));
});

Breadcrumbs::for('ajax', function ($trail) {
    $trail->parent('realtime', route('realtime'));
    $trail->push('Ajax', route('ajax'));
});

Breadcrumbs::for('chart', function ($trail) {
    $trail->parent('realtime', route('realtime'));
    $trail->push('Chart', route('chart'));
});

Breadcrumbs::for('pie-chart', function ($trail) {
    $trail->parent('realtime', route('realtime'));
    $trail->push('Pie Chart', route('pie-chart'));
});

Breadcrumbs::for('socket-chart', function ($trail) {
    $trail->parent('realtime', route('realtime'));
    $trail->push('Socket Chart', route('socket-chart'));
});

Breadcrumbs::for('blog', function ($trail) {
    $trail->parent('home', route('home'));
    $trail->push('Blog', route('blog'));
});
