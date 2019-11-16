<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\plate;
use App\People;
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

    public function add()
    {
        $results = null;
        return view('plates.add', ['results' => $results]);
    }


    public function save(Request $request)
    {
        $insert = plate::create($request->all());
        return redirect()
            ->route('people.index')
            ->with('success', 'Cadastrada com Sucesso!');
    }


    public function edit($id)
    {
        $plate = plate::find($id);
        if (!$plate) {
            return redirect()->route('plates.add');
        }
        return view('plates.edit', compact('plate'));
    }

    public function load($id)
    {
        $people = People::find($id);

        return view('plates.add', ['people' => $people]);
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
