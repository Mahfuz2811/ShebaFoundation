<?php

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

//Route::get('/', function () {
    //return view('welcome');
//});

Auth::routes(); 

//Route::get('/home', 'HomeController@index')->name('home');


Route::get('news/{slug}', 'NewsController@news')->name('news_post');


Route::get('gallery/{slug?}', 'GalleryController@index')->name('gallery');

Route::get('/contact', 'FrontController@keepTouch')->name('keep_touch');


Route::get('/', 'FrontController@index')->name('front_home');

Route::get('/{slug}', 'FrontController@ourRecoveries')->name('our_recoveries');
Route::get('team/{slug}', 'FrontController@ourTeams')->name('our_teams');

//Route::get('/contact-us', 'HomeController@contactUs')->name('front_contact');

Route::get('people/{slug}', 'FrontController@people')->name('people');

Route::get('post/{slug}', 'FrontController@homePost')->name('post');



Route::group(['middleware' => ['web'], 'prefix' => 'admin'], function()
{
    Route::get('/dashboard', 'DashboardController@index')->name('admin_dashboard_index'); 

});



Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'admin/blog'], function()
{
    Route::get('/', 'AdminBlogController@index')->name('admin_blog_index');
    Route::get('create', 'AdminBlogController@create')->name('admin_blog_create');
    Route::post('store', 'AdminBlogController@store')->name('admin_blog_store');
    Route::get('{id}/show', 'AdminBlogController@show')->name('admin_blog_show');
    Route::get('{id}/edit', 'AdminBlogController@edit')->name('admin_blog_edit');
    Route::post('{id}/update', 'AdminBlogController@update')->name('admin_blog_update');
    Route::get('{id}/delete', 'AdminBlogController@destroy')->name('admin_blog_delete');
});

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'admin/blog/category'], function()
{
    Route::get('/', 'AdminCategoryController@index')->name('admin_blog_category_index');
    Route::get('create', 'AdminCategoryController@create')->name('admin_blog_category_create');
    Route::post('store', 'AdminCategoryController@store')->name('admin_blog_category_store');
    Route::get('{id}/show', 'AdminCategoryController@show')->name('admin_blog_category_show');
    Route::get('{id}/edit', 'AdminCategoryController@edit')->name('admin_blog_category_edit');
    Route::post('{id}/update', 'AdminCategoryController@update')->name('admin_blog_category_update');
    Route::get('{id}/delete', 'AdminCategoryController@destroy')->name('admin_blog_category_delete'); 
});


Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'admin/gallery'], function()
{
    Route::get('{id}/upload', 'AdminGalleryController@index')->name('admin_gallery_index');
    Route::post('{id}/store', 'AdminGalleryController@store')->name('admin_gallery_store');
    Route::get('{id}/delete', 'AdminGalleryController@destroy')->name('admin_gallery_delete');
});

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'admin/gallery-category'], function()
{
    Route::get('/', 'AdminCategoryController@index')->name('admin_gallery_category_index');
    Route::get('create', 'AdminCategoryController@create')->name('admin_gallery_category_create');
    Route::post('store', 'AdminCategoryController@store')->name('admin_gallery_category_store');
    Route::get('{id}/show', 'AdminCategoryController@show')->name('admin_gallery_category_show');
    Route::get('{id}/edit', 'AdminCategoryController@edit')->name('admin_gallery_category_edit');
    Route::post('{id}/update', 'AdminCategoryController@update')->name('admin_gallery_category_update');
    Route::get('{id}/delete', 'AdminCategoryController@destroy')->name('admin_gallery_category_delete'); 
});



Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'admin/news'], function()
{
    Route::get('/', 'AdminNewsController@index')->name('admin_news_index');
    Route::get('create', 'AdminNewsController@create')->name('admin_news_create');
    Route::post('store', 'AdminNewsController@store')->name('admin_news_store');
    Route::get('{id}/show', 'AdminNewsController@show')->name('admin_news_show');
    Route::get('{id}/edit', 'AdminNewsController@edit')->name('admin_news_edit');
    Route::post('{id}/update', 'AdminNewsController@update')->name('admin_news_update');
    Route::get('{id}/delete', 'AdminNewsController@destroy')->name('admin_news_delete'); 
});



Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'admin/people'], function()
{
    Route::get('/', 'AdminPeopleController@index')->name('admin_people_index');
    Route::get('create', 'AdminPeopleController@create')->name('admin_people_create');
    Route::post('store', 'AdminPeopleController@store')->name('admin_people_store');
    Route::get('{id}/show', 'AdminPeopleController@show')->name('admin_people_show');
    Route::get('{id}/edit', 'AdminPeopleController@edit')->name('admin_people_edit');
    Route::post('{id}/update', 'AdminPeopleController@update')->name('admin_people_update');
    Route::get('{id}/delete', 'AdminPeopleController@destroy')->name('admin_people_delete');
});

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'admin/people/category'], function()
{
    Route::get('/', 'AdminPeopleCategoryController@index')->name('admin_people_category_index');
    Route::get('create', 'AdminPeopleCategoryController@create')->name('admin_people_category_create');
    Route::post('store', 'AdminPeopleCategoryController@store')->name('admin_people_category_store');
    Route::get('{id}/show', 'AdminPeopleCategoryController@show')->name('admin_people_category_show');
    Route::get('{id}/edit', 'AdminPeopleCategoryController@edit')->name('admin_people_category_edit');
    Route::post('{id}/update', 'AdminPeopleCategoryController@update')->name('admin_people_category_update');
    Route::get('{id}/delete', 'AdminPeopleCategoryController@destroy')->name('admin_people_category_delete');
});



Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'admin/post'], function()
{
    Route::get('/', 'AdminPostController@index');
    Route::get('/', 'AdminPostController@index')->name('admin_post_index');
    Route::get('create', 'AdminPostController@create')->name('admin_post_create');
    Route::post('store', 'AdminPostController@store')->name('admin_post_store');
    Route::get('{id}/show', 'AdminPostController@show')->name('admin_post_show');
    Route::get('{id}/edit', 'AdminPostController@edit')->name('admin_post_edit');
    Route::post('{id}/update', 'AdminPostController@update')->name('admin_post_update');
    Route::get('{id}/delete', 'AdminPostController@destroy')->name('admin_post_delete');
});



use App\Lib\FileUpload;

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'admin/setting/slider'], function()
{
    Route::get('/', 'AdminSliderController@index')->name('admin_slider_index');
    Route::post('store', 'AdminSliderController@store')->name('admin_slider_store');
    Route::get('{id}/delete', 'AdminSliderController@destroy')->name('admin_slider_delete');
});

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'admin/setting/contact'], function()
{
    Route::get('/', 'AdminContactController@index')->name('admin_contact_index');
    Route::post('store', 'AdminContactController@store')->name('admin_contact_store');
});

Route::group(['middleware' => ['web'], 'prefix' => 'admin/setting/'], function()
{
    Route::get('service-provider', function(){
    
    	$fp = new FileUpload;
    	$fp->serviceProvider();
    	
    })->name('admin_seo_sp');
 
});
