<?php        
        $playList = $data['object'];
        echo '<h1>'.$playList->getName().'</h1>';
        

        if (!empty($data['errors'])){
            echo ' <div class="alert alert-warning" role="alert">
            <strong>Warning!</strong>'.$data['errors'].'</div>';

        }
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
                    . '<td><a href="/playlist/'.$playList->getId().'/tracks/'.$track->getId().'/_delete" title="delete track from playlist"><span class="glyphicon glyphicon-remove">&nbsp;</span></a>'
                    . '</td></tr>';
        }

        ?>
        </tbody>
        </table>        
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
                
            </div>
          </div>
        </div>