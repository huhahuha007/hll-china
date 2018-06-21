<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"D:\phpstudy\WWW\hll-china\public/../application/admin\view\banner\add_banner.html";i:1527649249;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>layui</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/hll-china/public/static/admin/index/css/x-admin.css"  media="all">
    <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
</head>
<body>



<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
    <legend>添加广告</legend>
</fieldset>

<form class="layui-form" enctype="multipart/form-data" action="<?php echo url('admin/banner/save_banner'); ?>" method="post" id="form-add_banner">
    <div class="layui-form-item">
        <label class="layui-form-label">广告名称</label>
        <div class="layui-input-block">
            <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="输入广告名称" class="layui-input" style="width: 290px;">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">广告地址</label>
        <div class="layui-input-block">
            <input type="text" name="url" lay-verify="title" autocomplete="off" placeholder="输入广告地址" class="layui-input" style="width: 290px;">
        </div>
    </div>
        <input type="file" name="img"  id="test_img" style="margin-left: 100px;" multiple/>
       <!--<button type="input" class="layui-btn" name="img" id="test_img">上传图片</button>-->
        <div class="layui-upload-list">
            <img class="layui-upload-img" id="demo1">
            <p id="demoText"></p>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <input class="layui-btn" type="submit" value="提交">
        </div>
    </div>
</form>
<script src="/hll-china/public/static/layui/layui.all.js" charset="utf-8"></script>
<script src="/hll-china/public/static/admin/index/js/jquery.min.js" charset="utf-8"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
<script>

</script>

</body>
</html>