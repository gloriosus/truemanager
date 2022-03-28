<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'Cherry Cake');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
    
        echo $this->Html->css('master');
        
        echo $this->Html->script('interface');
        echo $this->Html->script('gamerules');
	?>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <div class="navigation">
                <div class="navigation-col1">
                    <img src="/img/logo.png">
                </div>
                <div class="navigation-col2">
                    <a id="home" href="/home">Главная</a>
                    <a id="game" href="/game">Игра</a>
                    <a id="rules" href="/rules">Правила</a>
                    <a id="leaders" href="/leaders">Лидеры</a>
                    <a id="about" href="/about">О нас</a>
                </div>
                <div class="navigation-col3">
                    <?php 
                        if (AuthComponent::user('id') != null) {
                           echo '<a href="/auth/logout"><img src="/img/avatar_casual.png"></a>'; 
                        }
                        else {
                            echo '<a href="/auth/login"><img src="/img/login.png"></a>'; 
                        }
                    ?>
                </div>
            </div>
            <hr>
        </div>

        <div class="content">
            <?php echo $this->Session->flash(); ?>
            <?php echo $this->fetch('content'); ?>
        </div>

        <div class="footer">
            <!--<img src="/files/woman_3.png" style="position: absolute; bottom: -20px; left: 1150px;">-->
            <div class="footer-row">
                <div class="footer-col1">© 2017 PM Game</div>
                <div class="footer-col2">Свяжитесь с нами: company@gmail.com</div>
            </div>
        </div>
    </div>
</body>
</html>
