<div class="auth-form">
<?php echo $this->Flash->render('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend>
            <?php echo __('Восстановление пароля'); ?>
        </legend>
        <?php echo $this->Form->input('username', array(
            'label' => 'Имя пользователя'
        ));
        echo $this->Form->end(__('Отправить'));
    ?>
    </fieldset>
</div>