/*----------- Login(Mostrar e Ocultar Senha) -----------*/
function mostrarOcultarSenha() {
	
	var senha = document.getElementById("senha");
	
	if(senha.type == "password"){
		senha.type = "text";
	}else{
		senha.type = "password";
	}	
}

/*----------- Cadastro(Validar Senhas) -----------*/
/*function validar() {
	var senha = formCadastrar.senha.value;
	var confiSenha = formCadastrar.confiSenha.value;
	
	if(senha == "" || senha.lenght <= ) {
		alert('Preencha o campo senha com minimo 6 caracteres');
		formCadastrar.senha.focus();
		document.location.reload(true);
	}
	
	if(senha == "" || confiSenha.lenght <= 5) {
		confiSenha('Preencha o campo senha com minimo 6 caracteres');
		formCadastrar.confiSenha.focus();
		document.location.reload(true);
	}
	
	if(senha != confiSenha) {
	alert('Senhas diferentes!');
	}
}*/