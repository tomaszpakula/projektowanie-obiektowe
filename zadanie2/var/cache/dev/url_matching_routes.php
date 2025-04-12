<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/login' => [[['_route' => 'mock_login', '_controller' => 'App\\Controller\\AdminController::mockLogin'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'logout', '_controller' => 'App\\Controller\\AdminController::logout'], null, null, null, false, false, null]],
        '/admin' => [[['_route' => 'admin_panel', '_controller' => 'App\\Controller\\AdminController::adminPanel'], null, null, null, false, false, null]],
        '/signin' => [[['_route' => 'signin', '_controller' => 'App\\Controller\\AdminController::signin'], null, ['POST' => 0], null, false, false, null]],
        '/cart' => [
            [['_route' => 'cart_list', '_controller' => 'App\\Controller\\CartController::getCart'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'cart_create', '_controller' => 'App\\Controller\\CartController::createCart'], null, ['POST' => 0], null, false, false, null],
        ],
        '/category' => [
            [['_route' => 'category_list', '_controller' => 'App\\Controller\\CategoryController::getCategory'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'category_create', '_controller' => 'App\\Controller\\CategoryController::createCategory'], null, ['POST' => 0], null, false, false, null],
        ],
        '/products' => [
            [['_route' => 'product_list', '_controller' => 'App\\Controller\\ProductController::getProducts'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'product_create', '_controller' => 'App\\Controller\\ProductController::createProduct'], null, ['POST' => 0], null, false, false, null],
        ],
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/ca(?'
                    .'|rt/([^/]++)(?'
                        .'|(*:27)'
                    .')'
                    .'|tegory/([^/]++)(?'
                        .'|(*:53)'
                    .')'
                .')'
                .'|/products/([^/]++)(?'
                    .'|(*:83)'
                .')'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:122)'
                    .'|wdt/([^/]++)(*:142)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:188)'
                            .'|router(*:202)'
                            .'|exception(?'
                                .'|(*:222)'
                                .'|\\.css(*:235)'
                            .')'
                        .')'
                        .'|(*:245)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        27 => [
            [['_route' => 'cart_get', '_controller' => 'App\\Controller\\CartController::getCartById'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'cart_update', '_controller' => 'App\\Controller\\CartController::updatecart'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'cart_delete', '_controller' => 'App\\Controller\\CartController::deletecart'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        53 => [
            [['_route' => 'category_get', '_controller' => 'App\\Controller\\CategoryController::getCategoryById'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'category_update', '_controller' => 'App\\Controller\\CategoryController::updateCategory'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'Category_delete', '_controller' => 'App\\Controller\\CategoryController::deleteCategory'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        83 => [
            [['_route' => 'product_get', '_controller' => 'App\\Controller\\ProductController::getProductById'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'product_update', '_controller' => 'App\\Controller\\ProductController::updateProduct'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'product_delete', '_controller' => 'App\\Controller\\ProductController::deleteProduct'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        122 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        142 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        188 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        202 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        222 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        235 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        245 => [
            [['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
