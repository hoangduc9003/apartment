<?php

Breadcrumbs::for('admin.country.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.country.management'), route('admin.country.index'));
});

Breadcrumbs::for('admin.country.create', function ($trail) {
    $trail->parent('admin.country.index');
    $trail->push(__('labels.backend.country.create'), route('admin.country.create'));
});

Breadcrumbs::for('admin.country.edit', function ($trail) {
    $trail->parent('admin.customer.index');
    $trail->push(__('labels.backend.country.edit'), route('admin.country.edit'));
});

Breadcrumbs::for('admin.country.deleted', function ($trail) {
    $trail->parent('admin.customer.index');
    $trail->push(__('menus.backend.customer.deleted'), route('admin.country.deleted'));
});

Breadcrumbs::for('admin.country.import', function ($trail) {
    $trail->parent('admin.customer.index');
    $trail->push(__('menus.backend.customer.import'), route('admin.country.import'));
});