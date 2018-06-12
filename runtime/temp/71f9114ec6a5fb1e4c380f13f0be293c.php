<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:95:"D:\phpStudy\PHPTutorial\WWW\order_room\public/../application/admin\view\banner\banner_list.html";i:1526915762;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>layui</title>
    <meta name="renderer" content="webkit">
    <link rel="stylesheet" href="/order_room/public/static/layui/css/layui.css"  media="all">

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

<table class="layui-table" lay-filter="demo">
    <thead>
    <tr>
        <th lay-data="{type:'checkbox', fixed: 'left'}"></th>
        <th lay-data="{type:'id', fixed: 'left'}">广告ID</th>
        <th lay-data="{field:'name', width:30, sort: true, fixed: true}">广告名称</th>
        <th lay-data="{field:'img', width:30}">广告图片</th>
        <th lay-data="{field:'url', width:30, sort: true}">广告链接</th>
        <th lay-data="{field:'create_img', width:30}">创建时间</th>
        <th lay-data="{field:'is_show', width:50}">是否启用</th>
        <th lay-data="{field:'experience', width:100, sort: true}">操作</th>

    </tr>
    </thead>
    <tbody>
    <?php if(is_array($bannerlist) || $bannerlist instanceof \think\Collection || $bannerlist instanceof \think\Paginator): $i = 0; $__LIST__ = $bannerlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$banner): $mod = ($i % 2 );++$i;?>
    <tr class="text-c">
        <td></td>
        <td><?php echo $banner['banner_id']; ?></td>
        <td><?php echo $banner['banner_title']; ?></td>
        <td>
            <img src="/order_room/public/uploads/banner/<?php echo $banner['banner_img']; ?>" style="height: 50px; height: 50px">
        </td>
        <td><?php echo $banner['banner_url']; ?></td>
        <td><?php echo date("Y-m-d",$banner['create_time']); ?></td>
        <td onclick="is_show(<?php echo $banner['banner_id']; ?>,<?php echo $banner['is_show']; ?>)"><input type="checkbox" name="is_show" value="<?php echo $banner['is_show']; ?>" lay-skin="switch" lay-text="ON|OFF"  <?php echo $banner['is_show']==1?'checked':''; ?>></td>
        <td>
            <a href="<?php echo url('admin/banner/banner_edit',array('banner_id'=>$banner['banner_id'])); ?>" class="layui-btn">编辑</a>
            <a href="<?php echo url('admin/banner/delete_banner',array('banner_id'=>$banner['banner_id'])); ?>" class="layui-btn">删除</a>
        </td>
    </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
</table>
<!--分页-->
<div class="Pagination"><?php echo $bannerlist->render(); ?></div>


<script src="/order_room/public/static/admin/index/js/jquery.min.js" charset="utf-8"></script>
<script src="/order_room/public/static/layui/layui.all.js" charset="utf-8"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
<script>
    layui.use(['laypage', 'layer','form'], function() {
        var laypage = layui.laypage
        var form = layui.form
            , layer = layui.layer;
        //监听指定开关
        form.on('switch(switchTest)', function(data){
            layer.msg('开关checked：'+ (this.checked ? 'true' : 'false'), {
                offset: '15px'
            });
            layer.tips('温馨提示：请注意开关状态的文字可以随意定义，而不仅仅是ON|OFF', data.othis)
        });

    })
    //是否启用
    function is_show(id,is_show){

        $.post("<?php echo url('admin/banner/is_show'); ?>", { id: id,is_show:is_show }, function (text, status) {
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