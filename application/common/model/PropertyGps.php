<?php
/**
 * 物业存放地址信息GPS.
 * User: whp
 * Date: 2018/10/29
 * Time: 16:43
 * @A
 * @funcation   returnSquarePoint
 * @funcation   getDistance
 */
namespace app\common\model;

use think\Model;

class PropertyGps extends Model
{
    protected  $table=  'ls_property_gps';

    /* 计算当前位置范围
     * @param   $long 经度
     * @param   $lat 纬度
     * @param   $distance 周边半径（3Km）
     * */
    public function returnSquarePoint($long, $lat, $distance = 3)
    {
        $dlong = 2 * asin(sin($distance / (2 * 6371)) / cos(deg2rad($lat)));
        $dlong = rad2deg($dlong);
        $dlat = $distance / 6371;
        $dlat = rad2deg($dlat);
        return array(
            'left-top' => array('lat' => $lat + $dlat, 'long' => $long - $dlong),
            'right-top' => array('lat' => $lat + $dlat, 'long' => $long + $dlong),
            'left-bottom' => array('lat' => $lat - $dlat, 'long' => $long - $dlong),
            'right-bottom' => array('lat' => $lat - $dlat, 'long' => $long + $dlong));
    }
    /*
     *  骑手当前所在位置经纬度
     * @param   $longitude  经度
     * @param   $latitude   纬度
     * @return  object  根据骑手经纬度返回周围存放点坐标和名称
     * */
    public function getDistance($longitude, $latitude)
    {
        $array = $this->returnSquarePoint($longitude, $latitude);
        return $this->where('long',['<=',$array['left-top']['long']],['>=',$array['right-bottom']['long']],'and')
            ->where('lat',['>=',$array['right-bottom']['lat']],['<=',$array['left-top']['lat']],'and')
            ->field('long,lat,name')
            ->order('id', 'desc')
            ->select();
    }

}