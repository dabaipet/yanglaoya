<?php
/*
 * API全局基类
 * */

namespace app\api\controller;


use think\App;
use think\Controller;
use think\facade\Session;
use think\facade\Cache;

class Apibase extends Controller
{

    protected $token = null;//全局接受token
    protected $uid = null;//全局uid
    protected $identity; //身份标识
    protected $userSession;//用户session

    public function __construct(App $app = null)
    {
        parent::__construct($app);
        $this->token = $this->request->param('token');
        $this->uid = $this->request->param('uid');
        $this->userSession = json_decode(Session::get('user' . $this->uid));
        $this->identity = empty(Session::get('identity' . $this->uid)) ? 0 : Session::get('identity' . $this->uid);
        self::isLogin();
    }

    //Check does't login
    public function isLogin()
    {
        //不能为空
        $msg = $this->validate(['uid' => $this->uid, 'apptoken' => $this->token], 'app\api\validate\User.action');
        if (true !== $msg) {
            exit(json_encode(['code' => '202', 'msg' => $msg]));
        }
        //判断Session 值是否存在
        if (Session::has('user' . $this->uid) == false) {
            exit(json_encode(['code' => 202, 'turl' => url('/signin'), 'msg' => showReturnCode('2001')]));
        }
        //检验数据

        if ($this->userSession->uid != $this->uid || $this->userSession->token != $this->token) {
            exit(json_encode(['code' => 202, 'turl' => url('/signin'), 'msg' => showReturnCode('2006')]));
        }
    }
}