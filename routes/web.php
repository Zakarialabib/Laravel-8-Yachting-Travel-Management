<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('clear-translations', 'ClearCacheController@clear_translations')
      ->name('clear-translations');
Route::get('clean', 'ClearCacheController@clear_cache')
      ->name('clear-cache');
      
  // User Notification
  Route::get('/user/notf/show', 'NotificationController@user_notf_show')->name('user-notf-show');
  Route::get('/user/notf/count','NotificationController@user_notf_count')->name('user-notf-count');
  Route::get('/user/notf/clear','NotificationController@user_notf_clear')->name('user-notf-clear');
  // User Notification Ends

  // booking Notification
  Route::get('/booking/notf/show', 'NotificationController@booking_notf_show')->name('booking-notf-show');
  Route::get('/booking/notf/count','NotificationController@booking_notf_count')->name('booking-notf-count');
  Route::get('/booking/notf/clear','NotificationController@booking_notf_clear')->name('booking-notf-clear');
  // booking Notification Ends

Route::get('typeaheadJs', 'AirportController@typeAhead')->name('typeaheadJs');
Route::get('airlineTypeAheadJs', 'AirlineController@typeAhead')->name('airlineTypeAheadJs');

Route::post('/one-way-flight-search','FlightController@oneWayFlightSearch');
Route::post('/round-trip-flight-search','FlightController@roundTripFlightSearch');
Route::post('/multi-destination-flight-search','FlightController@multiDestinationFlightSearch');
Route::get('/selected-itinerary-info/{id}','FlightController@selectedItineraryInfo');
Route::get('/get-flight-information-and-pricing/{id}','FlightController@getItineraryInformationAndPricing');
Route::post('/book-itinerary','FlightController@bookItinerary');
Route::post('/bank-payment','BankPaymentController@itineraryBankPayment');
Route::post('/hotel-bank-payment','BankPaymentController@hotelBankPayment');
Route::post('/flight-wallet-payment','WalletController@itineraryWalletPayment');
Route::post('/hotel-wallet-payment','WalletController@hotelWalletPayment');


Route::get('/logout','Auth\LoginController@logout')->name('user.logout');


Route::get('/cancel-pnr/{pnr}','FlightController@cancelPNR');
Route::get('/issue-ticket/{pnr}','FlightController@issueTicket');
Route::get('/void-ticket/{pnr}','FlightController@voidTicket');
Route::post('/custom-sign-in','UserController@signIn');
Route::post('/custom-sign-up','UserController@signUp');
Route::post('/wishlist', 'UserController@addWishlist')->name('add_wishlist')->middleware('auth');
Route::delete('/wishlist', 'UserController@removeWishlist')->name('remove_wishlist')->middleware('auth');
Route::get('/user/wishlist', 'UserController@pageWishList')->name('user_wishlist')->middleware('auth');


Route::get('/get-logged-in-user',function(){
    return App\Models\User::findOrFail(auth()->user()->id)
        ->first();
});


Route::group([
              'namespace' => 'Frontend', 
              'middleware' => []], function(){
                  
        Route::get('/', 'ViewController@home');
        Route::get('/accueil', 'ViewController@home')->name('home');                
        Route::get('/langue/{locale}', 'ViewController@changeLanguage')->name('change_language');
        Route::get('/itinerary-booking','ViewController@itineraryBooking')->middleware('flight.search.param','flight.selected','flight.pricing.info');
        Route::get('/available-itineraries','ViewController@availableItineraries')->middleware('flight');
        Route::get('/flight-booking-payment-page','ViewController@flightBookingPayment')->middleware('flight.search.param','flight.selected','flight.pricing.info','pnr');
        Route::get('/flight-booking-confirmation','ViewController@flightPaymentConfirmation')->middleware('flight.search.param','flight.selected','flight.pricing.info','payment.info');
        Route::get('/available-hotels','ViewController@availableHotels')->middleware('hotel','hotel.search.param');
        Route::get('/hotel-information','ViewController@hotelInformation')->middleware('hotel.information');
        Route::get('/hotel-room-booking/{id}','ViewController@hotelRoomBooking')->middleware('hotel.search.param');
        Route::get('/recherche', 'ViewController@search')->name('search');
        Route::get('/termes-et-conditions', 'ViewController@termsConditions')->name('page_terms_conditions');
        Route::get('/cgv', 'ViewController@saleConditions')->name('page_sale_conditions');
        Route::get('/blog/tout', 'PostController@list')->name('post_list_all');
        Route::post('/post', 'PostController@send')->name('send');
        Route::get('/blog/{cat_slug}', 'PostController@list')->where('cat_slug', '[a-zA-Z0-9-_]+')->name('post_list');
        Route::get('{slug}-{id}', 'PostController@detail')
        ->where('slug', '[a-zA-Z0-9-_]+')
        ->where('id', '[0-9]+')->name('post_detail');
        Route::get('/ajax-search', 'ViewController@ajaxSearch');
        Route::get('/ajax-search-listing', 'ViewController@searchListing');
        Route::get('/search', 'ViewController@search')->name('search');


        Route::group(['prefix' => '/deals'],function(){

            Route::get('','ViewController@hotDeals');
            Route::get('flight','ViewController@flightDeals');
            Route::get('hotel','ViewController@hotelDeals');
            Route::get('attraction','ViewController@attractionDeals');
            Route::get('details/{id}','ViewController@dealDetails');
            Route::get('booking/{id}','ViewController@dealBooking');
            Route::post('booking','TravelPackageController@bookDeal');
            Route::get('payment-options','ViewController@dealPaymentOptions')->middleware('deals.booking.id');
            Route::get('booking-confirmation','ViewController@dealBookingConfirmation')->middleware('payment.info','deals.booking.id');
            Route::post('calculateBookingAmount','TravelPackageController@calculateBookingAmount');
            Route::post('wallet-payment','WalletController@dealWalletPayment');
            Route::post('bank-payment','BankPaymentController@dealBankPayment');
        
        });

        Route::post('/searchHotel','HotelController@searchHotel');
        Route::get('/get-selected-hotel-information/{id}','HotelController@getSelectedHotelInformation');
        Route::get('/get-selected-hotel-rooms-information/{id}','HotelController@getSelectHotelRoomsInformation');
        Route::get('/get-selected-hotel-room-information/{id}','HotelController@getSelectedHotelRoomInformation');
        Route::get('/selected-hotel-information','HotelController@selectedHotel');
        Route::get('/hotel-room-information/{id}','HotelController@hotelRoomInformation');
        Route::post('/hold-customer-hotel-booking-information','HotelController@holdCustomerHotelBookingInfo');
        Route::get('/hotel-booking-confirmation','HotelController@hotelPaymentConfirmation');

        Route::get('/search-listing-input', 'ViewController@searchListing')->name('search_listing');
        Route::get('/search-listing', 'ViewController@pageSearchListing')->name('page_search_listing');
        Route::get('/hotel-booking-payment-page','ViewController@hotelBookingPaymentPage')->middleware('hotel.search.param','hotel.room.selected');
        Route::get('/hotel-booking-completion','ViewCOntroller@hotelBookingCompletion')->middleware('hotel.search.param','hotel.room.selected','payment.info');

        Route::get('/meilleures-offres', 'PlaceController@list')->name('best_offers');
        Route::get('/offre-special/{slug}', 'PlaceController@detail')->name('place_detail');
        Route::get('/offres/filter', 'PlaceController@getListFilter')->name('place_get_list_filter');

        Route::get('/offers/{slug}', 'OfferController@show')->name('offer.show');
        
   
        
        Route::get('/ville-a-visiter', 'CityController@list')->name('cities_list');
        Route::get('/ville/{slug}', 'CityController@detail')->name('city_detail');
        Route::get('/ville/{slug}/{cat_slug}', 'CityController@detail')->name('city_category_detail');

        Route::get('/categorie', 'CategoryController@listPlace')->name('category_list');
        Route::get('/categorie/{slug}', 'CategoryController@detail')->name('category_detail');
        Route::get('/categorie/type/{slug}', 'CategoryController@typeDetail')->name('category_type_detail');
        Route::get('/categories', 'CategoryController@search')->name('category_search');
        Route::post('/avis', 'ReviewController@create')->name('review_create')->middleware('auth');
       
        
        Route::get('/offres/map', 'PlaceController@getListMap')->name('place_get_list_map');
        Route::get('/villes/{country_id}', 'CityController@getListByCountry')->name('city_get_list');
        Route::get('/villes', 'CityController@search')->name('city_search');

        Route::get('/cart', 'BookingController@cart')->name('booking_cart');

        //Route::get('/checkout', 'CheckoutController@show')->name('checkout_show');
        Route::post('/checkout', 'CheckoutController@store')->name('checkout_store');

        Route::post('/cmi/callback', 'CmiController@cmiCallback')->name('cmi_callback');
        Route::post('/cmi/ok', 'CmiController@ok')->name('cmi_ok');
        Route::post('/cmi/fail', 'CmiController@fail')->name('cmi_fail');

        Route::get('/add-to-cart/{id}', 'BookingController@addToCart')->name('add-to-cart');
        Route::put('/update-cart', 'BookingController@update');
        Route::delete('/remove-from-cart', 'BookingController@remove')->name('remove-from-cart');

        Route::post('/bookings/signin', 'BookingController@signInUser')->name('booking_user_signin');
        Route::post('/bookings/register', 'BookingController@createUser')->name('booking_user_register');
        Route::post('/bookings', 'BookingController@booking')->name('booking_submit');

     });

Route::group([
    'prefix' => 'backoffice',
    'namespace' => 'Backend', 
    'middleware' => ['auth']], function(){
        
        Route::get('/country', 'CountryController@list')->name('country_list');
        Route::post('/country', 'CountryController@create')->name('country_create');
        Route::put('/country', 'CountryController@update')->name('country_update');
        Route::delete('/country/{id}', 'CountryController@destroy')->name('country_delete');

        Route::get('/city', 'CityController@list')->name('city_list');
        Route::post('/city', 'CityController@create')->name('city_create');
        Route::put('/city', 'CityController@update')->name('city_update');
        Route::put('/city/status', 'CityController@updateStatus')->name('city_update_status');
        Route::delete('/city/{id}', 'CityController@destroy')->name('city_delete');

        Route::group(['prefix' => 'customers'],function(){
        Route::get('/', 'CustomerController@list')->name('customer_list');
        Route::get('/add', 'CustomerController@create')->name('customer_create_view');
        Route::post('/', 'CustomerController@store')->name('customer_create');
        Route::get('/edit/{id}', 'CustomerController@edit')->name('customer_edit');
        Route::put('/update/{id}', 'CustomerController@update')->name('customer_update');
        Route::delete('/{id}', 'CustomerController@destroy')->name('customer_delete');
    
        });

      
        Route::group(['prefix' => 'facture'], function() {
        Route::get('create/{type}/{id}', 'InvoiceController@create')->name('invoice_create');
        Route::get('action/{action}/{type}/{id}/{template}', 'InvoiceController@action')->name('invoice_action');
        Route::post('send/{id}', 'InvoiceController@sendEmail')->name('invoice_send');
        });

         // FAQ Route
         Route::get('/faq', 'FaqController@faq')->name('faq');
         Route::get('/faq/add', 'FaqController@add')->name('faq.add');
         Route::post('/faq/store', 'FaqController@store')->name('faq.store');
         Route::post('/faq/delete/{id}/', 'FaqController@delete')->name('faq.delete');
         Route::get('/faq/edit/{id}/', 'FaqController@edit')->name('faq.edit');
         Route::post('/faq/update/{id}/', 'FaqController@update')->name('faq.update');

        Route::get('/category/{type}', 'CategoryController@list')->name('category_list');
        Route::post('/category', 'CategoryController@create')->name('category_create');
        Route::put('/category', 'CategoryController@update')->name('category_update');
        Route::delete('/category/{id}', 'CategoryController@destroy')->name('category_delete');
    
        Route::get('/amenities', 'AmenitiesController@list')->name('amenities_list');
        Route::post('/amenities', 'AmenitiesController@create')->name('amenities_create');
        Route::put('/amenities', 'AmenitiesController@update')->name('amenities_update');
        Route::delete('/amenities/{id}', 'AmenitiesController@destroy')->name('amenities_delete');
    
        Route::get('/places-type', 'PlaceTypeController@list')->name('place_type_list');
        Route::post('/place-type', 'PlaceTypeController@create')->name('place_type_create');
        Route::put('/place-type', 'PlaceTypeController@update')->name('place_type_update');
        Route::delete('/place-type/{id}', 'PlaceTypeController@destroy')->name('place_type_delete');
     
        Route::get('/category-type', 'CategoryTypeController@list')->name('category_type_list');
        Route::post('/category-type', 'CategoryTypeController@create')->name('category_type_create');
        Route::put('/category-type', 'CategoryTypeController@update')->name('category_type_update');
        Route::delete('/category-type/{id}', 'CategoryTypeController@destroy')->name('category_type_delete');

        Route::resource('/place', 'PlaceController');
        Route::get('/place', 'PlaceController@list')->name('place_list');
        Route::get('/places/create', 'PlaceController@create')->name('place_create');
        Route::post('/place/store', 'PlaceController@store')->name('place_store');
        Route::get('/place/edit/{id}', 'PlaceController@edit')->name('place_edit');
        Route::put('/place/update/{id}', 'PlaceController@update')->name('place_update');
        Route::delete('/place/{id}', 'PlaceController@destroy')->name('place_delete');
   
        Route::get('/offer', 'OfferController@list')->name('offer_list');
        Route::get('/offer/create', 'OfferController@create')->name('offer_create');
        Route::post('/offer/store', 'OfferController@store')->name('offer_store');
        Route::get('/offer/edit/{id}', 'OfferController@edit')->name('offer_edit');
        Route::put('/offer/update/{id}', 'OfferController@update')->name('offer_update');
        Route::delete('/offer/{id}', 'OfferController@destroy')->name('offer_delete');

        Route::get('/packages', 'PackageController@index')->name('package_index');
        Route::get('/packages/create', 'PackageController@create')->name('package_create');
        Route::post('/packages', 'PackageController@store')->name('package_store');
        Route::get('/packages/{id}/edit', 'PackageController@edit')->name('package_edit');
        Route::put('/packages/{id}', 'PackageController@update')->name('package_update');
        Route::delete('/packages/{id}', 'PackageController@delete')->name('package_delete');

        Route::get('/blog', 'PostController@list')->name('post_list_blog');
        Route::get('/pages', 'PostController@list')->name('post_list_page');
    
        Route::get('/posts/add/{type}', 'PostController@pageCreate')->name('post_add');
        Route::get('/posts/{id}', 'PostController@pageCreate')->name('post_edit');
        Route::post('/posts', 'PostController@create')->name('post_create');
        Route::put('/posts', 'PostController@update')->name('post_update');
        Route::delete('/posts/{id}', 'PostController@destroy')->name('post_delete');
        
        Route::get('/review', 'ReviewController@list')->name('review_list');
        Route::delete('/review', 'ReviewController@destroy')->name('review_delete');

        Route::group(['prefix' => 'reservations'],function(){

            Route::get('/', 'BookingController@list')->name('booking_list');
            Route::get('/add', 'BookingController@create')->name('booking_create');
            Route::post('/store', 'BookingController@store')->name('booking_store');
            Route::get('/edit/{id}', 'BookingController@edit')->name('booking_edit');
            Route::put('/update', 'BookingController@update')->name('booking_update');
            Route::put('/', 'BookingController@updateStatus')->name('booking_update_status');
            Route::delete('/{id}', 'BookingController@destroy')->name('booking_delete');
        });
          
        Route::group(['prefix' => 'achats'],function(){
        Route::get('/', 'PurchaseController@list')->name('purchase_list');
        Route::get('/ajax-delete-file', 'PurchaseController@deletePurchaseFile');
        Route::get('/add', 'PurchaseController@createView')->name('purchase_create_view');
        Route::post('/', 'PurchaseController@create')->name('purchase_create');
        Route::get('/edit/{id}', 'PurchaseController@edit')->name('purchase_edit');
        Route::put('/update/{id}', 'PurchaseController@update')->name('purchase_update');
        Route::delete('/{id}', 'PurchaseController@destroy')->name('purchase_delete');
        Route::get('gen_quotation/{id}', 'PurchaseController@genQuotation')->name('purchase_quotation');
        Route::get('/status', 'PurchaseController@updateStatus');
        });

        Route::group(['prefix' => 'ventes'],function(){
            Route::get('/', 'SaleController@list')->name('sale_list');
            Route::get('/ajax-delete-file', 'SaleController@deleteSaleFile');
            Route::get('/add', 'SaleController@createView')->name('sale_create_view');
            Route::post('/add', 'SaleController@createView')->name('sale_create_view');
            Route::post('/', 'SaleController@create')->name('sale_create');
            Route::get('/edit/{id}', 'SaleController@edit')->name('sale_edit');
            Route::put('/update/{id}', 'SaleController@update')->name('sale_update');
            Route::delete('/{id}', 'SaleController@destroy')->name('sale_delete');
            Route::get('gen_devis/{id}', 'SaleController@genQuotation')->name('sale_quotation');
            Route::get('/status', 'SaleController@updateStatus');
            });
        
        Route::group(['prefix' => 'avoirs'],function(){
    
            Route::get('/', 'ReturnController@list')->name('return_list');
            Route::get('/ajax-delete-file', 'ReturnController@deleteSaleFile');
            Route::get('/add', 'ReturnController@createView')->name('return_create_view');
            Route::post('/add', 'ReturnController@createView')->name('return_create_view');
            Route::post('/', 'ReturnController@create')->name('return_create');
            Route::get('/edit/{id}', 'ReturnController@edit')->name('return_edit');
            Route::put('/update/{id}', 'ReturnController@update')->name('return_update');
            Route::delete('/{id}', 'ReturnController@destroy')->name('return_delete');
            Route::get('gen_devis/{id}', 'ReturnController@genQuotation')->name('return_quotation');
            Route::get('/status', 'ReturnController@updateStatus');
            });

        Route::get('/avis', 'TestimonialController@list')->name('testimonial_list');
        Route::get('/testimonials/add', 'TestimonialController@pageCreate')->name('testimonial_page_add');
        Route::get('/testimonials/edit/{id}', 'TestimonialController@pageCreate')->name('testimonial_page_edit');
        Route::post('/testimonials', 'TestimonialController@create')->name('testimonial_action');
        Route::put('/testimonials', 'TestimonialController@update')->name('testimonial_action');
   
        Route::get('/settings', 'SettingController@index')->name('settings');
        Route::post('/settings', 'SettingController@store')->name('setting_create');
    
        Route::get('/settings/language', 'SettingController@pageLanguage')->name('settings_language');
        Route::get('/settings/translation', 'SettingController@pageTranslation')->name('settings_translation');
        
        Route::get('/travel-package', 'TravelPackageController@travelPackages');
        Route::get('/travel-package/create', 'TravelPackageController@packageCreate');
        Route::post('/travel-package/createPackage','TravelPackageController@create');
        Route::post('/travel-package/createFlightDeal','TravelPackageController@createFlightDeal');
        Route::post('/travel-package/createHotelDeal','TravelPackageController@createHotelDeal');
        Route::post('/travel-package/createAttraction','TravelPackageController@createAttraction');
        Route::get('/travel-package/delete-sight-seeing/{id}','TravelPackageController@deleteSightSeeing');
        Route::get('/travel-package/activate/{id}', 'TravelPackageController@activate')->name('activate');
        Route::get('/travel-package/deactivate/{id}', 'TravelPackageController@deactivate')->name('deactivate');
        Route::get('/travel-package/delete/{id}', 'TravelPackageController@deletePackage');
        Route::get('/travel-package/edit/{id}', 'TravelPackageController@editPackage');
        Route::post('/travel-package/delete-image','TravelPackageController@deleteImage');
        Route::get('/travel-package/categories','TravelPackageController@categories');
        Route::post('/travel-package/activate/category','TravelPackageController@activateCategory');
        Route::post('/travel-package/deActivate/category','TravelPackageController@deActivateCategory');
        Route::post('/travel-package/categoryCreateOrUpdate','TravelPackageController@categoryCreateOrUpdate');
        Route::post('/travel-package/storeGalleryInfo','TravelPackageController@storeGalleryImages');

        // Newsletter Route
        Route::get('/subscriber', 'NewsletterController@newsletter')->name('admin.newsletter');
        Route::get('/mailsubscriber', 'NewsletterController@mailsubscriber')->name('admin.mailsubscriber');
        Route::post('/subscribers/sendmail', 'NewsletterController@subscsendmail')->name('admin.subscribers.sendmail');
        Route::get('/subscriber/add', 'NewsletterController@add')->name('admin.newsletter.add');
        Route::post('/subscriber/store', 'NewsletterController@store')->name('admin.newsletter.store');
        Route::post('/subscriber/delete/{id}/', 'NewsletterController@delete')->name('admin.newsletter.delete');
        Route::get('/subscriber/edit/{id}/', 'NewsletterController@edit')->name('admin.newsletter.edit');
        Route::post('/subscriber/update/{id}/', 'NewsletterController@update')->name('admin.newsletter.update');

        Route::resource('slides', 'SliderController');

        Route::get('/ajax-search-places', 'BackEndViewController@searchPlaces');
        Route::post('/search-portal','BackEndViewController@searchPortal');
        Route::get('backend/payment-confirmation','BackEndViewController@paymentConfirmation');

        Route::get('/subscriber', 'NewsletterController@newsletter')->name('admin.newsletter');
        Route::get('/mailsubscriber', 'NewsletterController@mailsubscriber')->name('admin.mailsubscriber');
        Route::post('/subscribers/sendmail', 'NewsletterController@subscsendmail')->name('admin.subscribers.sendmail');
        Route::get('/subscriber/add', 'NewsletterController@add')->name('admin.newsletter.add');
        Route::post('/subscriber/store', 'NewsletterController@store')->name('admin.newsletter.store');
        Route::post('/subscriber/delete/{id}/', 'NewsletterController@delete')->name('admin.newsletter.delete');
        Route::get('/subscriber/edit/{id}/', 'NewsletterController@edit')->name('admin.newsletter.edit');
        Route::post('/subscriber/update/{id}/', 'NewsletterController@update')->name('admin.newsletter.update');

    });

Route::middleware(['auth'])->group(function(){

    Route::get('/dashboard','BackEndViewController@dashboard')->name('dashboard');

    Route::group(['prefix' => 'settings'],function(){
        Route::get('vats','BackEndViewController@vat')->name('vats');
        Route::post('vat', 'VatController@saveVat')->name('backend-save-vat');
        Route::get('getVat/{type}','VatController@getVat');
        Route::get('markups', 'BackEndViewController@markupView');
        Route::post('markup/admin', 'MarkupController@saveAdminMarkup')->name('backend-save-markup');
        Route::get('getMarkup/{id}','MarkupController@getMarkupById');
        Route::get('markdown', 'BackEndViewController@index');
        Route::post('createOrUpdateMarkdown','MarkdownController@createOrUpdate');
        Route::get('getMarkdown/{id}','MarkdownController@getMarkdownById');
        Route::get('/profile', 'BackEndViewController@profile')->name('profile');
        Route::post('/updateProfile','ProfileController@updateProfileImageJs');
        Route::post('/update/user/profile','ProfileController@updateUserProfile')->name('update-profile');
        Route::post('/update/user/image','ProfileController@updateUserProfileImage')->name('update-profile-image');
        Route::post('/update/user/password','ProfileController@updateUserProfilePassword')->name('update-profile-password');
        Route::get('visa-application-requests','BackEndViewController@visaApplicationRequests');

    //    Route::get('subscribers','BackEndViewController@emailSubscriptions');
  ///   Route::get('/', 'SettingController@index')->name('settings');
  ///   Route::post('/update', 'SettingController@update')->name('settings.update');

        Route::group(['prefix' => 'bank-details'],function(){
            Route::get('/fetch/{id}', 'BankDetailController@getBankDetail')->name('backend-bank-details');
            Route::view('','pages.backend.settings.banks')->name('banks');            
            Route::post('/saveOrUpdate','BankDetailController@saveOrUpdateBankDetails');
            Route::post('/activate','BankDetailController@activateBankDetails');
            Route::post('/deActivate','BankDetailController@deActivateBankDetails');
            Route::post('/delete','BankDetailController@deleteBankDetails');
        });

        Route::group(['prefix' => 'users'],function(){
            Route::get('/', 'BackEndViewController@usersManagement')->name('users.management');
            Route::post('/add-new','UserController@addNew');
            Route::get('/delete-user/{id}','UserController@deleteUser');
            Route::post('/update-user','UserController@updateUser');
        });

        Route::group(['prefix' => 'language'],function(){
            Route::get('/', 'LanguageController@pageLanguage')->name('language');
            Route::put('/status/{code}', 'LanguageController@updateStatus')->name('language_status');
            Route::put('/default', 'LanguageController@updateStatus')->name('language_default');      
        });
    });
});

      
    Route::group(['prefix' => 'bookings'],function(){

        Route::group(['prefix' => 'flight'],function(){
            Route::get('user','BackEndViewController@userFlightBookings');
            Route::get('agent','BackEndViewController@agentFlightBookings');
            Route::get('customer','BackEndViewController@customerFlightBookings');
            Route::get('itinerary-booking-information/{reference}','BackEndViewController@itineraryBookingInformation');
        });

        Route::group(['prefix' => 'hotel'],function(){
            Route::get('user','BackEndViewController@userHotelBookings');
            Route::get('agent','BackEndViewController@agentHotelBookings');
            Route::get('customer','BackEndViewController@customerHotelBookings');
            Route::get('hotel-reservation-information/{reference}','BackEndViewController@hotelBookingInformation');
            Route::get('rebook-hotel-room/{reference}','HotelController@reBookHotelRoom');
        });

        Route::group(['prefix' => 'package'],function(){
            Route::get('user','BackEndViewController@userPackageBookings');
            Route::get('agent','BackEndViewController@agentPackageBookings');
            Route::get('customer','BackEndViewController@customerPackageBookings');
            Route::get('package-reservation-information/{reference}','BackEndViewController@packageBookingInformation');
        });
    });


    Route::group(['prefix' => 'transactions'],function(){
        Route::get('/online-payment','BackEndViewController@onlinePayment');
        Route::get('/bank-payment','BackEndViewController@bankPayment');
        Route::get('/user/online-payment','BackEndViewController@userOnlinePayment');
        Route::get('/user/bank-payment','BackEndViewController@userBankPayment');
        Route::post('/update-payment-proof','BankPaymentController@updatePaymentProof');
        Route::get('/update-payment-status/{id}/{type}','BankPaymentController@updatePaymentStatus');
        Route::get('/requery/{id}','OnlinePaymentController@requery');
    });


Auth::routes();


