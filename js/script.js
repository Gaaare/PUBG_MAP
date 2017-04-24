$(document).ready(function(){
	//Load and place markers on page load
	$.ajax({
		type: "GET",
		dataType: "json",
		url: "getMarkers.php",
		success: function(data){
			console.log(data);
			markerData = data.Coords;
			$markerNum = data.Coords.length;
			for(var i = 0; i < $markerNum; i++){
				var xcoord = markerData[i].xcoord;
				var ycoord = markerData[i].ycoord;
				var name = markerData[i].name;
				var data_name = name.replace(" ","_");
				var id = markerData[i].id;
				console.log(xcoord);
				
				$(".markers").append("<div class='savedMarker '"
				+"style='top:"+ycoord+"px; left:"+xcoord+"px' id='"+id+"' data-name="+data_name+">"
				+"<img src='img/marker.png' class='markerImg'></img>"
				+"<p>"+name+"</p>"
				+"</div>");
				
				$(".markerList li").append("<ul>"+name+" </ul>"	);
			}
		}	
	}) 
	
	$(".listButton").click(function(){
		$("li").toggleClass("hidden");
	})
	$("li").on('mouseenter','ul',function(){				
		var name = $(this).text();		
		name = name.trim();
		name = name.replace(" ","_");
		var pos = $('[data-name='+name+']').position();
		 $('[data-name='+name+'] p').css("background-color","rgba(66, 174, 191, 0.54)");
		 
		$(this).css("background-color","#42dcf4");
			$(this).on('mouseleave',function(){
				$(this).css("background-color","unset");
				$('[data-name='+name+'] p').css("background-color","unset");
				});
		//alert(pos.left);
		$(document).scrollTop(pos.top / 2);
		$(document).scrollLeft(pos.left / 2);
	})
	
	//Save new marker when save button on new marker element is clicked
	$(".markers").on('click', '.save', function(){	
		console.log($(this));
		var name = $(".nameField").val();
		var parent = $(this).parent(".drag");
		var pos = $(parent).position();
		if(name !== "" && pos != null){
			$.ajax({
				type: 'POST',
				url: 'updatecoords.php',
				dataType: 'json',
				data: {x: pos.left, y: pos.top, name: name},
				success: function(data)
				{
					console.log(data);
					if(data == false){
						alert("log in");
					}else{
						 $(".save").siblings(".markerImg").attr("src","img/marker.png");
						$(".save").siblings(".nameField").remove();
						$(".save").siblings(".cancel").remove();
						$(".save").parent(".drag").draggable('option', 'disabled', true);
						$(".save").remove(); 
						//alert ("Marker Added");
						$("li").append("<ul>"+name+"</ul>");

					}
				}
			})
			
		}else{
			alert("Name not set!");
		}
	})	
	
	//remove new marker element when cancel button is clicked
	$(".markers").on('click','.cancel',function(){
		$(this).parent(".drag").remove();		
	})
	
	//display login/registration form
	$(".login, .register").on('click',function(){
		$(".loginContainer").removeClass("hidden");
		$(document).scrollTop(0);
	})
	
	//hide login/registration form
	$(".close").on('click',function(){
		$(".loginContainer").addClass("hidden");
	})

	//button sliders
	$(".login, .logout, .newMarker, .register").hover(function(){
		$(this).stop().animate({left: '1px'});
	},function(){
		$(this).stop().animate({left: '-100px'});
	})

	//open new marker element when clicked
	$(".newMarker").on("click",function(){		
		if($(".drag").length == 0){
			$(document).scrollTop(0);
			$(document).scrollLeft(0);
			
			$(".markers").append("<div class='drag draggable'>"
			+"<img class='markerImg' src='img/markerTemp.png' ></img>"
			+"<input type='text' class='nameField'></input><br>"
			+"<img src='img/confirm.png' class='save'>"
			+"<img src='img/cancel.png' class='cancel'>"
			+"</div>"
			);	
		
			//set new marker to be draggable
			$(".draggable").draggable({containment: '.mapContainer'});
		}else{
			alert("Save or delete current marker");
		}
	})
	
	$(".savedMarker").on("hover",function(){
			$(this).css("z-index","50000");
	})
	
/* 	
	//open image upload form 
	$(".markers").on('click','.savedMarker',function(){		
		$(this).append("</div>"
		+"<form class='imgUpload'  action='upload.php' method='post' enctype='multipart/form-data'>"
		+"Select image to upload:<br>"
		+"<input type='file' name='image'><br>"
		+"<input type='submit'>"
		+"</form>"
		+"</div>")	
	})
 */
	
		
})