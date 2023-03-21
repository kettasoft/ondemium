<?php

return [
    'name' => 'Interaction',

    'interactionable' => [
        'hospital' => Modules\Hospital\Models\Hospital::class,
        'post' => Modules\Post\Models\Post::class,
        'pharmacy' => Modules\Pharmacy\Models\Pharmacy::class,
        'product' => Modules\Product\Models\Product::class,
        'article' => Modules\Article\Models\Article::class,
        'clinic' => Modules\Clinic\Models\Clinic::class,
        'comment' => Modules\Comment\Models\Comment::class,
    ]
];
