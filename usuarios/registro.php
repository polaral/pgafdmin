<table width="100%" border="1">
    <thead>
        <th>Nome</th>
        <th>Cidade</th>
        <th>E-mail</th>
        <th colspan="2">Ações</th>
    </thead>
    <tbody>
        <?php
        $select = "SELECT usuarios.id_usuario, usuarios.nome, cidades.nome, usuarios.email
            FROM usuarios INNER JOIN cidades ON usuarios.id_cidade = cidades.id_cidade 
            ORDER BY usuarios.nome";
        
        $resultado = pg_query($conexao, $select);
        while ($linha = pg_fetch_array($resultado)){
            $idusuario = $linha[0];
            $nomeusuario = $linha[1];
            $cidadeusuario = $linha[2];
            $emailusuario = $linha[3];
            ?>
    <tr>
        <td><?php echo $nomeusuario;?></td>
        <td><?php echo $cidadeusuario;?></td>
        <td><?php echo $emailusuario;?></td>
        <td width="10%" align="center"><a href="#" onclick="AcaoUsuario(<?php echo $idusuario;?>, 'EX')">Excluir</a></td>
        <td width="10%" align="center"><a href="#" onclick="AcaoUsuario(<?php echo $idusuario;?>, 'ED')">Editar</a></td>
    </tr>
            <?php
        }
        ?>
    </tbody>
</table>