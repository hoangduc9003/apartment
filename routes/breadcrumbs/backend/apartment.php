<?php

Breadcrumbs::for('admin.apartment.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.apartment.management'), route('admin.apartment.index'));
});

Breadcrumbs::for('admin.apartment.create', function ($trail) {
    $trail->parent('admin.apartment.index');
    $trail->push(__('labels.backend.apartment.create'), route('admin.apartment.create'));
});

Breadcrumbs::for('admin.apartment.edit', function ($trail) {
    $trail->parent('admin.customer.index');
    $trail->push(__('labels.backend.apartment.edit'), route('admin.apartment.edit'));
});

Breadcrumbs::for('admin.apartment.deleted', function ($trail) {
    $trail->parent('admin.customer.index');
    $trail->push(__('menus.backend.customer.deleted'), route('admin.apartment.deleted'));
});
