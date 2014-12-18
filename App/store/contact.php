<?php require '../includes/header.php' ?>

<div class="container">

<div class="contact-adress">
	<p id="contact-info">
		Neude 5<br>
		3512 AD<br>
		Utrecht<br>
		<br><br>
		E: info@vlambeer.com<br>
		T: +31 (0)6 21 20 63 63
	</p>
</div>

<form>
 <div id="contact-form">                        
	<p>
	<input type="text" defaultvalue="Naam" value="Name" onclick="if (this.defaultValue==this.value) this.value=''" onblur="if ((this.value=='') || (this.value=='')) this.value=this.defaultValue" name="contact_name">    </p>
	<p>
	<input type="text" defaultvalue="Emailadres" value="Email address" onclick="if (this.defaultValue==this.value) this.value=''" onblur="if ((this.value=='') || (this.value=='')) this.value=this.defaultValue" name="contact_email">    </p>
	<p>
	<input type="text" defaultvalue="Telefoonnummer" value="Telephone number" onclick="if (this.defaultValue==this.value) this.value=''" onblur="if ((this.value=='') || (this.value=='')) this.value=this.defaultValue" name="contact_tel">    </p>
	<p>

	<textarea value="Message" onclick="if (this.defaultValue==this.value) this.value=''" onblur="if (this.value=='') this.value=this.defaultValue" name="contact_message"></textarea>
	<p class="form_buttons">
	<input class="submit-button button" type="submit" name="btnSubmit" value="Send">
	</p>
  </div>                      
</form>

</div>
<?php require '../includes/footer.php' ?>