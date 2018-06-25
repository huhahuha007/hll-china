<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"D:\phpstudy\WWW\hll-china\public/../application/admin\view\news\news_list.html";i:1529828845;}*/ ?>
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
      /*分页*/
.Pagination a:hover,.current{background-color: #f54281;border: 1px solid #f54281;color: #ffffff; }
.Pagination{float: left;height: auto;height: 45px; line-height: 20px;margin-right: 15px;_margin-right: 5px; color:#565656;margin-top: 10px;_margin-top: 20px; clear:both;}
.Pagination a,.Pagination span{ font-size: 14px;text-decoration: none;display: block;float: left;color: #565656;border: 1px solid #ccc;height: 34px;line-height: 34px;margin: 0 2px;width: 34px;text-align: center;}
.pagination li{
       
       float: left;
    }
  </style>
</head>
<body>

             
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
  <legend>文章列表</legend>
</fieldset>
<div class="layui-form">
  <table class="layui-table">
    <colgroup>
      <col width="150">
      <col width="80">
      <col width="100">
      <col width="150">
      <col width="6">
      <col width="60">
      <col width="50">
      <col width="50">
      <col width="100">
    </colgroup>
    <thead>
      <tr>
        <th>标题</th>
        <th>分类</th>
        <th>内容</th>
        <th>图片</th>
        <th>点击量</th>
        <th>添加时间</th>
        <th>是否推荐</th>
        <th>是否显示</th>
        <th>操作</th>
      </tr> 
    </thead>
    <tbody>
      <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?>
      <tr>
        <td><?php echo mb_substr($user['title'],0,9,'utf-8'); ?></td>
        <td><?php echo mb_substr($user['sort_id'],0,9,'utf-8'); ?></td>
        <td><?php echo mb_substr($user['content'],0,9,'utf-8'); ?></td>
        <td><img src="/hll-china/public/uploads/news/<?php echo $user['img']; ?>" style="height: 50px; height: 50px"></td>
        <td><?php echo $user['hits']; ?></td>
        <td><?php echo date("Y-m-d",$user['add_time']); ?></td>
        <td onclick="is_elite(<?php echo $user['news_id']; ?>,<?php echo $user['is_elite']; ?>)"><input type="checkbox" name="is_elit" value="<?php echo $user['is_elite']; ?>" lay-skin="switch"  lay-text="ON|OFF" <?php echo $user['is_elite']==1?'checked':''; ?>></td>
        <td onclick="is_show(<?php echo $user['news_id']; ?>,<?php echo $user['is_show']; ?>)"><input type="checkbox" name="is_show" value="<?php echo $user['is_show']; ?>" lay-skin="switch" lay-text="ON|OFF"  <?php echo $user['is_show']==1?'checked':''; ?>></td>
        <td><a href="<?php echo url('admin/news/edit_news',array('news_id'=>$user['news_id'])); ?>" class="layui-btn">编辑</a>
          <a href="<?php echo url('admin/news/delete_news',array('news_id'=>$user['news_id'])); ?>" class="layui-btn">删除</a></td>
      </tr>
      <?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
  </table>
  
</div>

  <div class="Pagination"><?php echo $list->render(); ?></div>


 
 <script src="/hll-china/public/static/admin/index/js/jquery.min.js" charset="utf-8"></script>         
<script src="/hll-china/public/static/layui/layui.all.js" charset="utf-8"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
<script>
//是否推荐
function is_elite(id,is_elite){
    
    $.post("<?php echo url('admin/news/is_elite'); ?>", { id: id,is_elite:is_elite }, function (text, status) {
      if(text.status==1){
          layer.msg(text.msg, {icon: 1},function(index){
            window.location.reload();
          });
      }else if(text.status==0){
          layer.msg(text.msg, {icon: 2},function(index){
            window.location.reload();
          });
      } 
    });
}
//是否显示
function is_show(id,is_show){
    
    $.post("<?php echo url('admin/news/is_show'); ?>", { id: id,is_show:is_show }, function (text, status) {
      if(text.status==1){
          layer.msg(text.msg, {icon: 1},function(index){
            window.location.reload();
          });
      }else if(text.status==0){
          layer.msg(text.msg, {icon: 2},function(index){
            window.location.reload();
          });
      } 
    });
}
</script>

</body>
</html>