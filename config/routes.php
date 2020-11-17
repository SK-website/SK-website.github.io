<?php
return [
    ''=>'HomeController@index',
    'shop'=>'ShopController@index',
    'about'=>'AboutController@index',
    'contact'=>'ContactController@index',
    'config'=>'ConfigController@index',
    'test'=>'TestController@index',
    'admin'=>'Admin\DashboardController@index',
    'admin/categories'=>'Admin\CategoryController@index',
    'admin/categories/create'=>'Admin\CategoryController@create',
    'admin/categories/store'=>'Admin\CategoryController@store',
    'admin/categories/show/{id}'=>'Admin\CategoryController@show',
    'admin/categories/edit/{id}'=>'Admin\CategoryController@edit',
    'admin/categories/update'=>'Admin\CategoryController@update',
    'admin/categories/delete/{id}'=>'Admin\CategoryController@destroy',

    'admin/brands'=>'Admin\BrandController@index',
    'admin/brands/create'=>'Admin\BrandController@create',
    'admin/brands/store'=>'Admin\BrandController@store',
    'admin/brands/show/{id}'=>'Admin\BrandController@show',
    'admin/brands/edit/{id}'=>'Admin\BrandController@edit',
    'admin/brands/update'=>'Admin\BrandController@update',
    'admin/brands/delete/{id}'=>'Admin\BrandController@destroy',


    'admin/products'=>'Admin\ProductController@index',
    'admin/products/create'=>'Admin\ProductController@create',
    'admin/products/store'=>'Admin\ProductController@store',
    'admin/products/show/{id}'=>'Admin\ProductController@show',
    'admin/products/edit/{id}'=>'Admin\ProductController@edit',
    'admin/products/update'=>'Admin\ProductController@update',
    'admin/products/delete/{id}'=>'Admin\ProductController@destroy',

    'admin/guests'=>'Admin\GuestbookController@index',
    'admin/guests/store'=>'Admin\GuestbookController@store',
    'admin/guests/show/{id}'=>'Admin\GuestbookController@show',
    'admin/guests/delete/{id}'=>'Admin\GuestbookController@destroy',

    'api/products' => 'HomeController@getProducts',
    'api/products/{id}' => 'HomeController@getProduct',
    'api/categories' => 'HomeController@getCategories',
    'api/categories/count' => 'HomeController@getCategoriesWithCount',

    '404'=>'ErrorController@notFound',
];