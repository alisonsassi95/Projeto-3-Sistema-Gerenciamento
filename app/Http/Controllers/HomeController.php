<?php

namespace App\Http\Controllers;


use App\User;
use App\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // para usar o SQL
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
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
    public function index()
    {

       /* $RegisterPlatePeoples = DB::select('
        SELECT Peoples.name	     AS Nome,  	
		plates.Veic_model        AS Modelo,
        plates.plate 	         AS Placa,
        captureplate.datafoto    AS Data_Registro,
        captureplate.origemplaca AS TIPO_PLACA
        FROM plates
        LEFT JOIN captureplate 	ON captureplate.placa = plates.plate
        LEFT JOIN peoples 		ON peoples.id = plates.people_id'
        );  */
        $PlatePeoples = DB::select('
        SELECT 
        Peoples.id       	     AS id,
        Peoples.name	         AS Nome,  	
		plates.Veic_model        AS Modelo,
        plates.plate 	         AS Placa
        FROM plates
        LEFT JOIN peoples 		ON peoples.id = plates.people_id
        ');
        $notices = DB::select('
        SELECT * FROM notices
        WHERE notices.date_end >= CURDATE()
        AND notices.date_start <= CURDATE() 
        ');
        $PeoplesPlatePersonal = DB::select('
        SELECT placa       AS placa,
		datasistema AS DataDia,
        ID_Device   AS Device 
        FROM captureplates
        WHERE captureplates.placa in (        
                                      SELECT plates.plate
                                      FROM plates
                                      LEFT JOIN peoples 		ON peoples.id = plates.people_id
                                    WHERE peoples.id ='.$user = auth()->user()->id.") ORDER BY DataDia LIMIT 4");

        return view('home',[
            'PlatePeoples' => $PlatePeoples,
            'notices' => $notices,
            'PeoplesPlatePersonal' => $PeoplesPlatePersonal,
        ]);
        
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
}
