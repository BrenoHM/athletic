<?php

class Generica {
    
    public static function ConvertDataHoraMysql($dthr,$formato='mysql',$tem_hora=false){

	if (!empty($dthr)) {
            switch ($formato) {
                case 'mysql':

                    if ($tem_hora){
                        $vetorhr = explode(" ",$dthr);
                        $vetordt = explode("/",$vetorhr[0]);
                        $dthr_nova = $vetordt[2].'-'.$vetordt[1].'-'.$vetordt[0].' '.$vetorhr[1];
                    }else{
                        $vetordt = explode("/",$dthr);
                        $dthr_nova = $vetordt[2].'-'.$vetordt[1].'-'.$vetordt[0];
                    }

                    break;


                case 'normal':

                    $dthr_nova = substr($dthr,8,2) . "/" . substr($dthr,5,2) . "/" . substr($dthr,0,4);

                    if ($tem_hora) {
                            $dthr_nova.= " " . substr($dthr,11);
                    }

                    break;

            }
            }else{
            $dthr_nova = "n/a";
	}

	return $dthr_nova;
        
    }

}
