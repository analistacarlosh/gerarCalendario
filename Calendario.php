<?php

/**
 * Classe para gerar Calendário
 * 
 * @tutorial  
 *
 * @author CHFMR
 * @name Calendario
 * @access public
 */
class Calendario {
    
    protected $_calendario = array();
    protected $_diaDoMes;
    protected $_diaDaSemana;
    
    protected $_diasDoMeses = array(
         '1' => '31',
         '2' => '28',
         '3' => '31',
         '4' => '30',
         '5' => '31',
         '6' => '30',
         '7' => '31',
         '8' => '31',
         '9' => '30',   
         '10' => '31',
         '11' => '30',
         '12' => '31'
        );
    
    protected $_diasDaSemana = array(
        'Sunday'    => 'Domingo',
        'Monday'    => 'Segunda',
        'Tuesday'   => 'Terça',
        'Wednesday' => 'Quarta',
        'Thursday'  => 'Quinta',
        'Friday'    => 'Sexta',
        'Saturday'  => 'Sábado'
    );
    
    public function gerarCalendario($ano){
            
            $this->_calendario['diaDaSemana'] = array();
            $this->_calendario['diaDoMes'] = array();
                
            for($contadorMes=1; $contadorMes <= count($this->_diasDoMeses); $contadorMes++)
            {
                for($contadorDia=1; $contadorDia <= $this->_diasDoMeses[$contadorMes]; $contadorDia++)
                {
                    $diaDaSemanaEmInt = date("w", mktime(0,0,0,$contadorMes,$contadorDia,$ano));

                    $this->_diaDaSemana = self::_retornarDiaDaSemana($diaDaSemanaEmInt);
                    $this->_diaDoMes    = $ano . "-" . $contadorDia . "-" . $contadorMes;
                    
                    array_push($this->_calendario['diaDaSemana'], $this->_diaDaSemana);
                    array_push($this->_calendario['diaDoMes'], $this->_diaDoMes);
                }
            }
            
        return $this->_calendario;
    }
    
    protected function _retornarDiaDaSemana($posicaoDoDiNaSemana){

        switch($posicaoDoDiNaSemana) {
            case 0: return "Sunday";
            case 1: return "Monday";
            case 2: return "Tuesday";
            case 3: return "Wednesday";
            case 4: return "Thursday";
            case 5: return "Friday";
            case 6: return "Saturday";
        }
    }
   
    public function retornarDiaDaSemanaEmPtBr($diasDaSemanaEmIngles){
            
            if (array_key_exists($diasDaSemanaEmIngles, $this->_diasDaSemana))
                return $this->_diasDaSemana[$diasDaSemanaEmIngles];
            else
                return FALSE;
        }

    public function retornarDiasDaSemana(){

        return $this->_diasDaSemana;
    }
}