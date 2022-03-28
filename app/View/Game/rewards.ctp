<?php

foreach($rewards as $reward) {
    echo '<div class="rewards-unit"><div class="';
    
    if(in_array($reward['Reward']['id'], $unlocked)) {
        echo 'rewards_unit_img_color';
    }
    else
    {
        echo 'rewards_unit_img_nocolor';
    }
    
    echo '"></div>';
    echo '<div class="rewards-unit-text"><p style="font-size: 18pt; font-weight: 600;">'.$reward['Reward']['title'].'</p><p style="font-size: 18pt;">'.$reward['Reward']['description'].'</p></div></div>';
}

?>