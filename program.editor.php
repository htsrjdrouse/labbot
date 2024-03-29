<? session_start(); ?>
<? include('functionslib.php'); ?>
<? include('labbotfunctions.php'); ?>
<?
if (isset($_POST['ejectpipettes'])){ 
 unset($_SESSION['labbotprogramjson']);
 $_SESSION['labbotprogramjson'] = json_decode(file_get_contents('labbot.programs.json'), true);
 if(!isset($_SESSION['labbotprogramjson'])){
  $_SESSION['labbotprogramjson'] = array();
 }
 array_push($_SESSION['labbotprogramjson'], array(
  "tasktype"=>"eject",
  "object"=>"pipette removal",
  "mesg"=>"pipettes eject"
 ));
 closejson($_SESSION['labbotprogramjson'],'labbot.programs.json');
 header("Location: index.php");

}
if (isset($_POST['motionsubmitstep'])){ 
 unset($_SESSION['labbotprogramjson']);
 $_SESSION['labbotprogramjson'] = json_decode(file_get_contents('labbot.programs.json'), true);
 if(!isset($_SESSION['labbotprogramjson'])){
  $_SESSION['labbotprogramjson'] = array();
 }
 array_push($_SESSION['labbotprogramjson'], array(
  "tasktype"=>"motion",
  "task"=>$_POST['task'],
  "object"=>$_POST['targetlist'],
  "feedrate"=>$_POST['feedrate'],
  "row"=>$_POST['row'],
  "zheight"=>$_POST['zheight'],
  "mesg"=>"motion ".$_POST['targetlist']." zh ".$_POST['zheight']." row ".$_POST['row']." F".$_POST['feedrate']
 ));
 closejson($_SESSION['labbotprogramjson'],'labbot.programs.json');
 header("Location: index.php");
}

if (isset($_POST['valvesubmitstep'])){ 
 unset($_SESSION['labbotprogramjson']);
 $_SESSION['labbotprogramjson'] = json_decode(file_get_contents('labbot.programs.json'), true);
 if(!isset($_SESSION['labbotprogramjson'])){
  $_SESSION['labbotprogramjson'] = array();
 }
 $valvelist = "";
 for($i=1;$i<9;$i++){
   if($i==8){
	   if(isset($_POST['valve'.$i])){$valvelist = $valvelist."1";} else { $valvelist = $valvelist."0";}
   } else {
	   if(isset($_POST['valve'.$i])){$valvelist = $valvelist."1_";} else { $valvelist = $valvelist."0_";}
   }
 }
 array_push($_SESSION['labbotprogramjson'], array(
  "tasktype"=>"valve",
  "valvelist"=>$valvelist,
  "valvepos"=>$_POST['valvepos'],
  "mesg" => 'valve-'.$valvelist.'-'.$_POST['valvepos']
 ));
 closejson($_SESSION['labbotprogramjson'],'labbot.programs.json');
 header("Location: index.php");
}
if (isset($_POST['syringesubmitstep'])){ 
 unset($_SESSION['labbotprogramjson']);
 $_SESSION['labbotprogramjson'] = json_decode(file_get_contents('labbot.programs.json'), true);
 if(!isset($_SESSION['labbotprogramjson'])){
  $_SESSION['labbotprogramjson'] = array();
 }
 $_SESSION["syringefeedrate"]= $_POST['syringefeedrate'];
 array_push($_SESSION['labbotprogramjson'], array(
  "tasktype"=>"syringe",
  "esteps"=>$_POST['esteps'],
  "syringefeedrate"=>$_POST['syringefeedrate'],
  "mesg" => "syringe E".$_POST['esteps']." ".$_POST['syringefeedrate']
 ));
 closejson($_SESSION['labbotprogramjson'],'labbot.programs.json');
 header("Location: index.php");
}
if (isset($_POST['gpiosubmitstep'])){ 
 unset($_SESSION['labbotprogramjson']);
 $_SESSION['labbotprogramjson'] = json_decode(file_get_contents('labbot.programs.json'), true);
 if(!isset($_SESSION['labbotprogramjson'])){
  $_SESSION['labbotprogramjson'] = array();
 }
 if (isset($_POST['plug'])){ $plug = $_POST['plug']; } else { $plug = 0; }
 
 if ($plug == 1) { $gt = "wash"; }
 if ($plug == 2) { $gt = "waste"; }
 if ($plug == 3) { $gt = "pcv"; }
 if ($closedloop == "on") {
	 $mesg= $gt." ".$plug." ".$_POST['pump']." ".$_POST['temperature'];
 } else {
	 $mesg= $gt." ".$plug." ".$_POST['pump'];
 }
 if ($plug > 0) {
 array_push($_SESSION['labbotprogramjson'], array(
  "tasktype"=>"gpio",
  "plug"=>$plug,
  "onoff"=>$_POST['pump'],
  "magnitude"=>$_POST['magnitude'],
  "temperature"=>$_POST['temperature'],
  "thermistor"=>$_POST['thermistor'],
  "mesg" => $mesg
 ));
 closejson($_SESSION['labbotprogramjson'],'labbot.programs.json');
 }
 header("Location: index.php");
}
if (isset($_POST['camsubmitstep'])){ 
 unset($_SESSION['labbotprogramjson']);
 $_SESSION['labbotprogramjson'] = json_decode(file_get_contents('labbot.programs.json'), true);
 if(!isset($_SESSION['labbotprogramjson'])){
  $_SESSION['labbotprogramjson'] = array();
 }
 array_push($_SESSION['labbotprogramjson'], array(
  "tasktype"=>"camera",
  "location"=>$_SESSION['labbot3d']['imgdir'],
  "fname"=>$_POST['fname'],
  "campredelay"=>$_POST['campredelay'],
  "campostdelay" => $_POST['campostdelay'],
  "mesg" => "camsnap ".$_SESSION['labbot3d']['imgdir']."_".$_POST['fname']." ".$_POST['campredelay']." ".$_POST['campostdelay']
 ));
 closejson($_SESSION['labbotprogramjson'],'labbot.programs.json');
 header("Location: index.php");
}
if (isset($_POST['telnetsubmitstep'])){ 
 unset($_SESSION['labbotprogramjson']);
 $_SESSION['labbotprogramjson'] = json_decode(file_get_contents('labbot.programs.json'), true);
 if(!isset($_SESSION['labbotprogramjson'])){
  $_SESSION['labbotprogramjson'] = array();
 }
 array_push($_SESSION['labbotprogramjson'], array(
  "tasktype"=>"telnetcommand",
  "task"=>$_POST['selectcommand'],
  "mesg" => "M115 ".$_POST['selectcommand']
 ));
 closejson($_SESSION['labbotprogramjson'],'labbot.programs.json');
 header("Location: index.php");
}
if (isset($_POST['deletemacro'])){ 
 foreach($_POST['macro'] as $mm){
  unset($_SESSION['labbotprogramjson'][$mm]);
 }
 closejson($_SESSION['labbotprogramjson'],'labbot.programs.json');
 header("Location: index.php");
}


if (isset($_POST['displaymacro'])){ 
 $labbotprogramjson = json_decode(file_get_contents('labbot.programs.json'), true);
 $cmdlist = array();
 foreach($_POST['macro'] as $mm){
  echo "//".$labbotprogramjson[$mm]['mesg']."<br>";
  if($labbotprogramjson[$mm]['tasktype'] == "telnetcommand"){
     $cmdlist = turnonac($cmdlist);
     displaymacro($cmdlist);
  }
  if($labbotprogramjson[$mm]['tasktype'] == "motion"){
    $cmdlist = motion($cmdlist, $labbotprogramjson[$mm]);
     displaymacro($cmdlist);
  }
  if($labbotprogramjson[$mm]['tasktype'] == "valve"){
    $cmdlist = valve($cmdlist, $labbotprogramjson[$mm]);
     displaymacro($cmdlist);
  }
  if($labbotprogramjson[$mm]['tasktype'] == "syringe"){
    $cmdlist = syringe($cmdlist, $labbotprogramjson[$mm]);
     displaymacro($cmdlist);
  }
  if($labbotprogramjson[$mm]['tasktype'] == "gpio"){
    $cmdlist = gpio($cmdlist, $labbotprogramjson[$mm]);
     displaymacro($cmdlist);
  }
  if($labbotprogramjson[$mm]['tasktype'] == "eject"){
    $cmdlist = eject($cmdlist, $labbotprogramjson[$mm]);
     displaymacro($cmdlist);
  }
  if($labbotprogramjson[$mm]['tasktype'] == "camera"){
    $cmdlist = camera($cmdlist, $labbotprogramjson[$mm]);
     displaymacro($cmdlist);
  }

 }
}

if (isset($_POST['editmacro'])){ 
 $labbotprogramjson = json_decode(file_get_contents('labbot.programs.json'), true);
 $cmdlist = array();
 foreach($_POST['macro'] as $mm){
  array_push($cmdlist,"//".$labbotprogramjson[$mm]['mesg']);
  if($labbotprogramjson[$mm]['tasktype'] == "telnetcommand"){
     $cmdlist = turnonac($cmdlist);
  }
  if($labbotprogramjson[$mm]['tasktype'] == "motion"){
    $cmdlist = motion($cmdlist, $labbotprogramjson[$mm]);
  }
  if($labbotprogramjson[$mm]['tasktype'] == "valve"){
    $cmdlist = valve($cmdlist, $labbotprogramjson[$mm]);
  }
  if($labbotprogramjson[$mm]['tasktype'] == "syringe"){
    $cmdlist = syringe($cmdlist, $labbotprogramjson[$mm]);
  }
  if($labbotprogramjson[$mm]['tasktype'] == "gpio"){
    $cmdlist = gpio($cmdlist, $labbotprogramjson[$mm]);
  }
  if($labbotprogramjson[$mm]['tasktype'] == "eject"){
    $cmdlist = eject($cmdlist, $labbotprogramjson[$mm]);
  }
  if($labbotprogramjson[$mm]['tasktype'] == "camera"){
    $cmdlist = camera($cmdlist, $labbotprogramjson[$mm]);
     displaymacro($cmdlist);
  }
 }
 $cc = array("cmdlist"=>$cmdlist);
 $_SESSION['cmdlist'] = $cmdlist;
 $_SESSION['labbot']['editprogram'] = 1;
 $_SESSION['labbot']['view'] = 'editmacro';
 file_put_contents('labbot.programtorun.json', json_encode($cmdlist));
 header("Location: index.php");
}


if (isset($_POST['savemacro'])){ 
 $vvr = preg_split("/\n/", $_POST['macrofiledata']);
 $_SESSION['cmdlist'] = $vvr;
 $prog = array("program"=>$vvr);
 file_put_contents('labbot.programtorun.json', json_encode($prog));
 header("Location: index.php");
}

if (isset($_POST['runmacro'])){ 
 exec('mosquitto_pub -t "labbot" -m "runmacro"');
 //$_SESSION['labbot']['view'] = 'logger';
 header("Location: index.php");
}

function displaymacro($cmd){
 foreach($cmd as $cc){
  echo $cc.'<br>';
 }

}

?>


