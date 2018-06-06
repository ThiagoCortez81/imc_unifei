<?php
//if (!empty($_SESSION['servidor'])) {
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
<span class="contact2-form-title" style="padding-bottom: 0!important;">
        <img src="<?php echo frontendPath(); ?>images/efei.gif" alt="UNIFEI"
             style="max-width: 6%; border-right: 1px solid #000; padding-right: 5px;">
        Resultado
        <h6>Logo IMC</h6>
    </span>

<div class="tz-gallery">
    <div class="row">
            <span class="contact2-form-title" style="padding-bottom: 0!important;">
                <h4>Logos</h4>
            </span>
        <?php
        echo listLogos($alunos);
        ?>
    </div>

    <div class="row">
        <div class="col-md-6">
                <span class="contact2-form-title" style="padding-bottom: 0!important;">
                <h4>Alunos Participantes</h4>
                </span>
            <table class="table table-hover" id="tabela">
                <thead>
                <tr>
                    <td>Aluno</td>
                </tr>
                </thead>
            </table>
        </div>
        <div class="col-md-6">
            <span class="contact2-form-title" style="padding-bottom: 0!important;">
                <h4>Agradecimentos</h4>
            </span>
            <span>À comunidade do Instituto de Matemática e Computação da Unifei, aos alunos participantes do projeto e aos colaboradores:
            <br>
            Prof. Rodrigo Duarte Seabra (diretor do IMC). <br>
            Aluno do curso de Sistemas de Informação: Thiago Cortez (desenvolvedor do site).</span>

            <br><br>

            <span class="contact2-form-title" style="padding-bottom: 0!important;">
                <h4>Coordenação</h4>
            </span>
            <span>
                Profa. Adriana Mattedi. <br>
                Profa. Elisa Rodrigues. <br>
                Profa. Hevilla Nobre. <br>
            </span>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#tabela').DataTable({
            "language": {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            },
            "ajax": "/app/Views/Backend/ajax.php",
            "columns": [
                {"data": "aluNome"}
            ],
            "order": [[0, "asc"]],
            "lengthMenu": [[-1], ["Todos"]]
        });
        $(".dataTables_length").remove();
        $(".dataTables_paginate").remove();
    });
</script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<?php
//} else {
?>
<!--    <br>-->
<!--    <span class="contact2-form-title" style="padding-bottom: 0!important;">-->
<!--        <img src="--><?php //echo frontendPath(); ?><!--images/efei.gif" alt="UNIFEI"-->
<!--             style="max-width: 6%; border-right: 1px solid #000; padding-right: 5px;">-->
<!--        Votação-->
<!--        <h6>Logo IMC</h6>-->
<!--    </span>-->
<!---->
<?php
//    if ($msg) {
//        echo '<div class=\'alert alert-success\' role=\'alert\' style="text-align: center;">
//                <h4>' . $msg . '</h4>
//              </div>';
//    }
?>

<!--    <div class="tz-gallery">-->
<!--        <div class="row">-->
<!--            <form action="vote" method="POST"-->
<!--                  onsubmit="if ($('input[name=\'ciap\']').val() === '' || $('input[name=\'nome\']').val() === '' ) { event.preventDefault(); alert('Preencha todos os campos!'); return false; }">-->
<!--                <div class="col-md-12 form-group">-->
<!--                    <input type="number" name="usuario" placeholder="SIAPE" class="form-control">-->
<!--                </div>-->
<!--                <div class="col-md-12 form-group">-->
<!--                    <input type="password" name="password" placeholder="SENHA" class="form-control">-->
<!--                </div>-->
<!--                <div class="col-md-12" style="text-align: center;">-->
<!--                    <button class="btn btn-primary" style="height: 40px; width: 130px;">VER LOGOS</button>-->
<!--                </div>-->
<!--            </form>-->
<!--            <h3 style="text-align: center;">Obrigado, votações finalizadas!</h3>-->
<!--        </div>-->
<!--    </div>-->
<?php
//}
?>
