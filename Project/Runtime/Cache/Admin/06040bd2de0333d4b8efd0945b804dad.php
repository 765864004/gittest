<?php if (!defined('THINK_PATH')) exit();?><!--  
<script src="__PUBLIC__/dwz/js/jquery.ui.js" type="text/javascript"></script>
<link href="__PUBLIC__/dwz/js/jquery.ui.css" rel="stylesheet" type="text/css" />

<link href="__PUBLIC__/js/mutiselect/assets/prettify.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/js/mutiselect/assets/style.css" rel="stylesheet" type="text/css" />
<script href="__PUBLIC__/js/mutiselect/assets/ba.hashchange.js" type="text/javascript"></script>
<script href="__PUBLIC__/js/mutiselect/assets/prettify.js" type="text/javascript"></script>

<link href="__PUBLIC__/js/mutiselect/jquery.multiselect.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/js/mutiselect/jquery.multiselect.filter.css" rel="stylesheet" type="text/css" />
<script href="__PUBLIC__/js/mutiselect/jquery.multiselect.min.js" type="text/javascript"></script>
<script href="__PUBLIC__/js/mutiselect/jquery.multiselect.filter.min.js" type="text/javascript"></script>
-->
<div class="pageContent"  style="height:485px;overflow-y:auto;">
    <form  class="pageForm required-validate"  action="<?php echo U('admin/ks_manage/taskpageAdd');?>" onsubmit="return validateCallback(this,dialogAjaxDone)" method="post" >
    <table id="UserListTable" class="list" style="width:100%;">
        <tbody>
            <tr>
                <td align="center" width='150'><label>试卷名称</label></td>
                <td align="left">
                    <input type="text" name="name" class="required" style="width:300px;"/>
                </td>
            </tr>
            <tr>
                <td align="center" width='150'><label>总分</label></td>
                <td align="left">
                    <input type="text" name="zongfen" class="required" value="100"/>
                </td>
            </tr>
            <tr>
                <td align="center" width='150'><label>考试时长</label></td>
                <td align="left">
                    <input type="text" name="kstime0" class="required"/>分钟
                </td>
            </tr>
            <tr>
                <td align="center" width='150'><label>考试有效时间</label></td>
                <td align="left">
                    <input type="text" name="kstime1" class="required date" format="yyyy-MM-dd HH:mm:ss" />-
                    <input type="text" name="kstime2" class="required date" format="yyyy-MM-dd HH:mm:ss" />
                </td>
            </tr>
            <tr>
                <td align="center" width='150'><label>车型</label></td>
                <td align="left">
                     <select name="CRH" id="CRH" class="required">
                     <?php if(is_array($crh)): $i = 0; $__LIST__ = $crh;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                     </select>
                </td>
            </tr>
            <tr>
                <td align="center"><label>检修级别</label></td>
                <td align="left">
                    <?php if(is_array($JXTypeArr)): $i = 0; $__LIST__ = $JXTypeArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Jxvo): $mod = ($i % 2 );++$i;?><input type="radio" name="level" value="<?php echo ($key); ?>" <?php if(2 == $key): ?>checked<?php endif;?>><?php echo ($Jxvo); endforeach; endif; else: echo "" ;endif; ?>
                </td>
            </tr>
            <tr>
                <td align="center"><label>检修区域</label></td>
                <td align="left">
                    <?php if(is_array($BWTypeArr)): $i = 0; $__LIST__ = $BWTypeArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Bwvo): $mod = ($i % 2 );++$i;?><input name="area" value="<?php echo ($key); ?>" type="radio" <?php if($key == 1):?>checked<?php endif;?> class="partpoint1"><?php echo ($Bwvo); endforeach; endif; else: echo "" ;endif; ?>
                </td>
            </tr>
            <tr>
                <td align="center"><label>检修部位</label></td>
                <td align="left">
                    
                    <select multiple="multiple" name="unitA[]" id="partcont1" size="15">
                        <?php if(is_array($unitList)): $i = 0; $__LIST__ = $unitList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$unitvo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($unitvo['id']); ?>" selected><?php echo ($unitvo['unitname']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </td>
            </tr>
            <!-- 
            <tr>
                <td align="center" width='150'><label>选择题是否随机</label></td>
                <td align="left">
                    <input type="radio" name="isRandom" value='1' checked/>是&nbsp;<input type="radio" name="isRandom" value='0'/>否
                </td>
            </tr>
             -->
            <tr>
                <td align="center" width='150'><label>设置故障个数</label></td>
                <td align="left">
                    <input type="text" name="guzhangNum" class="required"/>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan='2' align='right'><input type='submit' value='提交' /><input type='reset' value='重置' /></td>
            </tr>
        </tbody>
    </table>
    <input type="hidden" name="submit" value="1"/>
    </form>
</div><!-- pageContent end -->
<script>
$(function(){

	
    $(".partpoint1").click(function(){
    	$("#partpoint1").html('');
    	var CRH = $("#CRH").val();
        var value = $(this).val();
        var level = $(":radio[name=level]:checked").val();
        var url="<?php echo U('admin/task_manage/getTaskBaseUnit');?>";
        $.post(url,{'type':value,'CRH':CRH,'level':level,'from':'taskPage'},function(data){
            $("#partcont1").html(data.data);
        },'json')
    });
	
})
 </script>