<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\plate;
use Alert;
use Illuminate\Support\Facades\DB; // para usar o SQL
use App\Http\Controllers\Controller;

class PlateController extends Controller
{
    protected $plateModel;
    public function __construct(plate $plateModel)
    {   
        $this->plateModel = $plateModel;
        $this->middleware('auth');
    }

    public function __constructU(user $user)
    {   
        $this->user = $user;
        $this->middleware('auth');
    }


    public function index()
    {
        //dd($this->plateModel);
        $plates = DB::select('SELECT * FROM plates'); 
       
        return view('plates.index', ['plates' => $plates]);
    }

    public function menu()
    {
        return view('plates.menu');
    }

    public function detail($id)
    {
        $plate = plate::find($id);
        return view('plates.detail', compact('plate'));
    }

    public function add()
    {
        $results = null;
        return view('plates.add', ['results' => $results]);
    }


    public function save(\App\Http\Requests\plateRequest $request)
    {
        $insert = 0;
       try{
           
            $insert = plate::create($request->all());
            //dd($insert);
       }catch(Exception $e){
        dd('entrou no excepition');
        return redirect()
                ->route('plates.add')
                ->with('error', 'Dados cadastrais Incompletos!');
    }finally{
        $tipopessoa = $request->get('profile');
        if ($insert){    // Verifica se inseriu com sucesso
            dd('entrou no inserir pessoa');
            if($tipopessoa <= 3){
                return redirect()
                        ->route('plate.index')
                        ->with('success', 'Pessoa Cadastrada com Sucesso!');
            }else
            return redirect()
                        ->route('plates.index')
                        ->with('error', 'Tipo de Pessoa Inválido!');
        }else
        return redirect()
                    ->back()
                    ->with('error', 'Dados cadastrais Inválido!');
   return redirect()
                ->route('plates.add')
                ->with('error', 'Dados cadastrais Incompletos!');
    }
}

    public function edit ($id)
    {
        $plate = plate::find($id);
        if(!$plate){
            return redirect()->route('plates.add');
        }
        return view('plates.edit', compact('plate'));
    }

    public function update(Request $request, $id)
    {
        plate::find($id)->update($request->all());
        return redirect()
            ->route('plates.index')
            ->with('info', 'Atualizado com sucesso!');        
        
    }

    public function delete($id)
    {
        $plate = plate::find($id);
        $plate->delete();
        
        $User = User::where('plate_id', '=', $id);
        $User->delete();

        return redirect()
            ->route('plate.index')
            ->with('success', 'Pessoa deletada com sucesso!');      
        
    }
}
