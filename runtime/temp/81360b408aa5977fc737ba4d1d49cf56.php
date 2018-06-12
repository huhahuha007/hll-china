<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:93:"D:\phpStudy\PHPTutorial\WWW\order_room\public/../application/admin\view\order\show_goods.html";i:1527841170;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="/order_room/public/static/layui/css/layui.css" media="all">
</head>
<body>
	<div>
		<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
             <legend>商品列表</legend>
    </fieldset>
    <div class="layui-form">
<table class="layui-table" lay-skin="line">
  <colgroup>
    <col width="150">
    <col width="150">
    <col width="200">
    <col>
  </colgroup>
  <thead>
    <tr>
      <th>名称</th>
      <th>图片</th>
      
    </tr> 
  </thead>
  <tbody>
    <?php if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$id): $mod = ($i % 2 );++$i;?>
    <tr>
      <td><?php echo $id['goods_name']; ?></td>
       <td><img src="/order_room/public/uploads/goods/<?php echo $id['goods_img']; ?>" style="height: 50px; height: 50px"></td>
    </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
  </tbody>
</table>  
	</div>
    <div>
      
    </div>
	</div>
	<div>
    <script src="/order_room/public/static/admin/index/js/jquery.min.js" charset="utf-8"></script>  
		<script src="/order_room/public/static/layui/layui.all.js" charset="utf-8"></script>
	</div>
  
</body>
</html>