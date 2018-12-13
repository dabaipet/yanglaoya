<?php
/*
 * app.php已设置完全强制使用路由解析 没有设定的网址路由 全部报错
 * 参考手册设置
 * https://www.kancloud.cn/manual/thinkphp5_1/353962
 * 提醒：线上强制 SLL 证书访问（https)
 * */
use think\facade\Route;

// 批量添加
Route::pattern([
    'phone' => '\d+',
    'code'   => '\d+',
]);


Route::domain('www', 'index');
Route::domain('manage', 'admin');
Route::miss('index/Error/index'); //404页面