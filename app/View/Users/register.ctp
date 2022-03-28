<div class="auth-form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Регистрация'); ?></legend>
        <?php 
        echo $this->Form->input('username', array(
            'label' => 'Имя пользователя'
        ));
        echo $this->Form->input('email', array(
            'label' => 'Электронная почта'
        ));
        echo $this->Form->input('password', array(
            'label' => 'Пароль'
        ));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Готово')); ?>
</div>