<div class="users form">
<?php echo $this->Form->create('Reward'); ?>
    <fieldset>
        <legend><?php echo __('Создание достижения'); ?></legend>
        <?php 
        echo $this->Form->input('title', array(
            'label' => 'Title'
        ));
        echo $this->Form->input('description', array(
            'label' => 'Description'
        ));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Готово')); ?>
</div>