<?php

/*
 * Start FrontEnd Option 
 */
Route::get('/', [
    'uses' => 'NewShopController@index',
    'as' => '/',
]);

Route::get('/category-product/{id}', [
    'uses' => 'NewShopController@categoryProduct',
    'as' => 'category-product',
]);

Route::get('/product-details/{id}', [
    'uses' => 'NewShopController@productDetails',
    'as' => 'product-details',
]);

Route::get('/contact', [
    'uses' => 'NewShopController@contact',
    'as' => 'contact',
]);

/*
 * Star Cart Option
 */

Route::post('/addToCart', [
    'uses' => 'CartController@addToCart',
    'as' => 'add-to-cart',
]);

Route::get('/show-cart', [
    'uses' => 'CartController@showCart',
    'as' => 'show-cart',
]);

Route::get('/delete-cart-item/{id}', [
    'uses' => 'CartController@deleteCart',
    'as' => 'delete-cart-item',
]);

Route::post('/cart-Update', [
    'uses' => 'CartController@cartUpdate',
    'as' => 'cart-Update',
]);

/*
 * End Cart Option
 */

/*
 * Start checkOut Option 
 */

Route::get('/checkOut', [
    'uses' => 'CheckoutController@checkOut',
    'as' => 'check-out',
]);

Route::post('/customer-register', [
    'uses' => 'CheckoutController@customerRegister',
    'as' => 'customer-register',
]);

Route::post('/customer-login', [
    'uses' => 'CheckoutController@customerLogin',
    'as' => 'customer-login',
]);

Route::get('/customer-logout', [
    'uses' => 'CartController@customerLogout',
    'as' => 'customer-logout',
]);

Route::get('/new-customer-login', [
    'uses' => 'CheckoutController@newCustomerLogin',
    'as' => 'new-customer-login',
]);

Route::get('/checkOut/shipping', [
    'uses' => 'CheckoutController@checkOutShipping',
    'as' => 'checkOut-shipping',
]);

Route::post('/new-shipping', [
    'uses' => 'CheckoutController@newShipping',
    'as' => 'new-shipping',
]);

Route::get('/checkOut/payment', [
    'uses' => 'CheckoutController@checkOutPayment',
    'as' => 'checkOut-payment',
]);

Route::post('/new-order', [
    'uses' => 'CheckoutController@newOrder',
    'as' => 'new-order',
]);

Route::get('/complete/order', [
    'uses' => 'CheckoutController@completeOrder',
    'as' => 'complete-order',
]);

Route::get('/ajax-email-check/{id}', [
    'uses' => 'CheckoutController@ajaxEmailCheck',
    'as' => 'ajax-email-check',
]);
/*
 * end checkOut Option
 */

/*
 * End FrontEnd Option
 */

/*
 * Start Admin Option 'middleware'=>'NewShopMiddleware'
 */

Auth::routes();
Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::group(['middleware' => 'NewShopMiddleware'], function () {
    /*
     * Start Category Option
     */

    Route::get('/add-category', [
        'uses' => 'CategoryController@addCategory',
        'as' => 'add-category',
    ]);

    Route::post('/save-category', [
        'uses' => 'CategoryController@saveCategory',
        'as' => 'save-category',
    ]);

    Route::get('/manage-category', [
        'uses' => 'CategoryController@manageCategory',
        'as' => 'manage-category',
    ]);

    Route::get('/published-category/{id}', [
        'uses' => 'CategoryController@publishedCategory',
        'as' => 'published-category',
    ]);
    Route::get('/unpublished-category/{id}', [
        'uses' => 'CategoryController@unpublishedCategory',
        'as' => 'unpublished-category',
    ]);

    Route::get('/edit-category/{id}', [
        'uses' => 'CategoryController@editCategory',
        'as' => 'edit-category',
    ]);

    Route::post('/update-category', [
        'uses' => 'CategoryController@updateCategory',
        'as' => 'update-category',
    ]);

    Route::get('/delete-category/{id}', [
        'uses' => 'CategoryController@deleteCategory',
        'as' => 'delete-category',
    ]);

    /*
     * End Category Option
     */

    /*
     * Start Brand Option 
     */

    Route::get('/add-brand', [
        'uses' => 'BrandController@addBrand',
        'as' => 'add-brand',
    ]);

    Route::post('/save-brand', [
        'uses' => 'BrandController@saveBrand',
        'as' => 'save-brand',
    ]);

    Route::get('/manage-brand', [
        'uses' => 'BrandController@manageBrand',
        'as' => 'manage-brand',
    ]);

    Route::get('/published-brand/{id}', [
        'uses' => 'BrandController@publishedBrand',
        'as' => 'published-brand',
    ]);
    Route::get('/unpublished-brand/{id}', [
        'uses' => 'BrandController@unpublishedBrand',
        'as' => 'unpublished-brand',
    ]);

    Route::get('/edit-brand/{id}', [
        'uses' => 'BrandController@editBrand',
        'as' => 'edit-brand',
    ]);

    Route::post('/update-brand', [
        'uses' => 'BrandController@updateBrand',
        'as' => 'update-brand',
    ]);

    Route::get('/delete-brand/{id}', [
        'uses' => 'BrandController@deleteBrand',
        'as' => 'delete-brand',
    ]);

    /*
     * Start Product Option
     */

    Route::get('/add-product', [
        'uses' => 'ProductController@addProduct',
        'as' => 'add-product',
    ]);

    Route::post('/save-product', [
        'uses' => 'ProductController@saveProduct',
        'as' => 'save-product',
    ]);

    Route::get('/manage-product', [
        'uses' => 'ProductController@manageProduct',
        'as' => 'manage-product',
    ]);
    Route::get('/published-product/{id}', [
        'uses' => 'ProductController@publishedProduct',
        'as' => 'published-product',
    ]);
    Route::get('/unpublished-product/{id}', [
        'uses' => 'ProductController@unpublishedProduct',
        'as' => 'unpublished-product',
    ]);

    Route::get('/edit-product/{id}', [
        'uses' => 'ProductController@editProduct',
        'as' => 'edit-product',
    ]);

    Route::post('/update-product', [
        'uses' => 'ProductController@updateProduct',
        'as' => 'update-product',
    ]);

    Route::get('/delete-product/{id}', [
        'uses' => 'ProductController@deleteProduct',
        'as' => 'delete-product',
    ]);

    /*
     * End Product Option
     */

    /*
     * Start Order Option
     */

    Route::get('/manage-order', [
        'uses' => 'OrderController@manageOrder',
        'as' => 'manage-order',
    ]);

    Route::get('/view-order-details/{id}', [
        'uses' => 'OrderController@viewOrderDetails',
        'as' => 'view-order-details',
    ]);
    Route::get('/view-order-invoice/{id}', [
        'uses' => 'OrderController@viewOrderInvoice',
        'as' => 'view-order-invoice',
    ]);

    Route::get('/download-order-invoice/{id}', [
        'uses' => 'OrderController@downloadOrderInvoice',
        'as' => 'download-order-invoice',
    ]);

    Route::get('/edit-order/{id}', [
        'uses' => 'OrderController@editOrder',
        'as' => 'edit-order',
    ]);

    Route::post('/update-order', [
        'uses' => 'OrderController@updateOrder',
        'as' => 'update-order',
    ]);

    Route::get('/delete-order/{id}', [
        'uses' => 'OrderController@deleteOrder',
        'as' => 'delete-order',
    ]);

    /*
     * End Order Option
     */

    /*
     * End Admin Option
     */
});


