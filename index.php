<!DOCTYPE html>
<html>

	<head>
	
		<title>Home - Adapt Maintain Destroy</title>
		<link rel="stylesheet" type="text/css" href="css/raidboxes.css">
		<?php include 'include/html_head.php'?>
		<script src="js/slideshow.js"></script>
		<script src="js/index.js"></script>
	</head>
	
	
	<body onresize="loadFrontpageR();" onload="loadFrontpageL();">
	
		<?php include 'include/header.php'?>
		
		<div class="container" id="container">
		
			<div class="slideshow">
			
				<div class="slide" style="margin-left:-35vw">
					<div class="slideHeader">
						<h2>Welcome to Adapt Maintain Destroys new website</h2>
					</div>
					<img src="images/slideshow/slide1.jpg"/>
				</div>
				
				<a href="apply.php" target="_blank">
					<div class="slide" style="margin-left:35vw;">
						<div class="slideHeader">
                            <h2>We're looking for new members! Apply here</h2>
						</div>
						<img src="images/slideshow/slide2.jpg"/>
					</div>
				</a>
				
				<a href="rules.php" target="_blank">
					<div class="slide" style="margin-left:-105vw;">
						<div class="slideHeader">
							<h2>We have updated our rules, click here to read them</h2>
						</div>
						<img src="images/slideshow/slide3.jpg"/>
					</div>
				</a>
				
				
				<!-- <div class="dotsContainer"> -->
					<!-- 
<div id="dots">
					</div>
 -->
				<!-- </div> -->
				
				<!-- <div id="timerBar">
				
				</div> -->
				
<!-- 				<div style="height: 30px;width:50px;background-color:red;float:left;position:relative;margin-top: 15vw;margin-left: 10px;line-height: 30px;font-size: 20px;border-radius: 5px;background-color: rgba(0,0,0,0.5);color: white;cursor:pointer" onclick="selectSlide(lastSlide)">&#x27F5</div> -->
<!-- 				<div style="height:30px;width:50px;background-color:red;float:right;position:relative;margin-top: 15vw;margin-right: 10px;line-height: 30px;font-size: 20px;border-radius: 5px;background-color: rgba(0,0,0,0.5);color: white;cursor:pointer" onclick="selectSlide(nextSlide)">&#x27F6</div> -->
				
			</div>
			
			<div class="infoBoxes">
				<div style="float:right;width:49%;" id="container2">
					<div class="infoBox" style="float:right;">
						<p>
							Welcome to <b class="Link"><a href="http://eu.battle.net/wow/en/guild/Ravencrest/Adapt%20Maintain%20Destroy/" target="_blank">Adapt Maintain Destroy</a></b>
						</p>
						<p>
							This is the official website for the World of Warcraft guild Adapt Maintain Destroy on Ravencrest. On the website you'll be able to see the members, news, rules and more. You can also apply as a raider.
						</p>
					</div>
					<div class="infoBox" id="raid_infoBox" style="float:right;">
						<ul style="list-style:none;padding:0;">
							<li class="raidBox" id="raid_en">
								<div id="raidtop_en" class="raidtop">
									<span style="float:left;margin-left:15px;">EMERALD NIGHTMARE</span> <span style="float:right;margin-right:15px;">[7/7] N - [7/7] HC - [4/7] M</span>
								</div>
								<div class="raid_bosses">
									<div id="boss_nythendra" class="boss_icon boss_down boss_down_m"><div class="boss_tooltip" id="boss_Nythendra"></div></div>
									<div id="boss_eleretherenferal" class="boss_icon boss_down boss_down_m"><div class="boss_tooltip" id="boss_Elerethe Renferal"></div></div>
									<div id="boss_ursoc" class="boss_icon boss_down boss_down_m"><div class="boss_tooltip" id="boss_Ursoc"></div></div>
									<div id="boss_ilgynoth" class="boss_icon boss_down"><div class="boss_tooltip" id="boss_Il'gynoth"></div></div>
									<div id="boss_dragonsofnightmare" class="boss_icon boss_down boss_down_m"><div class="boss_tooltip" id="boss_Dragons of Nightmare"></div></div>
									<div id="boss_cenarius" class="boss_icon boss_down"><div class="boss_tooltip" id="boss_Cenarius"></div></div>
									<div id="boss_xavius" class="boss_icon boss_down"><div class="boss_tooltip" id="boss_Xavius"></div></div>
								</div>
							</li>
							<li class="raidBox" id="raid_tov">
								<div id="raidtop_tov" class="raidtop">
									<span style="float:left;margin-left:15px;">TRIAL OF VALOR</span> <span style="float:right;margin-right:15px;">[3/3] N - [3/3] HC - [0/3] M</span>
								</div>		
								<div class="raid_bosses">
									<div id="boss_odyn" class="boss_icon boss_down"><div class="boss_tooltip" id="boss_Odyn"></div></div>
									<div id="boss_guarm" class="boss_icon boss_down"><div class="boss_tooltip" id="boss_Guarm"></div></div>
									<div id="boss_helya" class="boss_icon boss_down"><div class="boss_tooltip" id="boss_Helya"></div></div>
								</div>
							</li>
							<li class="raidBox" id="raid_nh">
								<div id="raidtop_nh" class="raidtop">
									<span style="float:left;margin-left:15px;">NIGHTHOLD</span> <span style="float:right;margin-right:15px;">[10/10] N - [10/10] HC - [1/10] M</span>
								</div>
								<div class="raid_bosses">
									<div id="boss_skorpyron" class="boss_icon boss_down boss_down_m"><div class="boss_tooltip" id="boss_Skorpyron"></div></div>
									<div id="boss_chronomaticanomaly" class="boss_icon boss_down"><div class="boss_tooltip" id="boss_Chronomatic Anomaly"></div></div>
									<div id="boss_trilliax" class="boss_icon boss_down"><div class="boss_tooltip" id="boss_Trilliax"></div></div>
									<div id="boss_tichondrius" class="boss_iconboss_down"><div class="boss_tooltip" id="boss_Tichondrius"></div></div>
									<div id="boss_krosus" class="boss_icon boss_down"><div class="boss_tooltip" id="boss_Krosus"></div></div>
									<div id="boss_grandmagistrixelisande" class="boss_icon boss_down"><div class="boss_tooltip" id="boss_Grand Magistrix Elisande"></div></div>
									<div id="boss_spellbladealuriel" class="boss_icon boss_down"><div class="boss_tooltip" id="boss_Spellblade Aluriel"></div></div>
									<div id="boss_telarn" class="boss_icon boss_down"><div class="boss_tooltip" id="boss_Tel'arn"></div></div>
									<div id="boss_starauguretraeus" class="boss_icon boss_down"><div class="boss_tooltip" id="boss_Star Augur Etraeus"></div></div>
									<div id="boss_guldan" class="boss_icon boss_down"><div class="boss_tooltip" id="boss_Gul'dan"></div></div>
								</div>
							</li>
						</ul>
					</div>
					
					<div class="infoBox" style="float:right">
						<p>
							<b>Recruitment</b>
						</p>
						<p>
							Below you can see the classes and specs we're currently looking for. However, feel free to <b class="Link"><a href="apply.php" target="_blank">apply</a></b>, even though we might not be in need of your class right now.
						</p>
						<!--<p>
							Vi leder hele tiden efter nye folk til vores guild, om det er raiders eller almindelige medlemmer.
						</p>-->
						<div>
							<div class="recruit_class" id="recruit_Warrior" >
								<img class="recruit_img"src="images\classes\Warrior.jpg"/>
								<div class="recruit_spec">
								</div>
							</div>
							<div class="recruit_class" id="recruit_Paladin">
								<img class="recruit_img" src="images\classes\Paladin.jpg"/>
								<div class="recruit_spec">
								</div>
							</div>
							<div class="recruit_class" id="recruit_Hunter">
								<img class="recruit_img" src="images\classes\Hunter.jpg"/>
								<div class="recruit_spec">
								</div>
							</div>
							<div class="recruit_class" id="recruit_Rogue">
								<img class="recruit_img" src="images\classes\Rogue.jpg"/>
								<div class="recruit_spec">
								</div>
							</div>
							<div class="recruit_class" id="recruit_Priest">
								<img class="recruit_img" src="images\classes\Priest.jpg"/>
								<div class="recruit_spec">
								</div>
							</div>
							<div class="recruit_class" id="recruit_Death-Knight">
								<img class="recruit_img" src="images\classes\Death-knight.jpg"/>
								<div class="recruit_spec">
								</div>
							</div>
							<div class="recruit_class" id="recruit_Shaman">
								<img class="recruit_img" src="images\classes\Shaman.jpg"/>
								<div class="recruit_spec">
								</div>
							</div>
							<div class="recruit_class" id="recruit_Mage">
								<img class="recruit_img" src="images\classes\Mage.jpg"/>
								<div class="recruit_spec">
								</div>
							</div>
							<div class="recruit_class" id="recruit_Warlock">
								<img class="recruit_img" src="images\classes\Warlock.jpg"/>
								<div class="recruit_spec">
								</div>
							</div>
							<div class="recruit_class" id="recruit_Monk">
								<img class="recruit_img" src="images\classes\Monk.jpg"/>
								<div class="recruit_spec">
								</div>
							</div>
							<div class="recruit_class" id="recruit_Druid">
								<img class="recruit_img" src="images\classes\Druid.jpg"/>
								<div class="recruit_spec">
								</div>
							</div>
							<div class="recruit_class" id="recruit_Demon-Hunter">
								<img class="recruit_img" src="images\classes\Demon-hunter.jpg"/>
								<div class="recruit_spec">
								</div>
							</div>
						</div>
					</div>

					<div class="infoBox" style="float:right;">
						<p>
							<b>New Members</b>
						</p>
						<div id="memberBox" style="margin-left:auto;margin-right:auto;margin-top:10px;width:100%;"></div>
					</div>
					
					<div class="infoBox_small" style="float:left;">
						<p>
							<b>Links</b>
						</p>
						<div style="display:inline-block;margin:5px;">
							<a href="http://eu.battle.net/wow/en/guild/Ravencrest/Adapt%20Maintain%20Destroy/" target="_blank"><img style="width:50px;height:50px;border-radius:5px;" src="images/links/wow_2.png"/></a>
						</div>
						<div style="display:inline-block;margin:5px;">
							<a href="http://www.wowprogress.com/guild/eu/ravencrest/Adapt+Maintain+Destroy" target="_blank"><img style="width:50px;height:50px;border-radius:5px;" src="images/links/wowprogress.jpg"/></a>
						</div>
					</div>
					
					<div class="infoBox_small" style="float:right;">
						<p>
							<b>Raid Schedule</b>
						</p>
						<p style="line-height:24px;">
							Every Monday, Thursday & Sunday<br>
							19:30-22:00 GMT+1
						</p>
					</div>
					
				</div>
				<div style="float:left;width:49%;" id="container1">
					
					<div id="news" style="float:left";>
						<h2>News</h2>
						<?php
							try
							{
								include '../db_cred.php';
								$conn = new PDO("mysql:host=$db_cred[host];dbname=$db_cred[database]",$db_cred[username],$db_cred[password]);
								$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$query = "SELECT `title`,`author`,`content`,`date` FROM `news` ORDER BY `date` desc limit 5";
								$runQ = $conn->prepare("$query");
								$runQ->execute();
								$loginMsg = "Query Run";
							}
						
							catch(PDOException $err)
							{
								$loginMsg = $err;
							}
							
							$rowCount = $runQ->rowCount();
							$r = $runQ->fetchAll();
							
							function get_Date($timestamp) {
								$temp = explode(" ",$timestamp);
								$time = $temp[1];
								$temp2 = explode("-",$temp[0]);
								$year = $temp2[0];
								$month = $temp2[1];
								$day = $temp2[2];
								$date = "$day-$month-$year $time";
								return $date;
							}
							
							for($i=0;$i<$rowCount;$i++)
							{
								$title = $r[$i][0];
								$author = $r[$i][1];
								$content = $r[$i][2];
								$date = get_Date($r[$i][3]);
								
								$article = <<<ARTICLE
<div class="article">
<h3>$title</h3>
<p style="font-size:12px"><em>by $author, $date</em></p>
<p>$content</p>
</div>
ARTICLE;
								echo $article;
							}
						?>					
					</div>
				</div>
				<div style="clear:both;"></div>
			</div>
			
		</div>
			
		
	<?php include 'include/footer.php'?>
	</body>
	
</html>