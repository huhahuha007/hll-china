<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"D:\phpstudy\WWW\hll-china\public/../application/admin\view\admin\index.html";i:1529892891;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>
            后台管理
        </title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" href="/hll-china/public/static/admin/index/css/x-admin.css" media="all">
    </head>
    <body>
        <div class="layui-layout layui-layout-admin">
            <div class="layui-header header header-demo">
                <div class="layui-main">
                    <a class="logo" href="#" target="_blank">
                        后台管理系统
                    </a>
                    <ul class="layui-nav" lay-filter="">
                      <li class="layui-nav-item"><img src="/hll-china/public/static/admin/index/images/logo.png" class="layui-circle" style="border: 2px solid #A9B7B7;" width="35px" alt=""></li>
                      <li class="layui-nav-item">
                        <a href="javascript:;"><?php echo $admin; ?></a>
                        <dl class="layui-nav-child"> <!-- 二级菜单 -->
                          <dd><a href="<?php echo url('Admin/Login/sign_out'); ?>">退出</a></dd>
                        </dl>
                      </li>
                      <!-- <li class="layui-nav-item">
                        <a href="" title="消息">
                            <i class="layui-icon" style="top: 1px;">&#xe63a;</i>
                        </a>
                        </li> -->
                      <li class="layui-nav-item x-index"><a href="/">前台首页</a></li>
                    </ul>
                </div>
            </div>
            <div class="layui-side layui-bg-black x-side">
                <div class="layui-side-scroll">
                    <ul class="layui-nav layui-nav-tree site-demo-nav" lay-filter="side">
                        <li class="layui-nav-item">
                            <a class="javascript:;" href="javascript:;">
                                <i class="layui-icon" style="top: 3px;">&#xe607;</i><cite>关于我们</cite>
                            </a>
                            <dl class="layui-nav-child">
                                <dd class="">
                                <dd class="">
                                    <a href="javascript:;" _href="<?php echo url('admin/article/article_list1'); ?>">
                                        <cite>公司文章</cite>
                                    </a>
                                </dd>
                                </dd>
                                <dd class="">
                                <dd class="">
                                    <a href="javascript:;" _href="<?php echo url('admin/article/add_article1'); ?>">
                                        <cite>添加文章</cite>
                                    </a>
                                </dd>
                                </dd>
                                <dd class="">
                                <dd class="">
                                    <a href="javascript:;" _href="<?php echo url('admin/article/article_category1'); ?>">
                                        <cite>文章分类</cite>
                                    </a>
                                </dd>
                                </dd>
                                <dl class="layui-nav-child">
                                    <dd class="">
                                    <dd class="">
                                        <a href="javascript:;" _href="<?php echo url('admin/honor/honor_list'); ?>">
                                            <cite>荣誉资质</cite>
                                        </a>
                                    </dd>
                                    </dd>
                                </dl>
                            </dl>
                        </li>
                        <li class="layui-nav-item">
                            <a class="javascript:;" href="javascript:;">
                                <i class="layui-icon" style="top: 3px;">&#xe607;</i><cite>新闻管理</cite>
                            </a>
                            <dl class="layui-nav-child">
                                <dd class="">
                                    <dd class="">
                                        <a href="javascript:;" _href="<?php echo url('admin/news/news_list'); ?>">
                                            <cite>新闻列表</cite>
                                        </a>
                                    </dd>
                                </dd>
                                <dd class="">
                                    <dd class="">
                                        <a href="javascript:;" _href="<?php echo url('admin/news/add_news'); ?>">
                                            <cite>添加新闻</cite>
                                        </a>
                                    </dd>
                                </dd>
                                <dd class="">
                                    <dd class="">
                                        <a href="javascript:;" _href="<?php echo url('admin/news/news_category'); ?>">
                                            <cite>新闻分类</cite>
                                        </a>
                                    </dd>
                                </dd>
                            </dl>
                        </li>
                        <li class="layui-nav-item">
                            <a class="javascript:;" href="javascript:;">
                                <i class="layui-icon" style="top: 3px;">&#xe62d;</i><cite>产品管理</cite>
                            </a>
                            <dl class="layui-nav-child">
                                <dd class="">
                                    <dd class="">
                                        <a href="javascript:;" _href="<?php echo url('admin/goods/goods_list'); ?>">
                                            <cite>产品列表</cite>
                                        </a>
                                    </dd>
                                </dd>
                                <dd class="">
                                    <dd class="">
                                        <a href="javascript:;" _href="<?php echo url('admin/goods/add_goods'); ?>">
                                            <cite>添加产品</cite>
                                        </a>
                                    </dd>
                                </dd>
                                <dd class="">
                                    <dd class="">
                                        <a href="javascript:;" _href="<?php echo url('admin/goods/goods_category'); ?>">
                                            <cite>产品分类</cite>
                                        </a>
                                    </dd>
                                </dd>
                            </dl>
                        </li>
                        <li class="layui-nav-item">
                            <a class="javascript:;" href="javascript:;">
                                <i class="layui-icon" style="top: 3px;">&#xe634;</i><cite>轮播管理</cite>
                            </a>
                            <dl class="layui-nav-child">
                                <dd class="">
                                    <dd class="">
                                        <a href="javascript:;" _href="<?php echo url('admin/banner/banner_list'); ?>">
                                            <cite>轮播列表</cite>
                                        </a>
                                    </dd>
                                    <dd class="">
                                        <a href="javascript:;" _href="<?php echo url('admin/banner/add_banner'); ?>">
                                            <cite>添加轮播图</cite>
                                        </a>
                                    </dd>
                                </dd>
                            </dl>
                        </li>
                        <li class="layui-nav-item">
                            <a class="javascript:;" href="javascript:;">
                                <i class="layui-icon" style="top: 3px;">&#xe642;</i><cite>订单管理</cite>
                            </a>
                            <dl class="layui-nav-child">
                                <dd class="">
                                    <dd class="">
                                        <a href="javascript:;" _href="<?php echo url('admin/order/order_list'); ?>">
                                            <cite>订单列表</cite>
                                        </a>
                                    </dd>
                                </dd>
                            </dl>
                        </li>
                        <li class="layui-nav-item">
                            <a class="javascript:;" href="javascript:;">
                                <i class="layui-icon" style="top: 3px;">&#xe614;</i><cite>系统设置</cite>
                            </a>
                            <dl class="layui-nav-child">
                                <dd class="">
                                    <a href="javascript:;" _href="<?php echo url('admin/admin/admin_edit'); ?>">
                                        <cite>更改密码</cite>
                                    </a>
                                </dd>
                                <dd class="">
                                    <a href="javascript:;" _href="<?php echo url('admin/admin/phone'); ?>">
                                        <cite>联系电话</cite>
                                    </a>
                                </dd>
                                <dd class="">
                                    <a href="javascript:;" _href="<?php echo url('admin/admin/del_cache'); ?>">
                                        <cite>清理缓存</cite>
                                    </a>
                                </dd>
                                <dd class="">
                                    <a href="javascript:;" _href="<?php echo url('admin/admin/app_config'); ?>">
                                        <cite>小程序配置</cite>
                                    </a>
                                </dd>
                            </dl>
                        </li>
                        
                    </ul>
                </div>

            </div>
            <div class="layui-tab layui-tab-card site-demo-title x-main" lay-filter="x-tab" lay-allowclose="true">
                <div class="x-slide_left"></div>
                <ul class="layui-tab-title">
                    <li class="layui-this">
                        我的桌面
                        <i class="layui-icon layui-unselect layui-tab-close">ဆ</i>
                    </li>
                </ul>
                <div class="layui-tab-content site-demo site-demo-body">
                    <div class="layui-tab-item layui-show">
                        <iframe frameborder="0" src="<?php echo url('admin/welcome'); ?>" class="x-iframe"></iframe>
                    </div>
                </div>
            </div>
            <div class="site-mobile-shade">
            </div>
        </div>
        <script src="/hll-china/public/static/admin/index/lib/layui/layui.js" charset="utf-8"></script>
        <script src="/hll-china/public/static/admin/index/js/x-admin.js"></script>
        <script>
        var _hmt = _hmt || [];
        (function() {
          var hm = document.createElement("script");
          hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
          var s = document.getElementsByTagName("script")[0]; 
          s.parentNode.insertBefore(hm, s);
        })();
        </script>
    </body>
</html>