var arrVars = new Array();

function arrAdd(){
	var inputVar = document.getElementById("arrEx").value;
	arrVars.push(inputVar);
	
}

function arrShow(){
	var listShow ="";
	for(var i = 0; i < arrVars.length; i++){
		listShow += arrVars[i] + ", ";
	}
	document.getElementById("arrayDemo").innerHTML = listShow;	
}

function boolTry(){
	var inputVar = document.getElementById("boolEx").value;
	if(!isNaN(parseInt(inputVar))){
		document.getElementById("boolDemo").innerHTML = inputVar > 10;
	}
	else{
		document.getElementById("boolDemo").innerHTML = "Du måste ange ett heltal";		
	}
}

function dateShow(){
	var dateVar = new Date();
	document.getElementById("dateDemo").innerHTML = "Dagens datum är:" + dateVar.getFullYear() +"-"+ dateVar.getMonth() +"-"+ dateVar.getDate();
}

function mathShow(){
	var number = Math.random() * 10;
	document.getElementById("mathDemo").innerHTML = Math.round(number);
}

function numbShow(){
	var inputVar = document.getElementById("numbEx").value;
	document.getElementById("numbDemo").innerHTML = "Decimal: " +inputVar + ", " + "Hexadecimal: " +inputVar.toString(16) + ", " + "Binär: " + inputVar.toString(2)
}

function strShow(){
	var str = document.getElementById("strEx").value;
	document.getElementById("strDemo").innerHTML = str.length;
}

function regExpShow(){
	var textVar = document.getElementById("textEx").innerHTML;
	var inputVar = document.getElementById("regExpEx").value;
	var allLtrs = new RegExp(inputVar, "ig");
	var foundMatch = textVar.match(allLtrs);
	document.getElementById("regExpDemo").innerHTML = "Antal träffar: " + foundMatch.length;
}

