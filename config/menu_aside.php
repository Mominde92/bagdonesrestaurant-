<?php
// Aside menu
return [

    'items' => [
        // Dashboard
        [
            'title' => 'Dashboard',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/',
            'new-tab' => false,
        ],

        // Custom
        [
            'section' => 'Collection Types',
        ],
        [
            'title' => 'Localization',
            'icon' => 'media/svg/icons/Home/Book-open.svg',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
                // [
                //     'title' => 'Languages',
                //     'bullet' => 'dot',
                //     'page' => 'language',
                // ],
                [
                    'title' => 'Areas',
                    'bullet' => 'dot',
                    'page' => 'area',
                ],
                [
                    'title' => 'Cities',
                    'bullet' => 'dot',
                    'page' => 'city',
                ],
               
                [
                    'title' => 'Countries',
                    'bullet' => 'dot',
                    'page' => 'country',
                ],
          
            ]
        ],
        [
            'title' => 'Categories',
            'icon' => 'media/svg/icons/Home/Book-open.svg',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
           
                [
                    'title' => 'Main Categories',
                    'bullet' => 'dot',
                    'page' => 'category',
                ],
                
                [
                    'title' => 'Sub Categories',
                    'bullet' => 'dot',
                    'page' => 'subCategory',
                ],
            ]
        ],
        [
            'title' => 'Home and Appearance',
            'icon' => 'media/svg/icons/Home/Book-open.svg',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
           
                [
                    'title' => 'Content Types',
                    'bullet' => 'dot',
                    'page' => 'content_type',
                ],
                
                [
                    'title' => 'Apprearances',
                    'bullet' => 'dot',
                    'page' => 'appearance',
                ],
                [
                    'title' => 'Home',
                    'bullet' => 'dot',
                    'page' => 'home',
                ],
            ]
        ],
        [
            'title' => 'Stores and Items',
            'icon' => 'media/svg/icons/Home/Book-open.svg',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
           
                [
                    'title' => 'Stores',
                    'bullet' => 'dot',
                    'page' => 'store',
                ],
                [
                    'title' => 'Item',
                    'bullet' => 'dot',
                    'page' => 'items',
                ],
                [
                    'title' => 'Attributes',
                    'bullet' => 'dot',
                    'page' => 'attribute',
                ],
                [
                    'title' => 'Compulsory Choice',
                    'bullet' => 'dot',
                    'page' => 'compulsory_choice',
                ],
                [
                    'title' => 'Multipule Choices',
                    'bullet' => 'dot',
                    'page' => 'multiple_choice',
                ]
            
            ]
        ],

        [
            'title' => 'Orders',
            'icon' => 'media/svg/icons/Home/Book-open.svg',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
           
                [
                    'title' => 'Orders List',
                    'bullet' => 'dot',
                    'page' => 'orders',
                ],

                
           
            ]
        ],
    
        [
            'title' => 'Notification',
            'icon' => 'media/svg/icons/Home/Book-open.svg',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
           
                [
                    'title' => 'Normal Notification',
                    'bullet' => 'dot',
                    'page' => 'sendnotification',
                ],

                [
                    'title' => 'Item Notification',
                    'bullet' => 'dot',
                    'page' => 'itemnotification',
                ],

                [
                    'title' => 'Specific Notification',
                    'bullet' => 'dot',
                    'page' => 'specificnotification',
                ],
                
           
            ]
        ],

        
        [
            'title' => 'Users',
            'icon' => 'media/svg/icons/Home/Book-open.svg',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
           
                [
                    'title' => 'Users',
                    'bullet' => 'dot',
                    'page' => 'Users',
                ],

                [
                    'title' => 'Address',
                    'bullet' => 'dot',
                    'page' => 'Address',
                ],
           
            ]
        ],
        // [
        //     'title' => 'Item',
        //     'icon' => 'media/svg/icons/Home/Mirror.svg',
        //     'bullet' => 'line',
        //     'root' => true,
        //     'submenu' => [
        //         [
        //             'title' => 'Appearances',
        //             'bullet' => 'dot',
        //             'page' => 'appearance',
        //         ],
        //         [
        //             'title' => 'Categories',
        //             'bullet' => 'dot',
        //             'page' => 'category',
        //         ],
        //         [
        //             'title' => 'Attributes',
        //             'bullet' => 'dot',
        //             'page' => 'attribute',
        //         ],
        //         [
        //             'title' => 'Item Files',
        //             'bullet' => 'dot',
        //             'page' => 'item_files',
        //         ],
        //         [
        //             'title' => 'Items',
        //             'bullet' => 'dot',
        //             'page' => 'item',
        //         ]
        //     ]
        // ]

    ]

];
