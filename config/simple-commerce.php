<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Sites
    |--------------------------------------------------------------------------
    |
    | You may configure a different currency & different shipping methods for each
    | of your 'multi-site' sites.
    |
    | https://simple-commerce.duncanmcclean.com/multi-site
    |
    */

    'sites' => [
        'default' => [
            'currency' => 'GBP',

            'shipping' => [
                'methods' => [
                    \DoubleThreeDigital\SimpleCommerce\Shipping\StandardPost::class,
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Payment Gateways
    |--------------------------------------------------------------------------
    |
    | This is where you configure the payment gateways you wish to use across
    | your site. You may configure as many as you like.
    |
    | https://simple-commerce.duncanmcclean.com/gateways
    |
    */

    'gateways' => [
        \DoubleThreeDigital\SimpleCommerce\Gateways\Builtin\DummyGateway::class => [
            'display' => 'Card',
        ],

        // \DoubleThreeDigital\SimpleCommerce\Gateways\Builtin\StripeGateway::class => [
        //     'key' => env('STRIPE_KEY'),
        //     'secret' => env('STRIPE_SECRET'),
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Notifications
    |--------------------------------------------------------------------------
    |
    | Simple Commerce is able to send notifications after certain 'events' happen,
    | like an order being marked as paid. You may configure these notifications
    | below.
    |
    | https://simple-commerce.duncanmcclean.com/notifications
    |
    */

    'notifications' => [
        'order_paid' => [
            \DoubleThreeDigital\SimpleCommerce\Notifications\CustomerOrderPaid::class   => ['to' => 'customer'],
            \DoubleThreeDigital\SimpleCommerce\Notifications\BackOfficeOrderPaid::class => ['to' => 'duncan@example.com'],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Stock Running Low
    |--------------------------------------------------------------------------
    |
    | Simple Commerce will emit events when stock is running low for a product.
    | You may configure the threshold used to decide 'when' a product is
    | running low.
    |
    | https://simple-commerce.duncanmcclean.com/stock
    |
    */

    'low_stock_threshold' => 10,

    /*
    |--------------------------------------------------------------------------
    | Tax
    |--------------------------------------------------------------------------
    |
    | Configure the 'tax engine' you'd like to be used to calculate tax rates
    | throughout your site.
    |
    | https://simple-commerce.duncanmcclean.com/tax
    |
    */

    'tax_engine' => \DoubleThreeDigital\SimpleCommerce\Tax\BasicTaxEngine::class,

    'tax_engine_config' => [
        // Basic Engine
        'rate'               => 20,
        'included_in_prices' => false,

        // Standard Tax Engine
        'address' => 'billing',

        'behaviour' => [
            'no_address_provided' => 'default_address',
            'no_rate_available' => 'prevent_checkout',
        ],

        'default_address' => [
            'address_line_1' => '',
            'address_line_2' => '',
            'city' => '',
            'region' => '',
            'country' => '',
            'zip_code' => '',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Content Drivers
    |--------------------------------------------------------------------------
    |
    | Normally, all of your products, orders, coupons & customers are stored as flat
    | file entries. This works great for small stores where you want to keep everything
    | simple. However, for more complex stores, you may want store your data somewhere else
    | (like a database). Here's where you'd swap that out.
    |
    | https://simple-commerce.duncanmcclean.com/extending/content-drivers
    |
    */

    'content' => [
        'orders' => [
            'driver' => \DoubleThreeDigital\SimpleCommerce\Orders\Order::class,
            'collection' => 'orders',
        ],

        'products' => [
            'driver' => \DoubleThreeDigital\SimpleCommerce\Products\Product::class,
            'collection' => 'products',
        ],

        'coupons' => [
            'driver' => \DoubleThreeDigital\SimpleCommerce\Coupons\Coupon::class,
            'collection' => 'coupons',
        ],

        'customers' => [
            'driver' => \DoubleThreeDigital\SimpleCommerce\Customers\Customer::class, // Change to `UserCustomer` if you'd prefer to use Users as your customers
            'collection' => 'customers',
        ],
    ],

];
