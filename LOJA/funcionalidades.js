function mostrarOcultarSenha() {
	
	var senha = document.getElementById("senha");
	
	if(senha.type == "password"){
		senha.type = "text";
	}else{
		senha.type = "password";
	}	
}

function visualiza() {
	
	var a =document.getElementById("inner").childNodes;
	console.log(a);
	
	// Get the modal
	var modal = document.getElementById("myModal");

	// Get the button that opens the modal
	var ver = document.getElementById("ver");
	
	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks the button, open the modal 
	ver.onclick = function() {
	  modal.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
	  modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	  if (event.target == modal) {
		modal.style.display = "none";
	  }
	}
}