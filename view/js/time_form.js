        	var start_time = 0;
			function start_counter(){
				if(start_time == 0){
					start_time = new Date().getTime();
				}
			}
			
			function stop_counter(){
				if(start_time != 0){
					var spent_time = parseInt((new Date().getTime() - start_time) / 1000);
					
					// add the spent time to the hidden field
					document.getElementById('spent_time').value = spent_time;
					
					// print spent time
					//alert(spent_time);
				}
			}
