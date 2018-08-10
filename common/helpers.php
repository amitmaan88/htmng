<?php

/**
 * Helper to create the drop down
 *
 * @param string $type choices as ['userType', 'status', 'foodDay', 'complaints']
 * @param string $empty Additional value added the drop down optional
 * @return array $dropdown
 */
function staticDropdown($type, $empty = ''): array {
    $dropdown = array();
    if ($empty != '')
        $dropdown[] = $empty;
    switch ($type) {
        case 'userType':
            $dropdown = [0 => 'Super Admin', 1 => 'Owner', 2 => 'Tenant'];
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
