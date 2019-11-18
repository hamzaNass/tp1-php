<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Meal[]|\Cake\Collection\CollectionInterface $meals
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Meal'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Menu Items'), ['controller' => 'MenuItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Menu Item'), ['controller' => 'MenuItems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="meals index large-9 medium-8 columns content">
    <h3><?= __('Meals') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_meal') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cost_meal') ?></th>
                <th scope="col"><?= $this->Paginator->sort('other_details') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($meals as $meal): ?>
            <tr>
                <td><?= $this->Number->format($meal->id) ?></td>
                <td><?= $meal->has('user') ? $this->Html->link($meal->user->id, ['controller' => 'Users', 'action' => 'view', $meal->user->id]) : '' ?></td>
                <td><?= h($meal->date_meal) ?></td>
                <td><?= $this->Number->format($meal->cost_meal) ?></td>
                <td><?= h($meal->other_details) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $meal->id]) ?>
                    <?= $this->Html->link('(pdf)', ['action' => 'view', $meal->id . '.pdf']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $meal->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $meal->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meal->id)]) ?>
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
