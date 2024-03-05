<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminDashController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ShopController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\SiteSettingsController;
use App\Http\Controllers\FrontEndEditorController;
use App\Http\Middleware\admin;
use App\Http\Controllers\Admin\StatisticsController;
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

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/search', [IndexController::class, 'search'])->name('search');
Route::get('/about-me', [IndexController::class, 'about'])->name('about');
Route::get('/photography', [IndexController::class, 'photography'])->name('photography');
Route::get('/blog', [IndexController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [IndexController::class, 'blog_detail'])->name('blog.detail');
Route::get('/contact-us', [IndexController::class, 'contactus'])->name('contact-us');
Route::get('/beach', [IndexController::class, 'beach'])->name('beach');
Route::get('/birds', [IndexController::class, 'birds'])->name('birds');
Route::get('/desert', [IndexController::class, 'desert'])->name('desert');
Route::get('/lakes', [IndexController::class, 'lakes'])->name('lakes');
Route::get('/mountains', [IndexController::class, 'mountains'])->name('mountains');
Route::get('/mics', [IndexController::class, 'mics'])->name('misc');
Route::get('/sunset', [IndexController::class, 'sunset'])->name('sunsets');
Route::get('/waterfalls', [IndexController::class, 'waterfalls'])->name('waterfalls');
Route::get('/privacy-policy', [IndexController::class, 'privacy_policy'])->name('privacy.policy');
Route::get('/refund-policy', [IndexController::class, 'refund_policy'])->name('refund.policy');
Route::get('/shipping-policy', [IndexController::class, 'shipping_policy'])->name('shipping.policy');
Route::get('/term-condition', [IndexController::class, 'terms_conditions'])->name('terms.conditions');
Route::get('/get-schedule', [IndexController::class, 'get_schedule'])->name('get-schedule');
Route::get('/shop', [IndexController::class, 'shop'])->name('shop');
Route::get('/product-detail/{slug}', [IndexController::class, 'product_detail'])->name('product-detail');
Route::get('/merchandise-detail/{slug}', [IndexController::class, 'merchandise_detail'])->name('merchandise-detail');
Route::get('/sponsors', [IndexController::class, 'sponsors'])->name('sponsors');
Route::get('/wishlist', [UserController::class, 'wishlist'])->name('wishlist');
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('update-cart',[CartController::class,'updatecart'])->name('update-cart');
Route::post('remove-cart',[CartController::class,'removecart'])->name('remove-cart');
Route::get('/save-cart', [CartController::class, 'save_cart'])->name('save-cart');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::get('/payment-success', [CartController::class,'checkout_landing'])->name('checkout_landing');
Route::get('/payment', [CartController::class,'paysecure'])->name('paysecure');
Route::post('/pay-status', [CartController::class,'paystatus'])->name('paystatus');
Route::post('/place-order', [CartController::class,'placeorder'])->name('placeorder');
Route::post('/newsletter/store', [IndexController::class,'newsletterstore'])->name('newsletterstore');
Route::get('/opportunities-detail/{slug}', [IndexController::class, 'opportunities_detail'])->name('opportunities-detail');
Route::get('/gallery/{id}', [IndexController::class, 'gallery_detail'])->name('gallery-detail');

Route::post('/save-cart', [CartController::class, 'save_cart'])->name('save-cart');
Route::post('user/create-review', [IndexController::class, 'create_review'])->name('user.create-review');

Route::get('/explore-edusauras', [IndexController::class, 'explore_edusauras'])->name('explore_edusauras');
Route::get('/explorer/{category}', [IndexController::class, 'explorer'])->name('explorer');
Route::get('/search-edusauras', [IndexController::class, 'search_edusauras'])->name('search_edusauras');
Route::get('/explore-edusauras-detail/{id}', [IndexController::class, 'explore_edusauras_detail'])->name('explore_edusauras_detail');
Route::get('/educator', [IndexController::class, 'educator'])->name('educator');
Route::get('/contribute', [IndexController::class, 'contribute'])->name('contribute');
Route::get('/news', [IndexController::class, 'news'])->name('news');
Route::get('/search-news', [IndexController::class, 'search_news'])->name('search_news');
Route::get('/news-detail/{slug}', [IndexController::class, 'news_detail'])->name('news-detail');
Route::get('/partners', [IndexController::class, 'partners'])->name('partners');

Route::post('/contact-us-submit', [UserController::class, 'contact_us_submit'])->name('contact-us-submit');
Route::get('/sign-in', [UserController::class, 'signin'])->name('sign-in');
Route::post('/sign-in', [UserController::class, 'signin_submit'])->name('sign-in-submit');
Route::get('/sign-up', [UserController::class, 'signup'])->name('sign-up');
Route::post('/sign-up', [UserController::class, 'signup_submit'])->name('sign-up-submit');



Route::get('/forget-password', [UserController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('/forget-password-submit', [UserController::class, 'submitForgetPasswordForm'])->name('forget.password.submit'); 
Route::get('/reset-password/{token}', [UserController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('/reset-password', [UserController::class, 'submitResetPasswordForm'])->name('reset.password.post');
Route::post('add/wishlist',[UserController::class, 'addToWishlist'])->name('add.to.wishlist');
Route::get('/my-wishlist', [UserController::class, 'myWishlist'])->name('dashboard.myWishlist');
Route::post('remove/wishlist',[UserController::class, 'removeFromWishlist'])->name('remove.from.wishlist');
Route::group(['middleware' => 'auth'], function()
{

  Route::get('/sign-out', [UserController::class, 'signout'])->name('signout');

  //   Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard.index');
	// Route::get('dashboard/edit_profile', [DashboardController::class, 'editprofile'])->name('dashboard.editProfile');
	// Route::post('dashboard/edit_profile', [DashboardController::class, 'saveprofile'])->name('dashboard.submitProfile');
	Route::get('dashboard/password_change', [DashboardController::class, 'passwordchange'])->name('dashboard.passwordChange');
	Route::post('dashboard/update/password',[DashboardController::class, 'updatepassword'])->name('update.account.password');
	
	
	



  Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard.index');
	Route::get('dashboard/my-profile', [DashboardController::class, 'myProfile'])->name('dashboard.myProfile');
	Route::get('dashboard/edit_profile', [DashboardController::class, 'editprofile'])->name('dashboard.editProfile');
	Route::post('dashboard/edit_profile', [DashboardController::class, 'saveprofile'])->name('dashboard.submitProfile');
  Route::get('dashboard/my-orders', [DashboardController::class, 'myBookings'])->name('dashboard.myBookings');
  Route::get('dashboard/view-orders/{decrypt}', [DashboardController::class, 'viewAppointment'])->name('dashboard.viewAppointment');
  // Route::get('dashboard/edit-orders/{decrypt}', [DashboardController::class, 'editAppointment'])->name('dashboard.editAppointment'); 
   Route::get('dashboard/delete-orders/{decrypt}', [DashboardController::class, 'deleteAppointment'])->name('dashboard.deleteAppointment');
// 	Route::get('dashboard/myorders','Customer\DashboardController@orders')->name('myorders');
// 	Route::get('dashboard/myorders/view/{id}','Customer\DashboardController@vieworders')->name('vieworders');
// 	Route::get('dashboard/myproducts','Customer\DashboardController@products')->name('products');
// 	Route::get('dashboard/myproducts/view/{id}','Customer\DashboardController@viewproducts')->name('viewproducts');
// 	Route::get('dashboard/myproducts/edit/{id}','Customer\DashboardController@editproducts')->name('editproducts');
// 	Route::post('dashboard/myproducts/edit','Customer\DashboardController@updateproducts')->name('updateproducts');
// 	Route::delete('dashboard/myproducts/destroy/{id?}','Customer\DashboardController@deleteproduct')->name('deleteproduct');
// 	Route::get('dashboard/myevents','Customer\DashboardController@events')->name('events');
// 	Route::get('dashboard/myevents/view/{id}','Customer\DashboardController@viewevents')->name('viewevents');
// 	Route::get('dashboard/myevents/edit/{id}','Customer\DashboardController@editevents')->name('editevents');
// 	Route::post('dashboard/myevents/edit','Customer\DashboardController@updateevents')->name('updateevents');
// 	Route::delete('dashboard/myevents/destroy/{id?}','Customer\DashboardController@deleteevent')->name('deleteevent');
// 	Route::get('dashboard/stripeprofile','Customer\DashboardController@stripeprofile')->name('stripeprofile');
// 	Route::post('payment','IndexController@payment')->name('payment');
// 	Route::get('payment-success','IndexController@paymentsuccess')->name('payment-success');
	

});



Route::get('/admins', function(){
	return redirect('admin/login');
})->name('admin.admin');

Route::middleware(['guest'])->prefix('admin')->namespace('Admin')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'get_login'])->name('admin.login');
    Route::post('/perform-login', [AdminLoginController::class, 'performLogin'])->name('admin.performLogin');
	//Route::post('/performLogin', 'LoginController@performLogin')->name('adminiy.performLogin')->middleware('throttle:4,1');
});

Route::middleware(['admin'])->prefix('admin')->namespace('admin')->group(function () {
    //Route::get('/panel', 'IndexController@panel')->name('adminiy.panel');
    Route::get('/',function(){
      return redirect('/admin/dashboard');
    });
    Route::get('/dashboard', [AdminDashController::class, 'dashboard'])->name('admin.dashboard');
     Route::get('/list-web-crawl', [AdminDashController::class, 'ListWebCrawl'])->name('admin.listWebCrawl');
    Route::get('/new-web-crawl', [AdminDashController::class, 'NewWebCrawl'])->name('admin.newWebCrawl');
    Route::get('/search_crawl', [AdminDashController::class, 'searchCrawl'])->name('admin.searchCrawl');
    Route::get('/crawl-detail/{id}', [AdminDashController::class, 'crawlDetail'])->name('admin.crawlDetail');
     Route::get('/crawl-delete/{id}', [AdminDashController::class, 'crawlDelete'])->name('admin.crawlDelete');
       Route::get('/crawl-edit/{id}', [AdminDashController::class, 'crawlEdit'])->name('admin.crawlEdit');
       Route::post('/crawl-update', [AdminDashController::class, 'crawlUpdate'])->name('admin.crawlUpdate');
     Route::post('update-crawl-status', [AdminDashController::class, 'crawlStatusUpdate'])->name('admin.crawlStatusUpdate');

     Route::get('/inquiries-listing', [AdminDashController::class, 'inquiries_listing'])->name('admin.inquiries_listing'); 
     Route::get('/inquiries-listing/view/{id}', [AdminDashController::class, 'inquiries_listing_view'])->name('admin.inquiries_listing_view');         
     Route::get('/inquiries-listing/delete/{id}', [AdminDashController::class, 'inquiries_listing_delete'])->name('admin.inquiries_listing_delete');   
     
     Route::get('/users-listing', [AdminDashController::class, 'users_listing'])->name('admin.users_listing'); 
     Route::get('/add-users', [AdminDashController::class, 'add_users'])->name('admin.add_users'); 
     Route::post('/create-users', [AdminDashController::class, 'create_users'])->name('admin.create_users');
     Route::get('/edit-users/{id}', [AdminDashController::class, 'edit_user'])->name('admin.edit_user');  
     Route::post('/edit-users', [AdminDashController::class, 'saveprofile'])->name('admin.saveprofile');  

     Route::get('/suspend-user/{id}', [AdminDashController::class, 'suspend_user'])->name('admin.suspend_user');  

     Route::get('/logo-management', [SiteSettingsController::class, 'showLogo'])->name('admin.showLogo');
     Route::post('/logo-management-save', [SiteSettingsController::class, 'saveLogo'])->name('admin.saveLogo');

     Route::get('/total-sale', [AdminDashController::class,'totalsale'])->name('admin.totalsale');
     Route::get('/pending-order', [AdminDashController::class,'pendingorders'])->name('admin.pendingorders');
     Route::get('/average-sale', [AdminDashController::class,'averagesale'])->name('admin.averagesale');
     Route::post('/average-search', [AdminDashController::class,'averagesearch'])->name('admin.averagesearch');
     

     Route::get('/orders', [OrderController::class,'orders'])->name('admin.orders');
     Route::get('/order-detail/{id}', [OrderController::class,'order_detail'])->name('admin.order_detail');
     Route::get('/order-delete/{id}', [OrderController::class,'order_delete'])->name('admin.order_delete');
     Route::get('/order-suspend/{id}', [OrderController::class,'order_suspend'])->name('admin.order_suspend');
     Route::get('/Pay-status/{id}', [OrderController::class,'paystatus'])->name('admin.paystatus');
     Route::get('/top-selling-product', [OrderController::class,'topsale'])->name('admin.topsale');
  
    
    Route::get('/newsletter-listing', [AdminDashController::class, 'newsletter_listing'])->name('admin.newsletter_listing'); 
    Route::get('/newsletter-listing/view/{id}', [AdminDashController::class, 'newsletter_listing_view'])->name('admin.newsletter_listing_view');         
    Route::get('/newsletter-listing/delete/{id}', [AdminDashController::class, 'newsletter_listing_delete'])->name('admin.newsletter_listing_delete');

    //  Route::get('/news-listing', [AdminDashController::class, 'news_listing'])->name('admin.news_listing'); 
    //  Route::get('/add-news', [AdminDashController::class, 'add_news'])->name('admin.add_news'); 
    //  Route::post('/create-news', [AdminDashController::class, 'create_news'])->name('admin.create_news');
    //  Route::get('/edit-news/{id}', [AdminDashController::class, 'edit_news'])->name('admin.edit_news');  
    //  Route::post('/edit-news', [AdminDashController::class, 'savenews'])->name('admin.savenews');  
    //  Route::get('/suspend-news/{id}', [AdminDashController::class, 'suspend_news'])->name('admin.suspend_news');  
    //  Route::get('/delete-news/{id}', [AdminDashController::class, 'delete_news'])->name('admin.delete_news');  

     Route::get('/testimonial-listing', [AdminDashController::class, 'testimonial_listing'])->name('admin.testimonial_listing'); 
     Route::get('/add-testimonial', [AdminDashController::class, 'add_testimonial'])->name('admin.add_testimonial'); 
     Route::post('/create-testimonial', [AdminDashController::class, 'create_testimonial'])->name('admin.create_testimonial');
     Route::get('/edit-testimonial/{id}', [AdminDashController::class, 'edit_testimonial'])->name('admin.edit_testimonial');  
     Route::post('/edit-testimonial', [AdminDashController::class, 'savetestimonial'])->name('admin.savetestimonial');  
     Route::get('/suspend-testimonial/{id}', [AdminDashController::class, 'suspend_testimonial'])->name('admin.suspend_testimonial');  
     Route::get('/delete-testimonial/{id}', [AdminDashController::class, 'delete_testimonial'])->name('admin.delete_testimonial'); 

     Route::get('/reviews-listing', [AdminDashController::class, 'reviews_listing'])->name('admin.reviews_listing'); 
     Route::get('/add-reviews', [AdminDashController::class, 'add_reviews'])->name('admin.add_reviews'); 
     Route::post('/create-reviews', [AdminDashController::class, 'create_reviews'])->name('admin.create_reviews');
     Route::get('/edit-reviews/{id}', [AdminDashController::class, 'edit_reviews'])->name('admin.edit_reviews');  
     Route::post('/edit-reviews', [AdminDashController::class, 'savereviews'])->name('admin.savereviews');  
     Route::get('/suspend-reviews/{id}', [AdminDashController::class, 'suspend_reviews'])->name('admin.suspend_reviews');  
     Route::get('/delete-reviews/{id}', [AdminDashController::class, 'delete_reviews'])->name('admin.delete_reviews'); 
     
     Route::get('/reviews-listing', [AdminDashController::class, 'reviews_listing'])->name('admin.reviews_listing'); 
     

     Route::get('/album-listing', [GalleryController::class, 'album_listing'])->name('admin.album_listing'); 
     Route::get('/add-album', [GalleryController::class, 'add_album'])->name('admin.add_album'); 
     Route::post('/create-album', [GalleryController::class, 'create_album'])->name('admin.create_album');
     Route::get('/edit-album/{id}', [GalleryController::class, 'edit_album'])->name('admin.edit_album');  
     Route::post('/edit-album', [GalleryController::class, 'savealbum'])->name('admin.savealbum');  
     Route::get('/suspend-album/{id}', [GalleryController::class, 'suspend_album'])->name('admin.suspend_album');  
     Route::get('/delete-album/{id}', [GalleryController::class, 'delete_album'])->name('admin.delete_album'); 
     
     Route::get('/photos-listing', [GalleryController::class, 'photos_listing'])->name('admin.photos_listing'); 
     Route::get('/add-photos', [GalleryController::class, 'add_photos'])->name('admin.add_photos'); 
     Route::post('/create-photos', [GalleryController::class, 'create_photos'])->name('admin.create_photos');
     Route::get('/edit-photos/{id}', [GalleryController::class, 'edit_photos'])->name('admin.edit_photos');  
     Route::get('/edit-photos/{id}', [GalleryController::class, 'edit_photos'])->name('admin.edit_photos');  
     Route::post('/edit-photos', [GalleryController::class, 'savephotos'])->name('admin.savephotos');  
     Route::get('/suspend-photos/{id}', [GalleryController::class, 'suspend_photos'])->name('admin.suspend_photos');  
     Route::get('/delete-photos/{id}', [GalleryController::class, 'delete_photos'])->name('admin.delete_photos');

     Route::get('/blog-listing', [AdminDashController::class, 'blog_listing'])->name('admin.blog_listing'); 
     Route::get('/add-blog', [AdminDashController::class, 'add_blog'])->name('admin.add_blog'); 
     Route::post('/create-blog', [AdminDashController::class, 'create_blog'])->name('admin.create_blog');
     Route::get('/edit-blog/{id}', [AdminDashController::class, 'edit_blog'])->name('admin.edit_blog');  
     Route::post('/edit-blog', [AdminDashController::class, 'saveblog'])->name('admin.saveblog');  
     Route::get('/suspend-blog/{id}', [AdminDashController::class, 'suspend_blog'])->name('admin.suspend_blog');  
     Route::get('/delete-blog/{id}', [AdminDashController::class, 'delete_blog'])->name('admin.delete_blog'); 

     Route::get('/team-listing', [TeamController::class, 'team_listing'])->name('admin.team_listing'); 
     Route::get('/add-team', [TeamController::class, 'add_team'])->name('admin.add_team'); 
     Route::post('/create-team', [TeamController::class, 'create_team'])->name('admin.create_team');
     Route::get('/edit-team/{id}', [TeamController::class, 'edit_team'])->name('admin.edit_team');  
     Route::post('/edit-team', [TeamController::class, 'saveteam'])->name('admin.saveteam');  
     Route::get('/suspend-team/{id}', [TeamController::class, 'suspend_team'])->name('admin.suspend_team');  
     Route::get('/delete-team/{id}', [TeamController::class, 'delete_team'])->name('admin.delete_team'); 

     Route::get('/matches-listing', [TeamController::class, 'matches_listing'])->name('admin.matches_listing'); 
     Route::get('/add-matches', [TeamController::class, 'add_matches'])->name('admin.add_matches'); 
     Route::post('/create-matches', [TeamController::class, 'create_matches'])->name('admin.create_matches');
     Route::get('/edit-matches/{id}', [TeamController::class, 'edit_matches'])->name('admin.edit_matches');  
     Route::post('/edit-matches', [TeamController::class, 'savematches'])->name('admin.savematches');  
     Route::get('/suspend-matches/{id}', [TeamController::class, 'suspend_matches'])->name('admin.suspend_matches');  
     Route::get('/delete-matches/{id}', [TeamController::class, 'delete_matches'])->name('admin.delete_matches'); 

     Route::get('/lesson-listing', [AdminDashController::class, 'lesson_listing'])->name('admin.lesson_listing'); 
     Route::get('/add-lesson', [AdminDashController::class, 'add_lesson'])->name('admin.add_lesson'); 
     Route::post('/create-lesson', [AdminDashController::class, 'create_lesson'])->name('admin.create_lesson');
     Route::get('/edit-lesson/{id}', [AdminDashController::class, 'edit_lesson'])->name('admin.edit_lesson');  
     Route::post('/edit-lesson', [AdminDashController::class, 'savelesson'])->name('admin.savelesson');  
     Route::get('/suspend-lesson/{id}', [AdminDashController::class, 'suspend_lesson'])->name('admin.suspend_lesson');  
     Route::get('/delete-lesson/{id}', [AdminDashController::class, 'delete_lesson'])->name('admin.delete_lesson');  

     Route::get('/photography-listing', [ShopController::class, 'products_listing'])->name('admin.products_listing'); 
     Route::get('/add-photography', [ShopController::class, 'add_products'])->name('admin.add_products'); 
     Route::post('/create-photography', [ShopController::class, 'create_products'])->name('admin.create_products');
     Route::get('/edit-photography/{slug}', [ShopController::class, 'edit_products'])->name('admin.edit_products');  
     Route::post('/edit-photography', [ShopController::class, 'saveproducts'])->name('admin.saveproducts');  
     Route::get('/suspend-photography/{id}', [ShopController::class, 'suspend_products'])->name('admin.suspend_products');  
     Route::get('/delete-photography/{id}', [ShopController::class, 'delete_products'])->name('admin.delete_products');  
     Route::get('/delete-multi-img/{id}', [ShopController::class, 'delete_multiimg'])->name('admin.delete_multiimg'); 

     Route::get('/merchandise-listing', [ShopController::class, 'merchandise_listing'])->name('admin.merchandise_listing'); 
     Route::get('/add-merchandise', [ShopController::class, 'add_merchandise'])->name('admin.add_merchandise'); 
     Route::post('/create-merchandise', [ShopController::class, 'create_merchandise'])->name('admin.create_merchandise');
     Route::get('/edit-merchandise/{slug}', [ShopController::class, 'edit_merchandise'])->name('admin.edit_merchandise');  
     Route::post('/edit-merchandise', [ShopController::class, 'savemerchandise'])->name('admin.savemerchandise');  
     Route::get('/suspend-merchandise/{id}', [ShopController::class, 'suspend_merchandise'])->name('admin.suspend_merchandise');  
     Route::get('/delete-merchandise/{id}', [ShopController::class, 'delete_merchandise'])->name('admin.delete_merchandise');  

     Route::get('/partner-listing', [AdminDashController::class, 'partner_listing'])->name('admin.partner_listing'); 
     Route::get('/add-partner', [AdminDashController::class, 'add_partner'])->name('admin.add_partner'); 
     Route::post('/create-partner', [AdminDashController::class, 'create_partner'])->name('admin.create_partner');
     Route::get('/edit-partner/{id}', [AdminDashController::class, 'edit_partner'])->name('admin.edit_partner');  
     Route::post('/edit-partner', [AdminDashController::class, 'savepartner'])->name('admin.savepartner');  
     Route::get('/suspend-partner/{id}', [AdminDashController::class, 'suspend_partner'])->name('admin.suspend_partner');  
     Route::get('/delete-partner/{id}', [AdminDashController::class, 'delete_partner'])->name('admin.delete_partner');  


     Route::get('/category-listing', [AdminDashController::class, 'category_listing'])->name('admin.category_listing'); 
     Route::get('/add-category', [AdminDashController::class, 'add_category'])->name('admin.add_category'); 
     Route::post('/create-category', [AdminDashController::class, 'create_category'])->name('admin.create_category');
     Route::get('/edit-category/{id}', [AdminDashController::class, 'edit_category'])->name('admin.edit_category');  
     Route::post('/edit-category', [AdminDashController::class, 'savecategory'])->name('admin.savecategory');  
     Route::get('/suspend-category/{id}', [AdminDashController::class, 'suspend_category'])->name('admin.suspend_category');  
     Route::get('/delete-category/{id}', [AdminDashController::class, 'delete_category'])->name('admin.delete_category'); 
     
     Route::get('/subcategory-listing', [AdminDashController::class, 'subcategory_listing'])->name('admin.subcategory_listing'); 
     Route::get('/add-subcategory', [AdminDashController::class, 'add_subcategory'])->name('admin.add_subcategory'); 
     Route::post('/create-subcategory', [AdminDashController::class, 'create_subcategory'])->name('admin.create_subcategory');
     Route::get('/edit-subcategory/{id}', [AdminDashController::class, 'edit_subcategory'])->name('admin.edit_subcategory');  
     Route::get('/edit-subcategory/{id}', [AdminDashController::class, 'edit_subcategory'])->name('admin.edit_subcategory');  
     Route::post('/edit-subcategory', [AdminDashController::class, 'savesubcategory'])->name('admin.savesubcategory');  
     Route::get('/suspend-subcategory/{id}', [AdminDashController::class, 'suspend_subcategory'])->name('admin.suspend_subcategory');  
     Route::get('/delete-subcategory/{id}', [AdminDashController::class, 'delete_subcategory'])->name('admin.delete_subcategory');  

     Route::post('/getsubcategory', [AdminDashController::class, 'getsubcategory'])->name('admin.getsubcategory'); 

     Route::get('/faq-listing', [AdminDashController::class, 'faq_listing'])->name('admin.faq_listing'); 
     Route::get('/add-faq', [AdminDashController::class, 'add_faq'])->name('admin.add_faq'); 
     Route::post('/create-faq', [AdminDashController::class, 'create_faq'])->name('admin.create_faq');
     Route::get('/edit-faq/{id}', [AdminDashController::class, 'edit_faq'])->name('admin.edit_faq');  
     Route::post('/edit-faq', [AdminDashController::class, 'savefaq'])->name('admin.savefaq');  
     Route::get('/suspend-faq/{id}', [AdminDashController::class, 'suspend_faq'])->name('admin.suspend_faq');  
     Route::get('/delete-faq/{id}', [AdminDashController::class, 'delete_faq'])->name('admin.delete_faq');  

     


     Route::get('/contact-social-info', [SiteSettingsController::class, 'socialInfo'])->name('admin.socialInfo');
     Route::post('/contact-social-info', [SiteSettingsController::class, 'saveSocialInfo'])->name('admin.saveSocialInfo');
     Route::get('/banner', [SiteSettingsController::class, 'homeSlider'])->name('admin.banner');   
     Route::get('/edit-banner/{id}', [SiteSettingsController::class, 'editbanner'])->name('admin.editbanner');
     Route::post('/update-banner', [SiteSettingsController::class, 'updateeditbanner'])->name('admin.updateeditbanner');
  


     Route::get('/home-slider', [SiteSettingsController::class, 'homeSlider'])->name('admin.homeSlider');
     Route::get('/add-home-slider', [SiteSettingsController::class, 'addhomeSlider'])->name('admin.addhomeSlider');
     Route::post('/add-banner', [SiteSettingsController::class, 'createhomeSlider'])->name('admin.createhomeSlider');
     Route::get('/edit-home-slider/{id}', [SiteSettingsController::class, 'edithomeSlider'])->name('admin.edithomeSlider');
     Route::post('/update-home-slider', [SiteSettingsController::class, 'updatehomeSlider'])->name('admin.updatehomeSlider');
     Route::get('/delete-home-slider/{id}', [SiteSettingsController::class, 'deletehomeSlider'])->name('admin.deletehomeSlider');
     Route::get('/suspend-home-slider/{id}', [SiteSettingsController::class, 'suspendhomeSlider'])->name('admin.suspendhomeSlider');

    //  Home Slider
     Route::get('/home-sliders', [SiteSettingsController::class, 'Slider'])->name('admin.Slider');


     Route::get('/cms-content', [SiteSettingsController::class, 'cms'])->name('admin.cms');
     Route::get('/cms-content-edit/{id}', [SiteSettingsController::class, 'edit_cms'])->name('admin.editCms');
     Route::post('/cms-content-update', [SiteSettingsController::class, 'update_cms'])->name('admin.updateCms');
     
     Route::get('/check_slug', [AdminDashController::class, 'check_slug'])
     ->name('admin.check_slug');


    Route::get('/admin-listing', [AdminDashController::class, 'admins_listing'])->name('admin.admin_listing'); 
     Route::get('/add-admin', [AdminDashController::class, 'add_admins'])->name('admin.add_admin'); 
     Route::post('/create-admin', [AdminDashController::class, 'create_admin'])->name('admin.create_admin');
     Route::get('/edit-admin/{id}', [AdminDashController::class, 'edit_admin'])->name('admin.edit_admin');  
     Route::post('/edit-admin', [AdminDashController::class, 'saveadmin'])->name('admin.saveadmin');  
      Route::get('/suspend-admin/{id}', [AdminDashController::class, 'suspend_admin'])->name('admin.suspend_admin');  

     /*FRONT END EDITOR*/
      Route::post('/statusAjaxUpdateCustom', [FrontEndEditorController::class,'statusAjaxUpdateCustom']);
      Route::post('/statusAjaxUpdate', [FrontEndEditorController::class,'statusAjaxUpdate']);
      Route::post('/updateFlagOnKey', [FrontEndEditorController::class,'updateFlagOnKey']);
      /*FRONT END EDITOR End*/

     /*FRONT END IMAGE Upload*/
      Route::post('/imageUpload', [FrontEndEditorController::class, 'imageUpload']);
      /*FRONT END IMAGE Upload END*/

    Route::get('/published-links-statistics', [StatisticsController::class, 'published_links_statistics'])->name('admin.published_links_statistics'); 
     Route::get('/inquiry-statistics', [StatisticsController::class, 'inquiry_statistics'])->name('admin.inquiry_statistics'); 

     Route::get('/web-crawl-statistics', [StatisticsController::class, 'web_crawl_statistics'])->name('admin.web_crawl_statistics'); 

     Route::get('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

    
   
});

// Route::group(['middleware' => ['admin'],'prefix'=>'admin','namespace'=>'Admin', function () {

//    // Route::get('/order-detail/{id}', 'OrderController@detail')->name('adminiy.orderdetail');

// }]);