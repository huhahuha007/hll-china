<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"D:\phpstudy\WWW\hll-china\public/../application/admin\view\news\add_news.html";i:1529488035;}*/ ?>
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
  <legend>添加文章</legend>
</fieldset>
 
<form class="layui-form" enctype="multipart/form-data" action="<?php echo url('admin/news/save_news'); ?>" method="post" >
  <div class="layui-form-item">
    <label class="layui-form-label">文章标题</label>
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
  <label class="layui-form-label">文章附带图</label>
    <div class="layui-input-block">
       <input type="file" name="img[]"  id="img" multiple/>
  </div>
</div>
    <div class="layui-form-item" style="width: 260px;">
      <label class="layui-form-label">选择分类</label>
      <div class="layui-input-block">
        <select name="sort_id" lay-filter="aihao">
          <?php if(is_array($jk_news_category) || $jk_news_category instanceof \think\Collection || $jk_news_category instanceof \think\Paginator): $k = 0; $__LIST__ = $jk_news_category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$id): $mod = ($k % 2 );++$k;?>
          <option value="<?php echo $id['type_name']; ?>"><?php echo $id['type_name']; ?></option>
          <?php endforeach; endif; else: echo "" ;endif; ?>}

        </select>
      </div>
    </div>
  
  
  
  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">普通文本域</label>
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