@extends('index')
@section('title', 'Menu')

@section('isihalaman')
    <h3><center>Daftar Menu Pesanan</center></h3>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalMenuTambah"> 
        Tambah Data Menu 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">Makanan</td>
                <td align="center">Minuman</td>
                
            </tr>
        </thead>

        <tbody>
            @foreach ($menu as $index=>$bk)
                <tr>
                    <td align="center" scope="row">{{ $index + $menu->firstItem() }}</td>
                    <td>{{$bk->makanan}}</td>
                    <td>{{$bk->minuman}}</td>
                    <td align="center">
                        
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalMenuEdit{{$bk->makanan}}"> 
                            Edit
                        </button>
                         <!-- Awal Modal EDIT data menu -->
                        <div class="modal fade" id="modalMenuEdit{{$bk->makanan}}" tabindex="-1" role="dialog" aria-labelledby="modalMenuEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalMenuEditLabel">Form Edit Data Menu</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formmenuedit" id="formmenuedit" action="/menu/edit/{{ $bk->makanan}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="makanan" class="col-sm-4 col-form-label">Makanan</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="no" name="makanan" placeholder="Masukan Kode menu">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="minuman" class="col-sm-4 col-form-label">Minuman</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="no" name="minuman" value="{{ $bk->minuman}}">
                                                </div>
                                            </div>
                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="menutambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data menu -->
                        |
                        <a href="menu/hapus/{{$bk->makanan}}" onclick="return confirm('Yakin mau dihapus?')">
                            <button class="btn-danger">
                                Delete
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!--awal pagination-->

    Jumlah item : {{ $menu->total() }} <br />
    Harga : {{ $menu->harga() }} <br />

    {{ $menu->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah data menu -->
    <div class="modal fade" id="modalMenuTambah" tabindex="-1" role="dialog" aria-labelledby="modalMenuTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalMenuTambahLabel">Form Input Data Menu</h5>
                </div>
                <div class="modal-body">
                    <form name="formmenutambah" id="formmenutambah" action="/menu/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="makanan" class="col-sm-4 col-form-label">Makanan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="no" name="makanan" placeholder="Masukan Nama Menu">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="minuman" class="col-sm-4 col-form-label">Minuman</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="no" name="minuman" placeholder="Masukan Nama Menu">
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="menutambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data menu -->
    
@endsection