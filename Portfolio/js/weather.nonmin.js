var locationData = {
	"state" : "MO",
	"city" : "65202"
}

$(document).ready(function(){
	console.log("Location data: State = " + locationData.state + " City/Zip = " + locationData.city);
	console.log("Weather request URL = http://api.wunderground.com/api/776e797e964493d4/conditions/q/" + locationData.state + "/" + locationData.city + ".json?callback=?");
	getWeather(locationData);
});

function getWeather(){
	$.ajax({
		"async" : true,
		"url" : "http://api.wunderground.com/api/776e797e964493d4/conditions/q/" + locationData.state + "/" + locationData.city + ".json?callback=?",
		"dataType" : "jsonp",
		"method" : "GET",
		"error": function (jqXHR, textStatus, errorThrown) { //throw error on JS console in DevTools
			console.log('ERROR! --> ' + textStatus + ': ' + errorThrown + ' <-- ERROR!');
			$("#weather-container #weather-output").html("ERROR! " + textStatus + ": " + errorThrown + "!");
		},
		"success": function (data, textStatus, jqXHR) {
			if (data.Error || data.Response) {
				exists = 0;
			}
			displayWeather(jqXHR.responseJSON.current_observation); //call displayWeather to put weather data on page
			turnArrow(jqXHR.responseJSON.current_observation.wind_degrees);
		}
	});
}

function displayWeather(weatherJSON){
	console.log(weatherJSON);
	$("#weather-container #location").html(weatherJSON.display_location.full);
	$("#weather-container #last-updated").html("<small>" + weatherJSON.observation_time + "<br>" + "<a href='//www.wunderground.com/personal-weather-station/dashboard?ID=" + weatherJSON.station_id + "'  target='_blank' style='color:#999999;'>" + weatherJSON.observation_location.full + "</a><br>Elevation " + weatherJSON.observation_location.elevation +  " | " + weatherJSON.observation_location.latitude + "&deg; | " + weatherJSON.observation_location.longitude + "&deg; </small>");
	$("#weather-container #temp").html(weatherJSON.temp_f + " &deg;F");
	$("#weather-container #feels_like").html(weatherJSON.feelslike_f + " &deg;F");
	$("#weather-container #windspeed").html(weatherJSON.wind_mph + " mph");
	$("#weather-container #wind_direction").html(weatherJSON.wind_dir);
	$("#weather-container #rel_humid").html(weatherJSON.relative_humidity);
	if (weatherJSON.heat_index_f == "NA"){ //if answer is 'NA', don't display the 'degrees F' part of the string
		$("#weather-container #heatind").html(weatherJSON.heat_index_f);
	}
	else{
		$("#weather-container #heatind").html(weatherJSON.heat_index_f + " &deg;F");
	}
	$("#weather-container #pressure").html(weatherJSON.pressure_mb + " mb");
	$("#weather-container #visibility").html(weatherJSON.visibility_mi + " mi");
	$("#weather-container #data-src-credit a").attr("href", "//www.wunderground.com/");
	$("#weather-container #data-src-credit img").attr("src", weatherJSON.image.url);
	$("#weather-container #condition-icon").attr("src", weatherJSON.icon_url);
}

function turnArrow(windDeg){
	$("#weather-container #windArrow").css("-webkit-transform", "rotate(" + windDeg + "deg)");
	$("#weather-container #windArrow").css("-moz-transform", "rotate(" + windDeg + "deg)");
	$("#weather-container #windArrow").css("transform", "rotate(" + windDeg + "deg)");
}

function setLocation(){
	var newCityZip = $("#weather-settings-modal #city_zip").val();
	var newState = $("#weather-settings-modal #state-dd-wrapper select").val();
	console.log("New City/Zip = " + newCityZip + " and new state = " + newState);
	locationData.state = newState;
	locationData.city = newCityZip;
	console.log("Location data after update: state = " + locationData.state + " city/zip = " + locationData.city);
	getWeather(locationData);
}