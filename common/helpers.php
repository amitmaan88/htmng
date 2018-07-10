<?php

function staticDropdown($type){
	switch($type){
		case 'room':
			$dropdown = ['1'=>'D','2'=>'E'];
		break;
	}
	return $dropdown;
}
