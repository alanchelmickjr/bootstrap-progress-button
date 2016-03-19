			// Bind normal buttons
			Ladda.bind( '.ladda-button', { timeout: 2000 } );

			// Bind progress buttons and simulate loading progress
			Ladda.bind( '.laddastrap-progress-demo button', {
				callback: function( instance ) {
					var progress = 0;
					var interval = setInterval( function() {
						progress = Math.min( progress + Math.random() * 0.1, 3 );
           
						instance.setProgress( progress );

						if( progress === 2 ) {
                                                        instance.setProgress( 100 );
							instance.stop();
							clearInterval( interval );
						}
					}, 100 );
				}
			} );