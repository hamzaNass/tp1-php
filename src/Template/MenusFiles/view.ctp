<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MenusFile $menusFile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Menus File'), ['action' => 'edit', $menusFile->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Menus File'), ['action' => 'delete', $menusFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $menusFile->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Menus Files'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Menus File'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Menus'), ['controller' => 'Menus', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Menu'), ['controller' => 'Menus', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="menusFiles view large-9 medium-8 columns content">
    <h3><?= h($menusFile->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Menu') ?></th>
            <td><?= $menusFile->has('menu') ? $this->Html->link($menusFile->menu->menu_id, ['controller' => 'Menus', 'action' => 'view', $menusFile->menu->menu_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('File') ?></th>
            <td><?= $menusFile->has('file') ? $this->Html->link($menusFile->file->name, ['controller' => 'Files', 'action' => 'view', $menusFile->file->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($menusFile->id) ?></td>
        </tr>
    </table>
</div>
