<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mealstype $mealstype
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Mealstype'), ['action' => 'edit', $mealstype->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Mealstype'), ['action' => 'delete', $mealstype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mealstype->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Mealstype'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mealstype'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="mealstype view large-9 medium-8 columns content">
    <h3><?= h($mealstype->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($mealstype->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($mealstype->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($mealstype->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($mealstype->modified) ?></td>
        </tr>
    </table>
</div>
