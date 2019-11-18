<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Meal $meal
 */
?>
<div class="meals view large-9 medium-8 columns content">
    <h3><?= h($meal->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $meal->has('user') ? $this->Html->link($meal->user->id, ['controller' => 'Users', 'action' => 'view', $meal->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Meal') ?></th>
            <td><?= h($meal->date_meal) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Other Details') ?></th>
            <td><?= h($meal->other_details) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cost Meal') ?></th>
            <td><?= $this->Number->format($meal->cost_meal) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Menu Items') ?></h4>
        <?php if (!empty($meal->menu_items)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Menu Id') ?></th>
                <th scope="col"><?= __('Menu Item Name') ?></th>
                <th scope="col"><?= __('Other Details') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($meal->menu_items as $menuItems): ?>
            <tr>
                <td><?= h($menuItems->menu_item_name) ?></td>
                <td><?= h($menuItems->other_details) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
