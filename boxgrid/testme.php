<!DOCTYPE html>

<html>
<head>

<?php
	$w = (isset($_REQUEST["width"])? '&width=' . $_REQUEST["width"] : '');
	$h = (isset($_REQUEST["height"])? '&height=' . $_REQUEST["height"] : '');
	$s = (isset($_REQUEST["space"])? '&space=' . $_REQUEST["space"] : '');
	$str = $w . $h . $s;
?>

<link rel="stylesheet" href="index.php?columns=6&namespace=grid<?=$str;?>" />

<style>
  .box {background-color: #CCC;}
  #grid {margin-right: auto; margin-left: auto;}
  form {clear: both;}
</style>

</head>

<body>
<h1>Test me!</h1>
<p>This page allows you to test the flexibility of BoxGrid, and create your own Grids!</p>
<p>For <a href="http://code.google.com/p/boxgrid">more information on boxgrid</a>, we whent to great lengths to make the documentation and thorough and accessible as possible</p>

<div id="grid">
	<!-- first row -->
	<div class="box w1 h1"> </div>
	<div class="box w1 h1"> </div>
	<div class="box w1 h1"> </div>
	<div class="box w1 h1"> </div>
	<div class="box w1 h1"> </div>
	<div class="box w1 h1 end"> </div>
	<!-- second row -->
	<div class="box w3 h1"> </div>
	<div class="box w3 h1 end"> </div>
	<!-- third row -->
	<div class="box w1 h1"> </div>
	<div class="box w2 h1"> </div>
	<div class="box w2 h1 margin l1 end"> </div>
</div>

<form action="testme.php">
	<label>Width: <input type="text" name="width" value="" />px</label>
	<label>Height: <input type="text" name="height" value="" />px</label>
	<label>Gap: <input type="text" name="space" value="" />px</label>
	<input type="submit" value="update" />
</form>

</body>
</html>