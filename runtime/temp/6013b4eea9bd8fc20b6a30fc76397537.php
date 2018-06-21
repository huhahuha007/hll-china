<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"D:\phpstudy\WWW\hll-china\public/../application/admin\view\admin\phone.html";i:1528686874;}*/ ?>
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
        <fieldset class="layui-elem-field layui-field-title">
          <legend>电话</legend>
        </fieldset>
        <div class="x-body">
            
            <form class="layui-form">

                <div class="layui-form-item">
                    <label for="username" class="layui-form-label">
                        <span class="x-red">*</span>预订电话:
                    </label>
                    <div class="layui-input-inline">
                        
                        <input type="text"  name="phone"  value="<?php echo $config['phone']; ?>"
                         class="layui-input" lay-verify="required">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="username" class="layui-form-label">
                        <span class="x-red">*</span>客服电话:
                    </label>
                    <div class="layui-input-inline">
                        
                        <input type="text"  name="telephone"  value="<?php echo $config['telephone']; ?>"
                         class="layui-input" lay-verify="required">
                    </div>
                </div>
                
                
                <div class="layui-form-item">
                    <label  class="layui-form-label">
                    </label>
                    <button  type="submit" class="layui-btn" id="submit">
                        更新
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
               
                  $.ajax({
                      type: 'POST',
                      url:"<?php echo url('admin/admin/update_phone'); ?>",
                      data:$(".layui-form").serialize(),
                      dataType:"json",
                      success:function (data) {
                        console.log(data);
                         if(data.status==1){
                             
                             layer.msg(data.message, {icon: 1});
                         }else{
                             layer.msg(data.message, {icon: 1});
                         }
                      },
                      error:function(data){
                        console.log(data);
                      }
                  })
              })
            })
        </script>
    </body>

</html>