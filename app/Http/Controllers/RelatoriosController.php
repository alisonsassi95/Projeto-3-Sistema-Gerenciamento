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

    public function RelTotalMensal()
    {
        $janeiro = captureplate::whereYear('datafoto', date('Y'))
        ->whereMonth('datafoto','01')
        ->count();

        $fevereiro = captureplate::whereYear('datafoto', date('Y'))
        ->whereMonth('datafoto','02')
        ->count();
  
        $marco = captureplate::whereYear('datafoto', date('Y'))
        ->whereMonth('datafoto','03')
        ->count();
  
        $abril = captureplate::whereYear('datafoto', date('Y'))
        ->whereMonth('datafoto','04')
        ->count();
  
        $maio = captureplate::whereYear('datafoto', date('Y'))
        ->whereMonth('datafoto','05')
        ->count();
  
        $junho = captureplate::whereYear('datafoto', date('Y'))
        ->whereMonth('datafoto','06')
        ->count();
  
        $julho = captureplate::whereYear('datafoto', date('Y'))
        ->whereMonth('datafoto','07')
        ->count();
  
        $agosto = captureplate::whereYear('datafoto', date('Y'))
        ->whereMonth('datafoto','08')
        ->count();
  
        $setembro = captureplate::whereYear('datafoto', date('Y'))
        ->whereMonth('datafoto','09')
        ->count();
  
        $outubro = captureplate::whereYear('datafoto', date('Y'))
        ->whereMonth('datafoto','10')
        ->count();
  
        $novembro = captureplate::whereYear('datafoto', date('Y'))
        ->whereMonth('datafoto','11')
        ->count();
  
        $dezembro = captureplate::whereYear('datafoto', date('Y'))
        ->whereMonth('datafoto','12')
        ->count();

        return view('/Relatorios/TotalMensal', ['janeiro' => $janeiro,
        'fevereiro' => $fevereiro,
        'marco' => $marco,
        'abril' => $abril,
        'maio' => $maio,
        'junho' => $junho,
        'julho' => $julho,
        'agosto' => $agosto,
        'setembro' => $setembro,
        'outubro' => $outubro,
        'novembro' => $novembro,
        'dezembro' => $dezembro,]);
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
