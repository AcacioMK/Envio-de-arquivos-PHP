<?php
    
    if(isset($_FILES["anexo1"])){
                
        $data = date('dmyi');
        
        $tipos=array(
            'image/gif',
            'image/jpeg',
            'image/jpg',
            'image/png',
            'application/pdf',
            
        );
            
		$nomeArquivo = $_FILES["anexo1"] ["name"];
		$nomeTemp = $_FILES["anexo1"] ["tmp_name"];
		$erro = $_FILES["anexo1"] ["error"];
        $novoNomeArquivo = $data.$nomeArquivo;
            
		if (in_array($_FILES["anexo1"]["type"], $tipos)){
            $liberadoEnvio = true;
        }else{
            $liberadoEnvio = false;
        }
        if($_FILES["anexo1"]["size"] < 1028000){       
            $liberadoEnvio = true;
        }else{
            $liberadoEnvio = false;            
        }
        
		if($erro == 0){
            if(is_uploaded_file($nomeTemp)){
                move_uploaded_file($nomeTemp, "arquivos/anexos/$novoNomeArquivo");
			}
		}
	}
?>