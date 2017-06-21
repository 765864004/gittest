<?php if (!defined('THINK_PATH')) exit();?><!--查看试卷步骤-->
<div class="pageContent"  style="height:280px; width:500px;overflow-y:auto;">
    <table id="UserListTable" class="list" style="width:100%;">
        <tbody>
            <tr>
                <th>步骤编号</th>
                <th>步骤名称</th>
            </tr>
            <?php if(is_array($steps)): $i = 0; $__LIST__ = $steps;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$step): $mod = ($i % 2 );++$i;?><tr>
                <td align="left" width='30'><?php echo ($step['stepid']); ?></td>
                <td align="left" width='100'><?php echo ($step['tipinfor']); ?></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    </form>
</div><!-- pageContent end -->