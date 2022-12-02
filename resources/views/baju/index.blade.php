@extends('layouts.navbar')
@section('content')
    
<div class="d-flex justify-content-center mt-5">
    <h1>Daftar Data Pakaian</h1>
</div>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            
            @error(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data gagal diubah, silahkan cek kembali form yang anda isi!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @enderror
            
            <div class="tambahdata mb-3 d-flex justify-content-end">
                <a href="{{ route('baju.create') }}" class="btn btn-success">Tambah Data</a>
            </div>
            
            <div class="row g-3 align-items-center mb-3">
                <div class="col-auto">
                    <form action="{{route('baju.index') }}" method="GET">
                        <input type="search" id="search" name="search" placeholder="Search" class="form-control" aria-describedby="passwordHelpInline">
                    </form>
                </div>
             
            <div class="table-responsive">
                <table class="table align-middle table-bordered table-hover">
                    <thead>
                        <tr class="align-middle" style="text-align: center">
                            <th >#</th>
                            <th >Kode</th>
                            <th >Nama</th>
                            <th >Brand</th>
                            <th >Ukuran</th>
                            <th >Harga</th>
                            <th >Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($shirts as $index =>$shirt)
                        <tr @if($loop->odd)  style="background-color: #f1f3f5;"  @endif>
                        <td align="center">{{ $index + $shirts->firstItem()}}</td>
                        <td align="center">{{ $shirt->kode }}</td>
                        <td align="center">{{ $shirt->nama }}</td>
                        <td align="center">{{ $shirt->brand }}</td>
                        <td align="center">{{ $shirt->type->ukuran }}</td>
                        <td align="center">@currency( $shirt->type->harga)</td>
                        <td align="center">
                        <a href="{{ route('baju.edit',$shirt->id) }}" class="btn btn-warning ">Edit</a>
                            
                        <a href="{{ route('baju.destroy',$shirt->id) }}" class="btn btn-danger ">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="paginate d-flex justify-content-center sm">
                     {{ $shirts->links() }}
            </div>
            </div>
        </div>
    </div>
</div>


@endsection