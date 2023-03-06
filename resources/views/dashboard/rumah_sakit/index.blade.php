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
                @include('dashboard.rumah_sakit.create')
            </div>
        </div>
        <div class="row">
            <div class="col mx-4 my-3">
                <table class="table" id="table_id">
                    <thead class="table-dark dt-head-center">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Rumah Sakit</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rumah_sakit as $rs)
                            <tr id="index_{{ $rs->id }}">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $rs->nama_rumah_sakit }}</td>
                                <td>
                                    <a href="#show{{ $rs->id }}" class="btn btn-primary border-0" data-bs-toggle="modal">Lihat</a>
                                    @include('dashboard.rumah_sakit.show')
                                    <a href="#edit{{ $rs->id }}" class="btn btn-warning border-0" data-bs-toggle="modal" onclick="saveId({{ $rs->id }})">Edit</a>
                                    @include('dashboard.rumah_sakit.edit')
                                    {{-- <a href="#delete{{ $rs->id }}" class="btn btn-danger border-0" data-bs-toggle="modal">Hapus</a> --}}
                                    {{-- @include('dashboard.rumah_sakit.delete') --}}
                                    <a href="javascript:void(0)" id="btn-delete" data-id="{{ $rs->id }}" class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
@push('script')
<script>
    $(document).ready(function() {
        var table = $('#table_id').DataTable({
            ordering: false,
            columnDefs: [{
                targets: '_all',
                className: 'dt-head-center'
            }]
        });
    });
    
    $('body').on('click', '#btn-delete', function () {

        let rs_id = $(this).data('id');
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

                    url: `/dashboard/rumah_sakit/${rs_id}`,
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
                        $(`#index_${rs_id}`).remove();
                    }
                });
            }
        })
    });
</script>
@endpush