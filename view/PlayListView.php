<?php

namespace PlayList\View;

include(dirname(__FILE__).'/IView.php');

class PlayListView implements IView {
    
//plancehold.it
    function render($data){

        echo ' <div class="row">
                ';

        foreach ($data['content'] as $playlist) {

            echo '<a href="index.php?action=PlayListTrackList&playlist_id='.$playlist->getId().'"><div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="assets/img/pl_heads/'.$playlist->getPicture().'" >
                    <div class="caption">
                      <h3>'.$playlist->getName().'</h3>
                      <p>'.$playlist->getDescription().'</p>
                     <p></p>
                    </div>
                  </div>
                 </div></a>';
        }
        
        echo '</div>';
            
            


    }

}

        