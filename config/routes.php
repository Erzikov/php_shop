<?php 
return array(
    'admin/orders/delete/([0-9]+)'                    => 'adminOrders/delete/$1',
    'admin/orders/edit/([0-9]+)'                      => 'adminOrders/edit/$1',
    'admin/orders/view/([0-9]+)'                      => 'adminOrders/view/$1',
    'admin/orders/status-([0-9]+)'                    => 'adminOrders/index/$1',
    'admin/orders'                                    => 'adminOrders/index',
 

    'admin/categories/delete/([0-9]+)'                => 'adminCategories/delete/$1',
    'admin/categories/create'                         => 'adminCategories/create',
    'admin/categories/edit/([0-9]+)'                  => 'adminCategories/edit/$1', 
    'admin/categories/page-([0-9]+)'                  => 'adminCategories/index/$1',
    'admin/categories'                                => 'adminCategories/index',
    
    'admin/users/delete/([0-9]+)'                     => 'adminUsers/deleteUser/$1',
    'admin/users/page-([0-9]+)'                       => 'adminUsers/index/$1',
    'admin/users'                                     => 'adminUsers/index',
                  
    'admin/products/delete/([0-9]+)'                  => 'adminProducts/delete/$1',
    'admin/products/edit/([0-9]+)'                    => 'adminProducts/edit/$1',
    'admin/products/create'                           => 'adminProducts/create',
    'admin/products/page-([0-9]+)'                    => 'adminProducts/index/$1',
    'admin/products'                                  => 'adminProducts/index',
    
    'profile/edit'                                    => 'user/edit',
    'profile'                                         => 'user/view',
              

    'orders/edit/([0-9]+)'                            => 'orders/edit/$1',
    'orders'                                          => 'orders/index',
    
    'signup'                                          => 'user/create',
    'signin'                                          => 'session/create',
    'signout'                                         => 'session/destroy',

    'products/([0-9]+)'                               => 'products/view/$1',


    'category/([0-9]+)/page-([0-9]+)'                 => 'catalog/category/$1/$2',
    'category/([0-9]+)'                               => 'catalog/category/$1',

    'cart/addProduct/([0-9]+)'                        => 'cart/addProduct/$1',
    'cart/deleteProduct/([0-9]+)'                     => 'cart/deleteProduct/$1',
    'cart/checkout'                                   => 'cart/checkout',
    'cart'                                            => 'cart/index',
    
    'catalog/page-([0-9]+)'                           => 'catalog/index/$1',
    'catalog'                                         => 'catalog/index',

    'about'                                           => 'site/about',
    ''                                                => 'site/index'  
);
?>
