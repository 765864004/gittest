<?php if (!defined('THINK_PATH')) exit();?><div class="pageHeader">
    <form id="pagerForm" action="<?php echo U('admin/ks_manage/taskResultList');?>" method="post" onSubmit='return navTabSearch(this);' class="pageForm required-validate">
        <input type="hidden" name="currentPage" value="<?php echo ($currentPage); ?>"/>
        <input type="hidden" name="pageSize"    value="<?php echo ($pageSize); ?>"   />
        <input type="hidden" name="_order" value="<?php echo $_REQUEST['_order']?>"/>
        <input type="hidden" name="_sort" value="<?php echo $_REQUEST['_sort']?>"/>
        <div id='search'>
            试卷名称：
            <select  name="paperid">
                    <option value="">全部
                <?php if(is_array($pageList)): $i = 0; $__LIST__ = $pageList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pagePo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($pagePo['autoid']); ?>" <?php if($paperid == $pagePo['autoid']):?>selected<?php endif;?>><?php echo ($pagePo['name']); endforeach; endif; else: echo "" ;endif; ?>
            </select>&nbsp;
			部门：
            <select  name="departid">
				<option value="">全部
				<?php if(is_array($bumenList)): $i = 0; $__LIST__ = $bumenList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$departPo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($departPo['id']); ?>" <?php if($departRid == $departPo['id']):?>selected<?php endif;?>><?php echo ($departPo['name']); endforeach; endif; else: echo "" ;endif; ?>
			</select>&nbsp;
			学生真实姓名：
            <input type="text" name="truename" value="<?php echo ($truename); ?>"/>&nbsp;
            <input type='submit' value='查询'/>
            <input type="hidden" name="submit" value='1'/>
        </div>
   </form>
</div><!-- pageHeader end -->


<div class="pageContent">
   <div class="panelBar">
	    <ul class="toolBar">
	        <li><a class="edit" href="<?php echo U('admin/ks_manage/reks');?>?id={sid}&actType=del" target="ajaxTodo" warn="您没有选中"><span>设置重考</span></a></li>
	        <li class="line">line</li>
	        <li><a title="导出成绩到execl文本"  target="dialog" href="<?php echo U('admin/ks_manage/toexcel');?>" class="icon" width="510" height="140"><span>导出EXCEL</span></a></li>
	    </ul>
	</div>
   
    <table class="table" width="99%" layoutH="117" targetType="navTab" asc="asc" desc="desc">
           <thead>
                <tr>	
					<th align='center'>学生姓名</th>
					<th align='center'>性别</th>
					<th align='center'>部门</th>
					<th align='center'>试卷名称</th>
					<th align='center'>考试时间</th>
					<th align='center'>考试得分</th>
					<th align='center'>考试状态</th>
					<th align='center'>查看成绩</th>
					
					<!--
                    <th align='center'>试卷名称</th>
                    <th align='center'>学生登陆名</th>
                    <th align='center'>学生真实姓名</th>
                    <th align='center'>考试开始时间</th>
                    <th align='center'>考试成绩</th>
                    <th align='center'>考试状态</th>-->
                </tr>
         </thead>
         <tbody>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr target="sid" rel="<?php echo ($vo['id']); ?>">
					<td align='center'><?php echo ($userKaoshiArr[$vo['uid']]['truename']); ?></td>
					<td align='center'><?php if(($userKaoshiArr[$vo['uid']]['usex']) == "0"): ?>男<?php else: ?>女<?php endif; ?></td>
					<td align='center'><?php echo ($departList[$userKaoshiArr[$vo['uid']]['departid']]); ?></td>
					<td align='center'><?php echo ($taskKaoshiArr[$vo['paperid']]['name']); ?></td>
					<td align='center'><?php if(!empty($vo['kstime'])): echo (date("Y-m-d H:i:s",$vo['kstime'])); endif; ?></td>
					<td align='center'><?php echo ($vo['defen']); ?></td>
                    <td align='center'>
                        <?php  switch($vo['state']){ case "0": echo "未开始";break; case "1": echo "考试开始";break; case "2": echo "考试结束";break; case "10": echo "未补考";break; case "11": echo "补考开始";break; case "12": echo "补考结束";break; default: break; } ?>
                    </td>
					<td align='center'>
					   <?php if($vo['state'] == 2 || $vo['state'] == 12):?>
					       <a href="<?php echo U('home/index/result', array('uid'=>$vo['uid'], 'kstime'=>$vo['kstime']));?>" target="_blank">查看</a>
					    <?php endif;?>
					</td>

					<!--
                    <td align='center'><?php echo ($taskKaoshiArr[$vo['paperid']]['name']); ?></td>
                    <td align='center'><?php echo ($userKaoshiArr[$vo['uid']]['uname']); ?></td>
                    <td align='center'><?php echo ($userKaoshiArr[$vo['uid']]['truename']); ?></td>
                    <td align='center'><?php if(!empty($vo['kstime'])): echo (date("Y-m-d H:i:s",$vo['kstime'])); endif; ?></td>
                    <td align='center'><?php echo ($vo['defen']); ?></td>
                    <td align='center'>
                        <?php  switch($vo['state']){ case "0": echo "未开始";break; case "1": echo "考试开始";break; case "2": echo "考试结束";break; case "10": echo "未补考";break; case "11": echo "补考开始";break; case "12": echo "补考结束";break; default: break; } ?>
                    </td>
					-->
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
          </tbody>
    </table>

    <div class="panelBar" >
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
        <div class="pagination" targetType="navTab" totalCount="<?php echo ($totalCount); ?>" numPerPage="<?php echo ($pageSize); ?>" pageNumShown="5" currentPage="<?php echo ($currentPage); ?>"></div>
    </div><!-- panelBar end -->

</div><!-- pageContent end -->