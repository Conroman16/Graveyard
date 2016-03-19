<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script type="text/javascript" src="js/jqmin.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/weather.js"></script> <!-- Process weather data -->
<div class="page-container" id="weather-container">
	<h1 class="page-header" id="weather-header">WEATHER</h1>
	<div class="page-content" id="weather-content">
		<div class="cf center-text" id="weather-data-container" data-toggle="tooltip" data-placement="left" title="Location Settings">
			<div class="glyphicon glyphicon-cog" id="weather-settings" data-toggle="modal" data-target="#weather-settings-modal"></div>
			<div id="weather-header">
				<h3>Weather for <span id="location">--</span></h3>
				<h6 id="last-updated">--</h6>
			</div>
			<div class="twoCol-left">
				<div class="twoCol-left text-right" id="labels">
					<ul class="nostyle">
						<li>Temperature</li>
						<li>Feels Like</li>
						<li>Heat Index</li>
						<li>Wind Speed</li>
						<li>Wind Direction</li>
						<li>Relative Humidity</li>
						<li>Pressure</li>
						<li>Visibility</li>
					</ul>
				</div>
				<div class="twoCol-right text-left" id="datas">
					<ul class="nostyle">
						<li id="temp">--</li>
						<li id="feels_like">--</li>
						<li id="heatind">--</li>
						<li id="windspeed">--</li>
						<li id="wind_direction">--</li>
						<li id="rel_humid">--</li>
						<li id="pressure">--</li>
						<li id="visibility">--</li>
					</ul>
				</div>
			</div>
			<div class="twoCol-right">
				<div id="windArrow-container">
					<img src="./images/windCrosshair_white_letters_250x250.png" id="windCrosshair">
					<img src="./images/arrow_white_with_red_250x250_flipped.png" id="windArrow">
				</div>
			</div>
			<div id="data-src-credit">
				<a href="" target="_blank"><img src=""></a> <!-- image 'src' will be set by weather.js -->
			</div>
		</div>
	</div>
	<div id="weather-output">
		<!-- weather.js will fill this with debug statements and messages for user -->
	</div>
	<!-- SETTINGS MODAL -->
	<div class="modal fade" id="weather-settings-modal" role="dialog" aria-hidden="true">
		<div class="modal-dialog draggable">
		    <div id="weather-modal-header" class="modal-header">
		    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4>Weather Settings</h4>
		    </div>
		    <div id="weather-modal-body" class="modal-body cf">
		    	<div class="cf" id="state-dd-wrapper">
		    		<label for="state">State:</label>
			    	<select class="display-inline-block" id="state-dd" name="state" value="MO">
			    		<option value="empty">[select your state]</option>
			    		<option value="AL">Alabama</option>
						<option value="AK">Alaska</option>
						<option value="AZ">Arizona</option>
						<option value="AR">Arkansas</option>
						<option value="CA">California</option>
						<option value="CO">Colorado</option>
						<option value="CT">Connecticut</option>
						<option value="DE">Delaware</option>
						<option value="DC">District of Columbia</option>
						<option value="FL">Florida</option>
						<option value="GA">Georgia</option>
						<option value="HI">Hawaii</option>
						<option value="ID">Idaho</option>
						<option value="IL">Illinois</option>
						<option value="IN">Indiana</option>
						<option value="IA">Iowa</option>
						<option value="KS">Kansas</option>
						<option value="KY">Kentucky</option>
						<option value="LA">Louisiana</option>
						<option value="ME">Maine</option>
						<option value="MD">Maryland</option>
						<option value="MA">Massachusetts</option>
						<option value="MI">Michigan</option>
						<option value="MN">Minnesota</option>
						<option value="MS">Mississippi</option>
						<option value="MO" selected>Missouri</option>
						<option value="MT">Montana</option>
						<option value="NE">Nebraska</option>
						<option value="NV">Nevada</option>
						<option value="NH">New Hampshire</option>
						<option value="NJ">New Jersey</option>
						<option value="NM">New Mexico</option>
						<option value="NY">New York</option>
						<option value="NC">North Carolina</option>
						<option value="ND">North Dakota</option>
						<option value="OH">Ohio</option>
						<option value="OK">Oklahoma</option>
						<option value="OR">Oregon</option>
						<option value="PA">Pennsylvania</option>
						<option value="RI">Rhode Island</option>
						<option value="SC">South Carolina</option>
						<option value="SD">South Dakota</option>
						<option value="TN">Tennessee</option>
						<option value="TX">Texas</option>
						<option value="UT">Utah</option>
						<option value="VT">Vermont</option>
						<option value="VA">Virginia</option>
						<option value="WA">Washington</option>
						<option value="WV">West Virginia</option>
						<option value="WI">Wisconsin</option>
						<option value="WY">Wyoming</option>
					</select>
		    	</div>
				<br>
				<div id="city_zip-wrapper" class="cf">
					<label for="city_zip">City / Zip Code:</label><input type="text" name="city_zip" class="display-inline-block text-black" id="city_zip" value="65201">
				</div>
		    </div>
		    <div id="weather-modal-footer" class="modal-footer">
		    	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		    	<button type="button" class="btn btn-primary" data-dismiss="modal" id="saveChages-btn" onclick="setLocation()">Save changes</button>
		    </div>
		</div>
	</div>
</div>