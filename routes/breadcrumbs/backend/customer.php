<?php

Breadcrumbs::for('admin.customer.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.title.customer.management'), route('admin.customer.index'));
});

Breadcrumbs::for('admin.customer.create', function ($trail) {
    $trail->parent('admin.customer.index');
    $trail->push(__('labels.backend.title.customer.management'), route('admin.customer.create'));
});

Breadcrumbs::for('admin.customer.edit', function ($trail) {
    $trail->parent('admin.customer.index');
    $trail->push(__('labels.backend.title.customer.management'), route('admin.customer.edit'));
});

Breadcrumbs::for('admin.customer.deleted', function ($trail) {
    $trail->parent('admin.customer.index');
    $trail->push(__('menus.backend.customer.deleted'), route('admin.customer.deleted'));
});