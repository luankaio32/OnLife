<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
    <title> OnLife </title>
</head>
<body class="d-flex align-items-center py-4 bg body-tertiary">
    <main class="w-100 m-auto form-conteiner">
        <form method = "post">
            <img src="Ativo_7-8.png" class="mb-4" height="150" width="250"/>
            <h1 class="h3-mb-3 fw-normal">   &nbsp; &nbsp; &nbsp; &nbsp; Login   </h1>
            <br>
            <div class="form-floating">
                <input type="text" class="form-control" name = "email"  placeholder="your-email@gmail.com"/>
                <label for="floatingInput"> E-mail </label>
                <br>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="senha"  placeholder="password"/>
                <label for="floatingInput"> Senha </label>
            </div>
            <br>
            <?php
include('systemlogin.php');

if(isset($POST['email']) || isset($_POST['senha'])) {

if(strlen($_POST['email']) == null) {
        echo "Preencha seu e-mail!";
    
    
} else if(strlen($_POST['senha']) == null) {

    echo "Preencha sua senha!";
} else {

        $email = $mysqli -> real_escape_string($_POST['email']);
        $senha = $mysqli -> real_escape_string($_POST['senha']);


        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha' ";
        $sql_query = $mysqli -> query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {

                $usuario = $sql_query->fetch_assoc();

                if(!isset($_SESSION)) {
                        session_start();
        
                    }

                    $_SESSION['id'] = $usuario['id'];
                    $_SESSION['nome'] = $usuario['nome'];

                    header("Location: painel.php");
        
            } else {

            echo "Falha ao logar! E-mail ou senha incorretos!";

        }

       
    }

}

?>
            <div class="form-check text-start my-3">
                <input type="checkbox" class="form-check-input" id="FlexCheckDefault"/>
                <label class="form-check-label" for="flexCheckDefault"> Lembre-me </label>
            </div>
            <input type="submit" value ="Entrar" id="Entrar" class="btn btn-primary w-100 py-2" name= "Entrar"> 
            <p class="text-body-secondary mt-5 mb-3"> Onlife Corp © 2023 </p>
        </form>
    </main>
   

   
</body>
</html>
