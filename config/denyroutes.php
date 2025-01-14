<?php

return [
    'routes' => [
        // Web ucun deny olunmus routes
        'web/products',
        'web/users',
        'web/comments',
        'web/todos',
        'web/images',
        'web/carts',
        'web/posts',
        'web/quotes',
        'web/recipes',

        // Customers ucun routelar
        'customers',
        'customers/{customer}',

        // Employees ucun routelar
        'employees',
        'employees/{employee}',

        // Offices ucun routelar
        'offices',
        'offices/{office}',

        // Order details ucun routelar
        'orderdetails',
        'orderdetails/{orderdetail}',

        // Orders ucun routelar
        'orders',
        'orders/{order}',

        // Payments ucun routelar
        'payments',
        'payments/{payment}',

        // Product lines ucun routelar
        'productlines',
        'productlines/{productline}',

        // Products ucun routelar
        'products',
        'products/{product}',
    ],
];
