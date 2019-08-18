<?php
/**
 * PAGES
 */

// Page list
// Info: Index of pages must be unique
$pages = [
    'cs' => [
        'uvod' => [
            'slug'                  =>  'readme',
            'template'              =>  'homepage',
            'title'                 =>  l('page-1', 'title', 'cs'),
            'description'           =>  l('page-1', 'description', 'cs'),
            'keywords'              =>  l('page-1', 'keywords', 'cs'),
            'showInMenu'            =>  true,
            'defaultLanguagePage'   =>  true
        ],
        'typografie' => [
            'slug'          =>  'typografie',
            'template'      =>  'typography',
            'title'         =>  l('page-2', 'title', 'cs'),
            'description'   =>  l('page-2', 'description', 'cs'),
            'keywords'      =>  l('page-2', 'keywords', 'cs'),
            'showInMenu'    =>  true
        ],
        'komponenty' => [
            'slug'          =>  'komponenty',
            'template'      =>  'components',
            'title'         =>  l('page-3', 'title', 'cs'),
            'description'   =>  l('page-3', 'description', 'cs'),
            'keywords'      =>  l('page-3', 'keywords', 'cs'),
            'showInMenu'    =>  true
        ],
        'vlastni-komponenty' => [
            'slug'          =>  'vlastni-komponenty',
            'template'      =>  'custom-components',
            'title'         =>  l('page-4', 'title', 'cs'),
            'description'   =>  l('page-4', 'description', 'cs'),
            'keywords'      =>  l('page-4', 'keywords', 'cs'),
            'showInMenu'    =>  true
        ]
    ],
    'en' => [
        'homepage' => [
            'slug'                  =>  'readme',
            'template'              =>  'homepage',
            'title'                 =>  l('page-1', 'title', 'en'),
            'description'           =>  l('page-1', 'description', 'en'),
            'keywords'              =>  l('page-1', 'keywords', 'en'),
            'showInMenu'            =>  true,
            'defaultLanguagePage'   =>  true
        ],
       'typography' => [
            'slug'          =>  'typography',
            'template'      =>  'typography',
            'title'         =>  l('page-2', 'title', 'en'),
            'description'   =>  l('page-2', 'description', 'en'),
            'keywords'      =>  l('page-2', 'keywords', 'en'),
            'showInMenu'    =>  true
       ],
       'components' => [
            'slug'          =>  'components',
            'template'      =>  'components',
            'title'         =>  l('page-3', 'title', 'en'),
            'description'   =>  l('page-3', 'description', 'en'),
            'keywords'      =>  l('page-3', 'keywords', 'en'),
            'showInMenu'    =>  true
       ],
       'custom-components' => [
            'slug'          =>  'custom-components',
            'template'      =>  'custom-components',
            'title'         =>  l('page-4', 'title', 'en'),
            'description'   =>  l('page-4', 'description', 'en'),
            'keywords'      =>  l('page-4', 'keywords', 'en'),
            'showInMenu'    =>  true
        ]
    ]
];
?>
