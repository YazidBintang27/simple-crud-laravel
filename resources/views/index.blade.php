@extends('layout.template')

@section('content')
<!-- START DATA -->
<div class="my-3 p-3 bg-body rounded shadow-sm">
      <!-- FORM PENCARIAN -->
      <div class="pb-3">
        <form class="d-flex" action="" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
      </div>
      
      <!-- TOMBOL TAMBAH DATA -->
      <div class="pb-3">
        <a href='{{url('mahasiswa/create')}}' class="btn btn-primary">+ Tambah Data</a>
      </div>

      <table class="table table-striped">
          <thead>
              <tr>
                  <th class="col-md-1">No</th>
                  <th class="col-md-3">NIM</th>
                  <th class="col-md-4">Nama</th>
                  <th class="col-md-2">Jurusan</th>
                  <th class="col-md-2">Aksi</th>
              </tr>
          </thead>
          <tbody>
            <?php $id = $data->firstItem() ?>
            @foreach ($data as $item)
                <tr>
                    <td>{{$id}}</td>
                    <td>{{$item->nim}}</td>
                    <td>{{$item->nama}}</td>
                    <td>{{$item->jurusan}}</td>
                    <td>
                        <a href='{{url('mahasiswa/' . $item->nim . '/edit')}}' class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{url('mahasiswa/' . $item->nim)}}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php $id++ ?>
            @endforeach
          </tbody>
      </table>
      {{$data->links()}}
</div>
@endsection
