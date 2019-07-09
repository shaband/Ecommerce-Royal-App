
<?php


/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
| 
|    These Are Routes intended for Doing authentication against our 
|	 application 
|
|
*/

Route::group(['prefix' => 'authentication'], function() {
		
		Auth::routes();

});






/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
| 
|    These Are Routes intended for Frontend 
|
|
*/




/** Authentication routes [ login - registration ] */
Route::get('/client/login' , 'ClientAuth\ClientLoginController@showLoginForm')->name('get_client_login'); 
Route::post('/login' , 'ClientAuth\ClientLoginController@postLogin')->name('post_client_login'); 
Route::post('client-register' , 'ClientAuth\ClientRegisterController@register')->name('client.register'); 

/** Website pages  */
Route::get('/' , 'Frontend\HomeController@home')->name('home_page'); 
Route::get('/devices', 'Frontend\ProductController@devices')->name('devices_page');
Route::get('/subscriptions', 'Frontend\ProductController@subscriptions')->name('subscriptions_page');


Route::get('/product/{id}' , 'Frontend\ProductController@productDetails')->name('productDetails'); 

Route::post('/newsletter_subscripe' , 'Backend\NewsletterController@subscripe')->name('newsletter_subscripe');


Route::get('contact' , 'Frontend\ContactUsController@index')->name('contact_page');
Route::post('contact' , 'Frontend\ContactUsController@postContact')->name('post_contact');


Route::get('search' , 'Frontend\SearchController@search')->name('search'); 


// clients area must be authenticated to see these routes 
Route::group(['prefix' => 'client'  , 'middleware'=>'client:client' ], function() {

    Route::get('/profile' , 'Frontend\ClientController@index')->name('client.profile');
    Route::get('/profile/profile-info' , 'Frontend\ClientController@profileInfo')->name('client.profile_info'); 
    Route::put('/profile_info_update/{id}' , 'Frontend\ClientController@profileInfoUpdate')->name('client.profile_info_update');
    Route::put('profile_info_update_password/{id}' , 'Frontend\ClientController@profileInfoUpdatePassword')->name('client.update_password'); 

    Route::get('/profile/addresses' , 'Frontend\ClientController@getAddAddressForm')->name('client.get_addresses'); 
    Route::post('/profile/add-new-address' , 'Frontend\ClientController@addAddress')->name('client.add_address') ; 
    Route::get('wishlist' , 'Frontend\ClientController@wishlistItems')->name('client.wishlistItems');
    Route::any('add-item-to-cart-from-whislist/{id}' , 'Frontend\ECommerceController@addItemToCartFromWishlist')->name('addItemToCartFromWishlist');

    Route::get('orders' , 'Frontend\ClientController@orders')->name('client.orders'); 

  



    Route::get('/profile-logout', 'Frontend\ClientController@logOut')->name('client.profile_logout'); 


    Route::get('cart' , 'Frontend\ECommerceController@cart')->name('cart_page'); 
    Route::any('add-item-to-cart/{id}' , 'Frontend\ECommerceController@addItemToCart')->name('addItemToCart'); 
    Route::any('add-item-to-cart-pages/{id}' , 'Frontend\ECommerceController@addItemToCartPages')->name('addItemToCartPages'); 
    Route::any('delete-item-from-cart/{id}' , 'Frontend\ECommerceController@deleteItemFromCart')->name('deleteItemFromCart'); 
    Route::any('add-item-to-wish-list/{id}', 'Frontend\ECommerceController@addItemToWishlist')->name('addItemToWishlist'); 
    Route::any('remove-item-from-wish-list/{id}', 'Frontend\ECommerceController@removeItemFromWishlist')->name('removeItemFromWishlist'); 
    Route::post('update-cart-product/{id}' , 'Frontend\ECommerceController@updateCartProduct')->name('update_cart_product'); 


    Route::get('edit_client_address/{id}' , 'Frontend\ClientController@getEditAddress')->name('client.edit_address'); 
    Route::put('update_address/{id}' , 'Frontend\ClientController@updateAddress')->name('client.update_address'); 


    Route::get('checkout' , 'Frontend\ECommerceController@checkout')->name('getCheckout'); 

    Route::any('perform_checkout' , 'Frontend\ECommerceController@perform_checkout')->name('perform_checkout'); 

    Route::any('check_payment' , 'Frontend\ECommerceController@check_payment')->name('check_payment');



});





/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
| 
|    These Are Routes Intended for Backend 
|
|
*/



 
Route::group(['prefix' => 'dashboard' , 'middleware'=>'auth'], function() {
    
  
	Route::get('home' , 'Backend\DashboardController@home')->name('dashboard.home');
	Route::get('stats' , 'Backend\TrackerController@stats')->name('dashboard.stats'); 
	Route::resource('slider', 'Backend\SliderController');
	// its a get cause am just hacking it , instead of using form and submit on href click 
	// and blah blah blah -_- 
	Route::get('slider/remove/{id}', 'Backend\SliderController@remove' )->name('dashboard.remove_slider');

	Route::get('general_settings' , 'Backend\GeneralSettingsController@index')->name('dashboard.get_settings'); 
	Route::put('post_updates/{id}' , 'Backend\GeneralSettingsController@update')->name('dashboard.post_settings_update'); 



	/** e-commerce start inshallah  */

	// products  : 
	Route::get('products' , 'Backend\ProductsController@index')->name('dashboard.products') ; 
	 
	Route::get('add-product' , 'Backend\ProductsController@create_product')->name('dashboard.create_product'); 
	Route::post('add-product' , 'Backend\ProductsController@post_product')->name('dashboard.post_product'); 
	Route::get('products/{id}/edit' , 'Backend\ProductsController@edit_product')->name('dashboard.edit_product'); 
	Route::put('products/{id}' , 'Backend\ProductsController@update_product')->name('dashboard.update_product'); 
	Route::get('products/remove/{id}', 'Backend\ProductsController@remove' )->name('dashboard.remove_product');
	Route::get('products/attachement/remove/{id}', 'Backend\ProductsController@removeAttachement' )->name('dashboard.remove_product_attachement');


	Route::get('categories','Backend\CategoriesController@index')->name('dashboard.categories');
	Route::get('categories/{id}/edit' , 'Backend\CategoriesController@edit')->name('dashboard.edit_category'); 
	Route::put('category/{id}' , 'Backend\CategoriesController@update')->name('dashboard.update_category'); 


	Route::get('category/{id}/products' , 'Backend\CategoriesController@category_products')->name('dashboard.category_products'); 



	Route::resource('packages' , 'Backend\PackagesController'); 
	Route::get('package_products/{id}' , 'Backend\PackagesController@packageProducts')->name('packages.products');
	Route::get('remove_package/{id}' , 'Backend\PackagesController@remove_package')->name('packages.remove_package'); 
	Route::get('category_packages' , 'Backend\PackagesController@categoryPackages')->name('packages.category_packages');


	Route::resource('social-media' , 'Backend\SocialMediaController');
	Route::get('remove_social_link/{id}' , 'Backend\SocialMediaController@remove')->name('social-media.remove'); 


	Route::get('clients' , 'Backend\ClientsController@index')->name('clients.index') ; 
	Route::any('clients/{id}/update' , 'Backend\ClientsController@update')->name('clients.update') ; 

	Route::get('admin/{id}/profile' , 'Backend\BackendUsersController@profile')->name('backend.profile'); 
	Route::any('admin/profile/{id}/update' , 'Backend\BackendUsersController@updateProfile')->name('backend.updateProfile'); 

	Route::any('admin/logout' , 'Backend\BackendUsersController@logout')->name('backend.logout'); 


	Route::get('orders' , 'Backend\OrderController@index')->name('backend.orders'); 
	Route::get('transactions' , 'Backend\TransactionController@index')->name('backend.transactions'); 
	Route::get('transactions_filter' , 'Backend\TransactionController@filter')->name('backend.transactions_filter');


	Route::get('payment_configuration' , 'Backend\PaymentGatewayConfigurationController@index')->name('backend.payment_configuration');  

	Route::put('payment_configuration/{id}' , 'Backend\PaymentGatewayConfigurationController@update')->name('backend.post_payment_configuration');  

});