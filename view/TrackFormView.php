<?php
namespace PlayList\View;

include(dirname(__FILE__).'/IView.php');

class TrackFormView implements IView {
    private $track;

    
    public function setContent($track) {
        $this->track = $track;
    }

    public function setError($error) {
        
    }



    function render(){
        if ($this->track->getId()!=null){ //edit mode
            echo '<h1>Modifier titre:</h1>';
        }else{
            echo '<h1>Nouveau titre:</h1>';
        }
        
        ?>
        
        <form class="" name='musicAdd' action="index.php?action=TrackFormHandler" method="post">
            <input type="hidden" name="id" value=""/>

            <div class="form-group">
                <label class="control-label" for="title">Entrez le titre :</label>
                <input id="title" class="form-control" type="text" name="title" placeholder="Title" required pattern=".{0,255}" value="<?php echo $this->track->getTitle(); ?>">
            </div>
            <div class="form-group">
                <label class="control-label" for="author">Entrez l'auteur :</label>
                <input id="author" class="form-control" type="text" name="author" placeholder="Author" required pattern=".{0,255}" value="<?php echo $this->track->getAuthor(); ?>">
            </div>

            <div class="form-group">
                <label class="control-label" for="length">Entrez la durée :</label>
                <input id="length" class="form-control" type="number" min="1" max="1000" name="duration" placeholder="Length in [s]" required value="<?php echo $this->track->getDuration(); ?>">
            </div>
            <div class="form-group text-right">
                <button class="btn btn-default" onclick="history.back();">Annuler</button>
                <input type="Submit" name="submit" class="btn btn-primary  ">
            </div>
        </form>
        
        <?php
        
    }
}