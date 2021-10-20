<?php
?>
<div class="table-responsive">
    <table class="table table-bordered" id="customTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th class="text-aromacare"><?= h('Document Name') ?></th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $this->Html->link('Full Manual', '/files/FullManual.pdf', ['target' => '_blank']);?> </td>
            </tr>
            <tr>
                <td><?= $this->Html->link('Managing Accounts & Regular Account Login', '/files/ManageAccounts.pdf', ['target' => '_blank']);?> </td>
            </tr>
            <tr>
                <td><?= $this->Html->link('Managing Products - Adding/Viewing/Editing & Deleting Product Entries', '/files/ManageProducts.pdf', ['target' => '_blank']);?> </td>
            </tr>
            <tr>
                <td><?= $this->Html->link('Managing Ingredients - Adding/Viewing/Editing & Deleting Ingredient Entries', '/files/ManageIngredients.pdf', ['target' => '_blank']);?> </td>
            </tr>
            <tr>
                <td><?= $this->Html->link('Managing Suppliers - Adding/Viewing/Editing & Deleting Supplier Entries', '/files/ManageSupplier.pdf', ['target' => '_blank']);?> </td>
            </tr>
            <tr>
                <td><?= $this->Html->link('Managing Product Recipes - Adding/Viewing/Editing & Deleting Recipe Entries', '/files/ManageRecipes.pdf', ['target' => '_blank']);?> </td>
            </tr>
            <tr>
                <td><?= $this->Html->link('Ingredient Threshold - Setting & Updating Ingredient Thresholds', '/files/IngredientThreshold.pdf', ['target' => '_blank']);?> </td>
            </tr>
            <tr>
                <td><?= $this->Html->link('Backup & Recovery', '/files/BackupAndRecovery.pdf', ['target' => '_blank']);?> </td>
            </tr>
            <tr>
                <td><?= $this->Html->link('Troubleshooting & FAQ', '/files/Troubleshooting.pdf', ['target' => '_blank']);?> </td>
            </tr>
        </tbody>
    </table>
</div>
