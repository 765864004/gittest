<?php if (!defined('THINK_PATH')) exit();?><div class="pageHeader">
    <form id="pagerForm" action="<?php echo U('admin/admin_manage/adminList');?>" method="post" onSubmit='return navTabSearch(this);'>
	    <div id='search'>
	        状态:
	        <select name="status">
	            <option value='' >全部</option>
	            <option value='Y' <?php if(($status) == "Y"): ?>selected<?php endif; ?>>启用</option>
	            <option value='N' <?php if(($status) == "N"): ?>selected<?php endif; ?>>禁用</option>
	        </select>
	        <input type='submit' value='点击查询'/>
	    </div>
   </form>
</div><!-- pageHeader end -->



<div class="pageContent">
	<div class="panelBar">
	    <ul class="toolBar">
	        <li><a class="add" href="<?php echo U('admin/admin_manage/addAdmin');?>" target="dialog" width="510" height="250" mask=true title='添加教师'><span>添加</span></a></li>
	        <li><a class="edit" href="<?php echo U('admin_manage/editAdmin');?>?id={sid}" target="dialog" width="510" height="250" mask=true warn="您没有选中" title='编辑教师'><span>编辑</span></a></li>
	        <li class="line">line</li>
	        <li><a class="add" href="<?php echo U('admin/admin_manage/adminProcess');?>?id={sid}&actType=show" target="ajaxTodo" warn="您没有选中"><span>启用</span></a></li>
	        <li><a class="edit" href="<?php echo U('admin/admin_manage/adminProcess');?>?id={sid}&actType=hidden" target="ajaxTodo" warn="您没有选中"><span>禁用</span></a></li>
	        <li><a class="delete" href="<?php echo U('admin/admin_manage/adminProcess');?>?id={sid}&actType=del" target="ajaxTodo" warn="您没有选中" title="确定要删除吗？"><span>删除</span></a></li>
	        <li class="line">line</li>
	    </ul>
	</div>
    <table class="table" width="99%" layoutH="117" targetType="navTab" asc="asc" desc="desc">
	       <thead>
	            <tr>
	                <th align='center' width="5%" orderField='id'>ID</th>
	                <th align='center' width="20%">登陆名</th>
	                <th align='center' width="20%">姓名</th>
	                <th align='center' width="10%">类型</th>
	                <th align='center' width="10%">添加时间</th>
					<!--
	                <th align='center' width="10%">上次登陆时间</th>
	                <th align='center' width="10%">上次登陆IP</th>-->
	                <th align='center' width="10%">状态</th>
	            </tr>
	     </thead>
	     <tbody>
	            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr target="sid" rel="<?php echo ($vo['id']); ?>">
	                <td align='center'><?php echo ($vo['id']); ?></td>
	                <td align='center'><?php echo ($vo['name']); ?></td>
	                <td align='center'><?php echo ($vo['true_name']); ?></td>
	                <td align='center'><?php echo ($vo['role_name']); ?></td>
	                <td align='center'><?php echo ($vo['create_time']); ?></td>
					<!--
	                <td align='center'><?php echo ($vo['last_login_time']); ?></td>
	                <td align='center'><?php echo ($vo['last_login_ip']); ?></td>-->
	                <td align='center'><?php if(($vo['status']) == "Y"): ?>已启用<?php else: ?>已禁用<?php endif; ?></td>
	            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
	      </tbody>
	</table>

</div><!-- pageContent end -->