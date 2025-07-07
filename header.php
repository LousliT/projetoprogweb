<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Le Début Saboaria Artesanal</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="sobre.php">Le Début
                </a>
                <?php
                    error_reporting(0); //Desabilita reportagens de erros de execução
                    session_start(); //Inicia sessão

                    if(isset($_SESSION['logado']) && $_SESSION['logado'] === true){ //Verifica se há sessão ativa
                        $idUsuario    = $_SESSION['idUsuario'];
                        $tipoUsuario  = $_SESSION['tipoUsuario'];
                        $nomeUsuario  = $_SESSION['nomeUsuario'];
                        $emailUsuario = $_SESSION['emailUsuario'];

                        $nomeCompleto = explode(' ', $nomeUsuario); //Usua a função explode para segmentar a string onde hoverem espaços ' '
                        $primeiroNome = $nomeCompleto[0]; //Armazena a primeira string antes do espaço (primeiro nome)

                    }
                ?>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        
                        <li class="nav-item"><a class="nav-link" href="index.php">Produtos</a></li>
                        
                        <?php
                            //Verifica se o tipo do usuário é 'administrador'
                            if($tipoUsuario == 'administrador'){
                                echo "
                                    <li class='nav-item'>
                                        <a class='nav-link' href='formProduto.php'>Cadastrar Produto</a>
                                    </li>
                                ";
                            }
                            //Verifica se o tipo do usuário é 'cliente'
                            if($tipoUsuario == 'cliente'){
                                echo "
                                    <li class='nav-item'>
                                        <a class='nav-link' href='visualizarPedidos.php'>Visualizar Pedidos</a>
                                    </li>
                                ";
                            }
                            if(isset($_SESSION['logado']) && $_SESSION['logado'] === true){ //Verifica se há sessão ativa
                                echo "
                                    <li class='nav-item'>
                                        <a class='nav-link' href='logout.php?pagina=formLogin'>Sair</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link' style='color:lightblue'>Olá, <strong>$primeiroNome</strong>! <i class='bi bi-emoji-smile'></i></a>
                                    </li>
                                ";
                            }
                            else{
                                 echo "
                                    <li class='nav-item'>
                                        <a class='nav-link' href='formLogin.php?pagina=formLogin'>Login</a>
                                    </li>
                                ";
                            }
                        ?>
                    </ul>
                   <!-- <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Carrinho
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
                    </form>-->
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="" style="background-color:#9E9EFE">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <img src="img/logo.jpg" alt="Logotipo" style='width: 300px;'>
                    <h1 class="display-4 fw-bolder">Presenteie alguém, presenteie você!</h1>
                    <p class="lead fw-normal text-white-50 mb-0"> Sabonetes, aromatizadores, lembrancinhas e mimos personalizados!</p>
                </div>
            </div>
        </header>