<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"D:\phpstudy\WWW\hll-china\public/../application/admin\view\article\add_category.html";i:1528878716;}*/ ?>
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
 
<form class="layui-form" action="<?php echo url('admin/article/save_category'); ?>" method="post">
  <div class="layui-form-item" style="width: 600px;">
    <label class="layui-form-label">分类名称</label>
    <div class="layui-input-block">
      <input type="text" name="type_name" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input">
    </div>
  </div>
 
  <div class="layui-form-item" style="width: 600px;">
    <label class="layui-form-label">上级分类</label>
    <div class="layui-input-block">
      <select name="parent_id" lay-filter="aihao">
        <option  selected="">顶级分类</option>
        <?php if(is_array($category_list) || $category_list instanceof \think\Collection || $category_list instanceof \think\Paginator): $i = 0; $__LIST__ = $category_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$id): $mod = ($i % 2 );++$i;?>
        <option value="<?php echo $id['type_id']; ?>" ><?php echo $id['type_name']; ?></option>
        <?php endforeach; endif; else: echo "" ;endif; ?>
      </select>
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