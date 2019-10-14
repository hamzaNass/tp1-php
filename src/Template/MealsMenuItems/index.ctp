<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MealsMenuItem[]|\Cake\Collection\CollectionInterface $mealsMenuItems
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Meals Menu Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Meals'), ['controller' => 'Meals', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Meal'), ['controller' => 'Meals', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Menu Items'), ['controller' => 'MenuItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Menu Item'), ['controller' => 'MenuItems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mealsMenuItems index large-9 medium-8 columns content">
    <h3><?= __('Meals Menu Items') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('meal_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('menu_item_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mealsMenuItems as $mealsMenuItem): ?>
            <tr>
                <td><?= $mealsMenuItem->has('meal') ? $this->Html->link($mealsMenuItem->meal->id, ['controller' => 'Meals', 'action' => 'view', $mealsMenuItem->meal->id]) : '' ?></td>
                <td><?= $mealsMenuItem->has('menu_item') ? $this->Html->link($mealsMenuItem->menu_item->id, ['controller' => 'MenuItems', 'action' => 'view', $mealsMenuItem->menu_item->id]) : '' ?></td>
                <td><?= $this->Number->format($mealsMenuItem->quantity) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $mealsMenuItem->meal_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mealsMenuItem->meal_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mealsMenuItem->meal_id], ['confirm' => __('Are you sure you want to delete # {0}?', $mealsMenuItem->meal_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
