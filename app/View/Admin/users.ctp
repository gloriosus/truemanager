<a href="/admin/users/add"><img src="/img/user-add.png"></a>

<table>
    <tr>
        <td>ID</td>
        <td>E-Mail</td>
        <td>Username</td>
        <td>Password</td>
        <td>Role</td>
        <td>Created</td>
        <td>Modified</td>
        <td>Games</td>
        <td>Wins</td>
        <td>Loses</td>
        <td>Score</td>
        <td>VCode</td>
        <td>Confirmed</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>
<?php

foreach($users as $user) {
    
    echo '<tr><td>'.$user['User']['id'].'</td><td>'.$user['User']['email'].'</td><td>'.$user['User']['username'].'</td><td>'.$user['User']['password'].'</td><td>'.$user['User']['role_id'].'</td><td>'.$user['User']['created'].'</td><td>'.$user['User']['modified'].'</td><td>'.$user['User']['games'].'</td><td>'.$user['User']['wins'].'</td><td>'.$user['User']['loses'].'</td><td>'.$user['User']['score'].'</td><td>'.$user['User']['vcode'].'</td><td>'.$user['User']['is_confirmed'].'</td><td><a href="/admin/users/edit/id='.$user['User']['id'].'"><img src="/img/user-edit.png"></a></td><td><a href="/admin/users/delete/id='.$user['User']['id'].'"><img src="/img/user-delete.png"></a></td></tr>';
    
}

?>
</table>

<div class="leaders-navigation" style="width: 100%; height: 150px; background-color: #bbe0ff; position: fixed; left: 0px; bottom: 0px;">
    <div style="width: 800px; margin: 50px auto;">
        <div class="leaders-navigation-left-col" style="float: left; width: 320px; height: 50px; text-align: center;">
            <?php
                if($page > 1) {
                    echo '<a href="/admin/users/page='.($page - 1).'"><h2>Предыдущая страница</h2></a>';
                }
            ?>
        </div>
        <div style="float: left; width: 140px; height: 50px; text-align: center;">
            <?php
                echo '<h2>'.$page.' из '.$totalpages.'</h2>';
            ?>
        </div>
        <div class="leaders-navigation-right-col" style="float: left; width: 320px; height: 50px; text-align: center;">
            <?php
                if($page < $totalpages) {
                    echo '<a href="/admin/users/page='.($page + 1).'"><h2>Следующая страница</h2></a>';
                }
            ?>
        </div>
    </div>
</div>