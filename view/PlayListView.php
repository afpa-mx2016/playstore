<?php

namespace PlayList\View;

include(dirname(__FILE__).'/IView.php');

class PlayListView implements IView {
    

    function render($data){

        echo ' <div class="row">
                ';

        foreach ($data['content'] as $playlist) {

            echo '<div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="http://placehold.it/300x150" >
                    <div class="caption">
                      <h3>'.$playlist->getName().'</h3>
                      <p>'.$playlist->getDescription().'</p>
                     <p></p>
                    </div>
                  </div>
                 </div>';
        }
        
        echo '</div>';
            
            


    }

}

        