<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MenusFile $menusFile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $menusFile->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $menusFile->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Menus Files'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Menus'), ['controller' => 'Menus', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Menu'), ['controller' => 'Menus', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="menusFiles form large-9 medium-8 columns content">
    <?= $this->Form->create($menusFile) ?>
    <fieldset>
        <legend><?= __('Edit Menus File') ?></legend>
        <?php
            echo $this->Form->control('menu_id', ['options' => $menus]);
            echo $this->Form->control('file_id', ['options' => $files]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
