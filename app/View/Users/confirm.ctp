<div class="auth-form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Подтверждение аккаунта'); ?></legend>
        <?php
        echo $this->Form->input('username', array(
            'label' => 'Имя пользователя'
        ));
        echo $this->Form->input('vcode', array(
            'label' => 'Идентификационный код'
        ));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Подтвердить')); ?>
</div>