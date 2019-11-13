<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mealstype $mealstype
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $mealstype->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $mealstype->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Mealstype'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="mealstype form large-9 medium-8 columns content">
    <?= $this->Form->create($mealstype) ?>
    <fieldset>
        <legend><?= __('Edit Mealstype') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
