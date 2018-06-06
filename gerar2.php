<?php
error_reporting(E_ALL);
$mysqli = new mysqli('localhost', 'unifeiadmin', 'nejere4at', 'logotipoimc_data');
//// Executa uma consulta que pega cinco notícias
$sql = "SELECT srvCiap, srvVotacao FROM servidores_votos ORDER BY srvVotacao DESC";
$query = $mysqli->query($sql);


?>
<table cellspacing="0">
    <thead>
    <tr>
        <td width="10%" style='border-bottom: 1px solid #000'>SIAPE</td>
        <td width="30%" style='border-bottom: 1px solid #000'>Data/Hora Votação</td>
    </tr>
    </thead>
    <tbody>
    <?php
    while ($dados = $query->fetch_assoc()) {
        $votacao = ($dados['srvVotacao'] != "") ? date('d/m/Y H:i:s', strtotime($dados['srvVotacao'])) : 'Não votou';
        echo "<tr>";
        echo "<td style='border-bottom: 1px solid #000'>" . $dados['srvCiap'] . "</td>";
        echo "<td style='border-bottom: 1px solid #000'>" . $votacao . "</td>";
        echo '</tr>';
    }
    ?>
    </tbody>
</table>
