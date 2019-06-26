<?php

Breadcrumbs::for('admin.contract.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.contract.management'), route('admin.contract.index'));
});

Breadcrumbs::for('admin.contract.create', function ($trail) {
    $trail->parent('admin.contract.index');
    $trail->push(__('labels.backend.contract.create'), route('admin.contract.create'));
});

Breadcrumbs::for('admin.contract.deleted', function ($trail) {
    $trail->parent('admin.contract.index');
    $trail->push(__('menus.backend.contract.deleted'), route('admin.contract.deleted'));
});

Breadcrumbs::for('admin.contract.show', function ($trail, $id) {
    $trail->parent('admin.contract.index');
    $trail->push(__('menus.backend.contract.view'), route('admin.contract.show', $id));
});

Breadcrumbs::for('admin.contract.edit', function ($trail, $id) {
    $trail->parent('admin.contract.index');
    $trail->push(__('menus.backend.contract.edit'), route('admin.contract.edit', $id));
});
