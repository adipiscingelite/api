@extends('layouts.adm-main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>BARANG</th>
                            <th>QUANTITY</th>
                            <!-- <th style="width: 15%">AKSI</th> -->

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($keranjang as $rowkeranjang)
                            <tr>
                                <td>{{ $rowkeranjang->id  }}</td>
                                <td>{{ $rowkeranjang->barang->merk  }}</td>
                                <td>{{ $rowkeranjang->quantity  }}</td>
                                <!-- <td class="text-center"> 
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('kategori.destroy', $rowkeranjang->id) }}" method="POST">
                                        <a href="{{ route('kategori.show', $rowkeranjang->id) }}" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('kategori.edit', $rowkeranjang->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil-alt"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td> -->
                                
                            </tr>
                        @empty
                            <div class="alert">
                                Data Kategori belum tersedia
                            </div>
                        @endforelse
                    </tbody>
                    <!-- resources/views/kategori/index.blade.php -->

@if(session('Success'))
    <div class="alert alert-success">
        {{ session('Success') }}
    </div>
@endif

@if(session('Gagal'))
    <div class="alert alert-danger">
        {{ session('Gagal') }}
    </div>
@endif

<!-- Rest of your HTML content for the index page goes here -->

                    
                </table>
                {{-- {{ $siswa->links() }} --}}

            </div>
        </div>
    </div>
@endsection