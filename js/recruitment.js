var i;
		var tempRoleTD;
		var roles;
		
		function saveRecruit() {
			var obj = {};
			var specsObj = {};
			var classesObj = {};
			var rowCount = $("#classTable tr").length;
			var columnCount;
			var jsonChar;
			var jsonSpec;
			var jsonSpecRC;
			console.log("------ LOGGING FIRST: specsObj ------");
			console.log(specsObj);
			for(x = 1;x<=rowCount;x++)
			{
				jsonChar = $("#classTable tr:nth-child(" + x + ") td:nth-child(1)").text();
				columnCount = $("#classTable tr:nth-child(" + x + ")").children().length;
				
				specsObj = {};
				
				for(y = 2;y<=columnCount;y++)
				{
					jsonSpec = $("#classTable tr:nth-child(" + x + ") td:nth-child(" + y + ")").text();
					jsonSpecRC = $("#classTable tr:nth-child(" + x + ") td:nth-child(" + y + ") input:nth-child(2)")[0].checked;
					console.log("Setting " + jsonSpec + " to " + jsonSpecRC + " in specsObj");
					console.log("X: " + x + " - Y: " + y);
					specsObj[jsonSpec] = jsonSpecRC;
				};
				obj[jsonChar] = specsObj;
				console.log(jsonChar + ": specsObj");
				console.log(specsObj);
			};
			console.log("Logging obj");
			console.log(obj);
			var jsonString = JSON.stringify(obj);
			console.log(jsonString);
			
			$("#jsonInput").val(jsonString);
			return true;
		};
		
		$(document).ready(function() {
		
			$.getJSON("json/recruitment.json", function(data) {
				console.log(data);
				var classCount = Object.keys(data).length;
				var r_Class;
				var r_Spec;
				var rClass;
				var classRow;
				var rowData;
				var cCheckbox;
				for(var i = 0; i < classCount; i++) {
					r_Class = Object.keys(data)[i];
					rClass = data[Object.keys(data)[i]];
					classRow = "<tr id='class" + i + "'><td>" + Object.keys(data)[i] + "</td></tr>";
					$("#classTable").append(classRow);
					if(rClass.rc == false)
					{
						console.log(r_Class + " is false");
					};
			
			
					for(var j = 0; j <= Object.keys(data[Object.keys(data)[i]]).length - 1; j++) {
						r_Spec = Object.keys(data[Object.keys(data)[i]])[j];
						if(data[Object.keys(data)[i]][Object.keys(data[Object.keys(data)[i]])[j]] == true)
						{
							console.log("need this spec. No strikethrough");
							cCheckbox = "<input type='checkbox' name='r_" + r_Class + "_" + r_Spec + "' checked />";
						}
						else if(data[Object.keys(data)[i]][Object.keys(data[Object.keys(data)[i]])[j]] == false)
						{
							console.log("no need this spec. yes strikethrough");
							cCheckbox = "<input type='checkbox' name='r_" + r_Class + "_" + r_Spec + "' />";
						};
						rowData = "<td>" + Object.keys(data[Object.keys(data)[i]])[j] + "<br>" + cCheckbox + "</td>";
						$("#class" + i).append(rowData);
					};
				};
			});
		});