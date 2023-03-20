<!DOCTYPE html>
<html>
<head>
	<title>Acesso</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		.img-responsive {
  		max-width: 100%;
  		height: auto;
		}
		body {
			background-color: #fff;
			font-family: Arial, sans-serif;
		}
		@media only screen and (max-width: 600px) {
  			.container {
    			width: 100%;
    			padding: 0;
    			margin: 0;
  			}
		}

		/* Estilos para telas maiores */
		@media only screen and (min-width: 600px) {
  		.container {
   			 width: 30%;
   			 max-width: 1000px;
    		margin: 0 auto;
		}
	}
		h2 {
			text-align: center;
			color: #333;
			margin-bottom: 20px;
		}
	    label {
			display: block;
			margin-bottom: 10px;
			color: #333;
		}
		input[type="name"] {
			padding: 10px;
			width: 100%;
			border-radius: 5px;
			border: none;
			box-shadow: 0 0 5px rgba(0,0,0,0.1);
			font-size: 16px;
			margin-bottom: 20px;
			box-sizing: border-box;
		}
        label {
			display: block;
			margin-bottom: 10px;
			color: #333;
		}
		input[type="tel"] {
			padding: 10px;
			width: 100%;
			border-radius: 5px;
			border: none;
			box-shadow: 0 0 5px rgba(0,0,0,0.1);
			font-size: 16px;
			margin-bottom: 20px;
			box-sizing: border-box;
		}
        label {
			display: block;
			margin-bottom: 10px;
			color: #333;
		}
		input[type="CEP"] {
			padding: 10px;
			width: 100%;
			border-radius: 5px;
			border: none;
			box-shadow: 0 0 5px rgba(0,0,0,0.1);
			font-size: 16px;
			margin-bottom: 20px;
			box-sizing: border-box;
		}
        label {
			display: block;
			margin-bottom: 10px;
			color: #333;
		}
		input[type="email"] {
			padding: 10px;
			width: 100%;
			border-radius: 5px;
			border: none;
			box-shadow: 0 0 5px rgba(0,0,0,0.1);
			font-size: 16px;
			margin-bottom: 20px;
			box-sizing: border-box;
		}

		input[type="submit"] {
			background-color: #4CAF50;
			color: #fff;
			border: none;
			padding: 10px;
			border-radius: 5px;
			font-size: 16px;
			cursor: pointer;
		}
		input[type="submit"]:hover {
			background-color: #3e8e41;
		}
	</style>
</head>
<body>
	<div class="container">
	<img src="https://web.netvaletelecom.com/wp-content/uploads/2022/10/NetVale-Logo.png"  class="img-responsive">
			<h2>Navegue com a NetVale</h2>
		<form action="conexao.php" method="post">
            <label for="name">Nome Completo:</label>
            <input type="name" id="name" name="name" placeholder="Somente nome completo" pattern="[a-zA-Z ]+" required="required">

			<label for="phone">Telefone:</label>
			<input type="tel" id="phone" name="phone" placeholder="Insira seu número de telefone (DDD)xxxxx-xxxx" maxlength="15" required="required" onkeyup="formatarTelefone()">
			<script>
				function formatarTelefone() {
				var telefone = document.getElementById("phone");
				var valor = telefone.value;

				// remove caracteres não numéricos
				valor = valor.replace(/\D/g, ""); 
				// adiciona parênteses em volta dos dois primeiros dígitos
				valor = valor.replace(/^(\d{2})(\d)/g, "($1) $2"); 
				// adiciona hífen entre o quinto e o sexto dígitos
				valor = valor.replace(/(\d)(\d{4})$/, "$1-$2"); 
				telefone.value = valor;
				}
			</script> 
		
            <label for="cep">Endereço:</label>
            <input type="cep" id="cep" name="cep" placeholder="Insira seu Endereço" required="required">
			
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" placeholder="Insira seu email" required="required">

			<input type="checkbox" name="checkbox" value="De Acordo" id="checkbox" required="required" class="ui-state-error h5-active"> 
                            Estou ciente das condições de tratamento dos meus dados pessoais e dou meu consentimento, para o contato.
                            <br>
                            <div class="collapse" id="erroacesso" name="erroacesso">

                                <p style="color: red;">*Campo obrigatório</p>

                            </div>

			<input type="submit" value="Entrar" class="btn-form">
		</form>
	</div>
</body>
</html>