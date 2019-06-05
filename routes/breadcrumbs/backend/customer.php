<?php

Breadcrumbs::for('admin.customer.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.title.customer.management'), route('admin.customer.index'));
});

