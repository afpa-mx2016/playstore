<?php
namespace PlayList\View;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MainTemplate
 *
 * @author lionel
 */
class MainTemplate {
    
    private $content;
    private $errors;
    
    public function setErrors($errors){
        $this->errors = $errors;
    }
    
    private function hasErrors(){
        return (isset($this->errors));
    }
    
    public function setContent($content){
        $this->content = $content;
    }
    
    public function render(){
        
        ?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>PlayStore</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
              <div class="navbar-header">
                <a class="navbar-brand" href="#">
                  PlayStore
                </a>
              </div>
            </div>
         </nav>
        <div class="container">
            
            <?php
            
                echo $this->content; 
                if ($this->hasErrors()){
                    echo ' <div class="alert alert-warning" role="alert">
                    <strong>Warning!</strong>'.$this->error.'</div>';
                    
                }
            
            ?>
            
            

        </div>
    </body>
</html>
<?php
        
    }
}
    
    

