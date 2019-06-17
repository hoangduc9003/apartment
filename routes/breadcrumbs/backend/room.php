<?php

Breadcrumbs::for('admin.room.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.room.management'), route('admin.room.index'));
});

Breadcrumbs::for('admin.room.create', function ($trail) {
    $trail->parent('admin.room.index');
    $trail->push(__('labels.backend.room.create'), route('admin.room.create'));
});

Breadcrumbs::for('admin.room.deleted', function ($trail) {
    $trail->parent('admin.room.index');
    $trail->push(__('menus.backend.room.deleted'), route('admin.room.deleted'));
});

Breadcrumbs::for('admin.room.show', function ($trail, $id) {
    $trail->parent('admin.room.index');
    $trail->push(__('menus.backend.room.view'), route('admin.room.show', $id));
});

Breadcrumbs::for('admin.room.edit', function ($trail, $id) {
    $trail->parent('admin.room.index');
    $trail->push(__('menus.backend.room.edit'), route('admin.room.edit', $id));
});
