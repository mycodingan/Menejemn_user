<?php

namespace App\Http\Controllers;

use App\Models\UserData;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;


class UserController extends Controller
{

	public function export_excel()
	{
		return Excel::download(new UsersExport, 'UsEer.xlsx');
	}
    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');
        $nama_file = $file->hashName();
        $path = $file->storeAs('public/excel/', $nama_file);
        $import = Excel::import(new UsersImport(), storage_path('app/public/excel/' . $nama_file));
        Storage::delete($path);

        if ($import) {
            return redirect()->route('user.index')->with(['success' => 'Data Berhasil Diimport!']);
        } else {
                 return redirect()->route('user.index')->with(['error' => 'Data Gagal Diimport!']);
        }
    }
    public function index(Request $request)
    {
        $searchTerm = $request->input('search');
        if ($searchTerm) {  
            $users = UserData::where('nama_user', 'like', "%" . $searchTerm . "%")->orderBy('nama_user', 'desc')->paginate(5);
        } else {
            $users = UserData::paginate(3);
        }
        return view("user.index", compact("users"));
    }

    public function create()
    {
        return view("user.create");
    }
    public function search(Request $request)
    {
        $keyword = $request->search;
        return view('user.index', compact('users'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'foto_user' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_user' => 'required',
            'nomor_abser' => 'required',
            'mulai_masuk' => 'required',
            'catatan_user' => 'required',
            'password_user' => 'required',
        ]);
        
        $imagePath = $request->file('foto_user')->store('uploads/images', 'public');
        
        $validateData['foto_user'] = $imagePath;

        UserData::create($validateData);

        return redirect('/user')->with('success', 'Data berhasil kami masukkan');
    }

    public function show($id)
    {
        $user = UserData::findOrFail($id);
        return view('user.show', compact('user'));
    }

    public function edit($id)
    {
        $user = UserData::findOrFail($id);
        return view('user.edit', compact('user'));  
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'foto_user' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_user' => 'required',
            'nomor_abser' => 'required',
            'mulai_masuk' => 'required',
            'catatan_user' => 'required',
            'password_user' => 'required',
        ]);

        $imagePath = $request->file('foto_user')->store('uploads/images', 'public');

        $validateData['foto_user'] = $imagePath;

        UserData::find($id)->update($validateData);

        return redirect('/user')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        UserData::destroy($id);
        return redirect('/user')->with('success', 'Data berhasil dihapus');
    }
}
