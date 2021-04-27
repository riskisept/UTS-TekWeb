@extends('layout/template')

@section('title', 'Data Barang')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Data Barang</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active"></li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <strong>Data Seluruh Barang</strong>
                </div>
                <div class="pull-right">
                    <a href="{{ url('databarang/input') }}" class="btn btn-success btn-sm">
                        <i class="fa fa-plus"></i> ADD
                    </a>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                         <th>NO</th>
                         <th>ID BARANG</th>
                         <th>NAMA</th>
                         <th>JENIS KELAMIN</th>
                         <th>KETERANGAN</th>
                     </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawai as $item)
                         <tr>
                         <td>{{ $item->id}}</td>    
                         <td>{{ $item->barang_id}}</td>
                         <td>{{ $item->nama}}</td>
                         <td>{{ $item->jns_klmn}}</td>
                         <td>
                             <button type="button" class="btn btn-primary"><a href="{{ url('databarang/edit/'.$item->id) }}" class="edit">Edit</a></button>
                            <form action="{{ url('databarang/'.$item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>                 
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
