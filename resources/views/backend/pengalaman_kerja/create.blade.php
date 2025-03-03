@extends('backend.layouts.template')

@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="icon_document_alt"></i> Riwayat Hidup</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i> <a href="{{ url('dashboard') }}">Home</a></li>
                    <li><i class="icon_document_alt"></i> Riwayat Hidup</li>
                    <li><i class="fa fa-files-o"></i> Pengalaman Kerja</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        {{ isset($pengalaman_kerja) ? 'Mengubah' : 'Menambahkan' }} Pengalaman Kerja
                    </header>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> Ada beberapa masalah dengan input Anda.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="panel-body">
                        <div class="form">
                            <form class="form-validate form-horizontal" method="POST"
                                action="{{ isset($pengalaman_kerja) ? route('pengalaman_kerja.update', $pengalaman_kerja->id) : route('pengalaman_kerja.store') }}">
                                @csrf
                                @if(isset($pengalaman_kerja))
                                    @method('PUT')
                                @endif

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Nama Perusahaan <span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <input class="form-control" id="nama" name="nama" type="text" required 
                                            value="{{ isset($pengalaman_kerja) ? $pengalaman_kerja->nama : '' }}" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Jabatan <span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <input class="form-control" id="jabatan" name="jabatan" type="text" required 
                                            value="{{ isset($pengalaman_kerja) ? $pengalaman_kerja->jabatan : '' }}" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Tahun Masuk <span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <input id="tahun_masuk" type="text" name="tahun_masuk" class="form-control" required 
                                            value="{{ isset($pengalaman_kerja) ? $pengalaman_kerja->tahun_masuk : '' }}" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Tahun Selesai <span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <input id="tahun_keluar" type="text" name="tahun_keluar" class="form-control" required 
                                            value="{{ isset($pengalaman_kerja) ? $pengalaman_kerja->tahun_keluar : '' }}" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-primary" type="submit">Simpan</button>
                                        <a href="{{ route('pengalaman_kerja.index') }}" class="btn btn-default">Batal</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>

@push('content-css')
<link href="{{ asset('backend/css/bootstrap-datepicker.css') }}" rel="stylesheet" />
@endpush

@push('content-js')
<script src="{{ asset('backend/js/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript">
    $('#tahun_masuk, #tahun_keluar').datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years"
    });
</script>
@endpush
@endsection
