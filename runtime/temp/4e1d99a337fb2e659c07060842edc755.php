<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"D:\phpstudy\WWW\hll-china\public/../application/admin\view\goods\edit_category.html";i:1528250114;}*/ ?>
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
</head>
<body>
          

              
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
  <legend>分类添加</legend>
</fieldset>
 
<form class="layui-form" action="<?php echo url('admin/goods/save_edit_category'); ?>" method="post">
  <div class="layui-form-item" style="width: 600px;">
    <label class="layui-form-label">分类名称</label>
    <div class="layui-input-block">
      <input type="hidden" name="type_id" value="<?php echo $category_info['type_id']; ?>">
      <input type="text" name="type_name" lay-verify="title" autocomplete="off" placeholder="请输入标题" value="<?php echo $category_info['type_name']; ?>" class="layui-input">
    </div>
  </div>
 
  
  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
  </div>
</form>
 

          
<script src="/hll-china/public/static/admin/index/js/jquery.min.js" charset="utf-8"></script>         
<script src="/hll-china/public/static/layui/layui.all.js" charset="utf-8"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
<script>

</script>

</body>
</html>