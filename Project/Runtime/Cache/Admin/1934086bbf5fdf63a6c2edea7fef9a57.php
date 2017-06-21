<?php if (!defined('THINK_PATH')) exit();?>
<div class="panelBar">
    <ul class="toolBar">
        <li><a class="add" href="<?php echo U('admin/admin_manage/addRole');?>" target="dialog" width="850" height="600" mask=true  title='添加类型'><span>添加</span></a></li>
        <li><a class="edit" href="<?php echo U('admin/admin_manage/editRole');?>?id={sid}" target="dialog" width="850" height="600" mask=true  warn="您没有选中" title='编辑类型'><span>编辑</span></a></li>
        <li class="line">line</li>
		
        <li><a class="add" href="<?php echo U('admin/admin_manage/roleProcess');?>?id={sid}&actType=show" target="ajaxTodo" warn="您没有选中"><span>启用</span></a></li>
        <li><a class="edit" href="<?php echo U('admin/admin_manage/roleProcess');?>?id={sid}&actType=hidden" target="ajaxTodo" warn="您没有选中"><span>禁用</span></a></li>-
        <li><a class="delete" href="<?php echo U('admin/admin_manage/roleProcess');?>?id={sid}&actType=del" target="ajaxTodo" warn="您没有选中" title="确定要删除吗？"><span>删除</span></a></li>
        <li class="line">line</li>
        <!--
        <li><a class="add" href="<?php echo U('Privilege/role_manager/showRole');?>" target="navTab" title='查看角色权限'><span>查看角色权限</span></a></li>
         -->
    </ul>
</div>

<div class="pageContent">
  <table class="table" width="99%" layoutH="117" targetType="navTab" asc="asc" desc="desc">
	       <thead>
	            <tr>
					<!--
	                <th align='center' orderField='id'>ID</th>-->
	                <th align='center'>用户类型</th>
	                <th align='center'>描述</th>
	                <th align='center'>创建者</th>
	                <th align='center'>状态</th>
	            </tr>
	     </thead>
	     <tbody>
	            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr target="sid" rel="<?php echo ($vo['id']); ?>">
					<!--
	                <td align='center'><?php echo ($vo['id']); ?></td>-->
	                <td align='center'><?php echo ($vo['name']); ?></td>
	                <td align='center'><?php echo ($vo['description']); ?></td>
	                <td align='center'><?php echo ($vo['create_user']); ?></td>
	                <td align='center'><?php if(($vo['status']) == "Y"): ?>已启用<?php else: ?>已禁用<?php endif; ?></td>
	            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
	      </tbody>
	</table>

</div><!-- pageContent end -->