<?php
	# send out headers to make this into a CSS file
	header("Content-type: text/css");
	
	# get the variables
	$columnWidth =	(isset($_REQUEST["width"])? $_REQUEST["width"] : 150);
	$columnHeight = (isset($_REQUEST["height"])? $_REQUEST["height"] : $columnWidth);
	$columnSpace =	(isset($_REQUEST["gap"])? $_REQUEST["gap"] : 10);
	$columnCount = 	(isset($_REQUEST["columns"])? $_REQUEST["columns"] : 8);
	$columnFlex =	(isset($_REQUEST["flexible"])? $_REQUEST["flexible"] : FALSE);
	$namespace = 	(isset($_REQUEST["namespace"])? $_REQUEST["namespace"] : FALSE);
	
	# parse infromation
	if ($columnFlex == "false") {
		$columnFlex = FALSE;
	}
	if ($namespace) {
		$n = "#" . $namespace . " ";
	} else {
		$n = "";
	}
	
	#figure out the total width
	
	if (!$columnFlex) {
		$tw = ($columnWidth + $columnSpace) * $columnCount;
		$tw .= 'px';
	} else {
		$tw = '100%';
	}
	
	# output the head information
?>
/***********************************************************
  BoxGrid - 2D CSS Grid Framework
    Copyright (C) 2011, Pedro Costa Coitinho

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>
 -------------------------------------------------------
  generated: <?=date('l jS \of F Y h:i:s A');?> 
  
  total width: <?=$tw;?> 
  in <?=$columnCount;?> columns
  grid:
    width: <?=$columnWidth . ($columnFlex? '%' : 'px');?> 
    height: <?php
    	if ($columnHeight != 'false') {
    		echo $columnHeight . 'px';
    	} else {
    		echo 'Not controlled on grid';
    	} ?> 
    gap: <?=$columnSpace . ($columnFlex? '%' : 'px');?> 
  -------------------------------------------------------
***********************************************************/
<?php

	# output the main classes
	
	if ($namespace) :
?>

  <?=$n;?> {width: <?=$tw;?>}
<?php
	else :
?>

  .container {
    width: <? echo $tw;
   		if (!$columnFlex) : ?> 
    margin-left: <?=($columnSpace / 2) . 'px';?>; 
    margin-right: <?=($columnSpace / 2). 'px';?>;
<?php endif; ?>
  }
<?php
	endif;
?>

  .box {
  	display: block;
  	float: left;
  	clear: none;
	margin: 0px;
	margin-right: <?=$columnSpace . ($columnFlex? "%" : "px");?>;
<?php if($columnHeight != "false"): ?>
	margin-bottom: <?=$columnSpace . ($columnFlex? "%" : "px");?>;
<?php endif; ?>
  }
  .last, .end {margin-right: 0px; clear: right;}
  
  /*********************
   the box class is used with the folowing
   classes to determine its dimension
  *********************/

<?php

	# calculate the horizontal columns
	$i = 1;
	while ($i <= $columnCount) {
		# set the measurements
		$w = $columnWidth * $i 
			+ $columnSpace * ($i - 1);
		# px or %?
		$w .= ($columnFlex? "%" : "px");
		
		# output the width
?>
  <?=$n;?>.w<?=$i;?> {width: <?=$w;?>;<?
  	if ($i == $columnCount) {
  		# stops the margin-left
  		echo " margin-right: 0px;";
  	}
  ?>}
<?php
		
		# increase i
		$i++;
	}
	
	# gives a space
	echo "\n";
	
	# do the same for height!
	# if you need height, in fact
	if ($columnHeight != 'false') :
		$i = 1;
		while ($i <= $columnCount) {
			# set the measurements
			$h = $columnHeight * $i 
				+ $columnSpace * ($i - 1);
			$h .= "px";
			
			# output the height
?>
  <?=$n;?>.h<?=$i;?> {height: <?=$h;?>;}
<?php
		
			# increase i
			$i++;
		}
	endif; # columnHeight != 'false'
?>

  /*********************
   floating elements let you position
   elements relatively or absolutely
  *********************/
  
  .float {position: relative;}
  .float.absolute {position: absolute;}
  
<?php
	
	# left/right, up/down
$i = 1;
	while ($i <= $columnCount - 2) {
		# set the measurements
		$w = ($columnWidth + $columnSpace) * $i;
		$h = ($columnHeight + $columnSpace) * $i;
		# px or %?
		$w .= ($columnFlex? "%" : "px");
		$h .= ($columnFlex? "%" : "px");
		
		# output the height
?>
  <?=$n;?> .float.l<?=$i;?> {right: <?=$w;?>;}  <?=$n;?> .float.r<?=$i;?> {left: <?=$w?>;} 
  <?=$n;?> .float.u<?=$i;?> {bottom: <?=$h?>;} <?=$n;?> .float.d<?=$i;?> {top: <?=$h?>;}  
<?php
		
		# increase i
		$i++;
	}
?>

  /*********************
   the margin class increases the margins
   around an object
  *********************/
  
<?php
	
	# left/right, up/down
	$i = 1;
	while ($i <= $columnCount - 2) {
		# set the measurements
		$w = ($columnWidth + $columnSpace) * $i;
		$h = ($columnHeight + $columnSpace) * $i;
		# px or %?
		$w .= ($columnFlex? "%" : "px");
		$h .= ($columnFlex? "%" : "px");
		
		# output the height
?>
  <?=$n;?> .margin.l<?=$i;?> {margin-left: <?=$w;?>;} <?=$n;?> .margin.r<?=$i;?> {margin-right: <?=$w?>;} 
  <?=$n;?> .margin.u<?=$i;?> {margin-top: <?=$h?>;}  <?=$n;?> .margin.d<?=$i;?> {margin-bottom: <?=$h?>;}  
<?php
		
		# increase i
		$i++;
	}