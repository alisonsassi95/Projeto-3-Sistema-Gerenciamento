<?php

namespace App\Http\Controllers;

use App\User;
use App\captureplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // para usar o SQL
use Illuminate\Pagination\LengthAwarePaginator;

class RelatoriosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function RelAvisos()
    {
        $Retornopagina = DB::select('
        SELECT * FROM notices');
        return view('/Relatorios/Avisos', ['Retornopagina' => $Retornopagina]);
    }
    public function RelMovVeic()
    {
        $Retornopagina = DB::select('
                              SELECT 
                              placa,
                              datafoto,
                              origemplaca,
                              ID_Device,
                              YEAR(datafoto)   AS ANO,
                              MONTH(datafoto)  AS MES,
                              DAY(datafoto)    AS DIA,
                              HOUR(datafoto)   AS HORA,
                              MINUTE(datafoto) AS MIN 
                              FROM captureplates');
        return view('/Relatorios/MovimentVeiculos', ['Retornopagina' => $Retornopagina]);
    }
    public function RelMovVeicPais()
    {      
        $br= captureplate::where('origemplaca', 'BR')->count();
        $ar= captureplate::where('origemplaca', 'ARGEN/VENEZ')->count();
        $outros= captureplate::where('origemplaca', 'OUTROS')->count();
    
        return view('/Relatorios/MovimentVeiculosPais', ['br' => $br,'ar'=>$ar,'outros'=>$outros]);
    }

    public function relatorioMensal(){
      $relatMensal = DB::select("select 
      case month(datafoto)
        when 1 then 'Janeiro'
        when 2 then 'Fevereiro'
        when 3 then 'Março'
        when 4 then 'Abril'
        when 5 then 'Maio'
        when 6 then 'Junho'
        when 7 then 'Julho'
        when 8 then 'Agosto'
        when 9 then 'Setembro'
        when 10 then 'Outubro'
        when 11 then 'Novembro'
        when 12 then 'Dezembro'
        end as mes,
      COUNT(month(datafoto)) as total
      from 
      captureplates 
      where 
      year(datafoto) = year(CURRENT_TIMESTAMP)
      group by month(datafoto), mes");

      return view('/Relatorios/TotalMensal', ['relatMensal' => $relatMensal]);
    }
    
    public function QtdUsuariosCadastrados()
    {
        $Retornopagina = DB::select('
        SELECT peoples.id as id, 
        peoples.name as nome, 
        plates.plate as placa, 
        plates.Veic_model as carro, 
        peoples.created_at as data_cadastro  
        FROM plates
        LEFT JOIN peoples ON peoples.id = plates.people_id
        LEFT JOIN captureplates ON captureplates.placa = plates.plate ');

        return view('/Relatorios/QtdUsuariosCadastrados', ['Retornopagina' => $Retornopagina]);
    }

    /*$sql = "SELECT 
        exams.id,
        paciente.name        as paciente,
        medico.name          as medico,
        DATE_FORMAT(exams.performed_date, '%d/%m/%Y %H:%i:%s') as dataRealizada,
        equipaments.name     as TipoEquipaments,
        exams.status 
        FROM exams
        LEFT JOIN peoples paciente  ON paciente.id = exams.patients_id
        LEFT JOIN peoples medico    ON medico.id = exams.doctor_performer_id
        LEFT JOIN schedules         ON schedules.id = exams.id_schedules_exam
        LEFT JOIN equipaments       ON equipaments.id = schedules.equipament_id
        WHERE schedules.start_date > CURDATE()";
        // Adicionar o PAGINATE Deve usar o use Illuminate\Pagination\LengthAwarePaginator;
        $page = 1;
        $size = 20;
        $data = DB::select($sql);
        $collect = collect($data);
        $results = new LengthAwarePaginator($collect->forPage($page, $size),$collect->count(), $size, $page);
        // Fim do Adicionar o PAGINATE

        $Usuarios = DB::select('SELECT * FROM users');  
        $paciente = DB::select('SELECT * FROM peoples WHERE peoples.profile = 4');
        $medico = DB::select('SELECT * FROM peoples WHERE peoples.profile = 3');
        $funcionario = DB::select('SELECT * FROM peoples WHERE peoples.profile = 2');
        $ExamesCancelados = DB::select('SELECT * FROM exams WHERE exams.status = "Cancelado"');
        $ExamesAgendado = DB::select('SELECT * FROM exams WHERE exams.status = "Agendado"');
        $ExamesRealizado = DB::select('SELECT * FROM exams WHERE exams.status = "Realizado"');
        $ExamesSolicitado = DB::select('SELECT * FROM exams WHERE exams.status = "Solicitado"');
        
        
        
        return view('home', [
            'Usuarios' => $Usuarios,
            'paciente' => $paciente,
            'medico' => $medico,
            'funcionario' => $funcionario,
            'results' => $results,
            'ExamesCancelados' => $ExamesCancelados,
            'ExamesAgendado' => $ExamesAgendado,
            'ExamesRealizado' => $ExamesRealizado,
            'ExamesSolicitado' => $ExamesSolicitado,

        ]);*/
}
