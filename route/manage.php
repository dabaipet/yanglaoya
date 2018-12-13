<?php
/**
 * 后台路由.
 * User: max
 * Date: 2018/11/8
 * Time: 17:21
 */
use think\facade\Route;

/*
 * 后台路由设置
 * */

Route::domain('manage', function () {
    Route::rule('/', 'index');
    Route::rule('read', 'index/read');
    //骑手
    Route::rule('rider', 'rider/index');
    Route::rule('rider-set', 'rider/set');
    Route::rule('rider-coupon', 'rider/coupon');
    Route::rule('rider-payment', 'rider/payment');
    //物业
    Route::rule('property', 'property/index');
    Route::rule('property-postal', 'property/postal');
    Route::rule('property-set', 'property/set');
    //个人
    Route::rule('user', 'user/index');
    Route::rule('user-postal', 'user/postal');
    Route::rule('user-set', 'user/set');
    Route::rule('user-deposit', 'user/deposit');
    //财务
    Route::rule('finance', 'finance/index');
    Route::rule('finance-postal', 'finance/postal');
    Route::rule('finance-deposit', 'finance/deposit');
    //数据
    Route::rule('information-property-s', 'information/property');
    Route::rule('information-rider-s', 'information/rider');
    Route::rule('information-user-s', 'information/user');
    //系统
    Route::rule('system-set', 'system/set');
    Route::rule('system-authority', 'system/authority');
    Route::rule('system-timing', 'system/timing');
    Route::rule('system-sms', 'system/sms');
    Route::rule('system-msgsend', 'system/msgsend');
});