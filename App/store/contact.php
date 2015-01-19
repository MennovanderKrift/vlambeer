<?php require '../includes/header.php' ?>

<div class="container">

<div class="adresbox">
	<h2>Address</h2>
	<div class="contact-adress">
				<img src="../../design/images/contacthoek.png" class="contacthoek" />
		<p id="contact-info">
			Neude 5<br>
			3512 AD<br>
			Utrecht<br>
			<br><br>
			E: info@vlambeer.com<br>
			T: +31 (0)6 21 20 63 63
		</p>
	</div>
</div>

<div class="contactbox">
	<h2>Contact</h2>
	<form>
	 <div id="contact-form">                        
		<p>
		<input type="text" defaultvalue="Naam" value="Name:" onclick="if (this.defaultValue==this.value) this.value=''" onblur="if ((this.value=='') || (this.value=='')) this.value=this.defaultValue" name="contact_name">    </p>
		<p>
		<input type="text" defaultvalue="Emailadres" value="E-mail:" onclick="if (this.defaultValue==this.value) this.value=''" onblur="if ((this.value=='') || (this.value=='')) this.value=this.defaultValue" name="contact_email">    </p>
		<p>
		<input type="text" defaultvalue="Telefoonnummer" value="Tel:" onclick="if (this.defaultValue==this.value) this.value=''" onblur="if ((this.value=='') || (this.value=='')) this.value=this.defaultValue" name="contact_tel">    </p>
		<p>

		<textarea name="Message" onclick="if (this.defaultValue==this.value) this.value=''" onblur="if (this.value=='') this.value=this.defaultValue" name="contact_message">Message:</textarea>
		<p class="form_buttons">
		<input class="submit-button button" type="submit" name="btnSubmit" value="Send"> <img src="../../design/images/check.png"></input>
		</p>
	  </div>                      
	</form>
</div>
</div>

  <div id="map" style="width: 100%; height: 400px; margin-bottom: 20px;"></div>
<script Src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
  <script type="text/javascript">
    var locations = [
      ['Vlambeer, Neude 5, 3512 AD, Utrecht', 52.09334, 5.11893, 1]
    ];
	
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 11,
      center: new google.maps.LatLng(52.09334, 5.11893),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

	
    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
        icon : '../../design/images/logoMaps.png'

      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
	
	
  </script>
<?php require '../includes/footer.php' ?>