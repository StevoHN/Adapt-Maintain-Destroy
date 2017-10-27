<!DOCTYPE HTML>
<html>
<head>
	<?php include 'include/html_head.php'?>
	
<script>
	var classes;	
	var class_color;
	var roles;
	var ranks;
	
	function loadGuild(item) {
		var i = 0;
		var character;
		var memberObject;
		var tempi = 0;
		
		$.each(item.members,function(){
			character = item.members[i];
			memberObject = "<div class='rosterMember rBox_"  + classes[character.character.class] + "'><div class='rosterMemberImages'><a href='http://eu.battle.net/wow/en/character/ravencrest/" + 
					character.character.name + "/simple' target='_blank' style='margin:0px;'><img onerror='loadPlaceholder(this," + character.character.race + "," + character.character.gender + ")' class='memberAvatar' src='http://render-eu.worldofwarcraft.com/character/" + 
					character.character.thumbnail + "'/></a>" + "<img class='memberClassImg' title='" + classes[character.character.class] + "' src='images/classes/" + 
					classes[character.character.class] + ".jpg'/></div><span class='character_name'>" + character.character.name + "</span></div>";
					
			if(character.rank == 0 || character.rank == 1 || character.rank == 2 || character.rank == 3) {
				if(Object.keys(roles).indexOf((character.character.name).toLowerCase()) >= 0) {
					$("." + roles[(character.character.name).toLowerCase()]).append(memberObject);
				}
				else {
					if(tempi == 0)
					{
						var nadiv = "<div class='na'><h1>N/A</h1></div>"
						$("#raiderList").append(nadiv);
						tempi = 1;
					}
					$(".na").append(memberObject);
				};
			};
			
			$("." + ranks[character.rank]).append(memberObject);
			console.log(i);
			i++;
			
		});
	};
	
	$(document).ready(function() {
		
		$.getJSON("json/roles.json", function(data) {
			roles = data.roles;
			// console.log(roles);
		});
		$.getJSON("json/data.json", function(data) {
			class_color = data.class_color;
			classes = data.classes;
			ranks = data.ranks;
		});
		
		$.ajax({
			url: "https://eu.api.battle.net/wow/guild/Ravencrest/Adapt%20Maintain%20Destroy?fields=members&locale=en_GB&jsonp=loadGuild&apikey=ExampleAPIKey",
			type: 'GET',
			dataType: 'jsonp'
		});
		
		if(window.innerWidth > 1000)
		{
			$(".rosterMember").css("background-color","rgba(0,0,0,0.5");
		};
	});
</script>
	
</head>

<body>
<?php include 'include/header.php'?>
<div class="container">
	<button id="toggleButton" onclick="toggleRoster();">Show All Members</button>
	<div id="raiderList">
		<div class="tank">
			<h1>Tank</h1>
		</div>
		
		<div class="healer">
			<h1>Healer</h1>
		</div>
		
		<div class="dps">
			<h1>DPS</h1>
		</div>
	</div>
	<div id="socialList" style="display:none;">
		<div class="guild_master">
			<h1>Guild Master</h1>
		</div>
		
		<div class="raid_leader">
			<h1>Raid Leader</h1>
		</div>
		
		<div class="core_raiders" >
			<h1>Core Raiders</h1>
		</div>
		
		<div class="raiders">
			<h1>Raiders</h1>
		</div>
		
		<div class="trial_raiders">
			<h1>Trial Raiders</h1>
		</div>
		
		<div class="social">
			<h1>Social</h1>
		</div>
	</div>
</div>

<?php include 'include/footer.php'?>
</body>

</html>