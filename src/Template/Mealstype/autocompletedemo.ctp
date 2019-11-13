<?php
$urlToMealstypeAutocompletedemoJson = $this->Url->build([
    "controller" => "Mealstype",
    "action" => "findMealstype",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToAutocompleteAction = "' . $urlToMealstypeAutocompletedemoJson . '";', ['block' => true]);
echo $this->Html->script('Mealstype/autocompletedemo', ['block' => 'scriptBottom']);
?>


<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Mealstype'), ['action' => 'add']) ?></li>
    </ul>
</nav>

<?= $this->Form->create('Mealstype') ?>
<fieldset>
    <legend><?= __('Search Mealstype') ?></legend>
    <?php
    echo $this->Form->input('name', ['id' => 'autocomplete']);
    ?>
</fieldset>
<?= $this->Form->end() ?>