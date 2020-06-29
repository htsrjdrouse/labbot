<hr>
<form action=object.editor.php method=post>
<h4>Edit/Add Objects</h4>
 <? $indetype = $types[0][$_SESSION['labbotjson']['targettrack']]; ?>
<br>
<button type="submit" name=addtarget class="btn-sm btn-warning">Add Target</button>
 &nbsp; &nbsp; &nbsp; 
<!--<button type="submit" name=generatetargetgroup class="btn btn-success">Generate Target Group</button>-->
&nbsp; &nbsp; &nbsp;
<button type="submit" name=savetarget class="btn-sm btn-danger">Save Target Settings</button>
&nbsp; &nbsp; &nbsp;
<br><br>
<table cellpadding=10><tR>

<td>
<div class="row">
<div class="col-sm-2"><b>Name</b> &nbsp; &nbsp; &nbsp;</div>
<div class="col-sm-6"><input type=text name=tarname value="<?=$indetype['name']?>" size=20></div>
<div class="col-sm-4"><blockquote>
<? if($indetype['status'] == "on"){?>
<b>Active</b> <input type=radio name=active value="Active" checked> <b>Deactive</b> <input type=radio name=active value="Deactive">
<? } else { ?>
<b>Active</b> <input type=radio name=active value="Active"> <b>Deactive</b> <input type=radio name=active value="Deactive" checked>
<? } ?>
</blockquote>
</div>
</div>
</td>
</tr><tr>
<td>
<div class="row">
<div class="col-sm-3"><b>Catalog</b> &nbsp; &nbsp; &nbsp;</div>
<div class="col-sm-9"><input type=text name=tarcatalog value="<?=$indetype['catalog']?>" size=20></div>
</div>
</td>
</tr><tr>
<td>
<div class="row">
<div class="col-sm-4"> <b>Size X</b> &nbsp;<input type=text name=X value="<?=$indetype['X']?>" size=7></div>
<div class="col-sm-4"> <b>Y</b> &nbsp;<input type=text name=Y value="<?=$indetype['Y']?>" size=7></div>
<div class="col-sm-4"> <b>Z</b> &nbsp;<input type=text name=Z value="<?=$indetype['Z']?>" size=7></div>
</div>
</tr><tr>
<td>
<div class="row">
<div class="col-sm-4"><b>Position X</b></div>
<div class="col-sm-3"><input type=text name=posx value="<?=$indetype['posx']?>" size=3><br>
<?=$indetype['posx']+$indetype['marginx']?>
</div>
<div class="col-sm-1"><b>Y</b>
</div>
<div class="col-sm-3"><input type=text name=posy value="<?=$indetype['posy']?>" size=3>
 <br>
<?=$indetype['posy']-$indetype['marginy']?>
</div>
</div>
</td>
</tr><tr>
<td>
<div class="row">
<div class="col-sm-3"><b>Well row</b> &nbsp; &nbsp; &nbsp;</div>
<div class="col-sm-3"><input type=text name=wellrow value=<?=$indetype['wellrow']?> size=3></div>
<div class="col-sm-3"><b>Column</b> &nbsp; &nbsp; &nbsp;</div>
<div class="col-sm-3"><input type=text name=wellcolumn value=<?=$indetype['wellcolumn']?> size=3></div>
</div>
</tD>
</tr>
<tr>
<td>
<div class="row">
<div class="col-sm-3"><b>Well row spacing</b> &nbsp; &nbsp; &nbsp;</div>
<div class="col-sm-3"><input type=text name=wellrowsp value=<?=$indetype['wellrowsp']?> size=3></div>
<div class="col-sm-3"><b>Column spacing</b> &nbsp; &nbsp; &nbsp;</div>
<div class="col-sm-3"><input type=text name=wellcolumnsp value=<?=$indetype['wellcolumnsp']?> size=3></div>
</div>
</tD>
</tr><tr>
<td>
<br>
<div class="row">
<div class="col-sm-3"><b>Margin X</b> </div>
<div class="col-sm-3"><input type=text name=marginx value=<?=$indetype['marginx']?> size=3></div>
<div class="col-sm-3"><b>Y</b> </div>
<div class="col-sm-3"><input type=text name=marginy value=<?=$indetype['marginy']?> size=3></div>
</div>
</td>
</tr>
<tr>
<td>
<div class="row">
<div class="col-sm-6"><b>Shape</b> 
<? if ($indetype['shape'] == "ellipse"){?>
 <b>Ellipse</b> <input type=radio name=shape value="ellipse" checked> 
 <b>Square</b> <input type=radio name=shape value="square"> 
<? } else { ?>
 <b>Ellipse</b> <input type=radio name=shape value="ellipse"> 
 <b>Square</b> <input type=radio name=shape value="square" checked> 
<? } ?>
</div>
<div class="col-sm-3"><b>X diam </b><br><input type=text name=shapex value=<?=$indetype['shapex']?> size=3></div>
<div class="col-sm-3"><b>Y diam </b><bR><input type=text name=shapey value=<?=$indetype['shapey']?> size=3></div>
</div>
</tD>
</tr>
<tr>
<td>
<div class="row">
<div class="col-sm-6"><b>Z travel height to surface</b> </div>
<div class="col-sm-3"><input type=text name=ztrav value=<?=$indetype['ztrav']?> size=4></div>
</div>
</tD>
</tr><tr>
<td>
<div class="row">
<div class="col-sm-6"><b>Color</b></div>
<div class="col-sm-3"><input type=text name=color value=<?=$indetype['color']?> size=10></div>
</div>
</tD>
</tR>
</table>
</form>










