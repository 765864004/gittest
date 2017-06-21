<?php
class IndexyAction extends HomeAction
{
	public function __construct()
	{
		parent::__construct();
	}

	//查看
	public function yresult()
	{
		$userscoreid = $_REQUEST["userscoreid"]; //试卷id
		$userid = $_REQUEST["userid"];//用户id

		//echo "成绩id是：".$userscoreid;

		if($userscoreid && $userid)
		{
			//总分
			//考试结果总分
			$kaoshiResult = M()->table("y_kaohe_userscore")->where("id={$userscoreid}")->find();
			$this->assign("kaoshiResult", $kaoshiResult);

			//查询试卷（考试时长）
			$khid = $kaoshiResult["khid"]; //试卷id
			$kaohegroup = M()->table("y_kaohegroup")->where("id = $khid")->find();
			$this->assign("kaohegroup", $kaohegroup);

			//学员信息
			$userInfo = M()->table("t_user_info_2013")->where("uid=$userid")->find();
			$this->assign("userInfo", $userInfo);

			//步骤分
			//1.步骤得分 根据试卷id 用户id 查询步骤分
			$stepscore = M()->table("y_kaohe_base_new as stepdf")
				//->where('khid='.$khid and 'userid='.$userid)
				->where("userscoreid = $userscoreid and userid = $userid")
				->field("stepdf.*")
				->select();

			//2.标准步骤分 试卷id 查询任务编号
			$task = M()->table("y_kaohegroup")->where("id = $khid")->find();
			$errornum =  $task["errornum"];
			//查询标准步骤 （根据试卷id 查询任务编号）
			$bzstep = M()->table("y_step_base_new")->where("errornum = $errornum")->select();
			foreach($bzstep as &$v){
				$enum=$v["errornum"];
				$taskbase = M()->table("y_task_base")->where("errornum = $enum")->find();
				$v["errorname"] = $taskbase["errorname"];
			}
			//dump($bzstep);

			//3.将得分放在标准步骤得分数组里面
			foreach($bzstep as $k=>&$v){
				foreach($stepscore as $k2=>$v2){
					if( $v["stepid"] == $v2["stepid"] ){
						$v["dfscore"] = $v2["score"];
					}
				}
			}
			//dump($bzstep);

			//4.成绩查询结果
			$taskResultArr = array ();
			if ( $bzstep )
			{
				foreach ( $bzstep as $po )
				{
					$taskResultArr[$po['errorname']][] = $po;
				}
			}
			//dump($taskResultArr);
			$this->assign("taskResultPo", $taskResultArr);

			$this->display("Indexy:result");
		}
		else
		{
			echo "parameter error";exit;
		}

	}


	//评分
	public function score(){

		$userscoreid = (int)$_REQUEST["id"]; //成绩id
		$userid = (int)$_REQUEST["userid"];//用户id

		$userscore = M()->table("y_kaohe_userscore")->where("id = $userscoreid")->find();
		$khid = $userscore["khid"];

		$shijuan = M()->table("y_kaohegroup")->where("id = $khid")->find();
		$errornum = $shijuan["errornum"];

		//步骤得分
		$stepscore = M()->table("y_kaohe_base_new as stepdf")
			->where("userscoreid={$userscoreid} and userid={$userid}")
			->field("stepdf.*")
			->select();

		//标准步骤
		$bzstep = M()->table("y_step_base_new")->where("errornum = $errornum")->select();

		//1.给步骤打分
		foreach($stepscore as $k=>&$v){
			$id = $v['id'];
			foreach($bzstep as $k2=>$v2){

				if($v['stateid'] == 1 && $v['stepid'] == $v2["stepid"]){
					//1.给步骤打分
					$data['score']=$v2['score']; //步骤得分等于标准分
					break;
				} else{
					$data['score']=0;
				}
			}
			//将得分存入表中
			M()->table("y_kaohe_base_new")
				->where("userscoreid=".$userscoreid." and userid=".$userid." and id = ".$id."")
				->save($data);
		}

		//2.计算总分 查询学员的所有步骤分
		$stepscore2 = M()->table("y_kaohe_base_new as stepdf")
			->where("userscoreid={$userscoreid} and userid={$userid}")
			->field("stepdf.*")
			->select();

		$grade = 0 ;//总得分
		//总得分
		foreach($stepscore2 as $step){
			$grade+=$step["score"];
		}
		//总标准分
		$count = M()->table("y_step_base_new")
			->where("errornum = $errornum")
			->count("id");

		//成绩百分比（总得分/总标准分）
		$data3["score"]=round(($grade/$count)*100);
		$data=M()->table("y_kaohe_userscore")->where("id={$userscoreid} and userid={$userid}")->save($data3); //总分存入成绩表
		//如果评分成功
		if($data){
			$uscore = M()->table("y_kaohe_userscore")->where("id={$userscoreid} and userid={$userid}")->find();
		}
		$uscore["data"] = $data;
		$this->ajaxReturn($uscore);

	}


	//数据可视化
	public function echart(){

		$userscoreid = $_REQUEST["userscoreid"]; //试卷id
		$userid = $_REQUEST["userid"];//用户id

		//1.步骤得分 根据试卷id 用户id 查询步骤分
		$stepscore = M()->table("y_kaohe_base_new")
			//->where('khid='.$khid and 'userid='.$userid)
			->where("userscoreid = $userscoreid and userid = $userid")
			->field("y_kaohe_base_new.*")
			->select();

		$this->assign("userscoreid",$userscoreid);
		$this->assign("userid",$userid);
		//dump($stepscore);
		//$this->ajaxReturn($stepscore);
		//$this->assign("stepscore", $stepscore);

		$this->display();
		//exit(json_encode($stepscore));
	}

	public function returnEchart(){
		$userscoreid = $_REQUEST["userscoreid"]; //试卷id
		$userid = $_REQUEST["userid"];//用户id

		//1.步骤得分 根据试卷id 用户id 查询步骤分
		$stepscore = M()->table("y_kaohe_base_new")
			//->where('khid='.$khid and 'user='.$userid)
			->where("userscoreid = $userscoreid and userid = $userid")
			->field("y_kaohe_base_new.*")
			->select();


		//$this->ajaxReturn($stepscore);
		echo json_encode($stepscore,true);

		//exit(json_encode($stepscore));

	}

}
?>