@extends('layouts.main')
@section('wrapper')
    @include('partials.navbar')
    @include('partials.sidebar')
    <div class="content-wrapper">
        <div class="row">
            <div class="col mx-4 my-4">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <a href="#create" class="btn btn-success" data-bs-toggle="modal">Tambah Baru</a>
            </div>
        </div>
        <div class="row">
            <div class="col mx-3 my-3">
                <span id="rsp"></span>
            </div>
        </div>
        <div class="row">
            <div class="col mx-4 my-3">
                <table class="table" id="table_id">
                    <thead class="table-dark dt-head-center">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Pasien</th>
                            <th scope="col">Nama Rumah Sakit</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pasien as $p)
                            <tr id="index_{{ $p->id }}">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $p->nama_pasien }}</td>
                                <td class="text-center">{{ $p->rumah_sakit->nama_rumah_sakit }}</td>
                                <td>
                                    <a href="#show{{ $p->id }}" class="btn btn-primary border-0" data-bs-toggle="modal">Lihat</a>
                                    @include('dashboard.pasien.show')
                                    <a href="#edit{{ $p->id }}" class="btn btn-warning border-0" data-bs-toggle="modal" onclick="saveId({{ $p->id }})">Edit</a>
                                    @include('dashboard.pasien.edit')
                                    {{-- <a href="#delete{{ $p->id }}" class="btn btn-danger border-0" data-bs-toggle="modal">Hapus</a> --}}
                                    {{-- @include('dashboard.rumah_sakit.delete') --}}
                                    <a href="javascript:void(0)" id="btn-delete" data-id="{{ $p->id }}" class="btn btn-danger border-0">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
    @include('dashboard.pasien.create')
@endsection
@push('script')
<script>
    var table = $('#table_id').DataTable({
        columnDefs: [{
                targets: '_all',
                className: 'dt-head-center'
            }
        ],
        initComplete: function() {
            this.api()
            .columns(2).every(function() {
                var column = this;
                var select = $(
                    '<select class="form-select rsp" id="rumah_sakit_pasien" style="width:auto;"><option value="">Rumah Sakit Pasien</option></select>'
                )
                .appendTo($('#rsp'))
                .on('change', function() {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());
                    column.search(val ? '^' + val + '$' : '', true, false).draw();
                });
                column
                .data().unique().sort().each(function(d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>');
                });
            })
        }
    });
    
    $('body').on('click', '#btn-delete', function () {

        let p_id = $(this).data('id');
        let token   = $("meta[name='csrf-token']").attr("content");

        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "ingin menghapus data ini!",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'TIDAK',
            confirmButtonText: 'YA!'
        }).then((result) => {
            if (result.isConfirmed) {

                console.log('test');

                //fetch to delete data
                $.ajax({

                    url: `/dashboard/pasien/${p_id}`,
                    type: "DELETE",
                    cache: false,
                    data: {
                        "_token": token
                    },
                    success:function(response){ 
                        console.log('test3');

                        //show success message
                        Swal.fire({
                            type: 'success',
                            icon: 'success',
                            title: `${response.message}`,
                            showConfirmButton: false,
                            timer: 3000
                        });

                        //remove post on table
                        $(`#index_${p_id}`).remove();
                    }
                });
            }
        })
    });
</script>
@endpush