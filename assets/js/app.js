/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var current_selected_track_id;
var modaldiv = document.getElementById("modal-playlist");
if (modaldiv!==null){
    var modal = new Modal(modaldiv);
    var alert_success_div = document.getElementById('modal-alert-success');
    var alert_warning_div = document.getElementById('modal-alert-warning');

    var close_modal = function(){
        document.body.classList.toggle('modal-open');
        document.getElementById("modal-playlist").setAttribute('aria-hidden', true);
    }

    var add_track_to_playlist = function(playlist_id){
        var xhr = new XMLHttpRequest();
        var formData = new FormData();
        formData.append("direct_rendering", "true");
        formData.append("track_id", current_selected_track_id);
        formData.append("playlist_id", playlist_id);
        xhr.open("PUT", "/playlist/" + playlist_id + "/tracks/" +current_selected_track_id, true);
        xhr.onload = function (e) {
            if (xhr.readyState === 4) {
              if (xhr.status === 201) {
                  alert('cool');
                  //alert_success_div.classList.toggle('hidden');
                  //close_modal();
                  modal.close();
              } else if (xhr.status === 500) {
                    alert('pb quelque part ;-)');
                    //alert_warning_div.classList.toggle('hidden');


              }
            }
        };
        xhr.onerror = function (e) {
            console.error(xhr.statusText);
        };
        xhr.send(formData);
    }
    
    

    var click_btn_add_event = function(e){
        current_selected_track_id = this.getAttribute('data-id');
    };

    var cmd_btns = document.getElementsByClassName("add-to-playlist");
    for (var i = 0; i < cmd_btns.length; i++){
        cmd_btns[i].addEventListener('click', click_btn_add_event) ;
    }


    var playList = document.querySelectorAll('#playlist a');
    for (var i = 0; i < playList.length; i++){
        var playListItem = playList[i];

        playListItem.addEventListener('click',function(e){
            var playList_id = this.getAttribute('data-id');
            add_track_to_playlist(playList_id);

        });
    }

}

