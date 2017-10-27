var specs = {
	"Warrior": {
		1:"Arms",
		2:"Fury",
		3:"Protection",
	},
	"Paladin": {
		1:"Holy",
		2:"Protection",
		3:"Retribution"
	},
	"Hunter": {
		1:"Beast Mastery",
		2:"Marksmanship",
		3:"Survival"
	},
	"Rogue": {
		1:"Assassination",
		2:"Outlaw",
		3:"Subtlety"
	},
	"Priest": {
		1:"Discipline",
		2:"Holy",
		3:"Shadow"
	},
	"Death Knight": {
		1:"Blood",
		2:"Frost",
		3:"Unholy"
	},
	"Shaman": {
		1:"Elemental",
		2:"Enhancement",
		3:"Restoration"
	},
	"Mage": {
		1:"Arcane",
		2:"Fire",
		3:"Frost"
	},
	"Warlock": {
		1:"Affliction",
		2:"Demonology",
		3:"Destruction"
	},
	"Monk": {
		1:"Brewmaster",
		2:"Mistweaver",
		3:"Windwalker"
	},
	"Druid": {
		1:"Balance",
		2:"Feral",
		3:"Guardian",
		4:"Restoration"
	},
	"Demon Hunter": {
		1:"Havoc",
		2:"Vengeance"
	}
};

var showRaiders = 1;
var boss_name = "";




function toggleRoster() {
	if(showRaiders == 1) {
		$("#raiderList").hide();
		$("#socialList").show();
		$("#toggleButton").html("Show Raid Team");
		showRaiders = 0;
	}
	else if(showRaiders == 0){
		$("#raiderList").show();
		$("#socialList").hide();
		$("#toggleButton").html("Show All Members");
		showRaiders = 1;	
	};
};

function loadPlaceholder(image,race,gender) {
	image.src = "/images/default_race/" + race + "-" + gender + ".jpg";
};

$(document).ready(function(){
		var width = window.innerWidth;
	if($("body").scrollTop() >= 160 && width > 1000)
		{
			$("#navbar").css("position","fixed");
			$("#navbar").css("background-color","rgba(0,0,0,1.0)");
			$(".header").css("background-color","rgba(0,0,0,1.0)");
		}
		else if($("body").scrollTop() < 160 && width > 1000)
		{
			$("#navbar").css("position","relative");
			$("#navbar").css("background-color","rgba(0,0,0,0.5)");
			$(".header").css("background-color","rgba(0,0,0,0.5)");
		};
		
	$('#welcome').hover(function(){
		$('#welcome_text').text("Velkommen");
		}, function(){
		$('#welcome_text').text("Adapt Maintain Destroy");
	});
			
	$("body").ready(function(){
		var tempString = location.pathname;
		var tempID = tempString.replace(".php","");
		tempID = tempID.replace("/","");
		
		if(tempID == ""){
			tempID = "index";
		};
		
		$("#" + tempID + " div").css("color","white");
		$("#" + tempID).css("background-color","rgba(50,0,0,0.2)");
	});
			
	$("#class").change(function(){
		var wow_class = document.getElementById('class').value;
		
			$('#main-specialization').empty();
			$('#off-specialization').empty();
			$('#main-specialization').append("<option disabled selected>- Select Main-Spec -</option>");
			$('#off-specialization').append("<option disabled selected>- Select Off-Spec -</option>");
		
		for(i = 1; i <= Object.keys(specs[wow_class]).length; i++) {
			$('#main-specialization').append("<option>" + specs[wow_class][i] + "</option>");
			$('#off-specialization').append("<option>" + specs[wow_class][i] + "</option>");
		};
		
	});
	
	$(window).scroll(function() {
		width = window.innerWidth
		if(($("body").scrollTop() >= 160) && width > 1000)
		{
			$("#navbar").css("position","fixed");
			$("#navbar").css("background-color","rgba(0,0,0,1.0)");
			$(".header").css("background-color","rgba(0,0,0,1.0)");
		}
		else if(($("body").scrollTop() < 160) && width > 1000)
		{
			$("#navbar").css("position","relative");
			$("#navbar").css("background-color","rgba(0,0,0,0.5)");
			$(".header").css("background-color","rgba(0,0,0,0.5)");
		};
	});
	
	$(".boss_tooltip").mouseover(function() {
		tempID = event.target.id;
		boss_name = tempID.replace("boss_","");
		
		tempID = tempID.replace(" ","");
		tempID = tempID.replace(" ","");
		tempID = tempID.replace("'","");
		tempID = tempID.toLowerCase();
		
		console.log(tempID);
		
		var pos_top = $("#" + tempID).offset().top - 40;
		var pos_left = ($("#" + tempID).offset().left) - (((boss_name.length * 9)/2)-18);
		console.log(pos_top + " - " + pos_left);
		var bottommove = pos_top - document.body.scrollHeight + 10;
		var myDiv = "<div id='temp_tooltip' style='font-family:courier new;font-size:15px;line-height:20px;height:20px;width:" + 
		(boss_name.length * 9 + 1) + "px;position:relative;z-index:100;top:" + bottommove + "px;left:" + pos_left + 
		"px;background-color: rgba(0,0,0,0.75);border:2px white solid;color:white;padding-left:5px;padding-right:5px;margin-right:200px;'></div>";
		$(document.body).append(myDiv);
		$("#temp_tooltip").append("<span style=''>" + boss_name + "</span>");
		console.log(myDiv);
	});
	$(".boss_tooltip").mouseleave(function() {
		$("#temp_tooltip").remove();
	});
});



