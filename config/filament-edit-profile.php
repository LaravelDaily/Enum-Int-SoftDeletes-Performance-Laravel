<?php

return [
    'show_custom_fields' => true,
    'custom_fields' => [
        'github' => [
            'type' => 'text',
            'label' => 'GitHub username',
            'placeholder' => '',
            'rules' => 'nullable|string|max:255',
            'required' => false,
        ],
        'twitter' => [
            'type' => 'text',
            'label' => 'Twitter username',
            'placeholder' => '',
            'rules' => 'nullable|string|max:255',
            'required' => false,
        ],
    ],
];
