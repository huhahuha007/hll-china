<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"D:\phpstudy\WWW\hll-china\public/../application/admin\view\goods\add_goods.html";i:1526915762;}*/ ?>
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
  <style type="">
    .layui-upload-img{
      width: 100px;
      height:100px;
    }
  </style>
</head>
<body>
          

              
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
  <legend>添加商品</legend>
</fieldset>
 
<form class="layui-form" action="<?php echo url('admin/goods/save_goods'); ?>" method="post" enctype="multipart/form-data">
  <div class="layui-form-item" style="width: 360px;">
    <label class="layui-form-label">产品名称</label>
    <div class="layui-input-block">
      <input type="text" name="goods_name" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item" style="width: 260px;">
    <label class="layui-form-label">产品编号</label>
    <div class="layui-input-block">
      <input type="text" name="goods_sn" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item" style="width: 360px;">
    <label class="layui-form-label">产品描述</label>
    <div class="layui-input-block">
      <input type="text" name="goods_desc" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item" style="width: 260px;">
    <label class="layui-form-label">市场价</label>
    <div class="layui-input-block">
      <input type="text" name="market_price" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item" style="width: 260px;">
    <label class="layui-form-label">商城价</label>
    <div class="layui-input-block">
      <input type="text" name="shop_price" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
    </div>
  </div>
   <div class="layui-form-item" style="width: 260px;">
    <label class="layui-form-label">库存</label>
    <div class="layui-input-block">
      <input type="text" name="goods_stock" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">展示图</label>
    <div class="layui-input-block">
      <input type="file" name="img1" >
    </div>
  </div>
  
  
  

  
  <div class="layui-form-item" style="width: 260px;">
    <label class="layui-form-label">选择分类</label>
    <div class="layui-input-block">
      <select name="goods_category" lay-filter="aihao">
        <?php if(is_array($jk_goods_category) || $jk_goods_category instanceof \think\Collection || $jk_goods_category instanceof \think\Paginator): $k = 0; $__LIST__ = $jk_goods_category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$id): $mod = ($k % 2 );++$k;?>
        <option value="<?php echo $id['type_id']; ?>"><?php echo $id['type_name']; ?></option>
        <?php endforeach; endif; else: echo "" ;endif; ?>}
        
      </select>
    </div>
  </div>

<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
  <legend>上传多张图片</legend>
</fieldset>
 
<div class="layui-upload">
  <input type="file" name="img[]" id="img"  multiple/>     
  <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
    预览图：
    <div class="layui-upload-list" id="" ></div>
 </blockquote>
</div>
 
  
  
  <div class="layui-form-item">
    <div class="layui-input-block">
      <input type="submit" class="layui-btn"  value="提交">
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
  
  


</script>

</body>
</html>