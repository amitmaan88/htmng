<?php
define('LIMIT', 5);
define('DESTINATION_IMAGE', "\\image\\");

function staticDropdown($type, $empty='') {
    $dropdown =  array();
    if($empty!='')  $dropdown[] = $empty;
    switch ($type) {
        case 'userType':
            $dropdown = $dropdown + [1 => 'Owner', 2 => 'Tenant'];
            break;
        case 'status':
            $dropdown = $dropdown + [0 => 'Inactive', 1 => 'Active'];
            break;
        case 'foodDay':
            $dropdown = $dropdown + ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
            break;
    }
    return $dropdown;
}
