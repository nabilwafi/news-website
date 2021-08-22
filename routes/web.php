<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DistrictController;
use App\Http\Controllers\admin\GalleryController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\SettingsController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\SubDistrictController;
use App\Http\Controllers\admin\WebsiteSettingController;
use App\Http\Controllers\frontend\ExtraController;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Rules\Role;

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

Route::get('/', function () {
    return view('main.content');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.content');
})->name('dashboard');

/**
 * @WEBPAGE CATEGORY
 * GET/categories -> to get data from category database
 * GET/add/category -> To go add category page
 * POST/create/category -> To input new data category
 * GET/edit/category/{id} -> to go to category update page by specific data
 * POST/update/category/{id} -> To update old data from database
 * GET/delete/category/{id} -> to delete old data from database
 * 
 */
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/add/category', [CategoryController::class, 'addCategory'])->name('add.category');
Route::post('/create/category', [CategoryController::class, 'createCategory'])->name('create.category');
Route::get('/edit/category/{id}', [CategoryController::class, 'editCategory'])->name('edit.category');
Route::post('/update/category/{id}', [CategoryController::class, 'updateCategory'])->name('update.category');
Route::get('/delete/category/{id}', [CategoryController::class, 'deleteCategory'])->name('delete.category');

/**
 * @WEBPAGE SUBCATEGORY
 * GET/subcategories -> to get data from subcategory database
 * GET/add/subcategory -> To go add subcategory page
 * POST/create/subcategory -> To input new data subcategory
 * GET/edit/subcategory/{id} -> to go to subcategory update page by specific data
 * POST/update/subcategory/{id} -> To update old data from database
 * GET/delete/subcategory/{id} -> to delete old data from database
 * 
 */
Route::get('/subcategories', [SubCategoryController::class, 'index'])->name('sub.categories');
Route::get('/add/subcategory', [SubCategoryController::class, 'addSubCategory'])->name('add.sub.category');
Route::post('/create/subcategory', [SubCategoryController::class, 'createSubCategory'])->name('create.sub.category');
Route::get('/edit/subcategory/{id}', [SubCategoryController::class, 'editSubCategory'])->name('edit.sub.category');
Route::post('/update/subcategory/{id}', [SubCategoryController::class, 'updateSubCategory'])->name('update.sub.category');
Route::get('/delete/subcategory/{id}', [SubCategoryController::class, 'deleteSubCategory'])->name('delete.sub.category');

/**
 * @WEBPAGE DISTRICT
 * GET/districts -> to get data from districts database
 * GET/add/district -> To go add district page
 * POST/create/district -> To input new data district
 * GET/edit/district/{id} -> to go to district update page by specific data
 * POST/update/district/{id} -> To update old data from database
 * GET/delete/district/{id} -> to delete old data from database
 * 
 */
Route::get('/districts', [DistrictController::class, 'index'])->name('districts');
Route::get('/add/district', [DistrictController::class, 'addDistrict'])->name('add.district');
Route::post('/create/district', [DistrictController::class, 'createDistrict'])->name('create.district');
Route::get('/edit/district/{id}', [DistrictController::class, 'editDistrict'])->name('edit.district');
Route::post('/update/district/{id}', [DistrictController::class, 'updateDistrict'])->name('update.district');
Route::get('/delete/district/{id}', [DistrictController::class, 'deleteDistrict'])->name('delete.district');

/**
 * @WEBPAGE SUBDISTRICT
 * GET/subdistricts -> to get data from subdistrict database
 * GET/add/subdistrict -> To go add subdistrict page
 * POST/create/subdistrict -> To input new data subdistrict
 * GET/edit/subdistrict/{id} -> to go to subdistrict update page by specific data
 * POST/update/subdistrict/{id} -> To update old data from database
 * GET/delete/subdistrict/{id} -> to delete old data from database
 * 
 */
Route::get('/subdistrict', [SubDistrictController::class, 'index'])->name('subdistricts');
Route::get('/add/subdistrict', [SubDistrictController::class, 'addSubDistrict'])->name('add.sub.district');
Route::post('/create/subdistrict', [SubDistrictController::class, 'createSubDistrict'])->name('create.sub.district');
Route::get('/edit/subdistrict/{id}', [SubDistrictController::class, 'editSubDistrict'])->name('edit.sub.district');
Route::post('/update/subdistrict/{id}', [SubDistrictController::class, 'updateSubDistrict'])->name('update.sub.district');
Route::get('/delete/subdistrict/{id}', [SubDistrictController::class, 'deleteSubDistrict'])->name('delete.sub.district');

/**
 * @WEBPAGE POSTS
 * GET/all/posts -> to get all data from database to index page
 * GET/add/post -> To get add post page
 * POST/create/post -> to put data to database
 * GET/edit/post/{id} -> To go to edit page by id
 * POST/update/post/{id} -> To put data to database by id
 * GET/delete/post/[id] -> to delete data from database
 * GET/get/subcategory/{category_id} -> to get data Sub Category
 * GET/get/subdistrict/{district_id} -> to get data Sub District
 * 
 */
Route::get('/all/posts', [PostController::class, 'index'])->name('all.posts');
Route::get('/add/post', [PostController::class, 'addPost'])->name('add.post');
Route::post('/create/post', [PostController::class, 'createPost'])->name('create.post');
Route::get('/edit/post/{id}', [PostController::class, 'editPost'])->name('edit.post');
Route::post('/update/post/{id}', [PostController::class, 'updatePost'])->name('update.post');
Route::get('/delete/post/{id}', [PostController::class, 'deletePost'])->name('delete.post');
Route::get('/get/subcategory/{category_id}', [PostController::class, 'getSubCategory']);
Route::get('/get/subdistrict/{district_id}', [PostController::class, 'getSubDistrict']);

// SOCIAL
Route::get('/social/setting', [SettingsController::class, 'socialSetting'])->name('setting.social');
Route::post('/update/social/{id}', [SettingsController::class, 'socialUpdate'])->name('update.social');

// SEO
Route::get('/seo/setting', [SettingsController::class, 'seoSetting'])->name('setting.seo');
Route::post('/update/seo/{id}', [SettingsController::class, 'seoUpdate'])->name('update.seo');

// PRAYER
Route::get('/prayer/setting', [SettingsController::class, 'prayerSetting'])->name('setting.prayer');
Route::post('/update/prayer/{id}', [SettingsController::class, 'prayerUpdate'])->name('update.prayer');

// LIVE TV
Route::get('/live-tv/setting', [SettingsController::class, 'liveTvSetting'])->name('setting.live.tv');
Route::post('/update/live-tv/{id}', [SettingsController::class, 'liveTvUpdate'])->name('update.live.tv');
Route::get('/deactivate/live-tv/{id}', [SettingsController::class, 'liveTvDeactive'])->name('deactive.live.tv');
Route::get('/active/live-tv/{id}', [SettingsController::class, 'liveTvActive'])->name('active.live.tv');

// NOTICE
Route::get('/notice/setting', [SettingsController::class, 'noticeSetting'])->name('setting.notice');
Route::post('/update/notice/{id}', [SettingsController::class, 'noticeUpdate'])->name('update.notice');
Route::get('/deactivate/notice/{id}', [SettingsController::class, 'noticeDeactive'])->name('deactive.notice');
Route::get('/active/notice/{id}', [SettingsController::class, 'noticeActive'])->name('active.notice');

// WEB
Route::get('/all/webs', [SettingsController::class, 'webSetting'])->name('all.webs');
Route::get('/add/web', [SettingsController::class, 'addWebSetting'])->name('add.web');
Route::post('/create/web', [SettingsController::class, 'createWebSetting'])->name('create.web');
Route::get('/edit/web/{id}', [SettingsController::class, 'editWebSetting'])->name('edit.web');
Route::post('/update/web/{id}', [SettingsController::class, 'updateWebSetting'])->name('update.web');
Route::get('/delete/web/{id}', [SettingsController::class, 'deleteWebSetting'])->name('delete.web');

// GALLERY (PHOTO)
Route::get('/all/photos', [GalleryController::class, 'indexPhoto'])->name('all.photos');
Route::get('/add/photo', [GalleryController::class, 'addPhoto'])->name('add.photo');
Route::post('/create/photo', [GalleryController::class, 'createPhoto'])->name('create.photo');
Route::get('/edit/photo/{id}', [GalleryController::class, 'editPhoto'])->name('edit.photo');
Route::post('/update/photo/{id}', [GalleryController::class, 'updatePhoto'])->name('update.photo');
Route::get('/delete/photo/{id}', [GalleryController::class, 'deletePhoto'])->name('delete.photo');

// GALLERY (VIDEO)
Route::get('/all/videos', [GalleryController::class, 'indexVideo'])->name('all.videos');
Route::get('/add/video', [GalleryController::class, 'addVideo'])->name('add.video');
Route::post('/create/video', [GalleryController::class, 'createVideo'])->name('create.video');
Route::get('/edit/video/{id}', [GalleryController::class, 'editVideo'])->name('edit.video');
Route::post('/update/video/{id}', [GalleryController::class, 'updateVideo'])->name('update.video');
Route::get('/delete/video/{id}', [GalleryController::class, 'deleteVideo'])->name('delete.video');

/**
 * @WEBPAGE ADMIN
 * GET/LOGOUT -> to destroy session admin
 * 
 */
Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

/**
 * @WEBPAGE EXTRAS
 * 
 * 
 */
// LANG
Route::get('/lang/en', [ExtraController::class, 'English'])->name('lang.en');
Route::get('/lang/indo', [ExtraController::class, 'Indonesia'])->name('lang.indo');

// SINGLE POST
Route::get('/view/post/{id}', [ExtraController::class, 'singlePost'])->name('single.post');

// CATEGORY POST
Route::get('/catpost/en/{id}/{category_en}', [ExtraController::class, 'catPostEn'])->name('cat.post');

// SUBCATEGORY POST
Route::get('/subcatpost/en/{id}/{category_en}', [ExtraController::class, 'subCatPostEn'])->name('subcat.post');

// Homepage District search
Route::get('/get/subdistrict/frontend/{district_id}', [ExtraController::class, 'getSubDis']);

// Homepage Search District to page
Route::post('/search/district', [ExtraController::class, 'searchDistrict'])->name('search.dis');

// USER ROLE
Route::get('/all/writer', [RoleController::class, 'index'])->name('all.writer');
Route::get('/add/writer', [RoleController::class, 'addWriter'])->name('add.writer');
Route::post('/create/writer', [RoleController::class, 'createWriter'])->name('create.writer');
Route::get('/edit/writer/{id}', [RoleController::class, 'editWriter'])->name('edit.writer');
Route::post('/update/writer/{id}', [RoleController::class, 'updateWriter'])->name('update.writer');
Route::get('/delete/writer/{id}', [RoleController::class, 'deleteWriter'])->name('delete.writer');

// Account Setting
Route::get('/account/setting', [AdminController::class, 'accountSetting'])->name('account.setting');
Route::get('/edit/profile', [AdminController::class, 'editProfile'])->name('edit.profile');
Route::post('/update/profile', [AdminController::class, 'updateProfile'])->name('update.profile');

// Password Setting
Route::get('/show/password', [AdminController::class, 'showPassword'])->name('show.password');
Route::post('/change/password', [AdminController::class, 'changePassword'])->name('change.password');

// Website Setting
Route::get('/web/setting', [WebsiteSettingController::class, 'mainWebSetting'])->name('setting.website');
Route::post('/update/web/{id}', [WebsiteSettingController::class, 'updateWebSetting'])->name('update.website');
