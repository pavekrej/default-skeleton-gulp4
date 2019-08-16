<?php
/**
 * PAGES
 */

// Page list
// Info: Index of pages must be unique
$pages = [
    'en' => [
        'homepage' => [
            'slug'                  =>  'homepage',
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
    ],
    'cs' => [
        'uvod' => [
            'slug'                  =>  'uvod',
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
    'sk' => [
        'uvod-sk' => [
            'slug'                  =>  'uvod',
            'template'              =>  'homepage',
            'title'                 =>  l('page-1', 'title', 'sk'),
            'description'           =>  l('page-1', 'description', 'sk'),
            'keywords'              =>  l('page-1', 'keywords', 'sk'),
            'showInMenu'            =>  true,
            'defaultLanguagePage'   =>  true
        ],
        'typografie-sk' => [
            'slug'          =>  'typografie',
            'template'      =>  'typography',
            'title'         =>  l('page-2', 'title', 'sk'),
            'description'   =>  l('page-2', 'description', 'sk'),
            'keywords'      =>  l('page-2', 'keywords', 'sk'),
            'showInMenu'    =>  true
        ],
        'komponenty-2' => [
            'slug'          =>  'komponenty',
            'template'      =>  'components',
            'title'         =>  l('page-3', 'title', 'sk'),
            'description'   =>  l('page-3', 'description', 'sk'),
            'keywords'      =>  l('page-3', 'keywords', 'sk'),
            'showInMenu'    =>  true
        ],
        'vlastni-komponenty-2' => [
            'slug'          =>  'vlastni-komponenty',
            'template'      =>  'custom-components',
            'title'         =>  l('page-4', 'title', 'sk'),
            'description'   =>  l('page-4', 'description', 'sk'),
            'keywords'      =>  l('page-4', 'keywords', 'sk'),
            'showInMenu'    =>  true
        ]
    ]
];
?>
