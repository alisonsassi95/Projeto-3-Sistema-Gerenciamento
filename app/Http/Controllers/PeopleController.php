<?php

namespace App\Http\Controllers;

use Session;
use App\People;
use App\User;
use Illuminate\Http\Request;
use Alert;


class PeopleController extends Controller
{

    protected $peopleModel;
    public function __construct(People $peopleModel)
    {   
        $this->peopleModel = $peopleModel;
        $this->middleware('auth');
    }

    public function __constructU(user $user)
    {   
        $this->user = $user;
        $this->middleware('auth');
    }


    public function index()
    {
        $peoples = $this->peopleModel->paginate(20); // whereNotNull('rg')->
        return view('people.index', ['peoples' => $peoples]);
    }

    public function menu()
    {
        return view('people.menu');
    }

    public function detail($id)
    {
        $people = People::find($id);
        return view('people.detail', compact('people'));
    }

    public function add()
    {
        $results = null;
        return view('people.add', ['results' => $results]);
    }


    public function save(\App\Http\Requests\PeopleRequest $request)
    {
       
        $insert = People::create($request->all()); 
        return redirect()
            ->route('people.index')
            ->with('success', 'Pessoa Cadastrada com Sucesso!');
       /* $insert = 0;
       try{
            $insert = People::create($request->all());  
       }catch(Exception $e){
        return redirect()
                ->route('people.add')
                ->with('error', 'Dados cadastrais Incompletos!');
    }finally{
        $tipopessoa = $request->get('profile');
        if ($insert){    // Verifica se inseriu com sucesso
            dd('entrou no inserir pessoa');
            if($tipopessoa <= 3){
                return redirect()
                        ->route('people.index')
                        ->with('success', 'Pessoa Cadastrada com Sucesso!');
            }else
            return redirect()
                        ->route('people.index')
                        ->with('error', 'Tipo de Pessoa Inválido!');
        }else
        return redirect()
                    ->back()
                    ->with('error', 'Dados cadastrais Inválido!');
   return redirect()
                ->route('people.add')
                ->with('error', 'Dados cadastrais Incompletos!');
    }*/
}

    public function edit ($id)
    {
        $people = People::find($id);
        if(!$people){
            return redirect()->route('people.add');
        }
        return view('people.edit', compact('people'));
    }

    public function update(Request $request, $id)
    {
        People::find($id)->update($request->all());
        return redirect()
            ->route('people.index')
            ->with('info', 'Atualizado com sucesso!');        
        
    }

    public function delete($id)
    {
        $people = People::find($id);
        $people->delete();
        
        $User = User::where('people_id', '=', $id);
        $User->delete();

        return redirect()
            ->route('people.index')
            ->with('success', 'Pessoa deletada com sucesso!');      
        
    }
}
