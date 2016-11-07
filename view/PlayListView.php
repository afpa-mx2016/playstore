<div class="row">
<a type="button" class="btn btn-success pull-right" href="index.php?action=PlayListNew">Ajouter une playlist</a>

<?php



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
?>

</div>
            
 

        