<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"D:\phpstudy\WWW\hll-china\public/../application/admin\view\admin\admin_edit.html";i:1528335242;}*/ ?>
<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <title>
            更改
        </title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" href="/hll-china/public/static/layui/css/layui.css" media="all">
    </head>
    
    <body>
        <div class="x-body">
            <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
              <legend>变更管理员</legend>
            </fieldset>
            <!--action="<?php echo url('admin/article/save_edit_article'); ?>" method="post"-->
            <form class="layui-form"  method="post">
                <div class="layui-form-item">
                    <label for="username" class="layui-form-label">
                        <span class="x-red">*</span>登录名
                    </label>
                    <div class="layui-input-inline">
                        <input type="text"  name="adminuser"  value="<?php echo $admin['adminuser']; ?>"
                         class="layui-input" lay-verify="required">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        <span class="x-red">*</span>
                    </div>
                </div>
                <input type="hidden" name="adminid" value="<?php echo $admin['adminid']; ?>">
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red">*</span>邮箱
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_email" name="adminemail"  lay-verify="email|required" value="<?php echo $admin['adminemail']; ?>"
                         class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        <span class="x-red">*</span>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_pass" class="layui-form-label">
                        <span class="x-red">*</span>密码
                    </label>
                    <div class="layui-input-inline">
                        <input type="password" id="L_pass" name="adminpass"  lay-verify="pass|required"
                        autocomplete="off" class="layui-input" value="">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        6到16个字符
                    </div>
                </div>
               <!-- <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                        <span class="x-red">*</span>确认密码
                    </label>
                    <div class="layui-input-inline">
                        <input type="password" id="L_repass" name="repass" required="" lay-verify="repass" value="123456" 
                        autocomplete="off" class="layui-input">
                    </div>
                </div>-->
                <div class="layui-form-item">
                    <label  class="layui-form-label">
                    </label>
                    <button  type="submit" class="layui-btn" lay-filter="save" lay-submit="" id="submit">
                        保存
                    </button>
                </div>
            </form>
        </div>
        <script src="/hll-china/public/static/admin/index/js/jquery.min.js" charset="utf-8">
        </script>
        <script src="/hll-china/public/static/layui/layui.all.js" charset="utf-8">
        </script>
       <script>
            $(function(){
              $("#submit").on('click',function(){
                console.log($(".layui-form").serialize());
                  $.ajax({
                      type: 'POST',
                      url:"<?php echo url('admin/admin/update'); ?>",
                      data:$(".layui-form").serialize(),
                      dataType:"json",
                      success:function (data) {
                         if(data.statu==1){
                             alert(data.message);
                         }else{
                             alert(data.message);
                         }
                      }
                  })
              })
            })
        </script>
    </body>

</html>