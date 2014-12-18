<?php require '../includes/header.php' ?>

<form>
 <div id="contact-area">                        
	<p>
	<input type="text" defaultvalue="Naam" value="Naam" onclick="if (this.defaultValue==this.value) this.value=''" onblur="if ((this.value=='') || (this.value=='')) this.value=this.defaultValue" name="contact_name">    </p>
	<p>
	<input type="text" defaultvalue="Emailadres" value="Emailadres" onclick="if (this.defaultValue==this.value) this.value=''" onblur="if ((this.value=='') || (this.value=='')) this.value=this.defaultValue" name="contact_email">    </p>
	<p>
	<input type="text" defaultvalue="Telefoonnummer" value="Telefoonnummer" onclick="if (this.defaultValue==this.value) this.value=''" onblur="if ((this.value=='') || (this.value=='')) this.value=this.defaultValue" name="contact_tel">    </p>
	<p>

	<textarea id="message" rows="6" cols="50" onclick="if (this.defaultValue==this.value) this.value=''" onblur="if (this.value=='') this.value=this.defaultValue" name="contact_message"></textarea>
	<p class="form_buttons">
	<input class="submit-button button" type="submit" name="btnSubmit" value="Verzenden">
	</p>
  </div>                      
</form>

<?php require '../includes/footer.php' ?>