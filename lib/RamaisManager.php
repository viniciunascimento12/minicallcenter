<?php

class RamaisManager{

    public function get_info_ramais(){
        header("Content-type: application/json; charset=utf-8");
        $ramais = file('ramais');
        $filas = file('filas');
        $status_ramais = array();
        foreach($filas as $linha) {
            if(strstr($linha, 'SIP/')) {
                if(strstr($linha, '(Ring)')) {
                    $partes = explode(' ', trim($linha));
                    list($tech, $ramal) = explode('/', $partes[0]);
                    $status_ramais[$ramal] = array('status' => 'chamando');
                }
                if(strstr($linha, '(In use)')) {            
                    $partes = explode(' ', trim($linha));
                    list($tech, $ramal) = explode('/', $partes[0]);
                    $status_ramais[$ramal] = array('status' => 'ocupado');
                    $acao = array('acao' => $partes); 
                }
                if(strstr($linha, '(Not in use)')) {
                    $partes = explode(' ', trim($linha));
                    list($tech, $ramal)  = explode('/', $partes[0]);
                    $status_ramais[$ramal] = array('status' => 'disponivel');
                }
                if(strstr($linha, '(Unavailable)')) {
                    $partes = explode(' ', trim($linha));
                    list($tech, $ramal)  = explode('/', $partes[0]);
                    $status_ramais[$ramal] = array('status' => 'indisponivel');
                }
            }
        }
        $info_ramais = array();
        foreach($ramais as $linha) {
            $partes = array_filter(explode(' ', $linha));
            $arr = array_values($partes);
            if(trim($arr[1]) == '(Unspecified)' && trim($arr[4]) == 'UNKNOWN') {        
                list($name, $username) = explode('/', $arr[0]);        
                $info_ramais[$name] = array(
                    'nome' => $name,
                    'ramal' => $username,
                    'online' => false,
                    'status' => $status_ramais[$name]['status'] ?? ''
                );
            }
            if(isset($arr[5]) && trim($arr[5]) == "OK") {        
                list($name, $username) = explode('/', $arr[0]);
                $info_ramais[$name] = array(
                    'nome' => $name,
                    'ramal' => $username,
                    'online' => true,
                    'status' => $status_ramais[$name]['status'] ?? ''
                );
            }
        }
        return json_encode($info_ramais);
    }
}
?>
