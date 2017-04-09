$(document).ready(function(){
	
		$.ajax({
			type: "GET",
			dataType: "json",
			url: "getMarkers.php",
			success: function(data){
				console.log(data);
				markerData = data.Coords;
				$markerNum = data.Coords.length;
				for(var i = 0; i < $markerNum; i++){
					xcoord = markerData[i].xcoord;
					ycoord = markerData[i].ycoord;
					name = markerData[i].name;
					id = markerData[i].id;
					console.log(xcoord);
					
					$(".markers").append("<div class='savedMarker '"
					+"style='top:"+ycoord+"px; left:"+xcoord+"px' id='"+id+"' data-name="+name+">"
					+"<img src='img/marker.png' class='markerImg'></img>"
					+"<p>"+name+"</p>"
					+"</div>");
				}
			}	
		}) 

	$(".markers").on('click','.cancel',function(){
		$(this).parent(".drag").remove();
		
	})
	
	$(".newMarker").on("click",function(){
		var scrollPos = $(document).scrollTop();
		$(".markers").append("<div class='drag draggable' style='top:"+scrollPos+"px'>"
		+"<img class='markerImg' src='img/markerTemp.png' ></img>"
		+"<input type='text' class='nameField'></input>"
		+"<img src='img/confirm.png' class='save'>"
		+"<img src='img/cancel.png' class='cancel'>"
		+"</div>");
		
		$(".draggable").draggable({containment: '.mapContainer'});
	
	})	
	
	$(".markers").on('click', '.save', function(){		
		var name = $(".nameField").val();
		var parent = $(this).parent(".drag");
		var pos = $(parent).position();
		
		if(name != "" && pos != null){
			$.ajax({
				type: 'POST',
				url: 'updatecoords.php',
				data: {x: pos.left, y: pos.top, name: name},
				success: function(data)
				{
					console.log(data);
				}
			})
			$(this).prev().prev(".markerImg").attr("src","img/marker.png");
			$(this).prev(".nameField").remove();
			$(this).next(".cancel").remove();
			$(this).parent(".drag").draggable('option', 'disabled', true);
			$(this).remove();
		}else{
			alert("Name not set!");
		}
	})
	

		
})	
