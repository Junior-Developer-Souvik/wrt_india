<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{AdminLoginController,DashboardController,ServiceManagementController,WebsiteSettingController,WhyChooseUSController,AboutUSController,KeyHighlightsController,whyChooseWrtController};
use App\Http\Controllers\Front\{UserController,IndexController};
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Crypt;


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
Route::get('/clear-cache', function() {
    Artisan::call('optimize:clear');
    return "Cache cleared successfully!";
});

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/login',[UserController::class,'login'])->name('front.login');
Route::get('/register',[UserController::class,'register'])->name('front.register');

Route::middleware(['prevent-back-after-logout'])->group(function(){

Route::group(['prefix' => 'admin'],function(){
    Route::group(['middleware' => 'admin.guest'],function(){ //admin.guest=>guest routes
        Route::get('/login',[AdminLoginController::class,'login'])->name('admin.login');
        Route::post('/authenticate',[AdminLoginController::class,'authenticate'])->name('admin.authenticate');
    });

    Route::group(['middleware' => 'admin.auth'],function(){  //admin.auth=>authenticated routes => like user must be logged in
        Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('admin.dashboard');
        Route::get('/logout',[DashboardController::class,'logout'])->name('admin.logout');
        
        Route::prefix('service-management')->group(function(){
            Route::get('/', [ServiceManagementController::class, 'index'])->name('service_management.list.all');
            Route::get('/create', [ServiceManagementController::class, 'create'])->name('service_management.create');
            Route::post('/store', [ServiceManagementController::class, 'store'])->name('service_management.store');
            Route::get('/edit/{id}', [ServiceManagementController::class, 'edit'])->name('service_management.edit');
            Route::post('/update', [ServiceManagementController::class, 'update'])->name('service_management.update');
            Route::get('/delete/{id}', [ServiceManagementController::class, 'delete'])->name('service_management.delete');
            Route::post('/status', [ServiceManagementController::class, 'toggleStatus'])->name('service_management.toggle-status');
            Route::get('/show/{id}', [ServiceManagementController::class, 'show'])->name('service_management.show');
            Route::post('/update-service-order', [ServiceManagementController::class, 'updateServiceOrder'])->name('service_management.service.update-order');                
          
            Route::prefix('features')->group(function(){
                Route::get('/{id}', [ServiceManagementController::class, 'features'])->name('service_management.features');
                Route::get('/create/{id}', [ServiceManagementController::class, 'featuresCreate'])->name('service_management.features.create');
                Route::post('/store', [ServiceManagementController::class, 'featuresStore'])->name('service_management.features.store');
                Route::get('/edit/{serviceId}/{featuresId}', [ServiceManagementController::class, 'featuresEdit'])->name('service_management.features.edit');
                Route::post('/update', [ServiceManagementController::class, 'featuresUpdate'])->name('service_management.features.update');
                Route::post('/status', [ServiceManagementController::class, 'featurestoggleStatus'])->name('service_management.features.status');
                Route::get('/delete/{id}', [ServiceManagementController::class, 'featuresDelete'])->name('service_management.features.delete');
            });
          
            
            Route::prefix('child-service')->group(function(){
               Route::get('/create/{serviceId}', [ServiceManagementController::class, 'ChildServiceCreate'])->name('service_management.child-service.create');
               Route::post('/store', [ServiceManagementController::class, 'ChildServiceStore'])->name('service_management.child-service.store');
               Route::post('/status', [ServiceManagementController::class, 'ChildServicetoggleStatus'])->name('service_management.child-service.toggle-status');
               Route::get('/delete/{serviceId}', [ServiceManagementController::class, 'ChildServiceDelete'])->name('service_management.child-service.delete');
               Route::get('/edit/{serviceId}', [ServiceManagementController::class, 'ChildServiceEdit'])->name('service_management.child-service.edit');
               Route::post('/update', [ServiceManagementController::class, 'ChildServiceUpdate'])->name('service_management.child-service.update');
               Route::post('/update-child-service-order', [ServiceManagementController::class, 'updateOrder'])->name('service_management.child-service.update-order');                
               Route::get('{id}/key-features',[ServiceManagementController::class, 'ChildServiceKeyFeatures'])->name('service_management.child-service.key-features');
               Route::get('create/{id}/key-features',[ServiceManagementController::class, 'ChildServiceKeyFeaturesCreate'])->name('service_management.child-service.key-features.create');
               Route::post('store/key-features',[ServiceManagementController::class, 'ChildServiceKeyFeaturesStore'])->name('service_management.child-service.key-features.store');
               Route::get('edit/{childServiceId}/{keyFeaturesId}',[ServiceManagementController::class, 'ChildServiceKeyFeaturesEdit'])->name('service_management.child-service.key-features.edit');
               Route::post('update/key-features',[ServiceManagementController::class, 'ChildServiceKeyFeaturesUpdate'])->name('service_management.child-service.key-features.update');
               Route::get('key_features/delete/{keyFeaturesId}',[ServiceManagementController::class, 'ChildServiceKeyFeaturesDelete'])->name('service_management.child-service.key-features.delete');
               Route::post('status/key-features',[ServiceManagementController::class, 'ChildServiceKeyFeaturesStatus'])->name('service_management.child-service.key-features.status');

                Route::prefix('use_cases')->group(function(){
                    Route::get('/{id}',[ServiceManagementController::class, 'UseCases'])->name('child-service.use_cases');
                    Route::get('/create/{id}',[ServiceManagementController::class, 'UseCasesCreate'])->name('child-service.use_cases.create');
                    Route::post('/store',[ServiceManagementController::class, 'UseCasesStore'])->name('child-service.use_cases.store');
                    Route::post('status',[ServiceManagementController::class, 'UseCasesStatus'])->name('child-service.use_cases.status');
                    Route::get('/edit/{child_service_id}/{use_case_id}',[ServiceManagementController::class, 'UseCasesEdit'])->name('child-service.use_cases.edit');
                    Route::post('/update',[ServiceManagementController::class, 'UseCasesUpdate'])->name('child-service.use_cases.update');
                    Route::get('/delete/{use_case_id}',[ServiceManagementController::class, 'UseCasesDelete'])->name('child-service.use_cases.delete');
                });
            });
        });
        // why choose us
        Route::prefix('why-choose-us')->group(function(){
            Route::get('/',[WhyChooseUSController::class, 'index'])->name('why_choose_us.list.all');
            Route::get('/create',[WhyChooseUSController::class, 'create'])->name('why_choose_us.create');
            Route::post('/store',[WhyChooseUSController::class, 'store'])->name('why_choose_us.store');
            Route::get('/edit/{id}',[WhyChooseUSController::class, 'edit'])->name('why_choose_us.edit');
            Route::post('/update',[WhyChooseUSController::class, 'update'])->name('why_choose_us.update');
            Route::get('/delete/{id}',[WhyChooseUSController::class, 'delete'])->name('why_choose_us.delete');
        });
        // About us
        Route::prefix('about-us')->group(function(){
            Route::get('/',[AboutUSController::class, 'index'])->name('about_us.list.all');
            Route::get('/create',[AboutUSController::class, 'create'])->name('about_us.create');
            Route::post('/store',[AboutUSController::class, 'store'])->name('about_us.store');
            Route::get('/edit/{id}',[AboutUSController::class, 'edit'])->name('about_us.edit');
            Route::post('/update',[AboutUSController::class, 'update'])->name('about_us.update');
            Route::get('/delete/{id}',[AboutUSController::class, 'delete'])->name('about_us.delete');
        });
        // Key Highlights
        Route::prefix('key_highlights')->group(function(){
            Route::get('/',[KeyHighlightsController::class, 'index'])->name('key_highlights.list.all');
            Route::get('/create',[KeyHighlightsController::class, 'create'])->name('key_highlights.create');
            Route::post('/store',[KeyHighlightsController::class, 'store'])->name('key_highlights.store');
            Route::get('/edit/{id}',[KeyHighlightsController::class, 'edit'])->name('key_highlights.edit');
            Route::post('/update',[KeyHighlightsController::class, 'update'])->name('key_highlights.update');
            Route::get('/delete/{id}',[KeyHighlightsController::class, 'delete'])->name('key_highlights.delete');
        });
        // Why Choose WRT India
        Route::prefix('why_choose_wrt')->group(function(){
            Route::get('/',[whyChooseWrtController::class, 'index'])->name('why_choose_wrt.list.all');
            Route::get('/create',[whyChooseWrtController::class, 'create'])->name('why_choose_wrt.create');
            Route::post('/store',[whyChooseWrtController::class, 'store'])->name('why_choose_wrt.store');
            Route::get('/edit/{id}',[whyChooseWrtController::class, 'edit'])->name('why_choose_wrt.edit');
            Route::post('/update',[whyChooseWrtController::class, 'update'])->name('why_choose_wrt.update');
            Route::get('/delete/{id}',[whyChooseWrtController::class, 'delete'])->name('why_choose_wrt.delete');
        });

        Route::group(['prefix'  => 'website-settings'],function(){
            Route::get('/',[WebsiteSettingController::class,'WebsiteSittengIndex'])->name('admin.website-settings.index');
            Route::post('/update',[WebsiteSettingController::class,'WebsiteSittengUpdate'])->name('admin.website-settings.update');
        });
    });


   });
});

// frontend
Route::name('front.')->group(function() {
    Route::get('/', [IndexController::class, 'index'])->name('home');
    Route::post('/user-subcription', [IndexController::class, 'Usersubcription'])->name('user_subcription');
    Route::get('/contact-us', [IndexController::class, 'ContactUs'])->name('contact_us');
    Route::post('/contact-us/leads', [IndexController::class, 'ContactLeads'])->name('contact_us.leads');
    Route::get('/about-us', [IndexController::class, 'AboutUs'])->name('about_us');
    Route::get('/services/{slug}', [IndexController::class, 'services'])->name('service_by_slug');
    Route::post('/services/contact-us', [IndexController::class, 'servicesContact'])->name('services_contact_us');
    Route::get('{parent_slug}/{slug}', [IndexController::class, 'childServices'])->name('child_service');
    Route::get('{slug}', [IndexController::class, 'ExploreSolutions'])->name('explore_solutions');
});