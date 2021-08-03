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

//Route::get('/', function () {
 //   return view('welcome');
//});

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => LaravelLocalization::setLocale(),
              'middleware' => [ 'localize' ]], function () {

    Route::get(LaravelLocalization::transRoute('/'), function () {
        return view('welcome');
    });
    Route::get(LaravelLocalization::transRoute('routes.about-us'), function () {
        return view('about-us');
    });
    Route::get(LaravelLocalization::transRoute('routes.studies'), function () {
        return view('consumer-studies');
    });
   // Route::get(LaravelLocalization::transRoute('routes.consumer_studies'), function () {
   //     return view('consumer-studies');
   // });
    Route::get(LaravelLocalization::transRoute('routes.privacy'), function () {
        return view('privacy-policy');
    });

    Route::get(LaravelLocalization::transRoute('routes.partners'), function () {
        return view('our-partners');
    });
    
    Route::get(LaravelLocalization::transRoute('routes.careers'), function () {
        return view('careers');
    });
    Route::get(LaravelLocalization::transRoute('routes.sample'), function () {
        return view('consumer.sampling');
    });
    Route::get(LaravelLocalization::transRoute('routes.analysis'), function () {
        return view('consumer.data-analysis');
    });
    Route::get(LaravelLocalization::transRoute('routes.questionnaire'), function () {
        return view('consumer.questionnaire-design');
    });
    Route::get(LaravelLocalization::transRoute('routes.visualization'), function () {
        return view('consumer.data-visualization');
    });
    Route::get(LaravelLocalization::transRoute('routes.connect'), function () {
        return view('consumer.connect');
    });
      
    Route::get(LaravelLocalization::transRoute('routes.terms'), function () {
        return view('terms-of-use');
    });
    Route::get(LaravelLocalization::transRoute('routes.raports'), function () {
        return view('resources');
    });
    Route::get(LaravelLocalization::transRoute('routes.faq'), function () {
        return view('faq');
    });
    Route::get(LaravelLocalization::transRoute('routes.faq'), function () {
        return view('faq');
    });
    Route::get(LaravelLocalization::transRoute('routes.contactus'), function () {
        return view('contact-us');
    });
    Route::post(LaravelLocalization::transRoute('/app/login', [
        'uses'=>'Auth\LoginController@Login',
        'as'=>'account.login'
    ]));


	/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
	/*Route::get('/', function()
	{
		return View::make('welcome');
	});

	Route::get('/consumer/questionnaire-design',function(){
		return View::make('/consumer/questionnaire-design');
	});
    Route::get('/consumer/sampling',function(){
		return View::make('/consumer/sampling');
	});
    Route::get('/consumer/data-analysis',function(){
		return View::make('/consumer/data-analysis');
	});
    Route::get('/consumer/data-visualization',function(){
		return View::make('consumer.questionnaire-design');
	});
    Route::get('/consumer/connect',function(){
		return View::make('/consumer/connect');
	});
    Route::get('/consumer-studies',function(){
		return View::make('/consumer-studies');
	});
    Route::get('/resources/papers/future-canadian-shopping-centerss',function(){
		return View::make('/resources/papers/future-canadian-shopping-centers');
	});
    Route::get('/resources/papers/future-shopping-centres-america',function(){
		return View::make('/resources/papers/future-shopping-centres-america');
	});
    Route::get('/about-us',function(){
		return View::make('/about-us');
	});
    Route::get('/contact-us',function(){
		return View::make('/contact-us');
	});
    Route::get('/privacy-policy',function(){
		return View::make('/privacy-policy');
	});
    Route::get('/our-partners',function(){
		return View::make('/our-partners');
	});
    Route::get('/careers',function(){
		return View::make('/careers');
	});
    Route::get('/faq',function(){
		return View::make('/faq');
	});

    
});


//Route::get('/', function () {
//    return view('welcome');
//});

//Route::group(['prefix'=>'megamenu-row']){
//Route::get('/consumer/questionnaire-design', 'QuestionnaireDesignController@index');
//Route::get('/consumer/sampling', 'SamplingController@index');
//Route::get('/consumer/data-analysis', 'DatanalysisController@index');
//Route::get('/consumer/data-visualization', 'DataVisualizationController@index');
//Route::get('/consumer/connect', 'ConsumerConnectController@index');
//Route::get('/consumer-studies', 'ConsumerResearchController@index');
//Route::get('/resources/papers/future-canadian-shopping-centers', 'FutureOfCanadianShoppingController@index');
//Route::get('/resources/papers/future-shopping-centres-america', 'FutureOfAmericanShoppingController@index');
//Route::get('/resources', 'ResourcesController@index');
//Route::get('/about-us', 'AboutUSController@index');
//Route::get('/contact-us', 'ContactUsController@index');
////Route::get('/privacy-policy', 'PrivacyPolicyController@index');
//Route::get('/our-partners', 'PartnersController@index');
//Route::get('/careers', 'CareerController@index');
//Route::get('/faq', 'FaqController@index');



/*-----For previous website version*/
/*Route::get('/services/new-product-test', 'NewProductStudiesController@index');
/*Route::get('/services/branding-studies', 'BrandingStudiesController@index');
/*Route::get('/services/market-research', 'MarketResearchController@index');
/*Route::get('/research-methods/qualitative-research', 'QualitativeResearchController@index');
/*Route::get('/research-methods/quantitative-research', 'QuantitativeResearchController@index');
/*Route::get('/app/register', 'RegisterController@index');
/*Route::get('/app/member-terms-and-conditions', 'TermsController@index');
/*Route::get('/app/reward', 'RewardController@index');
/*Route::get('/app/new-member-registration', 'NewMemberController@index');
/*Route::get('/app/invite-new-member', 'InviteMembersController@index');
/*Route::get('/app/member-faqs', 'MemberFaqController@index');
/*Route::get('/app/member-privacy', 'MemberPrivacyController@index');
--------*/






Route::get('/app/password-reset', 'PasswordResetController@index');
Route::get('/ethical-survey/admin-panel-member/register/non-repeat/action', 'UserController@firstRegister');
Route::post('/ethical-survey/admin-panel-member/register/non-repeat/store/action', [
    'uses' => 'UserController@saveFirstRegister',
    'as' => 'admin.firstStore'
]);
Route::post('/ethical-survey/admin-panel-member/register/', [
    'uses' => 'UserController@memberStore',
    'as' => 'admin.saveMember'
]);
Route::post('/ethical-survey/admin-panel-member/user/request', [
    'uses' => 'Auth\ResetPasswordController@requestReset',
    'as' => 'user.request'
]);
Route::get('/app/reset/password/{token}', [
    'uses'=>'Auth\ResetPasswordController@getReset',
    'as'=>'user.getReset'
]);
Route::get('/app/updaates/password', [
    'uses'=>'Auth\ResetPasswordController@updatePassword',
    'as'=>'user.updatePassword'
]);

Route::get('/app/login', [
    'uses'=>'MemberAccountLoginController@index',
    'as'=>'user.login'
    ]);

    
Route::post('/app/login', [
    'uses'=>'Auth\LoginController@Login',
    'as'=>'account.login'
]);

Route::post('/ethical-survey/member/save/request', [
    'uses' => 'admin\ContactController@saveCallRequest',
    'as' => 'member.request'
]);
Route::post('/ethical-survey/member/save/contactus', [
    'uses' => 'admin\ContactController@saveContactus',
    'as' => 'member.contactus'
]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('/Administration/')->group(
    function () {

        //admin project category routes
        Route::get('project/categories', [
            'uses' => 'projects\CategoryController@index',
            'as' => 'projects.category'
        ]);
        Route::get('project/getCategories', [
            'uses' => 'projects\CategoryController@getCategories',
            'as' => 'projects.getCategories'
        ]);
        Route::post('project/saveCategories', [
            'uses' => 'projects\CategoryController@saveCategories',
            'as' => 'projects.saveCategories'
        ]);
        Route::put('project/updateCategories', [
            'uses' => 'projects\CategoryController@updateCategories',
            'as' => 'projects.updateCategories'
        ]);
        Route::get('/project/categories/show/{id}', [
            'uses' => 'projects\CategoryController@show',
            'as' => 'projects.showCategories'
        ])->middleware('auth');

        Route::delete('/project/categories/delete/{id}', [
            'uses' => 'projects\CategoryController@destroy',
            'as' => 'projects.deleteCategories'
        ])->middleware('auth');

        //admin project subcategory routes
        Route::get('project/subcategories', [
            'uses' => 'projects\SubcategoryController@index',
            'as' => 'projects.subcategory'
        ]);
        Route::get('project/getSubcategories', [
            'uses' => 'projects\SubcategoryController@getSubcategories',
            'as' => 'projects.getSubcategories'
        ]);
        Route::post('project/saveSubcategories', [
            'uses' => 'projects\SubcategoryController@saveSubcategories',
            'as' => 'projects.saveSubcategories'
        ]);
        Route::put('project/updateSubcategories', [
            'uses' => 'projects\SubcategoryController@updateSubcategories',
            'as' => 'projects.updateSubcategories'
        ]);
        Route::get('/project/subcategories/show/{id}', [
            'uses' => 'projects\SubcategoryController@show',
            'as' => 'projects.showSubcategories'
        ])->middleware('auth');

        Route::delete('/project/subcategories/delete/{id}', [
            'uses' => 'projects\SubcategoryController@destroy',
            'as' => 'projects.deleteSubcategories'
        ])->middleware('auth');

        //admin project  routes
        Route::get('project/projects', [
            'uses' => 'projects\ProjectController@index',
            'as' => 'projects.projects'
        ]);
        Route::get('project/getProjects', [
            'uses' => 'projects\ProjectController@getProjects',
            'as' => 'projects.getProjects'
        ]);
        Route::post('project/saveProject', [
            'uses' => 'projects\ProjectController@saveProject',
            'as' => 'projects.saveProject'
        ]);
        Route::put('project/updateProject', [
            'uses' => 'projects\ProjectController@updateProject',
            'as' => 'projects.updateProject'
        ]);
        Route::get('/project/project/show/{id}', [
            'uses' => 'projects\ProjectController@show',
            'as' => 'projects.showProject'
        ])->middleware('auth');

        Route::delete('/project/project/delete/{id}', [
            'uses' => 'projects\ProjectController@destroy',
            'as' => 'projects.deleteProject'
        ])->middleware('auth');
        Route::get('/category/subcategory', [
            'uses' => 'projects\ProjectController@getSubcategory',
            'as' => 'projects.getSubcategory2'
        ])->middleware('auth');
        Route::get('/project/project/detail/{id}', [
            'uses' => 'projects\ProjectController@projectDetail',
            'as' => 'projects.projectDetail'
        ]);

        //admin project Files routes
        Route::get('project/files', [
            'uses' => 'projects\FileController@index',
            'as' => 'projects.files'
        ]);
        Route::get('project/getFiles', [
            'uses' => 'projects\FileController@getFiles',
            'as' => 'projects.getFiles'
        ]);
        Route::post('project/saveFile', [
            'uses' => 'projects\FileController@saveFile',
            'as' => 'projects.saveFile'
        ]);
        Route::put('project/updateFile', [
            'uses' => 'projects\FileController@updateFile',
            'as' => 'projects.updateFile'
        ]);
        Route::get('/project/file/show/{id}', [
            'uses' => 'projects\FileController@show',
            'as' => 'projects.showFile'
        ])->middleware('auth');

        Route::delete('/project/file/delete/{id}', [
            'uses' => 'projects\FileController@destroy',
            'as' => 'projects.deleteFile'
        ])->middleware('auth');
        Route::get('/project/file/read/{id}', [
            'uses' => 'projects\FileController@readFile',
            'as' => 'projects.readFile'
        ]);

            //        user and admin account edition
        Route::get('profiles/change/password', [
            'uses' => 'Admin\ProfileController@changePassword',
            'as' => 'profiles.getPassword'
        ]);
        Route::post('profiles/update/password', [
            'uses' => 'Admin\ProfileController@updatePassword',
            'as' => 'profiles.updatePassword'
        ]);

        Route::get('profiles/view/profile', [
            'uses' => 'Admin\ProfileController@viewProfile',
            'as' => 'profiles.viewProfile'
        ]);
        Route::get('profiles/getInfo', [
            'uses' => 'Admin\ProfileController@getInfo',
            'as' => 'profiles.getInfo'
        ]);
        Route::post('profiles/update/info', [
            'uses' => 'Admin\ProfileController@updateInfo',
            'as' => 'profiles.updateInfo'
        ]);
        Route::get('profiles/get/profile', [
            'uses' => 'Admin\ProfileController@getProfile',
            'as' => 'profiles.getProfile'
        ]);
        Route::post('profiles/update/profile', [
            'uses' => 'Admin\ProfileController@updateProfile',
            'as' => 'profiles.updateProfile'
        ]);




        //        users or members routes
        Route::get('member/list_member', [
            'uses' => 'Admin\MemberController@index',
            'as' => 'members.index'
        ]);
        Route::get('member/get/list', [
            'uses' => 'Admin\MemberController@getMembers',
            'as' => 'members.getMembers'
        ]);
        Route::get('member/detail/{id}', [
            'uses' => 'Admin\MemberController@memberDetail',
            'as' => 'members.memberDetail'
        ]);
        Route::put('member/confirm/{id}', [
            'uses' => 'Admin\MemberController@confirmMember',
            'as' => 'members.confirmMember'
        ]);
        Route::delete('member/delete/{id}', [
            'uses' => 'Admin\MemberController@deleteMember',
            'as' => 'members.deleteMember'
        ]);

//admin devices routes
         Route::get('devices/all', [
            'uses' => 'admin\DeviceController@index',
            'as' => 'admin.devices.all'
        ]);
        Route::get('devices/getDevices', [
            'uses' => 'admin\DeviceController@getDevices',
            'as' => 'admin.devices.getDevices'
        ]);
        Route::post('devices/saveDevices', [
            'uses' => 'admin\DeviceController@saveDevices',
            'as' => 'admin.devices.saveDevices'
        ]);
        Route::put('devices/updateDevices', [
            'uses' => 'admin\DeviceController@updateDevices',
            'as' => 'admin.devices.updateDevices'
        ]);
        Route::get('/devices/admin/show/{id}', [
            'uses' => 'admin\DeviceController@showDevice',
            'as' => 'admin.devices.showDevice'
        ])->middleware('auth');

        Route::delete('/devices/admin/delete/{id}', [
            'uses' => 'admin\DeviceController@destroyDevice',
            'as' => 'admin.devices.destroyDevice'
        ])->middleware('auth');

        Route::get('devices/available_device', [
            'uses' => 'admin\DeviceController@availableDevice',
            'as' => 'admin.devices.available_device'
        ]);
        Route::get('devices/getAvailableDevices', [
            'uses' => 'admin\DeviceController@getAvailableDevices',
            'as' => 'admin.devices.getAvailableDevices'
        ]);
        Route::get('devices/unavailable_device', [
            'uses' => 'admin\DeviceController@unavailableDevice',
            'as' => 'admin.devices.unavailable_device'
        ]);
        Route::get('devices/getUnavailableDevices', [
            'uses' => 'admin\DeviceController@getUnavailableDevices',
            'as' => 'admin.devices.getUnavailableDevices'
        ]);
        Route::get('devices/historical', [
            'uses' => 'admin\DeviceController@historical',
            'as' => 'admin.devices.historical'
        ]);
        Route::get('devices/getHistorical', [
            'uses' => 'admin\DeviceController@getHistorical',
            'as' => 'admin.devices.getHistorical'
        ]);

        Route::post('devices/assignDevices', [
            'uses' => 'admin\DeviceController@assignDevices',
            'as' => 'admin.devices.assignDevices'
        ]);
        Route::post('devices/releaseDevices/{id}', [
            'uses' => 'admin\DeviceController@releaseDevice',
            'as' => 'admin.devices.releaseDevice'
        ]);
        Route::get('/devices/detail/{id}', [
            'uses' => 'admin\DeviceController@deviceDetail',
            'as' => 'admin.devices.deviceDetail'
        ])->middleware('auth');




    


     //        survey routes
        Route::get('survey/survey_list', [
            'uses' => 'Admin\SurveyController@index',
            'as' => 'survey.index'
        ]);
        Route::get('survey/sendSurvey', [
            'uses' => 'Admin\SurveyController@sendSurvey',
            'as' => 'survey.sendSurvey'
        ]);
        Route::get('survey/get/member', [
            'uses' => 'Admin\SurveyController@getMemberSurvey',
            'as' => 'survey.getMemberSurvey'
        ]);
        Route::get('survey/get/survey', [
            'uses' => 'Admin\SurveyController@getSurvey',
            'as' => 'survey.getSurvey'
        ]);
        Route::post('survey/save/survey', [
            'uses' => 'Admin\SurveyController@saveSurvey',
            'as' => 'survey.saveSurvey'
        ]);
        Route::get('survey/show/{id}', [
            'uses' => 'Admin\SurveyController@showSurvey',
            'as' => 'survey.showSurvey'
        ]);
        Route::put('survey/update/survey', [
            'uses' => 'Admin\SurveyController@updateSurvey',
            'as' => 'survey.updateSurvey'
        ]);
        Route::put('survey/close/{id}', [
            'uses' => 'Admin\SurveyController@closeSurvey',
            'as' => 'survey.closeSurvey'
        ]);
        Route::put('survey/activate/{id}', [
            'uses' => 'Admin\SurveyController@activateSurvey',
            'as' => 'survey.activateSurvey'
        ]);
        Route::delete('survey/delete/{id}', [
            'uses' => 'Admin\SurveyController@deleteSurvey',
            'as' => 'survey.deleteSurvey'
        ]);
        Route::get('survey/detail/{id}', [
            'uses' => 'Admin\SurveyController@surveyDetail',
            'as' => 'survey.surveyDetail'
        ]);
        Route::get('survey/getDetail/{id}', [
            'uses' => 'Admin\SurveyController@getSurveyAttendance',
            'as' => 'survey.getSurveyAttendance'
        ]);

        Route::post('survey/sendSurvey/sms', [
            'uses' => 'Admin\SurveyController@sendSurveySMS',
            'as' => 'survey.sendSurveySMS'
        ]);
    });
});
