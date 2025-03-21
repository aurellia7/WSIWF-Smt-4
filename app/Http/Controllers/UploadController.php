<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class UploadController extends Controller
{
    public function upload()
    {
        return view('upload');
    }

    public function proses_upload(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|image|mimes:jpg,png,gif',
            'keterangan' => 'required',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');

        // nama file
        echo 'File Name: ' . $file->getClientOriginalName() . '<br>';

        // ekstensi file
        echo 'File Extension: ' . $file->getClientOriginalExtension() . '<br>';

        // real path
        echo 'File Real Path: ' . $file->getRealPath() . '<br>';

        // ukuran file
        echo 'File Size: ' . $file->getSize() . '<br>';

        // tipe mime
        echo 'File Mime Type: ' . $file->getMimeType();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_file';

        // upload file
        $file->move($tujuan_upload, $file->getClientOriginalName());
    }
    public function resize_upload(Request $request)
    {
        $this->validate($request, [
           'file' => 'required|image|mimes:jpg,png,gif',
            'keterangan' => 'required',
        ]);

        // TENTUKAN PATH LOKASI UPLOAD
        $path = public_path('img/logo');

        // JIKA FOLDERNYA BELUM ADA
        if (!File::isDirectory($path)) {
            // MAKA FOLDER TERSEBUT AKAN DIBUAT
            File::makeDirectory($path, 0777, true);
        }

        // MENGAMBIL FILE IMAGE DARI FORM
        $file = $request->file('file');

        // MEMBUAT NAME FILE DARI GABUNGAN TANGGAL DAN UNIQID()
        $fileName = 'logo_' . uniqid() . '.' . $file->getClientOriginalExtension();

        // MEMBUAT CANVAS IMAGE SEBESAR DIMENSI
        $canvas = Image::canvas(200, 200);

        // RESIZE IMAGE SESUAI DIMENSI DENGAN MEMPERTAHANKAN RATIO
        $resizeImage = Image::make($file)->resize(null, 200, function ($constraint) {
            $constraint->aspectRatio();
        });

        // MEMASUKAN IMAGE YANG TELAH DIRESIZE KE DALAM CANVAS
        $canvas->insert($resizeImage, 'center');

        // SIMPAN IMAGE KE FOLDER
        if ($canvas->save($path . '/' . $fileName)) {
            return redirect(route('upload'))->with('success', 'Data berhasil ditambahkan(resize)! ');
        } else {
            return redirect(route('upload'))->with('error', 'Data gagal ditambahkan!');
        }
    }

    
    public function dropzone()
    {
        return view('dropzone');
    }

public function dropzone_store(Request $request)//untuk menyimpan gambar yang di-upload menggunakan Dropzone
{
    // Cek apakah ada file yang di-upload
    if ($request->hasFile('file')) { 
        $uploadedImages = []; // Array untuk menyimpan nama file yang berhasil di-upload

        // Iterasi terhadap semua file yang di-upload
        foreach ($request->file('file') as $image) {  
            $imageName = time() . '_' . $image->getClientOriginalName(); // Buat nama untuk file
            $image->move(public_path('img/dropzone'), $imageName); // Pindahkan file ke folder img/dropzone
            $uploadedImages[] = $imageName; // Tambahkan nama file ke array
        }

        return response()->json(['success' => $uploadedImages]);
    }

    return response()->json(['error' => 'No files uploaded.']);
}


public function pdf_upload()
{
    return view('pdf_upload'); // Menampilkan halaman upload
}

public function pdf_store(Request $request)
{
    // Cek apakah ada file yang di-upload
    if ($request->hasFile('file')) {
        $uploadedPDFs = []; // Array untuk menyimpan nama file PDF yang berhasil di-upload

        // Iterasi terhadap semua file yang di-upload
        foreach ($request->file('file') as $pdf) {
            $pdfName = 'pdf_' . time() . '_' . $pdf->getClientOriginalName(); // Buat nama untuk file PDF
            $pdf->move(public_path('pdf/dropzone'), $pdfName); // Pindahkan file ke folder pdf/dropzone
            $uploadedPDFs[] = $pdfName; // Tambahkan nama file ke array
        }

        return response()->json(['success' => $uploadedPDFs]);
    }

    return response()->json(['error' => 'No files uploaded.']);
}
}
