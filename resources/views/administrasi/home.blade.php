@extends('layouts.app')
@push('css')
    
@endpush
@section('content')
<section class="content">
  
  @include('administrasi.welcome')
  
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
              
              <td>

                <a href="#" data-id="{{$item->id}}" class="btn bg-purple btn-xs uploadinvoice"><strong><i class="fa fa-upload"></i>
                   Invoice </strong></a>
              </td>
              <td>

                @if ($item->file_buktibayar != null)
                <a href="/storage/{{$item->user->username}}/{{$item->file_buktibayar}}"target="_blank" data-id="{{$item->id}}" class="btn btn-primary btn-xs"><strong><i class="fa fa-download"></i>Download
                  
                   @endif
              </td>
              <td>

                <a href="#" data-id="{{$item->id}}" class="btn bg-purple btn-xs uploadlhu"><strong><i class="fa fa-upload"></i>
                   LHU </strong></a>
              </td>
              <td>
                <a href="/administrasi/timeline/{{$item->id}}" class="btn btn-success btn-xs"><strong><i class="fa fa-code-fork"></i>
                Timeline</strong></a>
                
                <a href="#" class="btn btn-danger btn-xs"><strong><i class="fa fa-edit"></i>
                  Perlu Verifikasi</strong></a>
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

<div class="modal fade" id="modal-uploadinvoice">
  <div class="modal-dialog">
      <div class="modal-content">
          <form role="form" method="post" action="/pelanggan/uploadinvoice" enctype="multipart/form-data">
              @csrf
              
              <div class="modal-header" style="background-color:#37517e; color:white">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Upload Invoice.</h4>
              </div>

              <div class="modal-body">
                  
                  <div class="form-group">
                      <input type="hidden" class="form-control" id="step1" name="timeline_id" readonly>
                  </div>
                  <div class="form-group">
                      <label>Upload Invoice, JPG/PDF (Maks : 2MB)</label>
                      <input type="file" class="form-control" name="file" required>
                      <input type="hidden" class="form-control" name="timeline_id" id="invoice_id">
                  </div>
                 
              </div>

              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-send"></i>Kirim</button>
              </div>
          </form>
      </div>
  </div>
</div>

<div class="modal fade" id="modal-uploadlhu">
  <div class="modal-dialog">
      <div class="modal-content">
          <form role="form" method="post" action="/pelanggan/uploadlhu" enctype="multipart/form-data">
              @csrf
              
              <div class="modal-header" style="background-color:#37517e; color:white">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Upload LHU.</h4>
              </div>

              <div class="modal-body">
                  
                  <div class="form-group">
                      <input type="hidden" class="form-control" id="step1" name="timeline_id" readonly>
                  </div>
                  <div class="form-group">
                      <label>Upload LHU, JPG/PDF (Maks : 2MB)</label>
                      <input type="file" class="form-control" name="file" required>
                      <input type="hidden" class="form-control" name="timeline_id" id="lhu_id">
                  </div>
                 
              </div>

              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-send"></i>Kirim</button>
              </div>
          </form>
      </div>
  </div>
</div>
@endsection
@push('js')

<script>
  $(document).on('click', '.uploadinvoice', function() {
    $('#invoice_id').val($(this).data('id'));
     $("#modal-uploadinvoice").modal();
  });
</script>

<script>
  $(document).on('click', '.uploadlhu', function() {
    $('#lhu_id').val($(this).data('id'));
     $("#modal-uploadlhu").modal();
  });
</script>
@endpush
