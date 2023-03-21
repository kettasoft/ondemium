<?php

return [
    'name' => 'Report',

    'models' => [
        'doctor' => Modules\User\Models\User::class,
        // 'article' => Modules\Article\Models\Article::class,
        'comment' => Modules\Comment\Models\Comment::class,
        'clinic' => Modules\Clinic\Models\Clinic::class,
        'group' => Modules\Group\Models\Group::class,
        // 'hospital' => Modules\Hospital\Models\Hospital::class,
        'pharmacy' => Modules\Pharmacy\Models\Pharmacy::class,
        'post' => Modules\Post\Models\Post::class,
        'product' => Modules\Product\Models\Product::class,
        'review' => Modules\Review\Models\Review::class,
    ],

    'another' => [],

    // 'types' => array_merge(array_keys(config('report.models')), [
    //     'another'
    // ])
];
