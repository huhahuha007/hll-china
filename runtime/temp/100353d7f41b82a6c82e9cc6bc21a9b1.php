<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"D:\phpstudy\WWW\hll-china\public/../application/admin\view\banner\banner_edit.html";i:1526915762;}*/ ?>
<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <title>
            二当家的Lay1.0
        </title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" href="/hll-china/public/static/admin/index/css/x-admin.css" media="all">
    </head>
    
    <body>
        <div class="x-body">
            <form class="layui-form" enctype="multipart/form-data" method="post" action="<?php echo url('update'); ?>">
                    <div class="layui-form-item">
                        <label for="link" class="layui-form-label">
                            <span class="x-red">*</span>轮播图
                        </label>
                        <div class="layui-input-inline">
                            <div class="site-demo-upbar">
                                <input type="file" name="banner_img"  id="test">
                            </div>
                        </div>
                    </div>
                <div class="layui-form-item">
                    <label for="link" class="layui-form-label">
                        <span class="x-red">*</span>名称
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="link" name="banner_title"  value="<?php echo $list['banner_title']; ?>" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="desc" class="layui-form-label">
                        <span class="x-red">*</span>地址
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="desc" name="banner_url"  value="<?php echo $list['banner_url']; ?>" class="layui-input">
                    </div>
                </div>
                <input type="hidden" name="banner_id" value="<?php echo $list['banner_id']; ?>">
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    <button  class="layui-btn" lay-filter="add" lay-submit="" type="submit">
                        增加
                    </button>
                </div>
            </form>
        </div>
        <script src="/hll-china/public/static/layui/layui.all.js" charset="utf-8"></script>
        <script src="/hll-china/public/static/admin/index/js/jquery.min.js" charset="utf-8"></script>

    </body>

</html>