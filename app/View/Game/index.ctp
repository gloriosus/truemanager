<div class="game-left-col">
    <h2>Статистика игрока <?php echo $user['username']; ?></h2>
    <div class="game-block-statistics">
        <p>Общее количество игр: <?php echo $user['games']; ?></p>
        <p>Количество побед: <?php echo $user['wins']; ?></p>
        <p>Количество поражений: <?php echo $user['loses']; ?></p>
        <p>Количество очков: <?php echo $user['score']; ?></p>
        <p>Открыто достижений: <?php echo $unlocked.' из '.$total; ?></p>
        <a href="/game/rewards"><div class="game-button-rewards">Просмотреть все достижения</div></a>
    </div>
</div>
<div class="game-mid-col"></div>
<div class="game-right-col">
    <h2>Новый проект</h2>
    <div class="game-block-play">
        <p>Персонал:</p>
        <p>Mia - быстрая, затратная</p>
        <p>Jack - медленный, дешевый</p>
        <p>Kate - средний, средний</p>
        <p>William - быстрый, средний</p>
        <a href="/game/play"><div class="game-button-play">Начать</div></a>
    </div>
</div>