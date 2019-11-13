<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mealstype $mealstype
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Mealstype'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="mealstype form large-9 medium-8 columns content">
    <?= $this->Form->create($mealstype) ?>
    <fieldset>
        <legend><?= __('Add Mealstype') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
