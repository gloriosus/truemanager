<table>
    <tr>
        <td>Место</td>
        <td>Никнейм</td>
        <td>Количество очков</td>
        <td>Количество игр</td>
        <td>Количество побед</td>
        <td>Количество поражений</td>
        <td>Открыто достижений</td>
    </tr>
    <?php
    $place = ($page - 1) * 10;
    $i = 0;
    
    foreach($users as $user) {
        //$boom = explode('/', $user['User']['rewards']);
        //$unlocked = $this->Rewards->getCount($user['User']['id']);
        $place++;
        echo '<tr><td>'.$place.'</td><td>'.$user['User']['username'].'</td><td>'.$user['User']['score'].'</td><td>'.$user['User']['games'].'</td><td>'.$user['User']['wins'].'</td><td>'.$user['User']['loses'].'</td><td>'.$unlocked[$i].' из '.$total.'</td></tr>';
        $i++;
    }
    ?>
</table>
<?php
    echo '<h1>'.$page.' из '.$totalpages.'</h1>';
?>
<div class="leaders-navigation">
    <div class="leaders-navigation-left-col">
        <?php
            if($page > 1) {
                echo '<a href="/leaders/page='.($page - 1).'">Предыдущая страница</a>';
            }
        ?>
    </div>
    <div class="leaders-navigation-right-col">
        <?php
            if($page < $totalpages) {
                echo '<a href="/leaders/page='.($page + 1).'">Следующая страница</a>';
            }
        ?>
    </div>
</div>