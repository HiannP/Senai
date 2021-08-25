/*----------- Login(Mostrar e Ocultar Senha) -----------*/
function mostrarOcultarSenha() {
	
	var senha = document.getElementById("senha");
	var confiSenha = document.getElementById("confiSenha");
	
	if(senha.type == "password"){
		senha.type = "text";
	}else{
		senha.type = "password";
	}
	
	if(confiSenha.type == "password"){
		confiSenha.type = "text";
	}else{
		confiSenha.type = "password";
	}	
}

/*----------- Cadastro(Validar Senhas) -----------*/
function validar() {
	var nome = formCadastrar.nome.value;
	var sobrenome = formCadastrar.sobrenome.value;
	var email = formCadastrar.email.value;
	var senha = formCadastrar.senha.value;
	var confiSenha = formCadastrar.confiSenha.value;
	
	if(nome == "") {
		alert('Preencha o campo Nome !');
		formCadastrar.nome.focus();
		return false;
	}
	
	if(sobrenome == "") {
		alert('Preencha o campo Sobrenome !');
		formCadastrar.sobrenome.focus();
		return false;
	}
	
	if(email == "") {
		alert('Preencha o campo Email !');
		formCadastrar.email.focus();
		return false;
	}
	
	if(senha == "" || senha.lenght <= 7) {
		alert('Preencha o campo Senha com o minimo de 8 caracteres');
		formCadastrar.senha.focus();
		return false;
	}
	
	if(senha == "" || confiSenha.lenght <= 7) {
		confiSenha('Preencha o campo Senha com o minimo de 8 caracteres');
		formCadastrar.confiSenha.focus();
		return false;
	}
	
	if(senha != confiSenha) {
	alert('Senhas diferentes!');
	}
}

/*----------- ADM(Filtro de Tabelas) -----------*/
function pesquisa() {
	$("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#pesquisado tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
}