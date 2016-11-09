<div class="row">
<a type="button" class="btn btn-success pull-right" href="/playlist/_new">Ajouter une playlist</a>

<?php



        foreach ($data['object'] as $playlist) {

            echo '<a href="playlist/'.$playlist->getId().'/tracks">
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
            
 

        