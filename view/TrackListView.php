<?php

namespace PlayList\View;

include(dirname(__FILE__).'/IView.php');

class TrackListView implements IView {
    
    private $tracks;

    public function setContent($tracks) {
        $this->tracks = $tracks;
    }

    public function setError($error) {
        
    }



    function render(){

        echo '
        <a type="button" class="btn btn-success btn-lg" href="index.php?action=TrackNew">Ajouter un titre</a>
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
            ';


        foreach ($this->tracks as $track) {

            echo '<tr><td>'.$track->getTitle().'</td><td>'.$track->getAuthor().'</td><td></td><td>'.$track->getDuration().'</td><td><a href="index.php?action=TrackEdit&id='.$track->getId().'"><span class="glyphicon glyphicon-pencil">&nbsp;</span></a><a href="index.php?action=TrackDelete&id='.$track->getId().'"><span class="glyphicon glyphicon-remove">&nbsp;</span></a></td></tr>';
        }

        echo '</tbody>
        </table>';
    }

}

        