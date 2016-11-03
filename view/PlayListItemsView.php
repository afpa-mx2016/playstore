<?php

namespace PlayList\View;

include(dirname(__FILE__).'/IView.php');

class PlayListItemsView implements IView {
    

    function render($data){
        
        $playList = $data['content'];
            echo '<h1>'.$playList->getName().'</h1>';
        ?>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Année</th>
                    <th>Durée</th>
                    <th></th>
                </tr>
            </thead><tbody>
      
        <?php


        foreach ($playList->getTracks() as $track) {

            echo '<tr><td>'.$track->getTitle().'</td><td>'.$track->getAuthor().'</td><td>'
                    . '</td><td>'.$track->getDuration().'</td>'
                    . '<td><a href="#" title="delete track from playlist"><span class="glyphicon glyphicon-remove">&nbsp;</span></a>'
                    . '</td></tr>';
        }

        ?>
        </tbody>
        </table>
        

         <?php


    }

}

        