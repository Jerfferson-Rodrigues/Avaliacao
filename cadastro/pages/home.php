<?php
    // chamada para excluir
    if(isset($_GET['excluir'])){
        $idExcluir = intval($_GET['excluir']);
        User::deletar('admin.usuarios',$idExcluir);
    } 
?>
<div class="box-content w100 ">
<h2> Lista de Usuários</h2>
    <div class="table-responsive">
    <table>
        <tr>
            <td>Nome</td>
            <td>Cpf</td>
            <td>Telefone</td>  
            <td>Editar</td>
            <td>Excluir</td>
        </tr>

        <?php
            $usuarioHome = Mysql::conectar()->prepare("SELECT * FROM `admin.usuarios`");
            $usuarioHome->execute();
            $usuarioHome = $usuarioHome->fetchAll();
            foreach($usuarioHome as $key => $value){
        ?>

        <tr>
            <td><span><?php echo $value['nome'] ?></span></td>
            <td><span><?php echo $value['cpf'] ?></span></td>
            <td><span><?php echo $value['telefone'] ?></span></td>
            <td><div><a class="edit" href="<?php echo INCLUDE_PATH_USER ?>editar-usuario?id=<?php echo $value['id']; ?>"><i class="fas fa-user-edit"></i></a></div></td>
            <td><div><a actionBtn="delete" class="btn delete" href="<?php echo INCLUDE_PATH_USER ?>home?excluir=<?php echo $value['id']; ?>"><i class="far fa-trash-alt"></i></a></div></td>

        </tr>
        
        <?php }?>

    </table>
    </div><!--table-responsive-->
</div><!--box-content--> 