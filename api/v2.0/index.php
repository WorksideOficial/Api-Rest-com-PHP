<?php
header('Content-Type: application/json; charset=utf-8');

require"class/Stock.php";

class Rest
{
  public function open($requisicao)
  {
    $url = explode('/', $requisicao['url']);

    $classe = ucfirst($url[0]);
		array_shift($url);

		$metodo = $url[0];
		array_shift($url);

		$param = array();
    $param = $url;


    try{
        if(class_exists($classe)){
          if(method_exists($classe, $metodo)){
            $retorn = call_user_func_array(array(new $classe, $metodo), $param);
            return json_encode(array(
              'Mensagem' => 'sucesso',
              'dados' => $retorn
            ));
          }else{
            return json_encode(array(
              'Mensagem' => 'erro',
              'dados' => 'Método não existe!'
            ));
          }
        }else{
          return json_encode(array(
            'Mensagem' => 'erro',
            'dados' => 'Classe inexistente!'
          ));
        }
    }catch(Exception $e){
      return json_encode(array(
        'Mensagem' => 'erro', 
        'dados' => $e->getMessage()
      ));
    }

  }
}

if(isset($_REQUEST)){
  echo Rest::open($_REQUEST);
}