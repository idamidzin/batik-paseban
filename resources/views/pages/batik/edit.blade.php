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
					Edit Data Batik
					<div class="float-right">

					</div>
				</div>
			</div>
			<div class="card-body">
				<form action="{{ route('batik.edit', $batik->hashid) }}" method="POST" enctype="multipart/form-data">
					@method('PUT')
					@csrf
					<input type='hidden' name='deleted' id="deleted" value=''>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label text-right">Nama</label>
						<div class="col-sm-7">
							<input autofocus class="form-control" required type="text" name="nama" value="{{ old('nama') ? old('nama') : $batik->nama }}" placeholder="Nama Batik" />
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
							<input autofocus class="form-control" type="file" name="foto" accept="image/*" value="{{ old('foto') }}" placeholder="" />
							<small style="color: orange;">*kosongakan foto jika tidak ingin merubah foto</small>
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
							<textarea autofocus class="form-control" required type="text" name="makna" value="{{ old('makna') ? old('makna') : $batik->makna }}" placeholder="Makna dari batik" rows="10">{{ old('makna') ? old('makna') : $batik->makna }}</textarea>
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
							<textarea autofocus class="form-control" required type="text" name="motif" value="{{ old('motif') ? old('motif') : $batik->motif }}" placeholder="Motif Batik" rows="10">{{ old('motif') ? old('motif') : $batik->motif }}</textarea>
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
								<a href="#show-form-store-proses" class="btn btn-primary open-form btn-sm" type="button" data-toggle="modal">
									Tambah Proses
								</a>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label text-right"></label>
						<div class="col-sm-7">
							@if( session('msg') )
							<?php $msg = session('msg'); ?>
							<div class="alert alert-{{ $msg['type'] }} alert-remove">
								{!! $msg['text'] !!}
							</div>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-12 table-responsive">
							<table class="table table-hover table-bordered">
								<thead>
									<tr>
										<td>No</td>
										<td>Nama</td>
										<td>Foto</td>
										<td>Aksi</td>
									</tr>
								</thead>
								<tbody>
									<?php $i= 1; ?>
									@foreach($proses_batik as $row)
									<tr>
										<td class="text-center">{{$i++}}</td>
										<td class="text-center">{{$row->nama}}</td>
										<td class="text-center">
											<img src="{{ $row->foto != null ? asset('storage/batik_proses/'.$row->foto) :  asset('logo.png') }}" width="50px">
										</td>
										<td class="text-center">
											<a href="#show-form-edit-proses" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}" class="btn btn-success open-form-edit-proses btn-sm" type="button" data-toggle="modal"><i class="fas fa-pencil-alt" ></i>
											</a>
											<button type="button" title="delete" onclick="willRemoveProses('{{ $row->id }}','DESTROY')" class="btn btn-danger btn-sm"> 
												<i class="fa fa-trash"></i>
											</button>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label text-right"></label>
						<div class="col-sm-7">
							<div class="float-right">
								<a href="#show-form-store-hasil" class="btn btn-primary open-form btn-sm" type="button" data-toggle="modal">
									Tambah Hasil
								</a>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-12 table-responsive">
							<table class="table table-hover table-bordered">
								<thead>
									<tr>
										<td>No</td>
										<td>Nama</td>
										<td>Foto</td>
										<td>Aksi</td>
									</tr>
								</thead>
								<tbody>
									<?php $i= 1; ?>
									@foreach($hasil_batik as $row)
									<tr>
										<td class="text-center">{{$i++}}</td>
										<td class="text-center">{{$row->nama}}</td>
										<td class="text-center">
											<img src="{{ $row->foto != null ? asset('storage/batik_hasil/'.$row->foto) :  asset('logo.png') }}" width="50px">
										</td>
										<td class="text-center">
											<a href="#show-form-edit-hasil" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}" class="btn btn-success open-form-edit-hasil btn-sm" type="button" data-toggle="modal"><i class="fas fa-pencil-alt" ></i>
											</a>
											<button type="button" title="delete" onclick="willRemoveHasil('{{ $row->id }}','DESTROY')" class="btn btn-danger btn-sm"> 
												<i class="fa fa-trash"></i>
											</button>
										</td>
									</tr>
									@endforeach
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
<form id="action-form-proses" action="{{ route('proses_batik.destroy') }}" method="POST">
	{{ csrf_field() }}
	{{ method_field('PATCH') }}
	<input type="hidden" name="id">
</form>
<form id="action-form-hasil" action="{{ route('hasil_batik.destroy') }}" method="POST">
	{{ csrf_field() }}
	{{ method_field('PATCH') }}
	<input type="hidden" name="id">
</form>

@endsection
@section('body-area')
<div id="show-form-store-proses" tabindex="-1" role="dialog" aria-labelledby="form" aria-hidden="true" class="modal fade">
	<div class="modal-dialog modal-dm">
		<div class="modal-content">
			<div class="modal-header">
				Tambah Proses Batik
				<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form action="{{ route('proses_batik.store') }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<div class="modal-body">
							<input type="hidden" name="batik_id" value="{{ $batik->id }}">
							<div class="form-group">
								<b>&nbsp;Nama Proses</b>
								<input type="text" required name="nama_proses" class="form-control" required placeholder="masukan nama proses" />
							</div>
							<div class="form-group">
								<b class="mt-3">&nbsp;Foto Proses</b>
								<input type="file" required name="foto_proses" class="form-control" required />
							</div>
						</div>
					</div>
					<p class="text-center">
						<button class="btn btn-primary"><i class="fas fa-check"></i> Simpan</button>
					</p>
				</form>
			</div>
		</div>
	</div>
</div>

<div id="show-form-edit-proses" tabindex="-1" role="dialog" aria-labelledby="form" aria-hidden="true" class="modal fade">
	<div class="modal-dialog modal-dm">
		<div class="modal-content">
			<div class="modal-header">
				Edit Proses Batik
				<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form action="{{ route('proses_batik.update') }}" method="post" enctype="multipart/form-data">
					@method('PUT')
					@csrf
					<div class="form-group">
						<div class="modal-body">
							<input type="hidden" name="id" value="" id="id">
							<div class="form-group">
								<b>&nbsp;Nama Proses</b>
								<input type="text" required name="nama_proses" class="form-control" id="nama_proses" required placeholder="masukan nama proses" />
							</div>
							<div class="form-group">
								<b class="mt-3">&nbsp;Foto Proses</b>
								<input type="file" name="foto_proses" class="form-control"/>
								<small>*kosongkan foto jika tidak ingin merubah foto sebelumnya</small>
							</div>
						</div>
					</div>
					<p class="text-center">
						<button class="btn btn-primary"><i class="fas fa-check"></i> Simpan</button>
					</p>
				</form>
			</div>
		</div>
	</div>
</div>

<div id="show-form-store-hasil" tabindex="-1" role="dialog" aria-labelledby="form" aria-hidden="true" class="modal fade">
	<div class="modal-dialog modal-dm">
		<div class="modal-content">
			<div class="modal-header">
				Tambah Hasil Batik
				<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form action="{{ route('hasil_batik.store') }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<div class="modal-body">
							<input type="hidden" name="batik_id" value="{{ $batik->id }}">
							<div class="form-group">
								<b>&nbsp;Nama Hasil</b>
								<input type="text" required name="nama_hasil" class="form-control" required placeholder="masukan nama hasil" />
							</div>
							<div class="form-group">
								<b class="mt-3">&nbsp;Foto Hasil</b>
								<input type="file" required name="foto_hasil" class="form-control" required />
							</div>
						</div>
					</div>
					<p class="text-center">
						<button class="btn btn-primary"><i class="fas fa-check"></i> Simpan</button>
					</p>
				</form>
			</div>
		</div>
	</div>
</div>

<div id="show-form-edit-hasil" tabindex="-1" role="dialog" aria-labelledby="form" aria-hidden="true" class="modal fade">
	<div class="modal-dialog modal-dm">
		<div class="modal-content">
			<div class="modal-header">
				Edit Hasil Batik
				<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form action="{{ route('hasil_batik.update') }}" method="post" enctype="multipart/form-data">
					@method('PUT')
					@csrf
					<div class="form-group">
						<div class="modal-body">
							<input type="hidden" name="id" value="" id="id">
							<div class="form-group">
								<b>&nbsp;Nama Hasil</b>
								<input type="text" required name="nama_hasil" class="form-control" id="nama_hasil" required placeholder="masukan nama Hasil" />
							</div>
							<div class="form-group">
								<b class="mt-3">&nbsp;Foto Hasil</b>
								<input type="file" name="foto_hasil" class="form-control"/>
								<small>*kosongkan foto jika tidak ingin merubah foto sebelumnya</small>
							</div>
						</div>
					</div>
					<p class="text-center">
						<button class="btn btn-primary"><i class="fas fa-check"></i> Simpan</button>
					</p>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script src="{{ mix('/js/sweetalert.js') }}"></script>
<script type="text/javascript">

	$(document).on("click", ".open-form-edit-proses", function () {
		let id = $(this).data('id');
		let nama = $(this).data('nama');
		$(".modal-body #id").val( id );
		$(".modal-body #nama_proses").val( nama );
	});

	$(document).on("click", ".open-form-edit-hasil", function () {
		let id = $(this).data('id');
		let nama = $(this).data('nama');
		$(".modal-body #id").val( id );
		$(".modal-body #nama_hasil").val( nama );
	});

	function willRemoveProses(id, method) {
		swal({
			title: "Apakah Anda Yakin?",
			text: "anda yakin menghapus data ini?",
			icon: "warning",
			buttons: ["Batal", "Ya"]
		})
		.then(function(willDelete) {
			if (willDelete) {
				$("#action-form-proses input[name=_method]").val("DELETE");
				$("#action-form-proses input[name=id]").val(id);
				$("#action-form-proses").submit();
			}
		});
	};

	function willRemoveHasil(id, method) {
		swal({
			title: "Apakah Anda Yakin?",
			text: "anda yakin menghapus data ini?",
			icon: "warning",
			buttons: ["Batal", "Ya"]
		})
		.then(function(willDelete) {
			if (willDelete) {
				$("#action-form-hasil input[name=_method]").val("DELETE");
				$("#action-form-hasil input[name=id]").val(id);
				$("#action-form-hasil").submit();
			}
		});
	};
</script>
@endsection