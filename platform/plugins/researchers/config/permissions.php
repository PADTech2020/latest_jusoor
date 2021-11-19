<?php

return [
    [
        'name' => 'Researchers',
        'flag' => 'researchers.index',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'researchers.create',
        'parent_flag' => 'researchers.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'researchers.edit',
        'parent_flag' => 'researchers.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'researchers.destroy',
        'parent_flag' => 'researchers.index',
    ],
];
