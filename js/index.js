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
var warrior;
var specText;
var width_nh = 0;
var width_en = 0;
var width = 0;
var height = 0;

function loadFrontpageR() {
	width_nh = $("#raid_nh").width();
	width_en = $("#raid_en").width();
	width = document.body.clientWidth;
	
	height = window.innerHeight;
	$("#width").text(width);
	if(width < 1000) {
		$("#container1").css("width","100%");
		$("#container2").css("width","100%");
	}
	else if(width >= 1000) {
		$("#container1").css("width","49%");
		$("#container2").css("width","49%");
	};
	
	if(width_en < 445) {
		$("#raid_en").css("max-height","165px");
		$("#raid_en").css("transition","0.5s");
	}
	else {
		$("#raid_en").css("max-height","100px");
	};
	
	if(width_nh < 638) {
		$("#raid_nh").css("max-height","165px");
		$("#raid_nh").css("transition","0.5s");
		console.log("width is " + $("#raid_nh").width() + ", setting max-height to 165px");
	}
	else if(width_nh >= 638){
		$("#raid_nh").css("max-height","100px");
		console.log("width is " + $("#raid_nh").width() + ", setting max-height to 100px");
	};
};

function loadFrontpageL() {
	width_nh = $("#raid_nh").width();
	width_en = $("#raid_en").width();
	width = document.body.clientWidth;
	
	height = window.innerHeight;
	if(width < 1000) {
		$("#container1").css("width","100%");
		$("#container2").css("width","100%");
	}
	else if(width >= 100) {
		$("#container1").css("width","49%");
		$("#container2").css("width","49%");
	};
	
	if(width_en < 445) {
		$("#raid_en").css("max-height","165px");
		$("#raid_en").css("transition","0.5s");
	}
	else {
		$("#raid_en").css("max-height","100px");
	};
	
	if(width_nh < 637) {
		$("#raid_nh").css("max-height","165px");
		$("#raid_nh").css("transition","0.5s");
	}
	else {
		$("#raid_nh").css("max-height","100px");
	};
	
	
	var x = 0;
	var temp;
	$(".boss_down").append("<img src='../images/raid_images/boss_icons/skull.png' style='position:absolute;top:5px;right:5px;'/>");
	$(".boss_down_m").append("<img src='../images/raid_images/boss_icons/skull_m.png' style='position:absolute;bottom:5px;right:5px;'/>");
	$.each($(".boss_icon"),function() {
		temp = $(".boss_icon")[x].id;
		temp = temp.replace("boss_","");
		$("#" + $(".boss_icon")[x].id).css("background-image","url(../images/raid_images/boss_icons/" + temp + ".png)");
		
		x++;
	});
};
function loadGuild(item) {
	var i = 0;
	var members = item.members;
	var max = members.length - 1;
	var min = max - 4;
	var memberDiv;
	var character;

	for(i = max;i>=min;i--) {
		character = members[i];

		memberDiv = "<a href='http://eu.battle.net/wow/en/character/ravencrest/" + 
					character.character.name + "/simple' target='_blank' style='margin:0px;'><img style='height:50px;width:50px;background-color:blue;margin:5px;' onerror='loadPlaceholder(this," + character.character.race + "," + character.character.gender + ")' class='memberAvatar' src='http://render-eu.worldofwarcraft.com/character/" + 
					character.character.thumbnail + "'/></a>";
		$("#memberBox").append(memberDiv);
	}
};
function checkClass(cClass,cString) {
};
function checkSpec(cSpec, cClass, s) {
	console.log("checking: " + cClass);
	for(var j = 1; j <= Object.keys(cSpec).length - 1; j++) {
		console.log("checking spec: " + specs[cClass][j]);
		if(cSpec[Object.keys(cSpec)[j]] == true)
		{
			console.log("need this spec. no strikethrough");
			specText = specs[cClass][j] + "<br />";
		}
		else if(cSpec[Object.keys(cSpec)[j]] == false)
		{
			console.log("no need this spec. yes strikethrough");
			specText = "<s>" + specs[cClass][j] + "</s><br />";
		};
		$("#rSpec" + s).append(specText);
	};
};

$(document).ready(function(){
	
	
	$.ajax({
		url: "https://eu.api.battle.net/wow/guild/Ravencrest/Adapt%20Maintain%20Destroy?fields=members&locale=en_GB&jsonp=loadGuild&apikey=ExampleAPIKey",
		type: 'GET',
		dataType: 'jsonp'
	});
	
	$.getJSON("json/recruitment.json", function(data) {
		
		var classCount = Object.keys(data).length;
		var rClass;
		for(var i = 0; i < classCount; i++) {
			rClass = data[Object.keys(data)[i]];
			if(rClass.rc == false)
			{
				console.log(Object.keys(data)[i] + " is false");
				$("#recruit_" + Object.keys(data)[i] + " img").css("opacity","0.3");
			};
			rClass = document.getElementsByClassName("recruit_class")[i].id.replace("recruit_","");
			rClass = rClass.replace("-"," ");

			$(".recruit_spec")[i].id = "rSpec" + [i];
			$("#rSpec" + [i]).css("line-height",(($(".recruit_class").height())/(Object.keys(data[Object.keys(data)[i]]).length - 1)) + "px");
			
			
			for(var j = 1; j <= Object.keys(data[Object.keys(data)[i]]).length - 1; j++) {

				if(data[Object.keys(data)[i]][Object.keys(data[Object.keys(data)[i]])[j]] == true)
				{
					console.log("need this spec. no strikethrough");
					specText = Object.keys(data[Object.keys(data)[i]])[j] + "<br />";
				}
				else if(data[Object.keys(data)[i]][Object.keys(data[Object.keys(data)[i]])[j]] == false)
				{
					console.log("no need this spec. yes strikethrough");
					specText = "<s>" + Object.keys(data[Object.keys(data)[i]])[j] + "</s><br />";
				};
				$("#rSpec" + i).append(specText);
			};
		};

	});
	
	
	
	
	
	
});