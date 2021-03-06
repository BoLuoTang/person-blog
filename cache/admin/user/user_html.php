<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title></title>
    <link rel="stylesheet" href="public/admin/css/pintuer.css">
    <link rel="stylesheet" href="public/admin/css/admin.css">
    <script src="public/admin/js/jquery.js"></script>
    <script src="public/admin/js/pintuer.js"></script>  
</head>
<body>
<form method="post" action="index.php?m=admin&c=user&a=gai">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 用户管理</strong></div>
    <div class="padding border-bottom">
      <ul class="search">
        <li>
          <button type="button"  class="button border-green" id="checkall"><span class="icon-check"></span> 全选</button>
          <button type="submit" class="button border-red"><span class="icon-trash-o"></span> 批量删除</button>
        </li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="120">ID</th>
        <th>姓名</th>       
        <th>电话</th>
        <th>邮箱</th>
        <th>密码</th>
        <th>类型</th>
        <!-- <th width="25%">内容</th>
         <th width="120">留言时间</th> -->
        <th>操作</th>       
      </tr>
        <?php foreach($data as $value):?>
        <tr>
          <td><input type="checkbox" name="id[]" value="1" />
            <?=$value['uid'];?></td>
          <td><?=$value['username'];?></td>
          <td><?=$value['phone'];?></td>
          <td><?=$value['email'];?></td>
          <td><?=$value['password'];?></td>
          <?php if($value['type']==0):?>
          <td>游客</td>
          <?php elseif($value['type']==1):?>
          <td>管理员</td>
          <?php endif;?>
          <td>
          <?php if($value['allowlogin']==1):?>
          <div class="button-group"> <a class="button border-red" href="index.php?m=admin&c=user&a=gai&cid=<?=$value['uid'];?>"><span class="icon-trash-o"></span> 解除锁定</a> </div>
          <?php elseif($value['allowlogin']==0):?>
          <div class="button-group"> <a class="button border-red" href="index.php?m=admin&c=user&a=gai&cid=<?=$value['uid'];?>"><span class="icon-trash-o"></span> 锁定</a> </div>
          <?php endif;?>
          <div class="button-group"> <a class="button border-red" href="javascript:void(0)" onclick="return del(<?=$value['uid'];?>,this)"
          ><span class="icon-trash-o"></span>删除</a> </div></td>
        </tr>
        <?php endforeach;?>
      <tr>
        <td colspan="8"><div class="pagelist"> <a href="">上一页</a> <span class="current">1</span><a href="">2</a><a href="">3</a><a href="">下一页</a><a href="">尾页</a> </div></td>
      </tr>
    </table>
  </div>
</form>
<script type="text/javascript">

function del(id,obj){
	if(confirm("您确定要删除吗?")){
      $.ajax({
        "type":'post',
        "url":'index.php?m=admin&c=user&a=shanchu',
        "data":{"id":id},
        "async":true,
        "datatype":'json',
        "success":success
  });
  function success(del){
  del = JSON.parse(del);
  //console.log(del.shan);
    if(del.shan == 1){
      $(obj).parents("tr").remove();
        //confirm('数据删除成功');
      }
    }
	}
}

$("#checkall").click(function(){
  $("input[name='id[]']").each(function(){
	  if (this.checked) {
		  this.checked = false;
	  }
	  else {
		  this.checked = true;
	  }
  });
})

function DelSelect(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {
		Checkbox=true;
	  }
	});
	if (Checkbox){
		var t=confirm("您确认要删除选中的内容吗？");
		if (t==false) return false;
	}
	else{
		alert("请选择您要删除的内容!");
		return false;
	}
}

</script>
</body>
</html>