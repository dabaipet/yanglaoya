<?php
/**
 * 物业管理.
 * User: max
 * Date: 2018/11/23
 * Time: 17:26
 */

namespace app\admin\controller;


class Property extends Adminbase
{
    public function index(){
        $this->assign('name', 'thinkphp');
        return $this->fetch();
    }
    public function postal(){
        $this->assign('name', 'thinkphp');
        return $this->fetch();
    }
    public function set(){
        $this->assign('name', 'thinkphp');
        return $this->fetch();
    }

}