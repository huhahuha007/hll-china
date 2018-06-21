<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"D:\phpstudy\WWW\hll-china\public/../application/admin\view\goods\goods_list.html";i:1526915762;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>layui</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <link rel="stylesheet" href="/hll-china/public/static/layui/css/layui.css"  media="all">
  <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
    <style type="">
      /*分页*/
.Pagination a:hover,.current{background-color: #f54281;border: 1px solid #f54281;color: #ffffff; }
.Pagination{float: left;height: auto;height: 45px; line-height: 20px;margin-right: 15px;_margin-right: 5px; color:#565656;margin-top: 10px;_margin-top: 20px; clear:both;}
.Pagination a,.Pagination span{ font-size: 14px;text-decoration: none;display: block;float: left;color: #565656;border: 1px solid #ccc;height: 34px;line-height: 34px;margin: 0 2px;width: 34px;text-align: center;}
.pagination li{
       
       float: left;
    }
  </style>
</head>
<body>
  
             
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
  <legend>商品列表</legend>
</fieldset>
 
<div class="layui-form">
  <table class="layui-table">
    <colgroup>
      <col width="10">
      <col width="200">
      <col width="200">
      <col width="200">
      <col width="20">
      <col width="20">
      <col width="20">
      <col width="100">
      <col width="100">
      <col width="200">
      <col width="150">
    </colgroup>
    <thead>
      <tr>
        <th>ID</th>
        <th>产品名称</th>
        <th>产品描述</th>
        <th>产品图片</th>
        <th>商城价</th>
        <th>市场价</th>
        <th>库存</th>
        <th>是否热卖</th>
        <th>是否最新</th>
        <th>是否推荐</th>
        <th>上下架</th>
        <th>操作</th>
      </tr> 
    </thead>
    <tbody>
      <?php if(is_array($goods_list) || $goods_list instanceof \think\Collection || $goods_list instanceof \think\Paginator): $i = 0; $__LIST__ = $goods_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$id): $mod = ($i % 2 );++$i;?>
      <tr>
        <td><?php echo $id['goods_id']; ?></td>
        <td><?php echo $id['goods_name']; ?></td>
        <td><?php echo $id['goods_desc']; ?></td>
        <td><img src="/hll-china/public/uploads/goods/<?php echo $id['goods_img']; ?>" style="height: 50px; height: 50px"></td>
        <td><?php echo $id['shop_price']; ?></td>
        <td><?php echo $id['market_price']; ?></td>
        <td><?php echo $id['goods_stock']; ?></td>
        <td onclick="is_hot(<?php echo $id['goods_id']; ?>,<?php echo $id['is_hot']; ?>)"><input type="checkbox" name="is_hot" value="<?php echo $id['is_hot']; ?>" lay-skin="switch"  lay-text="ON|OFF" <?php echo $id['is_hot']==1?'checked':''; ?>></td>
        <td onclick="is_new(<?php echo $id['goods_id']; ?>,<?php echo $id['is_new']; ?>)"><input type="checkbox" name="is_new" value="<?php echo $id['is_new']; ?>" lay-skin="switch"  lay-text="ON|OFF" <?php echo $id['is_new']==1?'checked':''; ?>></td>
        <td onclick="is_elite(<?php echo $id['goods_id']; ?>,<?php echo $id['is_elite']; ?>)"><input type="checkbox" name="is_elite" value="<?php echo $id['is_elite']; ?>" lay-skin="switch"  lay-text="ON|OFF" <?php echo $id['is_elite']==1?'checked':''; ?>></td>
        <td onclick="is_sale(<?php echo $id['goods_id']; ?>,<?php echo $id['is_sale']; ?>)"><input type="checkbox" name="is_sale" value="<?php echo $id['is_sale']; ?>" lay-skin="switch"  lay-text="ON|OFF" <?php echo $id['is_sale']==1?'checked':''; ?>></td>
        <td><a href="<?php echo url('admin/goods/edit_goods',array('goods_id'=>$id['goods_id'])); ?>" class="layui-btn">编辑</a>
          <a href="<?php echo url('admin/goods/delete_goods',array('goods_id'=>$id['goods_id'])); ?>" class="layui-btn">删除</a></td>
      </tr>
     <?php endforeach; endif; else: echo "" ;endif; ?> 
    </tbody>
  </table>
</div>
         
<div>
  <div class="Pagination"><?php echo $goods_list->render(); ?></div>
</div>
 
          
<script src="/hll-china/public/static/admin/index/js/jquery.min.js" charset="utf-8"></script>         
<script src="/hll-china/public/static/layui/layui.all.js" charset="utf-8"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
<script>
  //是否热卖
    function is_hot(id,is_hot){
    
    $.post("<?php echo url('admin/goods/is_hot'); ?>", { id: id,is_hot:is_hot }, function (text, status) { 
      if(text.status==1){
          layer.msg(text.msg, {icon: 1},function(index){
            window.location.reload();
          });
      }else if(text.status==0){
          layer.msg(text.msg, {icon: 2},function(index){
            window.location.reload();
          });
      } 
    });
}  
    
    //是否最新
    function is_new(id,is_new){
    
    $.post("<?php echo url('admin/goods/is_new'); ?>", { id: id,is_new:is_new }, function (text, status) { 
      if(text.status==1){
          layer.msg(text.msg, {icon: 1},function(index){
            window.location.reload();
          });
      }else if(text.status==0){
          layer.msg(text.msg, {icon: 2},function(index){
            window.location.reload();
          });
      } 
    });
}   

      //是否推荐
     function is_elite(id,is_elite){
    
    $.post("<?php echo url('admin/goods/is_elite'); ?>", { id: id,is_elite:is_elite }, function (text, status) { 
      if(text.status==1){
          layer.msg(text.msg, {icon: 1},function(index){
            window.location.reload();
          });
      }else if(text.status==0){
          layer.msg(text.msg, {icon: 2},function(index){
            window.location.reload();
          });
      } 
    });
}  

      //是否上架
     function is_sale(id,is_sale){
    
    $.post("<?php echo url('admin/goods/is_sale'); ?>", { id: id,is_sale:is_sale }, function (text, status) { 
      if(text.status==1){
          layer.msg(text.msg, {icon: 1},function(index){
            window.location.reload();
          });
      }else if(text.status==0){
          layer.msg(text.msg, {icon: 2},function(index){
            window.location.reload();
          });
      } 
    });
}  
</script>

</body>
</html>