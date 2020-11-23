@extends('layouts.app')
@section('content')
<div class="content-heading">
	<div>
		Data Batik
	</div>
</div>
<div class="container-fluid">
	<div class="col-md-8 offset-md-2">
		<div class="card">
			<div class="card-header">
				<div class="card-title">
					Tambah Data  Batik
					<div class="float-right">

					</div>
				</div>
			</div>
			<div class="card-body">
				<form action="{{ route('batik.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group row">
						<label class="col-sm-3 col-form-label text-right">Nama</label>
						<div class="col-sm-7">
							<input autofocus class="form-control" required type="text" name="nama" value="{{ old('nama') }}" placeholder="Nama Batik" />
							@if ($errors->has('nama'))
							<span class="invalid-feedback">
								<strong>{{ $errors->first('nama') }}</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label text-right">Foto</label>
						<div class="col-sm-7">
							<input autofocus class="form-control" required type="file" name="foto" accept="image/*" value="{{ old('foto') }}" placeholder="" />
							@if ($errors->has('foto'))
							<span class="invalid-feedback">
								<strong>{{ $errors->first('foto') }}</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label text-right">Makna</label>
						<div class="col-sm-7">
							<textarea autofocus class="form-control" required type="text" name="makna" value="{{ old('makna') }}" placeholder="Makna dari batik" rows="10"></textarea>
							@if ($errors->has('makna'))
							<span class="invalid-feedback">
								<strong>{{ $errors->first('makna') }}</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label text-right">Motif</label>
						<div class="col-sm-7">
							<textarea autofocus class="form-control" required type="text" name="motif" value="{{ old('motif') }}" placeholder="Motif Batik" rows="10"></textarea>
							@if ($errors->has('motif'))
							<span class="invalid-feedback">
								<strong>{{ $errors->first('motif') }}</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label text-right"></label>
						<div class="col-sm-7">
							<div class="float-right">
								<button id="btn-tambah-isi" type="button" class="btn btn-primary btn-sm mb-4">Tambah Proses</button>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-1 col-form-label text-right"></label>
						<div class="col-sm-10">
							<table class="table table-sm" id="table-isi">
								<tbody>
									<tr id="tr-tambah"></tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label text-right"></label>
						<div class="col-sm-7">
							<div class="float-right">
								<button id="btn-tambah-hasil" type="button" class="btn btn-primary btn-sm mb-4">Tambah Hasil</button>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-1 col-form-label text-right"></label>
						<div class="col-sm-10">
							<table class="table table-sm" id="table-hasil">
								<tbody>
									<tr id="tr-tambah-hasil"></tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-group row">
							<div class="col-xl-12 text-center">
								<a href="{{ route('batik.index') }}" class="btn btn-secondary">Kembali</a>&nbsp;
								<button class="btn btn-primary mb-2 mt-2" type="submit">Simpan</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

@endsection
@section('scripts')
<script src="{{ mix('/js/sweetalert.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function() {
            addIsi();
            addIsiHasil();
        });

        $('#btn-tambah-isi').click(function(){
            addIsi();
        });

        $('#btn-tambah-hasil').click(function(){
            addIsiHasil();
        });

        $('#table-isi').on('click','.btn-delete',function(){
            let trCount = $('#table-isi>tbody>tr').length;
            if (trCount > 2) 
            {
                $(this).closest('tr').remove();
            }
            else
            {
                swal('Proses Batik Harus harus diisi','','warning');
            }

        });

        $('#table-hasil').on('click','.btn-delete',function(){
            let trCount = $('#table-hasil>tbody>tr').length;
            if (trCount > 2) 
            {
                $(this).closest('tr').remove();
            }
            else
            {
                swal('Hasil Batik Harus harus diisi','','warning');
            }

        });

        function addIsi() 
        {
            $('#tr-tambah').before(`
                <tr>
                    <td class="text-center" width="50%">
                        <input class="form-control" name="nama_proses[]" required type="text" placeholder="Nama Proses Batik">
                    </td>
                    <td class="text-center" width="40%">
                        <input class="form-control" name="foto_proses[]" required type="file" accept="image/*">
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-danger btn-sm btn-delete"><i class="fas fa-times"></i></button>
                    </td>
                </tr>`);
        }

        function addIsiHasil() 
        {
            $('#tr-tambah-hasil').before(`
                <tr>
                    <td class="text-center" width="50%">
                        <input class="form-control" name="nama_hasil[]" required type="text" placeholder="Nama Hasil">
                    </td>
                    <td class="text-center" width="40%">
                        <input class="form-control" name="foto_hasil[]" required type="file" accept="image/*">
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-danger btn-sm btn-delete"><i class="fas fa-times"></i></button>
                    </td>
                </tr>`);
        }
</script>
@endsection