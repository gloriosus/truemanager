<?php
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
    
        echo $this->Html->css('bootstrap.min');
        echo $this->Html->css('master');
        
        echo $this->Html->script('interface');
        echo $this->Html->script('gamerules');
	?>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-1">a1</div>
            <div class="col-md-10">
                <div class="navigation-col2">
                    <a id="home" href="/home">Главная</a>
                    <a id="game" href="/game">Игра</a>
                    <a id="rules" href="/rules">Правила</a>
                    <a id="leaders" href="/leaders">Лидеры</a>
                    <a id="about" href="/about">О нас</a>
                </div>
            </div>
            <div class="col-md-1">a3</div>
        </div>
    </div>
    <!--<div class="wrapper">
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
            <!--<img src="/files/woman_3.png" style="position: absolute; bottom: -20px; left: 1150px;">
            <div class="footer-row">
                <div class="footer-col1">© 2017 PM Game</div>
                <div class="footer-col2">Свяжитесь с нами: company@gmail.com</div>
            </div>
        </div>
    </div>-->
</body>
</html>