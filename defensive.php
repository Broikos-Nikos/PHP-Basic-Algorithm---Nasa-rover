<?php

function rover_action($position, $movement, $grid, $other_rover_position){
    
    $grid  = str_replace(" ", "", $grid);
    $gridX = substr($grid, 0, 1);
    $gridY = substr($grid, 1, 1);
    $gridX = (int) $gridX;
    $gridY = (int) $gridY;
    
    $positionX = substr($position, 0, 1);
    $positionY = substr($position, 1, 1);
    $positionX = (int) $positionX;
    $positionY = (int) $positionY;
    $facing    = substr($position, 2, 1);

    $other_rover_positionX = substr($other_rover_position, 0, 1);
    $other_rover_positionY = substr($other_rover_position, 1, 1);
    $other_rover_positionX = (int) $other_rover_positionX;
    $other_rover_positionY = (int) $other_rover_positionY;
    
    $strmovement = strlen($movement);
    for ($i = 0; $i <= $strmovement; $i++) {
        $next_move = substr($movement, $i, 1);
        if ($next_move == "M") {
            if ($facing == "N") {
            	if($positionX==$other_rover_positionX && ($positionY+1)==$other_rover_positionY){
            		print_r("The rover moving will bump to the other rover if it continues to move forward. Action aborted.\n");
            	}elseif(($positionY + 1)>$gridY){
                    print_r("The rover will move out of bounds. Action aborted.\n");
                }else{
                	$positionY = $positionY + 1;
            	}
            } elseif ($facing == "S") {
            	if($positionX==$other_rover_positionX && ($positionY-1)==$other_rover_positionY){
            		print_r("The rover moving will bump to the other rover if it continues to move forward. Action aborted.\n");
                }elseif(($positionY - 1)<$gridY){
                    print_r("The rover will move out of bounds. Action aborted.\n");
            	}else{
                	$positionY = $positionY - 1;
                }
            } elseif ($facing == "E") {
            	if($positionY==$other_rover_positionY && ($positionX+1)==$other_rover_positionX){
            		print_r("The rover moving will bump to the other rover if it continues to move forward. Action aborted.\n");
                }elseif(($positionX + 1)>$gridX){
                    print_r("The rover will move out of bounds. Action aborted.\n");
            	}else{
                	$positionX = $positionX + 1;
                }
            } elseif ($facing == "W") {
            	if($positionY==$other_rover_positionY && ($positionX-1)==$other_rover_positionX){
            		print_r("The rover moving will bump to the other rover if it continues to move forward. Action aborted.\n");
                }elseif(($positionX - 1)<$gridX){
                    print_r("The rover will move out of bounds. Action aborted.\n");
            	}else{
                	$positionX = $positionX - 1;
            	}
            }
        } elseif ($next_move == "R") {
            if ($facing == "N") {
                $facing = "E";
            } elseif ($facing == "S") {
                $facing = "W";
            } elseif ($facing == "E") {
                $facing = "S";
            } elseif ($facing == "W") {
                $facing = "N";
            }
        } elseif ($next_move == "L") {
            if ($facing == "N") {
                $facing = "W";
            } elseif ($facing == "S") {
                $facing = "E";
            } elseif ($facing == "E") {
                $facing = "N";
            } elseif ($facing == "W") {
                $facing = "S";
            }
        }
    }
    return ($positionX . " " . $positionY . " " . $facing);
}

$grid             = readline("Grid: ");
$rover_1_position = readline("Position of Rover 1: ");
$rover_1_movement = readline("Movement of Rover 1: ");
$rover_2_position = readline("Position of Rover 2: ");
$rover_2_movement = readline("Movement of Rover 2: ");

$rover_1_position = rover_action($rover_1_position, $rover_1_movement, $grid, $rover_2_position);
print_r($rover_1_position . "\n");
$rover_2_position = rover_action($rover_2_position, $rover_2_movement, $grid, $rover_1_position);
print_r($rover_2_position . "\n");
?>