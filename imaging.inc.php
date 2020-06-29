<? 
if(isset($_POST['openpic'])){ 
  $_SESSION['labbot3d']['img'] = $_POST['imglist'];
}
if(isset($_POST['opendir'])){ 
  unset($_SESSION['labbot3d']['img']);
  $_SESSION['labbot3d']['imgdir'] = $_POST['imgdirlist'];
 }
if(isset($_POST['createdir'])){ 
  unset($_SESSION['labbot3d']['img']);
  $_SESSION['labbot3d']['imgdir'] = $_POST['imgdirlist'];
  $date = date('mdYHis');
  mkdir("imaging/".$date, 0777);
 }
if(isset($_POST['removedir'])){ 
  unset($_SESSION['labbot3d']['imgdir']);
  rmdir("imaging/".$_POST['imgdirlist']);
 }
if(isset($_POST['snap'])){ 
  if (isset($_SESSION['labbot3d']['imgdir'])){
    $cmd = 'mosquitto_pub -t "labbot" -m "snap '.$_SESSION['labbot3d']['imgdir'].'"';
    exec($cmd);
    echo($cmd);
    sleep(4);
  }
 }
?>
<hr>
<div class="row"><h3>&nbsp;&nbsp;Camera Settings</h3></div>
<form action=<?=$_SERVER['PHP_SELF']?> method=post>
<div class="row">
<div class="col-sm-3">
<button type="submit" name=createdir value="createdir"  class="btn-sm btn-primary btn-sm">Create directory</button>
</div>
<div class="col-sm-3">
<button type="submit" name=removedir value="removedir"  class="btn-sm btn-danger btn-sm">Remove directory</button>
</div>
</div>
<div class="row">
<div class="col-sm-5"><br>
<button type="submit" name=opendir value="opendir"  class="btn-sm btn-success btn-sm">Open directory</button><br>
</div>
<div class="col-sm-5">
<? if (isset($_SESSION['labbot3d']['imgdir'])){ ?>
<button type="submit" name=snap value="snap"  class="btn-sm btn-warning btn-sm">Snap pic</button>&nbsp;&nbsp;
<button type="submit" name=openpic value="openpic"  class="btn-sm btn-success btn-sm">Open pic</button>
<? } ?>
</div>


</div>
<div class="row">
<div class="col-sm-5">


<?
$ff = scandir('./imaging/');
?>
<? $size = count($ff); ?>
<? if($size > 11) {$size = 10;} ?>
 <select class="form-control form-control-sm" name="imgdirlist" size=3>
 <?for($i=2;$i<count($ff);$i++){?>
 <? if ($_SESSION['labbot3d']['imgdir'] == $ff[$i]) {?>
   <option value=<?=$ff[$i]?> selected><?=$ff[$i]?></option>
  <? } else { ?>
   <option value=<?=$ff[$i]?>><?=$ff[$i]?></option>
<? } ?>
<? } ?>
 </select>
</div>
<div class="col-sm-5">
<? if (isset($_SESSION['labbot3d']['imgdir'])){ ?>
<?
$fff = scandir('./imaging/'.$_SESSION['labbot3d']['imgdir']);
//var_dump($fff);
?>
 <select class="form-control form-control-sm" name="imglist" size=3>
 <?for($i=2;$i<count($fff);$i++){?>
 <? if($_SESSION['labbot3d']['img'] == $fff[$i]) {?>
   <option value=<?=$fff[$i]?> selected><?=$fff[$i]?></option>
  <? } else { ?>
   <option value=<?=$fff[$i]?>><?=$fff[$i]?></option>
 <? } ?> 
<? } ?> 
 </select>

<? } ?> 
</form>
</div>
</div>
<div class="row"><br></div>
<div class="row">
<div class="col-sm-1">&nbsp;</div>
<div class="col-sm-10"></div>
 <? if(isset($_SESSION['labbot3d']['img'])) {?>
 <img src=imaging/<?=$_SESSION['labbot3d']['imgdir']?>/<?=$_SESSION['labbot3d']['img']?> width=320 height=240>
 <? }?>
</div>
</div>
