var App = {
	config: {
		player_path: 'http://embed.beatport.com/player/?id=TRACK_ID&type=track&auto=1'
	},
            
    keys: {
        SPACE: 32
    },

	init: function() {
		App.watch();
		App.dispatcher();
        App.setupPlayer();
        
        App.trigger('init', 'Inicializado');
        //App.shortcuts();
	},

	dispatcher: function() {
		$('body').on('onAppEvent', function(event, eventType, eventMessage) {
			switch(eventType){
				case 'playTrack': 
					App.loadTrack(eventMessage, true); 
					break;
			}
		});
	},
             
    watch: function(event, eventType, eventMessage){
		$('body').on('onAppEvent', function(event, eventType, eventMessage) {
			App.debug(eventType, eventMessage);
		});
	},

	play: function(trackId) {
		App.trigger('playTrack', trackId);
	},
            
    loadTrack: function(trackId, autoPlay) {
        var path = App.config.player_path.replace('TRACK_ID', trackId);
        $('#player').attr('src', path);
//        $.get('/tracks/view/' + trackId + '.json', function(data){
//            App.debug(data);
            
//            $('#player').attr('src', data.track.Track.preview);
//            $('#player')[0].play();
//            
//            var trackTitle = data.track.Track.title;
//            var artists = [];
//            
//            $(data.track.Artist).each(function(){
//                artists.push(this.name);
//            });
//            
//            var trackArtist = artists.join(', ');
//            
//            var trackDescription = trackArtist + ' - ' + trackTitle;
//            $('#trackTitle').text(trackDescription);
            
//        });
        
    },      
            
    trigger: function(eventType, eventName) {
        $('body').trigger('onAppEvent', [eventType, eventName]);
    },

	debug: function() {
		if(window.console) 
			console.log(arguments);
	},
            
    shortcuts: function() {
        $('body').on('keyup', function(event){
            App.debug(event.keyCode);
            switch(event.keyCode) {
                case App.keys.SPACE:
                    if($('#player')[0].src == '') {
                        return;
                    }
                    
                    event.preventDefault();
                    event.stopPropagation();
                    if( $('#player')[0].paused ) {
                        $('#player')[0].play();
                    } else {
                        $('#player')[0].pause();
                    }
                    break;
            }
        });
    },
            
    setupPlayer: function() {
		var container = $('#playerContainer');
        container.on('mouseover mouseout', function(event){
            if( event.type == 'mouseover' ) {
                container.addClass('active');
            } else {
                container.removeClass('active');
            }
        });
	},
}