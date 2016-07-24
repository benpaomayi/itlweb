<?php
require 'uploadFiles.php';
require '../items/conference/insertConfInfoPath.php';
require '../items/paper/insertPaperInfoPath.php';
require '../items/patent/insertPatentInfoPath.php';
require '../items/project/insertProjectInfoPath.php';
require '../items/reward/insertRewdInfoPath.php';
require '../items/softcpr/insertSoftcprInfoPath.php';
header("Content-type:text/html;charset=utf-8");
date_default_timezone_set ( 'Asia/Shanghai' );
$flag = $_POST['flag'];
$locationUrl = $_POST['locationUrl'];
$path = '';
switch($flag) {
	case "project":
		$path = "../documents/project";
		$application_name = '';
		$application_path = '';
		$endReport_name = '';
		$endReport_path = '';
		$plan_name = '';
		$plan_path = '';
		$contract_name = ''; 
		$contract_path = ''; 
		$acceptCert_name = '';
		$acceptCert_path = '';
		insertProjectInfo ( $con );
		if(!empty($_FILES['application']['name'])) {
			$application = $_FILES['application'];
			$application_name = $application['name'];
			$application_path = uploadFiles($application, $path);
		} 
		if(!empty($_FILES['endReport']['name'])) {
			$endReport = $_FILES['endReport'];
			$endReport_name = $endReport['name'];
			$endReport_path = uploadFiles($endReport, $path);
		}
		if(!empty($_FILES['plan']['name'])) {
			$plan = $_FILES['plan'];
			$plan_name = $plan['name'];
			$plan_path = uploadFiles($plan, $path);
		}
		if(!empty($_FILES['contract']['name'])) {
			$contract = $_FILES['contract'];
			$contract_name = $contract['name'];
			$contract_path = uploadFiles($contract, $path);
		}
		if(!empty($_FILES['acceptCert']['name'])) {
			$acceptCert = $_FILES['acceptCert'];
			$acceptCert_name = $acceptCert['name'];
			$acceptCert_path = uploadFiles($acceptCert, $path);
		}
		insertProjectPath($con, $application_name, $application_path, $endReport_name, $endReport_path, $plan_name, $plan_path, $contract_name, $contract_path, $acceptCert_name, $acceptCert_path);
		break;
	case "paper":
		$path = "../documents/paper";
		$paperScan_name = '';
		$paperScan_path = '';
		$digitalOrg_name = '';
		$digitalOrg_path = '';
		$retrivalCert_name = '';
		$retrivalCert_path = '';
		insertPaperInfo($con);
		if(!empty($_FILES['paperScan']['name'])) {
			$paperScan = $_FILES['paperScan'];
			$paperScan_name = $paperScan['name'];
			$paperScan_path = uploadFiles($paperScan, $path);
		}
		if(!empty($_FILES['digitalOrg']['name'])) {
			$digitalOrg = $_FILES['digitalOrg'];
			$digitalOrg_name = $digitalOrg['name'];
			$digitalOrg_path = uploadFiles($digitalOrg, $path);
		}
		if(!empty($_FILES['retrivalCert']['name'])) {
			$retrivalCert= $_FILES['retrivalCert'];
			$retrivalCert_name = $retrivalCert['name'];
			$retrivalCert_path = uploadFiles($retrivalCert, $path);
		}
		insertPaperPath($con, $paperScan_name, $paperScan_path, $digitalOrg_name, $digitalOrg_path, $retrivalCert_name, $retrivalCert_path);
		break;
	case "patent":
		$path = "../documents/patent";
		$appManual_name = '';
		$appManual_path = '';
		$authManual_name = '';
		$authManual_path = '';
		$authCert_name = '';
		$authCert_path = '';
		insertPatentInfo($con);
		if(!empty($_FILES['appManual']['name'])) {
			$appManual = $_FILES['appManual'];
			$appManual_name = $appManual['name'];
			$appManual_path = uploadFiles($appManual, $path);
		}
		if(!empty($_FILES['authManual']['name'])) {
			$authManual = $_FILES['authManual'];
			$authManual_name = $authManual['name'];
			$authManual_path = uploadFiles($authManual, $path);
		}
		if(!empty($_FILES['authCert']['name'])) {
			$authCert = $_FILES['authCert'];
			$authCert_name = $authCert['name'];
			$authCert_path = uploadFiles($authCert, $path);
		}
		insertPatentPath($con, $appManual_name, $appManual_path, $authManual_name, $authManual_path, $authCert_name, $authCert_path);
		break;
	case "softcpr":
		$path = "../documents/softcpr";
		$registerCert_name = '';
		$registerCert_path = '';
		$application_name = '';
		$application_path = '';
		insertSoftcprInfo($con);
		if(!empty($_FILES['registerCert']['name'])) {
			$registerCert = $_FILES['registerCert'];
			$registerCert_name = $registerCert['name'];
			$registerCert_path = uploadFiles($registerCert, $path);
		}
		if(!empty($_FILES['application']['name'])) {
			$application = $_FILES['application'];
			$application_name = $application['name'];
			$application_path = uploadFiles($application, $path);
		}
		insertSoftcprPath($con, $registerCert_name, $registerCert_path, $application_name, $application_path);
		break;
	case "conference":
		$path = "../documents/conference";
		$invitation_name = '';
		$invitation_path = '';
		$receipt_name = '';
		$receipt_path = '';
		$speech_name = '';
		$speech_path = '';
		insertConfInfo($con);
		if(!empty($_FILES['invitation']['name'])) {
			$invitation = $_FILES['invitation'];
			$invitation_name = $invitation['name'];
			$invitation_path = uploadFiles($invitation, $path);
		}
		if(!empty($_FILES['receipt']['name'])) {
			$receipt = $_FILES['receipt'];
			$receipt_name = $receipt['name'];
			$receipt_path = uploadFiles($receipt, $path);
		}
		if(!empty($_FILES['speech']['name'])) {
			$speech = $_FILES['speech'];
			$speech_name = $speech['name'];
			$speech_path = uploadFiles($speech, $path);
		}
		insertConfPath($con, $invitation_name, $invitation_path, $receipt_name, $receipt_path, $speech_name, $speech_path);
		break;
	case "reward":
		$path = "../documents/reward";
		$rewardCert_name = '';
		$rewardCert_path = '';
		insertRewdInfo($con);
		if(!empty($_FILES['rewardCert']['name'])) {
			$rewardCert = $_FILES['rewardCert'];
			$rewardCert_name = $rewardCert['name'];
			$rewardCert_path = uploadFiles($rewardCert, $path);
		}
		insertRewdPath($con, $rewardCert_name, $rewardCert_path);
		break;
	default:
		break;
}
mysql_close($con);
header("Refresh:1; url=$locationUrl");
?>