<?php
/**
 * Created by PhpStorm.
 * User: a_isokov
 * Date: 26.12.2015
 * Time: 16:33
 */

/**
 * @var $items array
 */
echo dmstr\widgets\Menu::widget(
    [
        'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
        'items' => $items
    ]
)
?>
