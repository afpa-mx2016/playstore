<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>PlayStore</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="/assets/css/app.css">
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
              <div class="navbar-header">
                <a class="navbar-brand" href="/">
                  PlayStore
                </a>
              </div>
              <ul class="nav navbar-nav">
                <li><a href="/">Home</a></li>
                <li><a data-action="PlayList" href="/playlist">My PlayList</a></li>
                <li><a data-action="Track" href="/tracks">TrackList</a></li>
              </ul>
              <div class="nav navbar-nav navbar-right">
                <?php 
                    if(!empty($data["current_user"])){ 
                        echo '
                        
                           <a class="navbar-brand"><em>Welcome '.$data["current_user"].'</em></a>
                           <a href="/logout" class="navbar-brand"><strong>Logout</strong></a>
                        ';
                    }else{
                        echo '<ul class="nav navbar-nav navbar-right">
                            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                            <li><a href="login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                          </ul>';
                    }
                 ?>
              </div>
            </div>
         </nav>
        <div class="container">
            
            <?php
            
                echo $data['content']; 
            
            ?>
            
            

        </div>
        <script>
            var parseQueryString = function() {

                var str = window.location.search;
                var objURL = {};

                str.replace(
                    new RegExp( "([^?=&]+)(=([^&]*))?", "g" ),
                    function( $0, $1, $2, $3 ){
                        objURL[ $1 ] = $3;
                    }
                );
                return objURL;
            };

        //code for making current selected menu active
        var params = parseQueryString();
        var currentAction = params['action'];
        if (currentAction!==undefined){

            var domAction = "Track";
            if (!currentAction.startsWith(domAction)){
                domAction = "PlayList";
            }

            var menu_a = document.querySelector('a[data-action="'+ domAction + '"]');
            menu_a.parentNode.classList.toggle('active');
        }
            
        </script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap.native/1.1.0/bootstrap-native.min.js"></script>
 <script type="text/javascript" src="/assets/js/app.js"></script> 
        </body>
</html>
    
    

