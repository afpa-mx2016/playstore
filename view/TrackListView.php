
         <form action="index.php" method="get">
            <div class="input-group col-md-12">
                <input type="hidden" name="action" value="TrackList"/>
                <input type="text" name="search" class="form-control" placeholder="rechercher" value="<?php echo $data['search']; ?>"/>
                <span class="input-group-btn">
                    <button class="btn btn-secondary" type="submit">
                        <i class="glyphicon glyphicon-search"></i>
                    </button>
                </span>
                <a type="button" class="btn btn-success pull-right" href="index.php?action=TrackNew">Ajouter un titre</a>
            </div>
         </form>
         
        
        
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Année</th>
                    <th>Durée</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

        <?php


        foreach ($data['object'] as $track) {
            
            $adminContent = "";
            if ($data['isadmin']){
                  $adminContent= '<a href="index.php?action=TrackEdit&id='.$track->getId().'" title="edit track"><span class="glyphicon glyphicon-pencil">&nbsp;</span></a>'
                        . '<a href="index.php?action=TrackDelete&id='.$track->getId().'" title="delete track"><span class="glyphicon glyphicon-remove">&nbsp;</span></a>';
            }

            echo '<tr><td>'.$track->getTitle().'</td><td>'.$track->getAuthor().'</td><td>'
                    . '</td><td>'.$track->getDuration().'</td><td>';
            echo $adminContent;
            echo '<a href="#modal-playlist" data-toggle="modal" class="add-to-playlist" data-id="'.$track->getId().'" title="add to playlist"><span class="glyphicon glyphicon-plus">&nbsp;</span></a>'
                    . '</td></tr>';
        }
        ?>
            </tbody>
            </table>
        
         <div id="modal-playlist" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Ajouter à la playlist</h4>
                </div>
                <div class="modal-body">
                  <div id="playlist" class="list-group">
                <?php
                foreach ($data['playlists'] as $pl) {
                   echo '<a data-id="'.$pl->getId().'" class="list-group-item">'.$pl->getName().'</a>';
                  
                 }   
                ?>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                  <div id="modal-alert-success" class="alert alert-success fade in hidden" aria-hidden="true">
                    <strong>Success!</strong> Indicates a successful or positive action.
                  </div>
                  <div id="modal-alert-warning" class="alert alert-warning fade in hidden">
                    <strong>Warning!</strong> Indicates a warning that might need attention.
                  </div>
                </div>
              </div>

            </div>
          </div>
         


        