<?php
namespace app\admin\controller;
/**
 * 后台.
 * User: whp
 * Date: 2018/11/8
 * Time: 9:47
 */

class Index extends Adminbase
{
    public function index(){

        $this->assign('name', 'thinkphp');
        return $this->fetch();
    }
    public function read(){
        echo "!11";
    }

}