<div class="box-content">
    <h2><i class="fa fa-pen"></i> Adicionar Usuário</h2>

    <form method="post" enctype="multipart/form-data">

        <?php
            if(isset($_POST['acao1'])){
                $nome = $_POST['nome'];
                $cpf = $_POST['cpf'];
                $telefone = $_POST['telefone'];
                $senha = $_POST['senha'];
                $data = $_POST['data'];

                if($nome == ''){
                    User::alert('error', ' O nome está vazio!');
                }else if($cpf == ''){
                    User::alert('error', ' O cpf está vazio!');
                }else if($telefone == ''){
                    User::alert('error', ' Adicione um Telefone!');
                }else if($senha == ''){
                    User::alert('error', ' A senha está vazia!');
                }else if($data == ''){
                    User::alert('error', ' A data de nascimento está vazia!');
                }
                else{
                        //apenas cadastrar no banco de dados
                        $usuario = new User();
                        $usuario->cadastrarUsuario($nome, $cpf, $telefone, $senha, $data);
                        User::alert('sucesso', ' O cadastro do usuário '.$nome.' foi feito com sucesso!');
                    }
            }
        ?>

        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome" />
        </div><!--form-group-->

        <div class="form-group">
            <label>CPF/CNPJ:</label>
            <input type="number" name="cpf" />
        </div><!--form-group-->

        <div class="form-group">
            <label>Telefone:</label>
            <input type="text" name="telefone" />
        </div><!--form-group-->

        <div class="form-group">
            <label>Senha:</label>
            <input type="password" name="senha" />
        </div><!--form-group-->

        <div class="form-group">
            <label>Data de Nascimento:</label>
            <input type="date" name="data" />
        </div><!--form-group-->

        <div class="form-group">
            <input type="submit" name="acao1" value="Cadastrar!">
        </div><!--form-group-->

    </form>

</div>