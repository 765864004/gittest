<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>成绩查询结果</title>
</head>
<body>
<h1>成绩查询结果</h1><br/><br/>

<input type="hidden" class="userscoreid" value="<?php echo ($userscoreid); ?>"><!--试卷id-->
<input type="hidden" class="userid" value="<?php echo ($userid); ?>"><!--用户id-->
<div id="main" style="width: 1400px;height:400px;"></div>

<script src="__PUBLIC__/echart/jquery.min.js"></script>
<!--<script src="__PUBLIC__/echart/echarts.js"></script>-->

<script src="__PUBLIC__/echart/echarts-all.js"></script>
<script type="text/javascript">
    $(function(){

        var url="<?php echo U('home/Indexy/returnEchart');?>";
        var info = {
            userscoreid : $(".userscoreid").val(),
            userid : $(".userid").val()
        }

//        alert($(".khid").val());
//        alert($(".userid").val());

        //用$.getJSON(url ...), jQuery会帮我们把取的JSON字符串转换成js 对象
        $.getJSON(url, info).done(function (data) {
            console.log(data);

            // 基于准备好的dom，初始化echarts图表
            var myChart = echarts.init(document.getElementById('main'));

            var step_id = []; //步骤编号
            var step_score = []; //步骤分

            $.each(data, function (k, v) {
                step_id.push(v.stepid);
                step_score.push(v.score)
            })

            //console.log(step_id);
            //console.log(step_score);

            myChart.setOption({
                //标题
                title : {
                    text: '学员成绩统计曲线图',
                    subtext: '步骤分统计'
                },
                //提示框
                tooltip : {
                    trigger: 'axis'
                },
                //每一项代表一个系列的 name
                legend: {
                    data:['步骤分'] //系列名称
                },
                //右上角工具栏
                toolbox: {
                    show : true,
                    feature : {
                        mark : {show: true},
                        dataView : {show: true, readOnly: false},
                        magicType : {show: true, type: ['line', 'bar']},
                        restore : {show: true},
                        saveAsImage : {show: true}
                    }
                },
                calculable : true,
                //x轴
                xAxis : [
                    {
                        type : 'category', //类目轴，适用于离散的类目数据
                        boundaryGap : false, //坐标轴两边留白
                        data : step_id, // 所有类目名称列表
                        axisLabel:{
                            //X轴刻度配置
                            interval:0 //0：表示全部显示不间隔；auto:表示自动根据刻度个数和宽度自动设置间隔个数
                        }
                    }
                ],
                //y轴
                yAxis : [
                    {
                        type : 'value', //数值轴，适用于连续数据
                        axisLabel : {
                            formatter: '{value} 分' //使用字符串模板，模板变量为刻度默认标签 {value}
                        }
                    }
                ],
                //系列
                series : [
                    {
                        name:'步骤分', //系列名称
                        type:'line',
                        data:step_score, //对应X轴的值
                        markPoint : {
                            data : [
                                {type : 'max', name: '最大值'},
                                {type : 'min', name: '最小值'}
                            ]
                        },
                        markLine : {
                            data : [
                                {type : 'average', name: '平均值'}
                            ]
                        }
                    },
                ]
            });
        });


    })

</script>
</body>
</html>

<style>
    * {
        text-align: center;
        margin: 0 auto;
        padding: 0 auto;
    }
    h1{ padding-top: 20px;}
</style>