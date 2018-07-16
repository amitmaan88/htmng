<?php

function staticDropdown($type) {
    switch ($type) {
        case 'room':
            $dropdown = ['1' => 'D', '2' => 'E'];
            break;
        case 'foodDay':
            $dropdown = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
            break;
    }
    return $dropdown;
}
