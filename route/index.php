<?php
/**
 * API 路由.
 * User: max
 * Date: 2018/11/8
 * Time: 17:21
 */
use think\facade\Route;

Route::bind('api');
Route::domain('api', function () {
    //首页
    Route::rule('/', 'index');
    Route::rule('location', 'index/location','GET|POST');
    //注册登录
    Route::rule('signin', 'signin/index','GET|POST');
    Route::rule('signin-choice', 'signin/choice','GET|POST');
    //用户信息
    Route::rule('user', 'user/index','GET|POST');
    Route::rule('user-info', 'user/info','GET|POST');
    Route::rule('user-choice', 'user/choice','GET|POST');
    Route::get(':c/:a', 'api/:c/:a');
    //Route::rule('worker', 'worker/onMessage','GET|POST');
});