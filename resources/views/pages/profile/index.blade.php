@extends('layouts.app')
@section('content')
<div class="content-heading">
	<div>
		Profile
	</div>
</div>
<div class="container-fluid">
	<!-- DATATABLE DEMO 1-->
	<div class="card">
		<div class="card-header">
			<div class="card-title">
				
			</div>
		</div>
		<div class="card-body">
			@if( session('msg') )
			<?php $msg = session('msg'); ?>
			<div class="alert alert-{{ $msg['type'] }} alert-remove">
				{!! $msg['text'] !!}
			</div>
			@endif
			<div class="row">
				<div class="col-sm-8">
					<form action="{{ route('profile.update', $profile->hashid) }}" method="POST" enctype="multipart/form-data">
						@method('PUT')
						@csrf
						<div class="form-group">
							<label><b>Foto</b></label>
							@if($profile->foto != null)
							<br>
								<img src="{{ asset('storage/profile/'.$profile->foto) }}" width="150px">
							@else
								<br> - Foto Kosong 
							@endif
							<input type="file" name="foto" class="form-control mt-3">
						</div>
						<div class="form-group">
							<label><b>Title</b></label>
							<input type="text" name="name" class="form-control" placeholder="Tuliskan title disini.. (Sejarah)" value="{{ $profile ? $profile->nama : '' }}">
						</div>
						<div class="form-group">
							<label><b>Tuliskan Sesuatu</b></label>
							<textarea class="form-control" rows="15" placeholder="Tuliskan Sesuatu disini.. (Di tepi jalan raya)" name="sejarah">{{ $profile ? $profile->sejarah_singkat : '' }}</textarea>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
								<div class="float-right">
									<a href="#show-form-store" class="btn btn-primary open-form btn-sm" type="button" data-toggle="modal">
										Tambah Galeri
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
										@foreach($galeri as $row)
										<tr>
											<td class="text-center">{{$i++}}</td>
											<td class="text-center" width="50%">{{$row->nama}}</td>
											<td class="text-center">
												<a href="{{ $row->foto != null ? asset('storage/galeri/'.$row->foto) :  asset('logo.png') }}" target="_blank"><img src="{{ $row->foto != null ? asset('storage/galeri/'.$row->foto) :  asset('logo.png') }}" width="50px"></a>
											</td>
											<td class="text-center">
												<a href="#show-form-edit" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}" class="btn btn-success open-form-edit btn-sm" type="button" data-toggle="modal"><i class="fas fa-pencil-alt" ></i>
												</a>
												<button type="button" title="delete" onclick="willRemove('{{ $row->id }}','DESTROY')" class="btn btn-danger btn-sm"> 
													<i class="fa fa-trash"></i>
												</button>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						<div class="form-group">
							<button class="btn btn-primary btn-sm">Simpan Perubahan</button>
						</div>
					</form>
				</div>
				<div class="col-sm-4">
					<img src="{{ asset('img/batik_paseban.png') }}" width="300px">
				</div>
			</div>
		</div>
	</div>
	<form id="action-form" action="{{ route('galeri.destroy') }}" method="POST">
		{{ csrf_field() }}
		{{ method_field('PATCH') }}
		<input type="hidden" name="id">
	</form>
	@endsection

	@section('body-area')
	<div id="show-form-store" tabindex="-1" role="dialog" aria-labelledby="form" aria-hidden="true" class="modal fade">
		<div class="modal-dialog modal-dm">
			<div class="modal-content">
				<div class="modal-header">
					Tambah Galeri
					<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<form action="{{ route('galeri.store') }}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<div class="modal-body">
								<input type="hidden" name="profile_id" value="{{ $profile->id }}">
								<div class="form-group">
									<b>&nbsp;Nama Galeri</b>
									<input type="text" required name="nama" class="form-control" required placeholder="masukan nama" />
								</div>
								<div class="form-group">
									<b class="mt-3">&nbsp;Foto Galeri</b>
									<input type="file" required name="foto" class="form-control" required />
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

	<div id="show-form-edit" tabindex="-1" role="dialog" aria-labelledby="form" aria-hidden="true" class="modal fade">
		<div class="modal-dialog modal-dm">
			<div class="modal-content">
				<div class="modal-header">
					Edit Galeri
					<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<form action="{{ route('galeri.update') }}" method="post" enctype="multipart/form-data">
						@method('PUT')
						@csrf
						<div class="form-group">
							<div class="modal-body">
								<input type="hidden" name="id" value="" id="id">
								<div class="form-group">
									<b>&nbsp;Nama</b>
									<input type="text" required name="nama" class="form-control" id="nama" required placeholder="masukan nama" />
								</div>
								<div class="form-group">
									<b class="mt-3">&nbsp;Foto</b>
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
	@endsection

	@section('scripts')
	<script src="{{ mix('/js/sweetalert.js') }}"></script>
	<script src="{{ mix('/js/datatable.js') }}"></script>
	<script type="text/javascript">

		$(document).on("click", ".open-form-edit", function () {
			let id = $(this).data('id');
			let nama = $(this).data('nama');
			$(".modal-body #id").val( id );
			$(".modal-body #nama").val( nama );
		});

		$(document).ready(function(){
			$('#datatable').DataTable();
			addIsi();
		});

		$('#btn-tambah-isi').click(function(){
			addIsi();
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
		function addIsi() 
		{
			$('#tr-tambah').before(`
				<tr>
				<td class="text-center" width="50%">
				<input class="form-control" name="nama_foto[]" type="text" placeholder="Nama Foto">
				</td>
				<td class="text-center" width="40%">
				<input class="form-control" name="foto_galeri[]" type="file" accept="image/*">
				</td>
				<td class="text-center">
				<button type="button" class="btn btn-danger btn-sm btn-delete"><i class="fas fa-times"></i></button>
				</td>
				</tr>`);
		}

		function execRemove(method, hashid) {
			$("#action-form").attr('action', 'galeri/delete/' + hashid);
			$("#action-form input[name=_method]").val(method);
			$("#action-form").submit();
		}

		function willRemove(id, method) {
			swal({
				title: "Apakah Anda Yakin?",
				text: "anda yakin menghapus data ini?",
				icon: "warning",
				buttons: ["Batal", "Ya"]
			})
			.then(function(willDelete) {
				if (willDelete) {
					$("#action-form input[name=_method]").val("DELETE");
					$("#action-form input[name=id]").val(id);
					$("#action-form").submit();
				}
			});
		};
	</script>
	@endsection