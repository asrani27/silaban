@extends('layouts.app')
@push('css')
    
@endpush
@section('content')
<section class="content">
  
  @include('pelanggan.welcome')
  <a href="/pelanggan/permohonan/add" class="btn btn-sm btn-primary "><i class="fa fa-plus-circle"></i> Tambah Permohonan</a><br/><br/>

  <div class="row">
    <div class="col-xs-12">
      <div class="box" style="border-top-color: #37517e;">
        <div class="box-header">
          <h3 class="box-title">Daftar Permohonan</h3>
  
          <div class="box-tools">
            <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
              <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
  
              <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive table-bordered">
          <table class="table table-hover">
            <tbody>
              <tr>
              <th>No</th>
              <th>Tanggal</th>
              <th>Pemohon</th>
              <th>Telp</th>
              <th>Progress</th>
              <th>Download Invoice</th>
              <th>Upload Bukti Bayar</th>
              <th>Download LHU</th>
              <th>Aksi</th>
            </tr>

            @foreach ($data as $key =>$item)
                  
            <tr>
              <td>{{$key + 1}}</td>
              <td>{{$item->tanggal}}</td>
              <td>{{$item->nama}}</td>
              <td>{{$item->telp}}</td>
              <td>
                
                <div class="progress progress-xs progress-striped active">
                  <div class="progress-bar progress-bar-success" style="width: {{$item->step * 6.25}}%"></div>
                </div>
                <span class="badge bg-green">{{$item->step * 6.25}}%</span>
              </td>
              
              <td>

                <a href="#" class="btn bg-purple btn-xs"><strong><i class="fa fa-download"></i>
                   Invoice </strong></a>
              </td>
              <td>

                <a href="#" class="btn btn-primary btn-xs"><strong><i class="fa fa-upload"></i>
                   Bukti Bayar </strong></a>
              </td>
              <td>

                <a href="#" class="btn bg-purple btn-xs"><strong><i class="fa fa-download"></i>
                   LHU </strong></a>
              </td>
              <td>
                <a href="/pelanggan/timeline/{{$item->id}}" class="btn btn-success btn-xs"><strong><i class="fa fa-code-fork"></i>
                Timeline</strong></a>
                @if ($item->step == null)
                <a href="/pelanggan/permohonan/delete/{{$item->id}}" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin di hapus');"><strong><i class="fa fa-trash"></i>
                  Delete</strong></a>
                @endif
              </td>
            </tr>
            @endforeach
            
           </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>


@endsection
@push('js')

@endpush
