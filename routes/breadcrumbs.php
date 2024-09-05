<?php

use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

Breadcrumbs::for('insight', function (BreadcrumbTrail $trail) {
    $trail->push('Insight', route('insight'));
});

Breadcrumbs::for('users', function (BreadcrumbTrail $trail) {
    $trail->push('Users');
});

Breadcrumbs::for('users_create', function (BreadcrumbTrail $trail) {
    $trail->push('Users', route('users.index'));
    $trail->push('Create');
});
Breadcrumbs::for('users_edit', function (BreadcrumbTrail $trail) {
    $trail->push('Users', route('users.index'));
    $trail->push('Edit');
});
