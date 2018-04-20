<?php
if (!empty($_SESSION['admin'])) {
    ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>

    <div class="bg-contact2" style="background-image: url('<?php echo frontendPath(); ?>images/bg-01.jpg');">
        <div class="container-contact2">
            <div class="wrap-contact2" style="width: 90%!important;">
                <span class="contact2-form-title" style="padding-bottom: 5px;">
                    <img src="<?php echo frontendPath(); ?>images/efei.gif" alt="UNIFEI"
                         style="max-width: 5%; padding-right: 5px;">
                    <h3 style="text-align: center">Alunos inscritos</h3>
                </span>
                <table class="table table-hover" id="tabela">
                    <thead>
                    <tr>
                        <td>Matricula</td>
                        <td>Nome</td>
                        <td>Email</td>
                        <td>Curso</td>
                        <td>Status</td>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
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
                    {"data": "aluMatricula"},
                    {"data": "aluNome"},
                    {"data": "aluEmail"},
                    {"data": "csDescricao"},
                    {"data": "aluSubmeteu"}
                ]
            });
        });
    </script>
    <?php
}