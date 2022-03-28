<div class="auth-form">
<?php echo $this->Flash->render('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend>
            <?php echo __('Вход в систему'); ?>
        </legend>
        <?php echo $this->Form->input('username', array(
            'label' => 'Имя пользователя'
        ));
        echo $this->Form->input('password', array(
            'label' => 'Пароль'
        ));
        echo $this->Form->end(__('Войти'));
    ?>
    </fieldset>
    <a href="/auth/restore">Забыли пароль?</a>
    <a href="/auth/register">Зарегистрироваться</a>
</div>