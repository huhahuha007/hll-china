<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:92:"D:\phpStudy\PHPTutorial\WWW\order_room\public/../application/admin\view\order\add_order.html";i:1527819532;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> -->
	<link rel="stylesheet" href="/order_room/public/static/layui/css/layui.css" media="all">
</head>
<body>
	<div>
		<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
             <legend>添加</legend>
    </fieldset>
 
	<div>
    <div class="layui-form-item">
    <label class="layui-form-label">选择</label>
    <div class="layui-input-inline">
     <button class="layui-btn" onclick="getGoods()" >选择商品</button>
    </div>
  </div>
    
      
    
    <hr>
    <form class="layui-form" action="<?php echo url('admin/order/save_order'); ?>" method="post">
    
		<div class="layui-form-item">
    <label class="layui-form-label">姓名</label>
    <div class="layui-input-inline">
      <input type="text" name="name" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">联系电话</label>
    <div class="layui-input-inline">
      <input type="text" name="phone" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
    </div>
  </div>	
   <div class="layui-form-item">
    <label class="layui-form-label">性别</label>
    <div class="layui-input-block">
      <input type="radio" name="sex" value="1" title="男" checked="">
      <input type="radio" name="sex" value="0" title="女">
      
    </div>
  </div>
  <div class="layui-form-item">
    <div class="layui-inline">
      <label class="layui-form-label">入住时间</label>
      <div class="layui-input-block">
        <input type="text" name="start_time" id="date" autocomplete="off" class="layui-input">
      </div>
    </div>   
	<div class="layui-form-item">
    <div class="layui-inline">
      <label class="layui-form-label">退房时间</label>
      <div class="layui-input-block">
        <input type="text" name="end_time" id="date1" autocomplete="off" class="layui-input">
      </div>
    </div>
    <div>
        <input class="layui-btn" type="submit"   style="margin: 60px" value="立即提交">
     
	</div>
  </div>
</form>
	<div>

		<script src="/order_room/public/static/admin/index/js/jquery.min.js" charset="utf-8"></script>         
    <script src="/order_room/public/static/layui/layui.all.js" charset="utf-8"></script>
    <script type="text/javascript">
      
         //日期
        layui.use(['form', 'layedit', 'laydate'], function(){
        var form = layui.form
        ,layer = layui.layer
        ,layedit = layui.layedit
        ,laydate = layui.laydate;
        
        //日期
        laydate.render({
          elem: '#date'
        });
        laydate.render({
          elem: '#date1'
        });
      });
        //选择商品弹框
      function getGoods(){
          layer.open({
          type: 2, 
          area:['1200px','600px'],
          content: "<?php echo url('admin/order/get_goods'); ?>"
          });
        }
        
    </script>
	</div>
</body>
</html>