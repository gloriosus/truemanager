<a href="/admin/rewards/add"><img src="/img/user-add.png"></a>

<table>
    <tr>
        <td>ID</td>
        <td>Title</td>
        <td>Description</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>
<?php

foreach($rewards as $reward) {
    
    echo '<tr><td>'.$reward['Reward']['id'].'</td><td>'.$reward['Reward']['title'].'</td><td>'.$reward['Reward']['description'].'</td><td><a href="/admin/rewards/edit/id='.$reward['Reward']['id'].'"><img src="/img/user-edit.png"></a></td><td><a href="/admin/rewards/delete/id='.$reward['Reward']['id'].'"><img src="/img/user-delete.png"></a></td></tr>';
    
}

?>
</table>