<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apply;
use App\Models\Pdf;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class ApplyControll extends Controller
{
    private $mediaCollection = 'pdf';

    public function index()
    {
        $apply = Apply::with('berkas')->get();

        return view('pages.list.index', [
            'apply' => $apply,
        ]);
    }
    public function detail($id)
    {
        $apply= Apply::where('id',$id)->first();
        return view('pages.list.detail',compact('apply'));
    }
    public function store(Request $request)
    {
        $apply=Apply::where('email',$request->email)->where('jabatan',$request->jabatan)->first();  
        if ($request->pdf=== null){
            Alert::warning('Terjadi Kesalahan', 'Berkas lamaran tidak boleh kosong');
            return Redirect::back();
        }    
        elseif (count($request->pdf)>1 && $apply=== null) {
            $product = Apply::create([
                'jabatan' => $request->jabatan,
                'email' => $request->email,
                'telp' => $request->telp,
                'lahir' => $request->tahun,
            ]);
            foreach ($request->input('pdf', []) as $file) {
                Pdf::create([
                    'user_id'=>$product->id,
                    'pdf'=>$file,
                ]);

            }
            Alert::success('Berhasil', 'Lamaran berhasil dikirim');
            return redirect('/list');

        }elseif (count($request->pdf)<2 ) {
            Alert::warning('Terjadi Kesalahan', 'Berkas lamaran minimal 2 file');
            return Redirect::back();
        }
        else{
            Alert::warning('Terjadi Kesalahan', 'Email yang anda masukkan sudah pernah melamar dijabatan tersebut, silahkan memilih jabatan yang lain');
            return Redirect::back();
        }
    }
    public function destroy($id)
    {
       Apply::where('id',$id)->delete();
       Alert::success('Berhasil', 'Data lamaran berhasil dihapus');
       return redirect('/list');
    }
    public function storeMedia(Request $request)
    {
        $path = storage_path('tmp/uploads');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('file');
        $name = uniqid() . '_' . trim($file->getClientOriginalName());
        $file->move($path, $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }
}
