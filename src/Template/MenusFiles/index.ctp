<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MenusFile[]|\Cake\Collection\CollectionInterface $menusFiles
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Menus File'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Menus'), ['controller' => 'Menus', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Menu'), ['controller' => 'Menus', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="menusFiles index large-9 medium-8 columns content">
    <h3><?= __('Menus Files') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('menu_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('file_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($menusFiles as $menusFile): ?>
            <tr>
                <td><?= $this->Number->format($menusFile->id) ?></td>
                <td><?= $menusFile->has('menu') ? $this->Html->link($menusFile->menu->menu_id, ['controller' => 'Menus', 'action' => 'view', $menusFile->menu->menu_id]) : '' ?></td>
                <td><?= $menusFile->has('file') ? $this->Html->link($menusFile->file->name, ['controller' => 'Files', 'action' => 'view', $menusFile->file->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $menusFile->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $menusFile->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $menusFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $menusFile->id)]) ?>
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
