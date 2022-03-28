<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Редактирование пользователя'); ?></legend>
        <?php 
        echo $this->Form->input('email', array(
            'label' => 'E-Mail'
        ));
        echo $this->Form->input('username', array(
            'label' => 'Username'
        ));
        echo $this->Form->input('password', array(
            'label' => 'Password'
        ));
        echo $this->Form->input('role', array(
            'label' => 'Role',
            'options' => array('admin' => 'admin', 'default' => 'default')
        ));
        echo $this->Form->input('games', array(
            'label' => 'Games'
        ));
        echo $this->Form->input('wins', array(
            'label' => 'Wins'
        ));
        echo $this->Form->input('loses', array(
            'label' => 'Loses'
        ));
        echo $this->Form->input('score', array(
            'label' => 'Score'
        ));
        echo $this->Form->input('vcode', array(
            'label' => 'VCode'
        ));
        echo $this->Form->input('is_confirmed', array(
            'label' => 'Confirmed'
        ));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Готово')); ?>
</div>