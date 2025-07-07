<?php include "header.php"; ?>
        <section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">

        <?php
            include("conexaoBD.php");

            $listarProdutos = "SELECT * FROM Produtos";

            if(isset($_GET["filtroProduto"])){
                $filtroProduto = $_GET["filtroProduto"];
                
                if($filtroProduto != "todos"){
                    $listarProdutos = $listarProdutos . " WHERE statusProduto LIKE '$filtroProduto' ";
                }

                switch($filtroProduto){
                    case "todos" : $mensagemFiltro = "no total";
                    break;

                    case "disponivel" : $mensagemFiltro = "disponível";
                    break;

                    case "esgotado" : $mensagemFiltro = "esgotados";
                    break;
                }
                
            }
            else{
                $filtroProduto = "todos";
                $mensagemFiltro = "no total";
            }

            $res = mysqli_query($conn, $listarProdutos);
            $totalProdutos = mysqli_num_rows($res);

            if($totalProdutos > 0){
                if($totalProdutos == 1){
                    echo "<div class='alert alert-info text-center'>Há <strong>$totalProdutos</strong> produto $mensagemFiltro!</div>";
                }
                else{
                    echo "<div class='alert alert-info text-center'>Há <strong>$totalProdutos</strong> produtos $mensagemFiltro!</div>";
                }
            }
            else{
                echo "<div class='alert alert-info text-center'>Não há produtos cadastrados neste sistema!</div>";
            }

            echo "
                <form name='formFiltro' action='index.php' method='GET'>
                    <div class='form-floating mt-3'>
                        <select class='form-select' name='filtroProduto' required>
                            <option value='todos'"; if($filtroProduto == 'todos'){echo "selected";}; echo ">Visualizar todos os Produtos</option>
                            <option value='disponivel'"; if($filtroProduto == 'disponivel'){echo "selected";}; echo">Visualizar apenas Produtos disponíveis</option>
                            <option value='esgotado'"; if($filtroProduto == 'esgotado'){echo "selected";}; echo">Visualizar apenas Produtos esgotados</option>
                        </select>
                        <label for='filtroProduto'>Selecione um Filtro</label>
                        <br>
                    </div>
                    <button type='submit' class='btn btn-outline-success' style='float:right'><i class='bi bi-funnel'></i>  Filtrar Produtos</button><br>
                </form>
            ";
        ?>

        <hr>

        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

            <?php
                while($registro = mysqli_fetch_assoc($res)){
                    $idProduto        = $registro["idProduto"];
                    $fotoProduto      = $registro["fotoProduto"];
                    $nomeProduto      = $registro["nomeProduto"];
                    $descricaoProduto = $registro["descricaoProduto"];
                    $valorProduto     = $registro["valorProduto"];
                    $statusProduto    = $registro["statusProduto"];

                    echo "
                        <div class='col mb-5'>
                            <div class='card h-100'>";
                                
                                if($statusProduto == 'esgotado'){
                                    echo "<div class='badge bg-dark text-white position-absolute' style='top: 0.5rem; right: 0.5rem'>Sale</div>";
                                }

                                echo "
                                <img class='card-img-top' src='$fotoProduto' alt='Foto de $nomeProduto' "; if($statusProduto == 'esgotado'){echo "style='filter:grayscale(100%)';";} echo " />
                                <div class='card-body p-4'>
                                    <div class='text-center'>
                                        <h5 class='fw-bolder'>$nomeProduto</h5>
                                        R$ $valorProduto
                                    </div>
                                </div>
                                <div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>
                                    <div class='text-center'>
                                        <a class='btn btn-outline-dark mt-auto' href='visualizarProduto.php?idProduto=$idProduto'>Ver produto</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ";
                }
            ?>

        </div>
    </div>
</section>

        
<?php include "footer.php"; ?>