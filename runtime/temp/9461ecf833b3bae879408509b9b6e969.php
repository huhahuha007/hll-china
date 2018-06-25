<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"D:\phpstudy\WWW\hll-china\public/../application/admin\view\honor\add_honor.html";i:1529894577;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> -->
	<link rel="stylesheet" href="/hll-china/public/static/layui/css/layui.css" media="all">
</head>
<body>
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
    <legend>添加荣誉资质</legend>
</fieldset>

<form class="layui-form" enctype="multipart/form-data" action="<?php echo url('admin/honor/save_honor'); ?>" method="post" >
    <div class="layui-form-item">
        <label class="layui-form-label">资质名称</label>
        <div class="layui-input-block">
            <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input">
        </div>
    </div>



    <!-- <div class="layui-form-item" style="width:200px;">
      <label class="layui-form-label">文章分类</label>
      <div class="layui-input-block">
        <select name="sort_id" lay-verify="required">
          <option value=""></option>
          <option value="0">分类1</option>
          <option value="1">分类2</option>
          <option value="2">广州</option>
          <option value="3">深圳</option>
          <option value="4">分类</option>
        </select>
      </div>
    </div> -->



    <div class="layui-form-item">
        <!-- <div class="layui-inline">
          <label class="layui-form-label">日期选择</label>
          <div class="layui-input-block">
            <input type="text" name="add_time" id="date1" autocomplete="off" class="layui-input">
          </div>
        </div> -->

        <div class="layui-upload">
            <label class="layui-form-label">资质图片</label>
            <div class="layui-input-block">
                <input type="file" name="img"  id="img" multiple/>
            </div>
        </div>




        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">资质详情</label>
            <div class="layui-input-block">
                <textarea placeholder="请输入内容" class="layui-textarea" name="content"></textarea>
            </div>
        </div>
        <!--<div class="layui-form-item layui-form-text">
          <label class="layui-form-label">编辑器</label>
          <div class="layui-input-block">
            <textarea class="layui-textarea layui-hide" name="content" lay-verify="content" id="LAY_demo_editor"></textarea>
          </div>
        </div>-->
        <div class="layui-form-item">
            <div class="layui-input-block">
                <input class="layui-btn" type="submit" value="提交" lay-filter="demo1">
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
</form>
	<div>

		<script src="/hll-china/public/static/admin/index/js/jquery.min.js" charset="utf-8"></script>         
    <script src="/hll-china/public/static/layui/layui.all.js" charset="utf-8"></script>
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