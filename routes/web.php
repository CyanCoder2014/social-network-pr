<?php
use App\ChatUserData;
use App\Notifications\Newsletter;
use App\Notifications\UserRegister;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;



if (in_array(Request::segment(1), Config::get('app.alt_langs'))) {

    App::setLocale(Request::segment(1));
    Config::set('app.locale_prefix', Request::segment(1));
}



Route::group(['prefix' => Config::get('app.locale_prefix')], function () {
    Route::get('/', 'Web\HomeController@index')->name('home');
    Route::get('/home', 'Web\HirecomeController@redt');
    Route::get('/defaultpage', 'Web\HomeController@index');
    Route::get('/getcity/{id}', 'Web\CityController@getcities')->name('getcities');
    Route::get('/signup','Web\SignupController@create');
    Route::post('/signup','Web\SignupController@store');
    Route::post('/signup/confimation','Web\SignupController@connect')->name('signup.payment');
    Route::post('payment/arianpal','Web\SignupController@verify')->name('arianal.verify');



    Route::post('/contactus/send', 'Web\ContactusController@send')->name('send.contactus');
    Route::get('/contactus', 'Web\ContactusController@form')->name('form.contactus');
    Route::post('/mail/store', 'Web\ContactusController@subscribe')->name('subscribe');
    Route::get('/delegate/{id}', 'Web\FrontDelegateController@show')->name('delegate.show');


    Route::get('/content/category/{url}', 'Web\HomeController@category')->name('content.cat');
    Route::get('/content/category', 'Web\HomeController@categories')->name('all_content');
    Route::get('/content/{url}', 'Web\HomeController@content')->name('content');

    Route::get('/technology/category', 'Web\HomeController@technologies');
    Route::get('/technology/{url}', 'Web\HomeController@technology');

    Route::get('/project/category', 'Web\HomeController@projects')->name('all_project');
    Route::get('/project/category/{url}', 'Web\HomeController@prprojects')->name('project.cat');
    Route::get('/project/{url}', 'Web\HomeController@project')->name('project');

    Route::get('/product/{url}', 'Web\HomeController@Product')->name('product');

    Route::get('/ticket', 'Web\TicketController@index');
    Route::get('/ticket/create', 'Web\TicketController@create');
    Route::post('/ticket/store', 'Web\TicketController@store');
    Route::get('/ticket/tikect/{url}', 'Web\TicketController@ticket');
    Route::get('/ticket/destroy/{url}', 'Web\TicketController@destroy');
    Route::post('/ticket/reply/{url}', 'Web\TicketController@reply');
    Route::get('/ticket/close/{url}', 'Web\TicketController@close');

    Route::post('/message/send', 'Web\MessageController@send')->name('send.message');
    Route::post('/mail/store', 'Web\MessageController@subscribe')->name('subscribe');
    Route::post('/comment/send', 'Web\CommentController@send');

    Route::auth();
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
});

Route::group(['prefix' => 'admin',], function () {
    Route::auth();
    Route::group(['middleware' => ['auth']],function (){
        Route::get('/filemanager',['uses'=>function(){
            return view('admin.filemanager');
        }])->name('filemanager');

        Route::get('/laravel-filemanager', '\Unisharp\Laravelfilemanager\controllers\LfmController@show');
        Route::post('/laravel-filemanager/upload', '\Unisharp\Laravelfilemanager\controllers\UploadController@upload');
//    Route::get('/laravel-filemanager/demo', '\Unisharp\Laravelfilemanager\controllers\demoController@index');

        Route::get('image-crop', 'Web\ImageController@imageCrop');
        Route::post('image-crop', 'ImageController@imageCropPost')->name('upload.image');
        // list all lfm routes here...

        Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
        Route::resource('/', 'Web\AdminController');
        Route::get('/deny', 'Web\AdminController@deny');
        Route::get('/guide', 'Web\AdminController@guide');

        Route::get('utility/{name}',['as'=>'utility.index','uses'=>'Web\Utility\UtiliyController@index']);
        Route::post('utility/{name}',['as'=>'utility.store','uses'=>'Web\Utility\UtiliyController@store']);
        Route::post('utility/{name}/{id}',['as'=>'utility.update','uses'=>'Web\Utility\UtiliyController@update']);
        Route::get('utility/{name}/delete/{id}',['as'=>'utility.destroy','uses'=>'Web\Utility\UtiliyController@destroy']);

        Route::get('roles',['as'=>'roles.index','uses'=>'Web\RoleController@index']);
        Route::get('roles/create',['as'=>'roles.create','uses'=>'Web\RoleController@create']);
        Route::post('roles/create',['as'=>'roles.store','uses'=>'Web\RoleController@store']);
        Route::get('roles/{id}',['as'=>'roles.show','uses'=>'Web\RoleController@show']);
        Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'Web\RoleController@edit']);
        Route::post('roles/{id}',['as'=>'roles.update','uses'=>'Web\RoleController@update']);
        Route::get('roles/delete/{id}',['as'=>'roles.destroy','uses'=>'Web\RoleController@destroy']);



        Route::get('/content', ['uses'=>'Web\ContentController@index']);
        Route::get('/content/create', ['uses'=>'Web\ContentController@create']);
        Route::post('/content/store', ['uses'=>'Web\ContentController@store']);
        Route::post('/content/update/{url}', ['uses'=>'Web\ContentController@update']);
        Route::get('/content/destroy/{url}', ['uses'=>'Web\ContentController@destroy']);
        Route::get('/content/edit/{id}', ['uses'=>'Web\ContentController@edit']);
//    Route::get('/content/category/{url}', ['uses'=>'ContentController@category']);

        Route::get('/category', ['uses'=>'Web\CategoryController@index']);
        Route::post('/category/add', ['uses'=>'Web\CategoryController@store']);
        Route::post('/category/update/{url}', ['uses'=>'Web\CategoryController@update']);
        Route::get('/category/destroy/{url}', ['uses'=>'Web\CategoryController@destroy']);
        Route::get('/category/edit/{id}', ['uses'=>'Web\CategoryController@edit']);
//    Route::get('/category/category/{url}', ['uses'=>'CategoryController@category']);

        Route::get('/project', ['uses'=>'Web\ProjectController@index']);
        Route::get('/project/create', ['uses'=>'Web\ProjectController@create']);
        Route::post('/project/store', ['uses'=>'Web\ProjectController@store']);
        Route::post('/project/update/{url}', ['uses'=>'Web\ProjectController@update']);
        Route::get('/project/destroy/{url}', ['uses'=>'Web\ProjectController@destroy']);
        Route::get('/project/edit/{id}', ['uses'=>'Web\ProjectController@edit']);
//    Route::get('/project/category/{url}', ['uses'=>'ProjectController@category']);

        Route::resource('/technology', 'Web\TechnologyController');
        Route::post('/technology/store', 'Web\TechnologyController@store');
        Route::post('/technology/update/{url}', 'Web\TechnologyController@update');
        Route::get('/technology/destroy/{url}', 'Web\TechnologyController@destroy');
        Route::resource('/technology/edit', 'Web\TechnologyController@edit');
        Route::get('/technology/category/{url}', 'Web\TechnologyController@category');

        Route::get('/prcategory', ['uses'=>'Web\PrCategoryController@index']);
        Route::post('/prcategory/add', ['uses'=>'Web\PrCategoryController@store']);
        Route::post('/prcategory/update/{url}', ['uses'=>'Web\PrCategoryController@update']);
        Route::get('/prcategory/destroy/{url}', ['uses'=>'Web\PrCategoryController@destroy']);
        Route::get('/prcategory/edit', ['uses'=>'Web\PrCategoryController@edit']);
//    Route::get('/prcategory/category/{url}', ['uses'=>'PrCategoryController@category']);

        Route::get('/ticket', ['uses'=>'Web\AdminTicketController@index']);
        Route::get('/ticket/create', ['uses'=>'Web\AdminTicketController@create']);
        Route::post('/ticket/store', ['uses'=>'Web\AdminTicketController@store']);
        Route::get('/ticket/ticket/{url}', ['uses'=>'Web\AdminTicketController@ticket']);
        Route::get('/ticket/destroy/{url}', ['uses'=>'Web\AdminTicketController@destroy']);
        Route::post('/ticket/reply/{url}', ['uses'=>'Web\AdminTicketController@reply']);
        Route::get('/ticket/close/{url}', ['uses'=>'Web\AdminTicketController@close']);


        Route::get('/mail', 'Web\AdminMailController@index');
        Route::get('/mail/create', 'Web\AdminMailController@create');
        Route::post('/mail/store', 'Web\AdminMailController@store');
        Route::get('/mail/mail/{url}', 'Web\AdminMailController@ticket');
        Route::get('/mail/destroy/{url}', 'Web\AdminMailController@destroy');
        Route::post('/mail/mail/{url}', 'AWeb\dminMailController@reply');
        Route::get('/mail/close/{url}', 'Web\AdminMailController@close');

        Route::get('/comment/', ['uses'=>'Web\CommentController@index']);
        Route::get('/comment/accept/{url}', ['uses'=>'Web\CommentController@accept']);
        Route::get('/comment/deny/{url}', ['uses'=>'Web\CommentController@deny']);
        Route::get('/comment/destroy/{url}',['uses'=> 'Web\CommentController@destroy']);
        Route::post('/comment/reply/{url}',['uses'=> 'Web\CommentController@reply'])->name('comment.reply');

//    Route::get('/inbox/{id}', 'MessageController@inbox');
        Route::get('/message/', ['uses'=>'Web\MessageController@index'])->name('message');
//    Route::post('/message/send', 'MessageController@notify');
        Route::post('/message/reply/{url}', ['uses'=>'Web\MessageController@reply']);
        Route::get('/message/destroy/{url}', ['uses'=>'Web\MessageController@destroy']);
//
        Route::get('/notif/', ['uses'=>'Web\NotifController@index'])->name('Notif');
        Route::post('/notif/send', ['uses'=>'Web\NotifController@notify'])->name('Notif.send');
//    Route::post('/notif/reply/{url}', 'NotifController@reply');
//    Route::get('/notif/destroy/{url}', 'NotifController@destroy');
        Route::get('/read/{id}', 'Web\NotifController@markasread');

        Route::get('/user/', ['uses'=>'Web\UserController@index'])->name('user');
        Route::post('/user/update/{url}', ['uses'=>'Web\UserController@update'])->name('user.update');
        Route::get('/user/destroy/{url}', ['uses'=>'Web\UserController@destroy'])->name('user.delete');

//    Route::resource('/toolbar/', 'ToolbarController@index');
//    Route::get('/toolbar/edit/{url}', 'ToolbarController@edit');
//    Route::get('/toolbar/destroy/{url}', 'ToolbarController@destroy');

        Route::resource('/course', 'Web\CourseController');
        Route::post('/course/store', 'Web\CourseController@store');
        Route::post('/course/update/{url}', 'Web\CourseController@update');
        Route::get('/course/destroy/{url}', 'Web\CourseController@destroy');
        Route::resource('/course/edit', 'Web\CourseController@edit');
        Route::get('/course/category/{url}', 'Web\CourseController@category');


        Route::get('/page', 'Web\AdminPageController@page');
//    Route::get('/skill', 'AdminPageController@skill');
//    Route::post('/skill/edit/{url}', 'AdminPageController@skill_edit');
//    Route::get('/service', 'AdminPageController@service');
//    Route::post('/service/edit/{url}', 'AdminPageController@service_edit');
//    Route::get('/about', 'AdminPageController@about');
//    Route::post('/about/edit/{url}', 'AdminPageController@about_edit');
//    Route::get('/slide', 'AdminPageController@slide');
//    Route::post('/slide/edit/{url}', 'AdminPageController@slide_edit');
//    Route::get('/footer', 'AdminPageController@footer');
//    Route::post('/footer/edit/{url}', 'AdminPageController@footer_edit');

//    Route::get('/teacher', 'AdminPageController@teacher_index');
//    Route::get('/teacher/add', 'AdminPageController@teacher_add');
//    Route::post('/teacher/edit/{url}', 'AdminPageController@teacher_edit');
//    Route::get('/teacher/destroy/{url}', 'AdminPageController@teacher_destroy');
//
//    Route::get('/manager', 'AdminPageController@manager_index');
//    Route::get('/manager/add', 'AdminPageController@manager_add');
//    Route::post('/manager/edit/{url}', 'AdminPageController@manager_edit');
//    Route::get('/manager/destroy/{url}', 'AdminPageController@manager_destroy');
//
//    Route::resource('/add', 'AdminPageController@contact_index');
//    Route::get('/contact/edit/{url}', 'AdminPageController@contact_edit');
//    Route::get('/contact/destroy/{url}', 'AdminPageController@contact_destroy');


        Route::post('/mailto', 'Web\MailController@mailto');
        Route::get('/newsletter',  ['uses'=>'Web\MailController@index']);


        Route::get   ('/delegates','Web\AdminDelegateController@index')->name('delegate');
        Route::get   ('/delegates/create','Web\AdminDelegateController@create')->name('del.create');
        Route::post  ('/delegates', 'Web\AdminDelegateController@store')->name('del.store');
        Route::get   ('/delegates/{id}/edit', 'Web\AdminDelegateController@edit')->name('del.edit');
        Route::patch ('/delegates/{id}', 'Web\AdminDelegateController@update')->name('del.update');
        Route::get   ('/delegates/delete/{id}', 'Web\AdminDelegateController@destroy')->name('del.delete');

//        Route::resource('menus/', 'AdminDelegateController');
        Route::get   ('/menus','Web\MenuController@index')->name('menu');
        Route::get   ('/menus/create','Web\MenuController@create')->name('menu.create');
        Route::post  ('/menus', 'Web\MenuController@store')->name('menu.store');
        Route::get   ('/menus/{id}/edit', 'Web\MenuController@edit')->name('menu.edit');
        Route::patch ('/menus/{id}', 'Web\MenuController@update')->name('menu.update');
        Route::get   ('/menus/delete/{id}', 'Web\MenuController@destroy')->name('menu.delete');


        Route::get('/product/cat', 'Web\ProductCatController@index')->name('product.cat');
        Route::post('/product/cat/add', 'Web\ProductCatController@store')->name('product.cat.add');
        Route::post('/product/cat/update/{id}', 'Web\ProductCatController@update')->name('product.cat.update');

        Route::get('/product/', 'Web\ProductController@index')->name('product.index');
        Route::get('/product/add', 'Web\ProductController@create')->name('product.create');
        Route::post('/product/add', 'Web\ProductController@store')->name('product.add');
        Route::get('/product/edit/{id}', 'Web\ProductController@edit')->name('product.edit');
        Route::post('/product/update/{id}', 'Web\ProductController@update')->name('product.update');
        Route::get('/product/delete/{id}', 'Web\ProductController@destroy')->name('product.delete');
        Route::get('/sigups', 'Web\AdminSignupController@index')->name('adminsingnup.index');


    });





});
































//    Route::get('/', 'Web\HomeController@index')->name('home');
//    Route::get('/', 'PostController@index')->name('home');

//    Route::get('/intro', 'HomeController@index')->name('intro');

    Route::get('/content/page/{id}', 'HomeController@page');

    Route::post('/search', 'HomeController@search')->name('search');

    Route::get('register/activation/{url}', 'Auth\RegisterController@activateUser')->name('activation');

    Route::get('/profile/register', function () {
        return view('profile.register');
    })->name('registerComplete');


    Route::group(['prefix' => 'home'], function () {

        Auth::routes();
        Route::get('/logout', 'Auth\LoginController@logout');



        Route::get('intro/get/tags', 'TagController@getTags')->name('tags');


        Route::get('/intro', 'HomeController@index')->name('network');
        Route::get('/intro/showMore/{url}', 'PostController@showMore');
        Route::get('/intro/editPost/{url}', 'PostController@editPost');
        Route::post('/intro/storePost/{url}', 'PostController@storePost');
        Route::get('/intro/getComments/{url}/{id}', 'PostController@getComments');
        Route::post('/intro/store', 'PostController@postStore');
        Route::get('/post/ban/{id}', 'PostController@postBan');
        Route::get('/post/report/{id}', 'PostController@postReport');
        Route::get('/post/delete/{id}', 'PostController@postDelete');
        Route::get('/post/edit/{id}', 'PostController@postUpdate');
        Route::get('/post/like/{id}', 'PostController@postLike');
        Route::post('/post/share/{id}', 'PostController@postShare');
        Route::post('/intro/commentStore', 'PostController@postComment');
        Route::get('/intro/commentRemove/{id}', 'PostController@deleteComment');
        Route::get('/intro/likes/{id}', 'PostController@likeList');


        Route::get('/forum/show/{url}', 'Forum1Controller@forum');
        Route::get('/forumdata', 'Forum1Controller@forumdata');
        Route::get('/forum/showMore/{url}', 'Forum1Controller@showMore');
        Route::get('/forum/editPost/{url}', 'Forum1Controller@editPost');
        Route::post('/forum/storePost/{url}', 'Forum1Controller@storePost');
        Route::get('/forum/getComments/{url}/{id}', 'Forum1Controller@getComments');
        Route::post('/forum/store', 'Forum1Controller@postStore');
        Route::get('/forum/ban/{id}', 'Forum1Controller@postBan');
        Route::get('/forum/report/{id}', 'Forum1Controller@postReport');
        Route::get('/forum/delete/{id}', 'Forum1Controller@postDelete');
        Route::get('/forum/edit/{id}', 'Forum1Controller@postUpdate');
        Route::get('/forum/like/{id}', 'Forum1Controller@postLike');
        Route::get('/forum/share/{id}', 'Forum1Controller@postShare');
        Route::post('/forum/commentStore', 'Forum1Controller@postComment');
        Route::get('/forum/category', 'Forum1Controller@forumCat');
        Route::get('/forum/list/{url}', 'Forum1Controller@forumList');
        Route::post('/forum/make', 'Forum1Controller@forumMake');
        Route::get('/forum/destroy/{id}', 'Forum1Controller@forumDelete');
        Route::get('/forum/request/{id}', 'Forum1Controller@forumReq');
        Route::get('/forum/accept/{id}/{userId}', 'Forum1Controller@forumAccept');
        Route::get('/forum/getdataby/{id}', 'Forum1Controller@forumListGroup');
        Route::post('/forum/groupadd', 'Forum1Controller@groupMake');
        Route::post('/forum/groupedit/{id}', 'Forum1Controller@groupUpdate');
        Route::get('/forum/groupremove/{id}', 'Forum1Controller@groupDelete');


        Route::get('/admin/category', function () {
            return view('admin.category.category');
        });
        Route::get('/admin/list/2', 'AdminController@listCat2');
        Route::get('/admin/category/destroy/{id}', 'AdminController@destroyCat2');
        Route::post('/admin/category/update/{id}', 'AdminController@updateCat2');
        Route::post('/admin/category/add', 'AdminController@addCat2');


        Route::get('/admin/list/5', 'AdminController@listCat5');
        Route::get('/admin/category5/destroy/{id}', 'AdminController@destroyCat5');
        Route::post('/admin/category5/update/{id}', 'AdminController@updateCat5');
        Route::post('/admin/category5/add', 'AdminController@addCat5');

        // Route::get('/admin/category', 'AdminController@category');
        Route::get('/admin/list/3', 'AdminController@listCat3');
        Route::get('/admin/category3/destroy/{id}', 'AdminController@destroyCat3');
        Route::post('/admin/category3/update/{id}', 'AdminController@updateCat3');
        Route::post('/admin/category3/add', 'AdminController@addCat3');

        Route::get('/admin/list/4', 'AdminController@listCat4');
        Route::get('/admin/category4/destroy/{id}', 'AdminController@destroyCat4');
        Route::post('/admin/category4/update/{id}', 'AdminController@updateCat4');
        Route::post('/admin/category4/add', 'AdminController@addCat4');

        Route::get('/admin/content/manage', 'AdminController@index');
        Route::post('/admin/content/create', 'AdminController@create');
        Route::post('/admin/content/update/{id}', 'AdminController@update');
        Route::get('/admin/content/delete/{id}', 'AdminController@delete');

        Route::get('/admin/post/manage', 'AdminController@postManage');
        Route::get('/admin/post/allow/{id}', 'AdminController@postAllow');
        Route::get('/admin/post/dismiss/{id}', 'AdminController@postDismiss');
        Route::get('/admin/post/delete/{id}', 'AdminController@postDelete');

        Route::get('/admin/users', 'UserController@index');
        Route::post('/admin/user/update/{id}', 'UserController@update');
        Route::get('/admin/user/active/{id}', 'UserController@active');
        Route::get('/admin/user/ban/{id}', 'UserController@ban');
        Route::get('/admin/user/ok/{id}', 'UserController@ok');
        Route::get('/admin/user/delete/{id}', 'UserController@delete');
        Route::post('/admin/user/addForumCat/{id}', 'UserController@addForumCat');
        Route::get('/admin/user/removeForumCat/{id}/{cat}', 'UserController@removeForumCat');


        Route::get('/profile/show/{user}', 'ProfileController@show')->name('profile');
        Route::get('/profile/show/{user}/{id}', 'ProfileController@showPost')->name('post');
        Route::get('/profile/follow/{user}', 'ProfileController@follow');
        Route::get('/profile/deleteFollowing/{user}', 'ProfileController@deleteFollowing');
        Route::get('/profile/deleteFollower/{user}', 'ProfileController@deleteFollower');
        Route::get('/profile/edit', 'ProfileController@edit');
        Route::get('/profile/complete', 'ProfileController@completeRegister');
        Route::post('/profile/profileStore', 'ProfileController@profileStore');
        Route::post('/profile/profileComplete', 'ProfileController@profileComplete');

        Route::post('/profile/deleteFollower/{user}', 'ProfileController@deleteFollower');
        Route::get('/profile/deleteFollowing/{user}', 'ProfileController@deleteFollowing');

        Route::post('/profile/addEducation', 'ProfileController@addEducation');
        Route::post('/profile/editEducation/{id}', 'ProfileController@editEducation');
        Route::get('/profile/deleteEducation/{id}', 'ProfileController@deleteEducation');

        Route::post('/profile/addWork', 'ProfileController@addWork');
        Route::post('/profile/editWork/{id}', 'ProfileController@editWork');
        Route::get('/profile/deleteWork/{id}', 'ProfileController@deleteWork');

        Route::post('/profile/addArticle', 'ProfileController@addArticle');
        Route::post('/profile/editArticle/{id}', 'ProfileController@editArticle');
        Route::get('/profile/deleteArticle/{id}', 'ProfileController@deleteArticle');

        Route::post('/profile/addSkill', 'ProfileController@addSkill');
        Route::post('/profile/editSkill/{id}', 'ProfileController@editSkill');
        Route::get('/profile/deleteSkill/{id}', 'ProfileController@deleteSkill');
        Route::get('/profile/eSkill/{id}', 'ProfileController@endorseSkill');

        Route::get('/profile/endorses/{id}', 'ProfileController@endorseList');

        Route::post('/profile/editAbout/{id}', 'ProfileController@editAbout');

        Route::post('/profile/addForum', 'ProfileController@addForum');
        Route::get('/profile/deleteForum/{id}', 'ProfileController@deleteForum');


        Route::get('/file/category', 'FileController@cats');
        Route::get('/file/list/{id}', 'FileController@index');
        Route::get('/file/delete/{id}', 'FileController@delete');
        Route::post('/file/upload', 'FileController@upload')->name('upload');
        Route::post('/file/search', 'FileController@search');


        Route::get('/event/manage', 'EventController@manageList');
        Route::post('/event/add', 'EventController@add');
        Route::post('/event/edit/{id}', 'EventController@edit');
        Route::get('/event/delete/{id}', 'EventController@delete');
        Route::get('/event/list/{id}', 'EventController@index');
        Route::get('/event/category', 'EventController@cat');


        Route::get('/mail/send/{asd}', 'MailController@mailto')->name('mail');
        Route::get('/post', 'HomeController@index')->name('home');


        Route::get('/course/categories', 'CourseController@courseCat');
        Route::get('/course/list/{id}', 'CourseController@courseList');
        Route::get('/course/show/{id}', 'CourseController@show');
        Route::get('/course/media/{id}', 'CourseController@media');

        Route::get('/course/create', 'CourseController@courseCreate');
        Route::post('/course/store', 'CourseController@courseStore');

        Route::get('/course/edit/{id}', 'CourseController@edit');
        Route::post('/course/update/{id}', 'CourseController@update');
        Route::get('/course/delete/{id}', 'CourseController@delete');
        Route::get('/course/manage', 'CourseController@manage');

        Route::get('/slide/manage/{id}', 'CourseController@slideManage');
        Route::post('/slide/add/{id}', 'CourseController@slideStore');
        Route::get('/slide/remove/{id}', 'CourseController@slideRemove');

        Route::get('/podcast/manage/{id}', 'CourseController@podManage');
        Route::post('/podcast/add/{id}', 'CourseController@podStore');
        Route::get('/podcast/remove/{id}', 'CourseController@podRemove');


        Route::get('message/inbox/{id}', 'MessageController@inbox');
        Route::post('admin/message/{id}', 'MessageController@message');
        Route::post('admin/send/group', 'MessageController@notify');
        Route::get('admin/get/usernames', 'MessageController@getUsernames');


    });

