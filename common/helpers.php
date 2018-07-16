<?php

function staticDropdown($type, $empty='') {
    $dropdown =  array();
    if($empty!='')  $dropdown[] = $empty;
    switch ($type) {
        case 'userType':
            $dropdown = $dropdown + [1 => 'Owner', 2 => 'Tenant'];
            break;
        case 'foodDay':
            $dropdown = $dropdown + ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
            break;
    }
    return $dropdown;
}
