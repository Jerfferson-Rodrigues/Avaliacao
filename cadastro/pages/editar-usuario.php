<?php
    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $acesso = User::select('admin.usuarios','id = ?',array($id));
    }else{
        User::alert('erro','Você precisa pasar o parametro ID.');
        die();
    }
?>
<div class="box-content">
    <h2><i class="fa fa-pen"></i> Adicionar Usuário</h2>

    <form method="post" enctype="multipart/form-data">

        <?php
            if(isset($_POST['acao1'])){
                //enviei o formulario
                $nome = $_POST['nome'];
                $cpf = $_POST['cpf'];
                $telefone = $_POST['telefone'];
                $senha = $_POST['senha'];
                $data = $_POST['data'];

                $arr = ['nome'=>$nome,'cpf'=>$cpf,'telefone'=>$telefone,'senha'=>$senha,'data'=>$data,'id'=>$id,'nome_tabela'=>'admin.usuarios'];
                User::update($arr);
                User::alert('sucesso',' O Usuário foi editado com sucesso');
            
            }    
            
        ?>

        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome" value="<?php echo $acesso['nome']; ?>" />
        </div><!--form-group-->

        <div class="form-group">
            <label>CPF/CNPJ:</label>
            <input type="text" name="cpf" value="<?php echo $acesso['cpf']; ?>" />
        </div><!--form-group-->

        <div class="form-group">
            <label>Telefone:</label>
            <input type="text" name="telefone" value="<?php echo $acesso['telefone']; ?>" />
        </div><!--form-group-->

        <div class="form-group">
            <label>Senha:</label>
            <input type="password" name="senha" value="<?php echo $acesso['senha']; ?>" />
        </div><!--form-group-->

        <div class="form-group">
            <label>Data de Nascimento:</label>
            <input type="date" name="data" value="<?php echo $acesso['data']; ?>" />
        </div><!--form-group-->

        <div class="form-group">
            <input type="submit" name="acao1" value="Atualizar!">
        </div><!--form-group-->
        
    </form>

</div>