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
                'route' => 'cryptasquadsync::configure',
                'permission' => 'squadsync.edit'
            ],
            'isntructions' => [
                'name' => 'Instructions',
                'icon' => 'fas fa-book-open',
                'route_segment' => 'squadsync',
                'route' => 'cryptasquadsync::instructions',
                'permission' => 'squadsync.edit'
            ],
            'about' => [
                'name' => 'About',
                'icon' => 'fas fa-info',
                'route_segment' => 'squadsync',
                'route' => 'cryptasquadsync::about',
                'permission' => 'squadsync.edit'
            ],
        ]
    ]
];
