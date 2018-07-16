<?php

function staticDropdown($type) {
    switch ($type) {
        case 'userType':
            $dropdown = [1 => 'Owner', 2 => 'Tenant'];
            break;
        case 'foodDay':
            $dropdown = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
            break;
    }
    return $dropdown;
}
