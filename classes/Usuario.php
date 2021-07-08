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

    }

?>