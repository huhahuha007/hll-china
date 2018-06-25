<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"D:\phpstudy\WWW\hll-china\public/../application/admin\view\honor\honor_list.html";i:1529907233;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="/hll-china/public/static/layui/css/layui.css" media="all">
</head>
  <style type="">
      /*分页*/
.Pagination a:hover,.current{background-color: #f54281;border: 1px solid #f54281;color: #ffffff; }
.Pagination{float: left;height: auto;height: 45px; line-height: 20px;margin-right: 15px;_margin-right: 5px; color:#565656;margin-top: 10px;_margin-top: 20px; clear:both;}
.Pagination a,.Pagination span{ font-size: 14px;text-decoration: none;display: block;float: left;color: #565656;border: 1px solid #ccc;height: 34px;line-height: 34px;margin: 0 2px;width: 34px;text-align: center;}
.pagination li{
       
       float: left;
    }
  </style>
<body>
	<div>
		<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
             <legend>荣誉列表</legend>
        </fieldset>
 
		<div>
			<a href="<?php echo url('admin/honor/add_honor'); ?>" class="layui-btn">添加荣誉资质</a>
		</div>
	<table class="layui-table">
  <colgroup>
    <col width="150">
    <col width="150">
    <col width="150">
  </colgroup>
  <thead>
    <tr>
      <th>名称</th>
      <th>图片</th>
      <th>详情</th>
      <th>操作</th>
    </tr> 
  </thead>
  <tbody>
  	<?php if(is_array($honor_list) || $honor_list instanceof \think\Collection || $honor_list instanceof \think\Paginator): $i = 0; $__LIST__ = $honor_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$id): $mod = ($i % 2 );++$i;?>
    <tr>
      <td><?php echo $id['title']; ?></td>
      <td><img src="/hll-china/public/uploads/honor/<?php echo $id['img']; ?>" style="height: 50px; height: 50px"></td>
      <td><?php echo $id['content']; ?></td>

      <td><a href="<?php echo url('admin/honor/edit_honor',array('honor_id'=>$id['id'])); ?>" class="layui-btn">编辑</a>
          <a href="<?php echo url('admin/honor/delete_honor',array('honor_id'=>$id['id'])); ?>" class="layui-btn">删除</a></td>
    </tr>
   <?php endforeach; endif; else: echo "" ;endif; ?> 
  </tbody>
</table>
		<div class="Pagination"><?php echo $honor_list->render(); ?></div>
	</div>
	<div>
		<script src="/hll-china/public/static/admin/index/js/jquery.min.js" charset="utf-8"></script>  
		<script src="/hll-china/public/static/layui/layui.all.js" charset="utf-8"></script>
	</div>
  <script type="text/javascript">
    function show_goods(order_id){
      console.log(order_id);
      $.ajax({
        url:"<?php echo url('admin/order/ajax_post'); ?>",
        type:'post',
        dataType:'json',
        data:{'order_id':order_id},
        success:function(res){
           console.log(res);
            layer.open({
              type: 2, 
              area:['500px','600px'],
              content: "<?php echo url('admin/order/show_goods'); ?>"
              });
        },
        erorr:function(res){
          layer.msg('失败',{icon:2});
        }
      })
    }

     //是否已支付
    function is_pay(id,is_pay){
    
    $.post("<?php echo url('admin/order/is_pay'); ?>", { id: id,is_pay:is_pay }, function (text, status) { 
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