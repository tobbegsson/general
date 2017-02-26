$(document).ready(function(){
	
	$("#div1").mouseover(function(){
		$(this).css("background-color", "red");
	});
	
	$("#div1").mouseout(function(){
		$(this).css("background-color", "green");
	});
	
	$("#div2").click(function(){
		$(this).css("border-color", "green");
		$(this).css("background-color", "white");
		$(this).text("BAJEN!");
	});
	
	$("#div3_1").click(function(){
		$(this).remove();
	});
	
	$("#div3_3").click(function(){
		$(this).remove();
	});
	
	$("#div4btn").click(function(){
		$("#div4").toggle();
	});
	
	$("#div5").hover(function(){
		$(this).css("background-color", "green");
		},
		function(){
		$(this).css("background-color", "red");
	});
	
	$(document).keydown(function(arrow){
		var xmargin = $("#div6").css("margin-left");
		var xresult = parseInt(xmargin);
		var ymargin = $("#div6").css("margin-top");
		var yresult = parseInt(ymargin);
		if(arrow.keyCode == 37){
			xresult -= 2;
			$("#div6").css("margin-left", xresult);
		}
		if(arrow.keyCode == 39){
			xresult += 2;
			$("#div6").css("margin-left", xresult);
		}
		if(arrow.keyCode == 38){
			yresult -= 2;
			$("#div6").css("margin-top", yresult);
		}
		if(arrow.keyCode == 40){
			yresult += 2;
			$("#div6").css("margin-top", yresult);
		}
	});
	
	$("input").focus(function(){
		$(this).css("background-color", "lightgrey");
	});
	
	$("input").blur(function(){
		$(this).css("background-color", "white");
	});
	
	var resizeCount = 0;
	$(window).resize(function(){
		var newCount = ++resizeCount;
		$("#div7span").text(newCount);
	});
	
	$(document).keydown(function(button){
		$("#whichSpan").text(button.which);
	});
	
	$("#div8AddBtn").click(function(){
		$("#div8").addClass("div8Brdr");
	});
	
	$("#div8RemoveBtn").click(function(){
		$("#div8").removeClass("div8Brdr");
	});
	
	var correctVar = 1234;
	var inputVar = $("#prevDefInp").val();
	$("#prevDefLink").click(function(e){
		e.preventDefault();
	});
	
	$("#div9").hover(function(){
		$(this).css("background-color", "green");
		},
		function(){
		$(this).css("background-color", "red");
	});
	
	$("#unbindBtn").click(function(){
		$("#div9").unbind();
	});
});