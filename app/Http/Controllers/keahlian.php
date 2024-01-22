<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class keahlian extends Controller
{
    public function index()
    {
        $skill = Skill::all();
        return view("skill.index", compact("skill"));
    }
    public function create()
    {
        return view("skill.create");
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'keahlian_user' => 'required',
        ]);

        Skill::create($validateData);

        return redirect('/skill')->with('success', 'Data berhasil kami masukkan');
    }


    public function edit($id)
    {
        $skill = Skill::findOrFail($id);
        return view('skill.edit', compact('skill'));
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'keahlian_user' => 'required',
        ]);


        Skill::find($id)->update($validateData);

        return redirect('/skill')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        Skill::destroy($id);
        return redirect('/skill')->with('success', 'Data berhasil dihapus');
    }
}
