<?php

    class User{
        
        public static function carregarPagina(){
            if(isset($_GET['url'])){
                $url = explode('/',$_GET['url']);
                if(file_exists('pages/'.$url[0].'.php')){
                    include('pages/'.$url[0].'.php');
                }
                else{
                    //pagina não existe!
                    header('Location: '.INCLUDE_PATH_USER);
                }
            }else{
                include('pages/home.php');
            }
        }

        public static function alert($tipo, $mensagem){
            if($tipo == 'sucesso'){
                echo '<div class="box-alert sucesso"><i class="fa fa-check"></i>'.$mensagem.'</div>';
            }else if($tipo == 'error'){
                echo '<div class="box-alert error"><i class="fa fa-times"></i>'.$mensagem.'</div>';
            }
        }

         public static function cadastrarUsuario($nome, $cpf, $telefone, $senha, $data){
            $sql = Mysql::conectar()->prepare("INSERT INTO `admin.usuarios` VALUES (null,?,?,?,?,?)");
            $sql->execute(array($nome, $cpf, $telefone, $senha, $data));
        }

        public function atualizarUsuario($nome,$cpf,$telefone, $senha){
            $sql = Mysql::conectar()->prepare("UPDATE `admin.usuarios` SET nome = ?, senha = ?, telefone = ? WHERE id = ?");
            if($sql->execute(array($nome,$cpf,$telefone,$senha))){
                return true;
            }else{
                return false;
            }
        }

        public static function select($table, $query = '', $arr = ''){
            if($query != false){
                $sql = Mysql::conectar()->prepare("SELECT * FROM `$table` WHERE $query");
                $sql->execute($arr);
            }else{
                $sql = Mysql::conectar()->prepare("SELECT * FROM `$table`");
                $sql->execute();
            }
            return $sql->fetch();
        }

        public static function update($arr,$single = false){
            $certo = true;
            $first = false;
            $nome_tabela = $arr['nome_tabela'];
            
            $query = "UPDATE `$nome_tabela` SET ";
            foreach($arr as $key => $value){
                $nome = $key;
                $valor = $value;
                if($nome == 'acao' || $nome == 'nome_tabela' || $nome == 'id')
                    continue;
                if($value == ''){
                    $certo = false;
                    break;
                }

                if($first == false){
                    $first = true;
                    $query.="$nome=?";
                }else{
                    $query.=",$nome=?";
                }

                $parametros[] = $value;
            }

            
            if($certo == true){
                if($single == false){
                    $parametros[] = $arr['id'];
                    $sql = Mysql::conectar()->prepare($query.' WHERE id=?');
                    $sql->execute($parametros);
                }else{
                    $sql = Mysql::conectar()->prepare($query);
                    $sql->execute($parametros);
                }
            }
            return $certo;
        }

         public static function deletar($tabela,$id=false){
            if($id == false){
                $sql = Mysql::conectar()->prepare("DELETE FROM `$tabela`");
            }else{
                $sql = Mysql::conectar()->prepare("DELETE FROM `$tabela` WHERE id = $id");
            }
            $sql->execute();
        }


    }

?>