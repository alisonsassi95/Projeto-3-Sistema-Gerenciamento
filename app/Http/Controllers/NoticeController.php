<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB; // para usar o SQL
use App\Notice;

class NoticeController extends Controller
{
    public function index()
    {
        $notices = DB::select('SELECT * FROM notices');
        return view('notice.index', ['notices' => $notices]);
    }
    public function add()
    {
        $results = null;
        return view('notice.add', ['results' => $results]);
    }


    public function save(Request $request)
    {
        $insert = Notice::create($request->all());
        return redirect()
        ->route('notice.index')
        ->with('success', 'Cadastrada com Sucesso!');
    }

    public function update(Request $request, $id)
    {
        Notice::find($id)->update($request->all());
        return redirect()
            ->route('notice.index')
            ->with('info', 'Atualizado com sucesso!');
    }

    public function edit ($id)
    {
        $notices = Notice::find($id);
        if(!$notices){
            return redirect()->route('notice.add');
        }
        return view('notice.edit', compact('notices'));
    }
    public function delete($id)
    {
        $notice = Notice::find($id);
        $notice->delete();

        return redirect()
            ->route('notice.index')
            ->with('success', 'Aviso deletado com sucesso!');
    }
}
