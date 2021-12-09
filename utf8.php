   <?php
   
   class ConverteUtf {

            public static function anything_to_utf8($var,$deep=TRUE){
                if(is_array($var)){
                    foreach($var as $key => $value){
                        if($deep){
                            $var[$key] = self::anything_to_utf8($value,$deep);
                        }elseif(!is_array($value) && !is_object($value) && !mb_detect_encoding($value,'utf-8',true)){
                             $var[$key] = utf8_encode($value);
                        }
                    }
                    return $var;
                }elseif(is_object($var)){
                    foreach($var as $key => $value){
                        if($deep){
                            $var->$key = self::anything_to_utf8($value,$deep);
                        }elseif(!is_array($value) && !is_object($value) && !mb_detect_encoding($value,'utf-8',true)){
                             $var->$key = utf8_encode($value);
                        }
                    }
                    return $var;
                }else{
                    return (!mb_detect_encoding($var,'utf-8',true))?utf8_encode($var):$var;
                }
            }

        }
      

        echo '<br><br>';
        $array = array('RELAÇÃO' => 'Paição', 'cidade' => 'São Paulo');
        var_dump(ConverteUtf::anything_to_utf8($array));


        $array2 = array('RELAÇÃO de Sucesso ' => 'João da Silva Moreira', 'subArray' => array('Ação', 'Cão', 'carateresEspeciais' => '\\"' . '"'));
        
        echo json_encode(ConverteUtf::anything_to_utf8($array2), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); 

