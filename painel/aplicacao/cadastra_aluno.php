<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome_aluno'];
        $email = $_POST['email_aluno'];
        $curso = $_POST['curso_aluno'];

        $data = array("nome" => $nome, "email" => $email, "fk_cursos_id_curso" => $curso);
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/json\r\n",
                'method'  => 'POST',
                'content' => json_encode($data),
            ),
        );

        $context  = stream_context_create($options);
        $url = 'http://localhost/exercicio/api.php/alunos';
        $result = file_get_contents($url, false, $context);
 
        if ($result === FALSE) {
            echo "<p>Erro ao adicionar aluno.</p>";
        } else { ?>
            <script>
                // Exibe o alerta
                alert('Operação concluída com sucesso!');

                // Após o usuário clicar em "OK", redireciona para outra página
                window.location.href = 'lista_ALUNOS.php'; // Altere para a página de destino
            </script>
        <?php
        }
    }
    ?>