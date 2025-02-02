<?php
    session_start();
    if((!isset($_SESSION['id_adm']) == true) and (!isset($_SESSION['nome_adm']) == true) and (!isset($_SESSION['email_adm']) == true)){
        unset($_SESSION['id_adm']);
        unset($_SESSION['nome_adm']);
        unset($_SESSION['email_adm']);
        header('Location: ../../index.html');
    }
    require('../conexao.php');

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Lista Alunos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="Codedthemes" />
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <!-- waves.css -->
    <link rel="stylesheet" href="assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
    <!-- waves.css -->
    <link rel="stylesheet" href="assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- themify icon -->
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
    <!-- font-awesome-n -->
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome-n.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <!-- scrollbar.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
    
<?php
    include 'menu_principal.php';
?>


                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <!-- Project statustic start -->
                                            <div class="col-xl-12">
                                                <div class="row">
                                                <div class="col-xl-8 col-md-10 m-auto">
                                                        <h2>Relação de Alunos</h2>
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                <th scope="col">ID</th>
                                                                <th scope="col">Nome</th>
                                                                <th scope="col">Email</th>
                                                                <th scope="col">Código do Curso</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                                $url = 'http://localhost/exercicio/api.php/alunos';
                                                                
                                                                $response = file_get_contents($url);
                                                                $data = json_decode($response, true);

                                                                $url2 = 'http://localhost/exercicio/api.php/cursos';
                                                                $response2= file_get_contents($url2);
                                                                $data2 = json_decode($response2, true);


                                                                if (isset($data['dados'])) {                                                                    
                                                                    foreach ($data['dados'] as $aluno) {
                                                                        echo "<tr>";
                                                                        echo '<td>' . $aluno['id'] . '</td>';
                                                                        echo '<td>' . $aluno['nome'] . '</td>';
                                                                        echo '<td>' . $aluno['email'] . '</td>';
                                                                        echo '<td>' . $aluno['fk_cursos_id_curso'] . '</td>';
                                                                        echo "</tr>";            
                                                                    }
                                                                } else {
                                                                    echo '<p>Nenhum aluno encontrado.</p>';
                                                                }
                                                            ?>                                                                    
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Project statustic end -->
                                        </div>
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                                <div id="styleSelector"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Required Jquery -->
    <script type="text/javascript" src="assets/js/jquery/jquery.min.js "></script>
    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js "></script>
    <!-- waves js -->
    <script src="assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- slimscroll js -->
    <script src="assets/js/jquery.mCustomScrollbar.concat.min.js "></script>

    <!-- menu js -->
    <script src="assets/js/pcoded.min.js"></script>
    <script src="assets/js/vertical/vertical-layout.min.js "></script>

    <script type="text/javascript" src="assets/js/script.js "></script>
</body>

</html>
