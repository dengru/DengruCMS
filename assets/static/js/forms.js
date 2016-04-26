function formhash(form, password) {
	// create new element "input"
	var p = document.createElement("input");
	// append the new element "input" to the form
	form.appendChild(p);
	p.name = "p";
	p.type = "hidden";
	p.value = hex_sha512(password.value);
	
	// empty the password value to make sure that it doesn't get sent in plaintext
	password.value = "";
	form.submit();
}