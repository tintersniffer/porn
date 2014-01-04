	var winWidth = 0;
	var winHeight = 0;
	var imgTrailerWidth = 1920;
	var imgTrailerHeight = 920;
	var xPos = 0;
	var yPos = 0;
	var cxPos = 0;
	var xyPos = 0;
	var xSlideFlag = true;
	
	var isInitGoogleMap = false;
	
	addDocumentReady(function(){
		
		$('.navlink').click(function(e){
			e.preventDefault();
			var index = $(this).attr('data-index');
			var re = new RegExp("[a-zA-Z-]*$", "");
						
			var title = new String($(this).attr('href'));
			var title2 = title.match(re);	
			
						
			history.pushState(index, title2, title);
			
			var wwidth = $(window).width();
			if(wwidth<900) $('.navbar-toggle').click();
			
			movePageTo(index);	
			
			addthis.update('share', 'url', event.target.href); 
			addthis.url = event.target.href;                 
			addthis.toolbox(".addthis_toolbox");
		});	
		
		
		
		addthis.update('share', 'url', pageUrl); 
		addthis.url = pageUrl;                 
		addthis.toolbox(".addthis_toolbox");
		history.replaceState(pageState, pageName, pageUrl);
		
		
		var SLIDE_TRESH = 100;
		window.addEventListener("touchstart", function(e){
			xPos = e.touches[0].pageX;
			yPos = e.touches[0].pageY;
// 			alert(e.touches[0].pageX);
// 			alert(e.originalEvent.touches[0].pageX);
// 			alert(e.touches[0].pageX);
		}, false);
		window.addEventListener("touchcancel", function(e){
			e.preventDefault();
		}, false);

		
		window.addEventListener("touchend", function(e){
			if(cxPos-xPos < -1*SLIDE_TRESH){
				slideLeft();
			}else if(cxPos-xPos > SLIDE_TRESH){
				slideRight();
			}
			//alert(cxPos-xPos);
		}, false);
		
		window.addEventListener("touchmove", function(e){
			cyPos = e.touches[0].pageY;
			cxPos = e.touches[0].pageX;
			
			

			//alert(Math.abs(cxPos - xPos) );
			if( Math.abs(cxPos - xPos) > Math.abs(cyPos - yPos) ) {
				e.preventDefault();
			}
			
			if(cxPos-xPos < -1*SLIDE_TRESH){
//				alert(1);
				slideLeft();
			}else if(cxPos-xPos > SLIDE_TRESH){
//				alert(2);
				slideRight();
			}
			
		}, false);
		
		var audio = document.getElementById('tsound');
		audio.play();
		
// 		element.addEventListener("gesturechange", gestureChange, false);
// 		element.addEventListener("gestureend", gestureEnd, false);
		
		trailerFade();
		$('#mycarousel').carousel({
			  interval: false
		});

		
		$('.dropdown.autodropdown').hover(function(){
			$(this).find('.dropdown-toggle').dropdown('toggle');
		},function(){
			$("body").trigger("click");
		});
	});

	mobileMoveToIndex = function(nIndex){
		var navIndex = -1;
		var navMaxIndex = -1;
		$("#mycarousel .item").each(function(index){
			if($(this).hasClass('active')) navIndex = index+1;
			navMaxIndex = index+1;
		});
		
		if(navIndex==-1){
			setTimout(function(){mobileMoveToIndex(nIndex);},50);
		}else{
			//xSlideFlag = false;
			if(navIndex==5) return;
			navIndex = navIndex+nIndex;
			if(navIndex==0) navIndex=navMaxIndex;			
			movePageTo(navIndex);
			//setTimeout(function(){xSlideFlag = true;},400);
		}
	};
	
	function slideLeft(){
		if(xSlideFlag){
			mobileMoveToIndex(1);
		}
	}

	function slideRight(){
		if(xSlideFlag){
			mobileMoveToIndex(-1);
		}
	}
	
	function initGoogleMap() 
	  {
	      
	      var marked_pos = new google.maps.LatLng(latitude, longitude);
	      var the_id = "google-map";        
	      var myOptions = {
	        center: marked_pos,
	        zoom: 6,
	        controls: false,
	        mapTypeId: google.maps.MapTypeId.ROADMAP
	      };
	      var map = new google.maps.Map(document.getElementById(the_id),
	          myOptions);

	      var marker = new google.maps.Marker({
	        position: marked_pos,
	        map: map,
	        title:"envato marketplace"});
	  }

	var movePageTo = function(_index){
		setTimeout(function(){
			if(_index==5 && !isInitGoogleMap){
				isInitGoogleMap = true;
				initGoogleMap();
			}			
		},400);
		
		
		
		var w = $(window).width();
		$('#mycarousel').carousel(_index-1);
		if(w<=720){
			//$('.navbar-collapse').animate({height: 1});
			if(_target){
				
			}else{
				$('#nv').trigger('click');
			}
			
			
		}
		
	};
	
	var trailerFade = function(){
		setTimeout(function(){
			var current = $('#trailer .bg.active');
			var next = $($('#trailer .bg.active').attr('data-next'));
			current.fadeOut(3000,function(){
				current.removeClass('active');
				next.addClass('active');
				setTimeout(trailerFade, 3000);
			});
			next.fadeIn(3000);
		},2500);
	};

	window.addEventListener('popstate', function(event) {
		//console.log('popstate fired!');
		//alert(event.state);
		var state = parseInt(event.state);
	    movePageTo(event.state);
	});










$(document).ready(function() {
	documentReady.forEach(function(entry){
		if(typeof entry == 'function'){
			entry();
		}
	});
});