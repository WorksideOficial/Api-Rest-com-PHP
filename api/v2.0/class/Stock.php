<?php

class Stock
{
  public function show()
  {
    $Conn = new PDO('mysql: host=localhost; dbname=workshop;','root','');
    $Select = "SELECT * FROM `loja_produtos` ORDER BY id DESC";
    $Select = $Conn->prepare($Select);
    $Select->execute();
    
    $result = array();

    while($row = $Select->fetch(PDO::FETCH_ASSOC)){
      $result[] = $row;
    }
    if(!$result){
      throw new Exception("Não foram encontrados resultados!");
    }
    return $result;
  }
}