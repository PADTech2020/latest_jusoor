<?php

return [
    [
        'name' => 'Circuits',
        'flag' => 'circuit.index',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'circuit.create',
        'parent_flag' => 'circuit.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'circuit.edit',
        'parent_flag' => 'circuit.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'circuit.destroy',
        'parent_flag' => 'circuit.index',
    ],
];
