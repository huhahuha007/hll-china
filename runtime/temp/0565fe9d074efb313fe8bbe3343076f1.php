<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"D:\phpstudy\WWW\hll-china\public/../application/admin\view\honor\edit_honor.html";i:1529897209;}*/ ?>
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
          
<blockquote class="layui-elem-quote layui-text">
 <!--  鉴于小伙伴的普遍反馈，先温馨提醒两个常见“问题”：1. <a href="/doc/base/faq.html#form" target="_blank">为什么select/checkbox/radio没显示？</a> 2. <a href="/doc/modules/form.html#render" target="_blank">动态添加的表单元素如何更新？</a> -->
</blockquote>
              
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
  <legend>编辑资质</legend>
</fieldset>
 
<form class="layui-form" enctype="multipart/form-data" action="<?php echo url('admin/honor/save_edit_honor'); ?>" method="post" >
  <input type="hidden" name="id" value="<?php echo $list['id']; ?>">
  <div class="layui-form-item">
    <label class="layui-form-label">文章标题</label>
    <div class="layui-input-block">
      <input type="text" name="title" lay-verify="title" autocomplete="off" value="<?php echo $list['title']; ?>" placeholder="请输入标题" class="layui-input">
    </div>
  </div>
 
  
  

  

  
  <div class="layui-form-item">
    
   
 <div class="layui-upload">
  <label class="layui-form-label">文章附带图</label>
    <div class="layui-input-block">
       <input type="file" name="img"  id="img" multiple/>
  </div>

</div>
  
  
  
  
  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">文章内容</label>
    <div class="layui-input-block">
      <textarea placeholder="请输入内容" class="layui-textarea" name="content"><?php echo $list['content']; ?></textarea>
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
      <input class="layui-btn" type="submit" value="提交">
      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
  </div>
</form>
 

<script src="/hll-china/public/static/admin/index/js/jquery.min.js" charset="utf-8"></script>         
<script src="/hll-china/public/static/layui/layui.all.js" charset="utf-8"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
<script>
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
  
  //创建一个编辑器
  var editIndex = layedit.build('LAY_demo_editor');
 
  //自定义验证规则
  form.verify({
    title: function(value){
      if(value.length < 5){
        return '标题至少得5个字符啊';
      }
    }
    ,pass: [/(.+){6,12}$/, '密码必须6到12位']
    ,content: function(value){
      layedit.sync(editIndex);
    }
  });
  
  //监听指定开关
  form.on('switch(switchTest)', function(data){
    layer.msg('开关checked：'+ (this.checked ? 'true' : 'false'), {
      offset: '6px'
    });
    layer.tips('温馨提示：请注意开关状态的文字可以随意定义，而不仅仅是ON|OFF', data.othis)
  });
  
 
 
  //表单初始赋值
  form.val('example', {
    "username": "贤心" // "name": "value"
    ,"password": "123456"
    ,"interest": 1
    ,"like[write]": true //复选框选中状态
    ,"close": true //开关状态
    ,"sex": "女"
    ,"desc": "我爱 layui"
  })
  
  
});
</script>

</body>
</html>