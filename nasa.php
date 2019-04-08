<?php 
//C:\xampp\php\php.exe C:\nasa.php

function rover_action($position, $movement,$grid) {

$grid=str_replace(" ","",$grid);
$gridX=substr( $grid, 0, 1 );
$gridY=substr( $grid, 1, 1 );
$gridX=(int)$gridX;
$gridY=(int)$gridY;

$position=str_replace(" ","",$position);
$positionX=substr( $position, 0, 1 );
$positionY=substr( $position, 1, 1 );
$positionX=(int)$positionX;
$positionY=(int)$positionY;
$facing=substr( $position, 2, 1 );




$strmovement = strlen( $movement );
for( $i = 0; $i <= $strmovement; $i++ ) {
    $next_move = substr( $movement, $i, 1 );
	if($next_move=="M"){
		if($facing=="N"){
			$positionY=$positionY+1;
		}elseif($facing=="S"){
			$positionY=$positionY-1;
		}elseif($facing=="E"){
			$positionX=$positionX+1;
		}elseif($facing=="W"){
			$positionX=$positionX-1;
		}

	} elseif($next_move=="R") {
		if($facing=="N"){
			$facing="E";
		}elseif($facing=="S"){
			$facing="W";
		}elseif($facing=="E"){
			$facing="S";
		}elseif($facing=="W"){
			$facing="N";
		}

	} elseif($next_move=="L") {
		if($facing=="N"){
			$facing="W";
		}elseif($facing=="S"){
			$facing="E";
		}elseif($facing=="E"){
			$facing="N";
		}elseif($facing=="W"){
			$facing="S";
		}
	}
}

return($positionX." ".$positionY." ".$facing);
}

$grid=readline("Grid: ");
$rover_1_position=readline("Position of Rover 1: ");
$rover_1_movement=readline("Movement of Rover 1: ");
$rover_2_position=readline("Position of Rover 2: ");
$rover_2_movement=readline("Movement of Rover 2: ");


$rover_1_position=rover_action($rover_1_position,$rover_1_movement,$grid);
print_r($rover_1_position."\n");
$rover_2_position=rover_action($rover_2_position,$rover_2_movement,$grid);
print_r($rover_2_position."\n");
 ?>