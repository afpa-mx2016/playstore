<?php


        echo ' <div class="row">';

        foreach ($data['object'] as $playlist) {

            echo '<a href="index.php?action=PlayListTrackList&playlist_id='.$playlist->getId().'">
                    <div class="col-sm-6 col-md-3">
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
            
 

        