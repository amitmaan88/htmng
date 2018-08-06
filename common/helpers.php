<?php
function staticDropdown($type, $empty = '') {
    $dropdown = array();
    if ($empty != '')
        $dropdown[] = $empty;
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
        case 'complaints':
            $dropdown = $dropdown + ["Access Control", "Air Condition", "Lighting", "Plumbing", "Carpentry", "Housekeeping"];
            break;
    }
    return $dropdown;
}

function pr($array, $exist = 0) {
    echo "<pre>";
    print_r($array);
    echo "</pre>";
    if ($exist == 1)
        exit;
}
