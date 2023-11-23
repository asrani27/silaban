@extends('layouts.app')
@push('css')
    
@endpush
@section('content')
<div class="row text-center">
    <img src="/logo/pemko.png" width="80px">
<h3>Selamat Datang di <br/>Aplikasi SILABAN, berikut ini daftar pemohon yang mengajukan Sampling Dan Pengujian Kualitas Lingkungan </h3>
</div>
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
            <th>Upload Invoice</th>
            <th>Download Bukti Bayar</th>
            <th>Upload LHU</th>
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
            <td></td>
            <td></td>
            <td>
              <a href="/superadmin/timeline/{{$item->id}}" class="btn btn-success btn-xs"><strong><i class="fa fa-code-fork"></i>
              Timeline</strong></a>
              <a href="/superadmin/permohonan/delete/{{$item->id}}" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin di hapus');"><strong><i class="fa fa-trash"></i>
              Delete</strong></a>
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
{{-- <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>150</h3>

          <p>New Orders</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3>53<sup style="font-size: 20px">%</sup></h3>

          <p>Bounce Rate</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>44</h3>

          <p>User Registrations</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3>65</h3>

          <p>Unique Visitors</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
</div> --}}
@endsection
@push('js')

@endpush
