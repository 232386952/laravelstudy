<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('users', UserController::class);
    $router->resource('movies', MovieController::class);
    $router->resource('mycars', MycarController::class);
    $router->resource('vouchers', VouchersController::class);
    $router->resource('userdata', UserdataController::class);
    $router->resource('news', NewsController::class);
    $router->resource('advertising', AdvertisingController::class);
    $router->resource('order', OrderController::class);
    $router->resource('commodity', CommodityController::class);
    $router->resource('cardatas', CardatasController::class);
    $router->resource('activity', ActivityController::class);
    $router->resource('carconfig', CarconfigController::class);
    $router->resource('drive', DriveController::class);
    $router->resource('reservation', ReservationController::class);
    $router->resource('slideshow', SlideshowController::class);
    $router->resource('service', ServiceController::class);
    $router->resource('notice', NoticeController::class);
    $router->resource('play', PlayController::class);
    $router->resource('opinion', OpinionController::class);
    $router->resource('coupon', CouponController::class);
    $router->resource('sale', SaleController::class);
    $router->resource('usercenter', UsercenterController::class);
    $router->resource('sails', SailsController::class);
    $router->resource('carimage', CarimageController::class);
    $router->resource('financial', FinancialController::class);
    $router->resource('knowledge', KnowledgeController::class);
    $router->resource('collection', CollectionController::class);
    $router->resource('message', MessageController::class);
    $router->resource('ordercontent', OrdercontentController::class);
    $router->resource('integral', IntegralController::class);


});
