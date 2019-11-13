<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mealstype[]|\Cake\Collection\CollectionInterface $mealstype
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Mealstype'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mealstype index large-9 medium-8 columns content">
    <h3><?= __('Mealstype') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mealstype as $mealstype): ?>
            <tr>
                <td><?= $this->Number->format($mealstype->id) ?></td>
                <td><?= h($mealstype->name) ?></td>
                <td><?= h($mealstype->created) ?></td>
                <td><?= h($mealstype->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $mealstype->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mealstype->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mealstype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mealstype->id)]) ?>
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
