<?php

Breadcrumbs::for('admin.customer.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.customer.management'), route('admin.customer.index'));
});

Breadcrumbs::for('admin.customer.create', function ($trail) {
    $trail->parent('admin.customer.index');
    $trail->push(__('labels.backend.customer.management'), route('admin.customer.create'));
});

Breadcrumbs::for('admin.customer.deleted', function ($trail) {
    $trail->parent('admin.customer.index');
    $trail->push(__('menus.backend.customer.deleted'), route('admin.customer.deleted'));
});

Breadcrumbs::for('admin.customer.show', function ($trail, $id) {
    $trail->parent('admin.customer.index');
    $trail->push(__('menus.backend.customer.view'), route('admin.customer.show', $id));
});

Breadcrumbs::for('admin.customer.edit', function ($trail, $id) {
    $trail->parent('admin.customer.index');
    $trail->push(__('menus.backend.customer.edit'), route('admin.customer.edit', $id));
});