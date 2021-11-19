<?php

return [
    [
        'name' => 'Surveys',
        'flag' => 'survey.index',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'survey.create',
        'parent_flag' => 'survey.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'survey.edit',
        'parent_flag' => 'survey.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'survey.destroy',
        'parent_flag' => 'survey.index',
    ],
];
