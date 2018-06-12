<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:92:"D:\phpStudy\PHPTutorial\WWW\order_room\public/../application/admin\view\order\get_goods.html";i:1527820647;}*/ ?>
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
 
	<form class="form">	
	<table class="layui-table">
  <colgroup>
    <col width="150">
    <col width="200">
    <col>
  </colgroup>
  <thead>
    <tr>
      <th>选择</th>
      <th>ID</th>
      <th>名称</th>
      <th>描述</th>
      <th>图片</th>
      <th>库存</th>
      <th>购买数量</th>
    </tr> 
  </thead>
  <tbody>
    <?php if(is_array($goods) || $goods instanceof \think\Collection || $goods instanceof \think\Paginator): $i = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$id): $mod = ($i % 2 );++$i;?>
    <tr>
      <td><input type="checkbox" name="goods_id[]" lay-skin="primary" title="选择" value="<?php echo $id['goods_id']; ?>"></td>
      <td><?php echo $id['goods_id']; ?></td>
      <td><?php echo $id['goods_name']; ?></td>
      <td><?php echo $id['goods_desc']; ?></td>
      <td><img src="/order_room/public/uploads/goods/<?php echo $id['goods_img']; ?>"></td>
      <td><?php echo $id['goods_stock']; ?></td>
      <td><input type="text" name="num[]" style="width: 20px"></td>
    </tr>
   <?php endforeach; endif; else: echo "" ;endif; ?>
  </tbody>
</table>
    <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit="">立即提交</button>
    </div>
  </div>
</form>
    <div>
      
    </div>
	</div>
	<div>
    <script src="/order_room/public/static/admin/index/js/jquery.min.js" charset="utf-8"></script>  
		<script src="/order_room/public/static/layui/layui.all.js" charset="utf-8"></script>
	</div>
  <script type="text/javascript">
      $('.form').submit(function(){
        console.log($('.form').serialize());
        $.ajax({
          url:"<?php echo url('admin/order/save_goods_id'); ?>",
          data:$('.form').serialize(),
          type:'POST',
          dataType:'json',
          success:function(res){
              layer.msg(res.message,{icon:1});

          },
          error:function(res){
             layer.msg('选择失败',{icon:2});
          }
        })
      })
  </script>
</body>
</html>