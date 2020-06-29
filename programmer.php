<div class="row">
<h2> Build Macros</h2>
<br>
</div>
<div class="row">
<form action=program.editor.php method=post>
 <div class="col-sm-12">
 <b>Motion</b><br>
 </div>
</div>
<div class="row">
 <div class="col-sm-4">
 <? $size=count($_SESSION['labbotjson']['types'][0]); if ($size > 11) { $size = 10;} ?>
 <select class="form-control form-control-sm" name="targetlist" size=<?=$size?>>
<? foreach($types[0] as $key => &$val){ ?>
 <? if ($val['name'] == $_SESSION['labbotjson']['targetactive']) { ?> 
 <? $_SESSION['labbotjson']['targettrack'] = $key; ?>
   <option value="<?=$val['name']?>" selected><?=$val['name']?></option>
 <? } else { ?>
 <option value="<?=$val['name']?>"><?=$val['name']?></option>
<? }?>
<? }?>
 </select>
 </div>
 <div class="col-sm-2">
 Row: <select name=row>
  <? for($i=1;$i<13;$i++){ ?>
  <option value="<?=$i?>"><?=$i?></option>
  <? } ?>
</select>
 <br>Above <br>Z: <input type=text name=zheight value="0" size=4>
 </div>
 <div class="col-sm-2">
 Feedrate<br>
 <? if(!(isset($_SESSION['labbotprogram']['feedrate']))){ $_SESSION['labbotprogram']['feedrate']  = 3000; }?>
 <input type=text name=feedrate value="<?=$_SESSION['labbotprogram']['feedrate']?>" size=4>
 </div>

 <div class="col-sm-2"> 
 <button type="submit" name=motionsubmitstep class="btn-sm btn-success">Insert step</button>
 </div>
 <div class="col-sm-2">
 <button type="submit" name=ejectpipettes class="btn-sm btn-warning">Eject pipettes</button>
 </div>

</div>
<div class="row">
 <div class="col-sm-12"><br> </div>
</div>
<div class="row">
 <div class="col-sm-2"> <b>Valve</b><br></div>
 <div class="col-sm-4"> 
  <? for($i=1;$i<9;$i++){ ?>
  <?=$i?><input type=checkbox name=valve<?=$i?> checked>
 <?if($i == 4){ ?> <br><? } ?>
  <? } ?>
 </div>
 <div class="col-sm-4"> 
 <b>Position</b><br>
 <select name=valvepos>
  <option value="valveinput">Valve Input</option>
  <option value="valveoutput">Valve Output</option>
  <option value="valvebypass">Valve Bypass</option>
</select>
 </div>
 <div class="col-sm-2"> 
 <button type="submit" name=valvesubmitstep class="btn-xs btn-success">Insert step</button>
 </div>
</div>
<div class="row">
 <div class="col-sm-12"><br> </div>
</div>
<div class="row">
 <div class="col-sm-2"><b>Syringe pump</b>
 </div> 
 <div class="col-sm-4"> 
 <?if(!isset($_SESSION['syringefeedrate'])){ $_SESSION['syringefeedrate'] = 3000;}?>
 <?$jsonimg = json_decode(file_get_contents('nx.imgdataset.json'), true); ?>
<b>Plunger position</b> <input type=text name=esteps value="<?=$jsonimg['currcoord']['E']?>" size=5></td>
 </div>
 <div class="col-sm-4"> 
 <b>Feedrate</b> <input type=text name=syringefeedrate value="<?=$_SESSION['syringefeedrate']?>" size=5></td>
 </div>
 <div class="col-sm-2"> 
 <button type="submit" name=syringesubmitstep class="btn-xs btn-success">Insert step</button>
 </div>
</div>
<div class="row">
 <div class="col-sm-12"><br> </div>
</div>
<div class="row">
 <div class="col-sm-3"><b>Plugs</b><br>
  <input type=radio name=plug value=1> <b>Wash</b><br>
  <input type=radio name=plug value=2> <b>Waste</b><br>
  <input type=radio name=plug value=3> <b>Pressure</b><br>
 </div>
 <div class="col-sm-3">
  <b>On</b>&nbsp;<input type="radio" id="on" name="pump" value="on"><br>
  <b>Off</b>&nbsp;<input type="radio" id="off" name="pump" value="off">
  <input type=hidden name=magnitude value="255">
  <!--
  <b>Magnitude</b><br>
  <input type=text name=magnitude value="255" size=4><br>
  -->
  </div>
 <div class="col-sm-2">
  </div>
 <div class="col-sm-2">
  <br>
 </div> 
 <div class="col-sm-2">
 <button type="submit" name=gpiosubmitstep class="btn-xs btn-success">Insert step</button>
 </div> 
</div>
</form>
<div class="row">
 <div class="col-sm-8"> 
 <br>
 </div>
</div>
<script>
 $('#select_all').click(function() {
        $('#someSelectId option').prop('selected', true);
    });
</script>
<script>
$(document).ready(function(){
    $('input[type="button"]').click(function(){
        //var $op = $('#select2 option:selected'),
        var $op = $('#someSelectId option:selected'),
            $this = $(this);
        if($op.length){
            ($this.val() == 'Up') ? 
                $op.first().prev().before($op) : 
                $op.last().next().after($op);
        }
    });
});
</script>

<form action=program.editor.php method=post>
<div class="row">
 <div class="col-sm-2">
 <b>Camera</b><br><br>
 </div>
 <?if(!isset($_SESSION['labbot3d']['imgdir'])){ ?>
 <div class="col-sm-8">
  <b><u>Please select a directory to save images</u></b>
 </div>
  <? } else { ?>
 <div class="col-sm-5"> 
 <? if(!isset($_SESSION['labbot3d']['campredelay'])){ $_SESSION['labbot3d']['campredelay'] = 1; } ?>
 <? if(!isset($_SESSION['labbot3d']['campostdelay'])){ $_SESSION['labbot3d']['campostdelay'] = 1; } ?>
 <b>Delay</b><br>
 <b>Pre: </b> &nbsp;<input type=text name=campredelay value=<?=$_SESSION['labbot3d']['campredelay']?> size=2>
 <b>Post: </b> &nbsp;<input type=text name=campostdelay value=<?=$_SESSION['labbot3d']['campostdelay']?> size=2>
  <br><br>
 </div>
 <div class="col-sm-3">
 <b>Filename</b> <br><input type=text name=fname value="" size=4>
 </div>
 <div class="col-sm-2">
 <button type="submit" name=camsubmitstep class="btn-xs btn-success">Insert step</button>
 </div> 
  <? } ?>
</div>
</form>

<form action=program.editor.php method=post>
<div class="row">
 <div class="col-sm-4">
 <?=$types[0][$val['object']]['name']?>
<?$labbotprogramjson = json_decode(file_get_contents('labbot.programs.json'), true);?>
<? if(isset($labbotprogramjson)){ ?>
 <b>Macro assembler</b><br><br>
 <button type="submit" name=editmacro class="btn-xs btn-primary">Save Macro</button><br><br>
 <button type="submit" name=displaymacro class="btn-xs btn-success">Display Macro</button><br>
 <br><button type="submit" name=deletemacro class="btn-xs btn-danger">Delete Macro</button><br>
 <br>
 </div>  
 <div class="col-sm-8">
 <input type="button" value="Up" style="background-color: white;color:black;border: 2px solid #4CAF50;border-radius: 12px;">
 <input type="button" value="Down" style="background-color: white;color:black;border: 2px solid #FF6347;border-radius: 12px;"><br>
 <? $size = count($labbotprogramjson);
   if ($size > 9) {$size = 10; }
  ?>
 <select class="form-control form-control-sm" name="macro[]" size="<?=$size?>" multiple id="someSelectId">
<? foreach($labbotprogramjson as $key => &$val){ ?>
	<option value=<?=$key?>><?=$val['mesg']?> </option>
<? }?>
 </select>
<? }?>
 </div>
</div>
</form>
