<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MealsMenuItem $mealsMenuItem
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Meals Menu Item'), ['action' => 'edit', $mealsMenuItem->meal_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Meals Menu Item'), ['action' => 'delete', $mealsMenuItem->meal_id], ['confirm' => __('Are you sure you want to delete # {0}?', $mealsMenuItem->meal_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Meals Menu Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Meals Menu Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Meals'), ['controller' => 'Meals', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Meal'), ['controller' => 'Meals', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Menu Items'), ['controller' => 'MenuItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Menu Item'), ['controller' => 'MenuItems', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="mealsMenuItems view large-9 medium-8 columns content">
    <h3><?= h($mealsMenuItem->meal_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Meal') ?></th>
            <td><?= $mealsMenuItem->has('meal') ? $this->Html->link($mealsMenuItem->meal->id, ['controller' => 'Meals', 'action' => 'view', $mealsMenuItem->meal->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Menu Item') ?></th>
            <td><?= $mealsMenuItem->has('menu_item') ? $this->Html->link($mealsMenuItem->menu_item->id, ['controller' => 'MenuItems', 'action' => 'view', $mealsMenuItem->menu_item->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($mealsMenuItem->quantity) ?></td>
        </tr>
    </table>
</div>
