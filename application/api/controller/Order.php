<?php
namespace app\api\controller;

use think\Db;
use think\Controller;
class Order extends Base{
    //获取小程序的订单信息
	public function request_order(){
		$order = input('post.');
		file_put_contents("../ttt.txt", json_encode($order));
		if(count($order)>2){
			return json_encode(array('status' =>1 ,'message'=>'成功' ));
		}else{
			return json_encode(array('status' =>0 ,'message'=>'失败' ));
		}

		
		
	}
	public function getopenid(){
        $code = input('post.');
        if(empty($code)) return array('status'=>0,'info'=>'缺少js_code');
        $appid = 'wx323b7d391b29c1c8';
        $appsecret = '8fb81fef06fa70ae77309f9a141a9e46';
        $curl = 'https://api.weixin.qq.com/sns/jscode2session?appid=%s&secret=%s&js_code=%s&grant_type=authorization_code';
        $curl = sprintf($curl,$appid,$appsecret,$js_code);
        $result = request($curl);
        return array('status'=>1,'info'=>json_decode($result,true));
  }
  //统一下单支付
  public function payfee(){
  	    require VENDOR_PATH.'weixinpay/weixinPay.php';
  	    $appid='';  
		$openid= $_GET['id'];  
		$mch_id='';  
		$key='';  
		$out_trade_no = $mch_id. time();  
		$total_fee = $_GET['fee'];  
		if(empty($total_fee)) //押金  
		{  
		    $body = "充值押金";  
		    $total_fee = floatval(99*100);  
		}  
		 else {  
		     $body = "充值余额";  
		     $total_fee = floatval($total_fee*100);  
		 }  
		$weixinpay = new WeixinPay($appid,$openid,$mch_id,$key,$out_trade_no,$body,$total_fee);  
		$return=$weixinpay->pay();  
		  
		echo json_encode($return);  


  }
  //回调url
  public function notify(){
  	    	$postXml = $GLOBALS["HTTP_RAW_POST_DATA"]; //接收微信参数  
			if (empty($postXml)) {  
			    return false;  
			}  
			  
			//将xml格式转换成数组  
			function xmlToArray($xml) {  
			  
			    //禁止引用外部xml实体   
			    libxml_disable_entity_loader(true);  
			  
			    $xmlstring = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA);  
			  
			    $val = json_decode(json_encode($xmlstring), true);  
			  
			    return $val;  
			}  
			  
			$attr = xmlToArray($postXml);  
			  
			$total_fee = $attr[total_fee];  
			$open_id = $attr[openid];  
			$out_trade_no = $attr[out_trade_no];  
			$time = $attr[time_end];  
  }
	
}