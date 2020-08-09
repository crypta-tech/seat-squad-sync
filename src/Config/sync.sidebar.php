<?php 
/**
 * User: Crypta Electrica <crypta@crypta.tech>
 * Date: 05/08/2020
 */

return [
    'squadsync' => [
        'name' => 'Squad Sync',
        'permission' => 'squadsync.edit',
        'route_segment' => 'squadsync',
        'icon' => 'fas fa-sync',
        'entries'       => [
            'edit' => [
                'name' => 'Configure',
                'icon' => 'fas fa-cogs',
                'route_segment' => 'squadsync',
                'route' => 'squadsync.configure',
                'permission' => 'squadsync.edit'
            ],
            'isntructions' => [
                'name' => 'Instructions',
                'icon' => 'fas fa-book-open',
                'route_segment' => 'squadsync',
                'route' => 'squadsync.instructions',
                'permission' => 'squadsync.edit'
            ],
            'about' => [
                'name' => 'About',
                'icon' => 'fas fa-info',
                'route_segment' => 'squadsync',
                'route' => 'squadsync.about',
                'permission' => 'squadsync.edit'
            ],
        ]
    ]
];
