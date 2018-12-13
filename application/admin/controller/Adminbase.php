<?php
/**
 * 基类.
 * User: max
 * Date: 2018/11/8
 * Time: 9:48
 */

namespace app\admin\controller;


use think\App;
use think\Controller;
use think\facade\Session;

class Adminbase extends Controller
{
    protected $apptoken =   '';
    protected $uid  =   '';

    public function __construct(App $app = null)
    {
        parent::__construct($app);
        //token uid获取
        $this->apptoken =   $this->request->param('token');
        $this->uid  =   Session::get('uid');

    }
    //Check does't login
    public function isLogin(){
        if (Session::has('apptoken') == false && Session::has('apptoken') != $this->apptoken) {
            return ['code' => 202,'turl' => '/reglogin', 'msg' => "showReturnCode('2002');"];
        }
    }
}