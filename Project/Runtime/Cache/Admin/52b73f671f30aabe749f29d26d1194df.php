<?php if (!defined('THINK_PATH')) exit();?>﻿<div class="pageHeader">
    <form id="pagerForm" action="<?php echo U('admin/admin_manage/userList');?>" method="post"
          onSubmit='return navTabSearch(this);' class="pageForm required-validate">
        <input type="hidden" name="currentPage" value="<?php echo ($currentPage); ?>"/>
        <input type="hidden" name="pageSize" value="<?php echo ($pageSize); ?>"/>
        <input type="hidden" name="_order" value="<?php echo $_REQUEST['_order']?>"/>
        <input type="hidden" name="_sort" value="<?php echo $_REQUEST['_sort']?>"/>
        <div id='search'>
            登陆名：<input type="text" name="uname" value="<?php echo ($uname); ?>"/>&nbsp;
            真实姓名：<input type="text" name="truename" value="<?php echo ($truename); ?>"/>&nbsp;
            性别：
            <select name="usex">
                <option value="">全部
                <option value="0"
                <?php if($usex === '0'):?>selected<?php endif;?>>男
                <option value="1"
                <?php if($usex === '1'):?>selected<?php endif;?>>女
            </select>
            
            身份证：<input type="text" name="card" value="<?php echo ($card); ?>"/>&nbsp;
            部门：
            <select name="departid">
                <option value=""
                <?php if(!isset($depardid)):?>selected<?php endif;?>>全部
                <?php if(is_array($departList)): $i = 0; $__LIST__ = $departList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$departVo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($departVo['id']); ?>"
                <?php if($departid == $departVo['id']):?>selected<?php endif;?>><?php echo ($departVo['name']); endforeach; endif; else: echo "" ;endif; ?>
            </select>
            <input type='submit' value='查询'/>
            <input type="hidden" name="submit" value='1'/>
        </div>
   </form>
</div><!-- pageHeader end -->


<div class="pageContent">
   <div class="panelBar">
	    <ul class="toolBar">
	        <li><a class="add" href="<?php echo U('admin/admin_manage/userAdd');?>" target="dialog" width="510" height="250"
                   mask=true title='添加学员'><span>添加</span></a></li>
	        <li><a class="edit" href="<?php echo U('admin/admin_manage/userEdit');?>?id={sid}" target="dialog" width="510"
                   height="250" mask=true warn="您没有选中" title='编辑学员'><span>修改</span></a></li>
	        <li class="line">line</li>
	        <li><a class="delete" href="<?php echo U('admin/admin_manage/userDel');?>?id={sid}&actType=del" target="ajaxTodo"
                   warn="您没有选中" title="确定要删除吗？"><span>删除</span></a></li>
	        <li class="line">line</li>
	        <li><a title="导入EXCEL" target="dialog" href="<?php echo U('admin/admin_manage/userPlExcel');?>" class="icon"
                   width="510" height="140"><span>导入EXCEL</span></a></li>
	    </ul>
	</div>
   
    <table class="table" width="99%" layoutH="117" targetType="navTab" asc="asc" desc="desc">
           <thead>
                <tr>
                    <th align='center'>登陆名</th>
                    <th align='center'>真实姓名</th>
                    <th align='center'>性别</th>
                    <th align='center'>身份证</th>
                    <th align='center'>部门</th>
		            <th align='center'>班级</th>
		            <th align='center'>工作类型</th>
                    <th align='center'>注册时间</th>
                </tr>
         </thead>
         <tbody>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr target="sid" rel="<?php echo ($vo['uid']); ?>">
                    <td align='center'><?php echo ($vo['uname']); ?></td>
                    <td align='center'><?php echo ($vo['truename']); ?></td>
                    <td align='center'><?php if(($vo['usex']) == "0"): ?>男<?php else: ?>女<?php endif; ?></td>
                    <td align='center'><?php echo (substr($vo['card'],0,3)); ?>********<?php echo (substr($vo['card'],15,3)); ?></td>
                    <td align='center'><?php echo ($departArr[$vo['departid']]); ?></td>
		   <td align='center'><?php echo ($vo['group']); ?></td>
		   <td align='center'>列2</td>
                    <td align='center'><?php echo (date("Y-m-d H:i:s",$vo['regtime'])); ?></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
          </tbody>
    </table>

    <div class="panelBar">
        <div class="pages">
            <span>显示</span>
            <select name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value})">
                <option value="25" <?php if(($pageSize) == "25"): ?>selected<?php endif; ?>>25</option>
                <option value="50" <?php if(($pageSize) == "50"): ?>selected<?php endif; ?>>50</option>
                <option value="100" <?php if(($pageSize) == "100"): ?>selected<?php endif; ?>>100</option>
                <option value="200" <?php if(($pageSize) == "200"): ?>selected<?php endif; ?>>200</option>
            </select>
            <span>条，共<?php echo ($totalCount); ?>条</span>
        </div><!--pages end -->
        <div class="pagination" targetType="navTab" totalCount="<?php echo ($totalCount); ?>" numPerPage="<?php echo ($pageSize); ?>"
             pageNumShown="5" currentPage="<?php echo ($currentPage); ?>"></div>
    </div><!-- panelBar end -->

</div><!-- pageContent end -->