<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"D:\phpstudy\WWW\hll-china\public/../application/admin\view\goods\goods_category.html";i:1529659753;}*/ ?>
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
  <style type="text/css">
    .page{
      width: 100%;
      height: 30px;
    }
     .pagination{
      width: 100%;
      height: 30px;

    }
   .page .pagination li{
       width: 100px;
       height: 30px;
       border: 1px #e6e6e6 solid;
       text-align: center;
       padding-top: 10px;
       float: left;
    }
  </style>
</head>
<body>

             
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
  <legend>分类列表</legend>
</fieldset>
 <div class="site-demo-button" style="margin-bottom: 0;">
  <a href="<?php echo url('admin/goods/add_category'); ?>"><button class="layui-btn site-demo-active" data-type="tabAdd">新增产品分类</button></a>
  
</div>
<div class="layui-form">
  <table class="layui-table">
    <colgroup>
      <col width="150">
      <col width="150">
      <col width="200">
      <col width="200">
    </colgroup>
    <thead>
      <tr>
        <th>id</th>
        <th>分类名称</th>
        <th>父分类</th>
        <td>操作</td>
      </tr> 
    </thead>
    <tbody>
      <?php if(is_array($category_list) || $category_list instanceof \think\Collection || $category_list instanceof \think\Paginator): $i = 0; $__LIST__ = $category_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$id): $mod = ($i % 2 );++$i;?>
      <tr>
        <td><?php echo $id['type_id']; ?></td>
        <td><?php echo $id['type_name']; ?></td>
        <td><?php echo $id['parent_id']; ?></td> 
        <td>
          <a href="<?php echo url('admin/goods/edit_category',array('type_id'=>$id['type_id'])); ?>" class="layui-btn">编辑</a>
          <a href="<?php echo url('admin/goods/delete_category',array('type_id'=>$id['type_id'])); ?>" class="layui-btn">删除</a>
        </td> 
      </tr>
     <?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
  </table>
</div>
<div class="page">
  <?php echo $category_list->render(); ?>  
</div>
       

 
<script src="/hll-china/public/static/admin/index/js/jquery.min.js" charset="utf-8"></script>         
<script src="/hll-china/public/static/layui/layui.all.js" charset="utf-8"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
<script>
 
</script>

</body>
</html>