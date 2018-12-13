<?php
/*
 * 根据IP获取地理信息
 * */
class GetCountry
{

    //校验IP是否合法
    public function checkIp($ip = '0.0.0.0'){
        $long = sprintf("%u",ip2long($ip));
        $ip   = $long ? array($ip, $long) : array('0.0.0.0', 0);
        return $ip[0];
    }
    /**
     * @return mixed
     */
    public function showCountry($ip){
        $url = "http://ip.taobao.com/service/getIpInfo.php?ip=".self::checkIp($ip);
        $json = json_decode(file_get_contents($url));
        //{"code":0,"data":{"ip":"211.103.222.86","country":"中国","area":"","region":"北京","city":"北京","county":"XX","isp":"鹏博士","country_id":"CN","area_id":"","region_id":"110000","city_id":"110100","county_id":"xx","isp_id":"1000143"}}
        //封装json
        /*$country = $json->{"data"}->{"country"};//国家
        $city = $json->{"data"}->{"city"};
        $country_id = $json->{"data"}->{"country_id"};*/

        return $json;

    }

}