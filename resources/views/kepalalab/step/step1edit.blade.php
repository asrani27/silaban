@extends('layouts.app')
@push('css')
    
@endpush
@section('content')
<section class="content">
  
  @include('pelanggan.welcome')
  <a href="/pelanggan/timeline/{{$id}}" class="btn btn-sm btn-primary "><i class="fa fa-arrow-left"></i> Kembali</a><br/><br/>

  <div class="row">
    <div class="col-md-12">

        <div class="box">
            <div class="box-header text-center bg-warning" >
                <h3 class="box-title">EDIT PERMOHONAN</h3>
            </div>
            <form method="post" action="/pelanggan/timeline/{{$id}}/editpermohonan">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label>Nama Pelanggan / Instansi</label>
                        <input type="text" class="form-control" name="nama" value="{{$data->nama}}" required>
                        <input type="hidden" class="form-control" name="step1_id" value="{{$data->id}}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="{{$data->alamat}}" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kegiatan</label>
                        <input type="text" class="form-control" name="jenis" value="{{$data->jenis}}" required>
                    </div>
                    <div class="form-group">
                        <label>Personel Penghubung</label>
                        <input type="text" class="form-control" name="personel" value="{{$data->personel}}" required>
                    </div>
                    <div class="form-group">
                        <label>No Telp</label>
                        <input type="text" class="form-control" name="telp" value="{{$data->telp}}" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{$data->email}}" required>
                    </div>
                    <div class="form-group">
                        <label>Pembayaran</label>
                        <select class="form-control" name="pembayaran" required>
                            <option value="">-pilih-</option>
                            <option value="TUNAI" {{$data->pembayaran == "TUNAI" ? 'selected':''}}>TUNAI</option>
                            <option value="NON TUNAI" {{$data->pembayaran == "NON TUNAI" ? 'selected':''}}>NON TUNAI</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tujuan Pengujian Sample</label>
                        <input type="text" class="form-control" name="tujuan"  value="{{$data->tujuan}}" required>
                    </div>
                    <div class="form-group">
                        <label>Bidang Pengujian</label>
                        <select class="form-control" name="bidang" required>
                            <option value="">-pilih-</option>
                            <option value="AIR LIMBAH" {{$data->bidang == "AIR LIMBAH" ? 'selected':''}}>AIR LIMBAH</option>
                            <option value="AIR SUNGAI" {{$data->bidang == "AIR SUNGAI" ? 'selected':''}}>AIR SUNGAI</option>
                            <option value="UDARA AMBIEN" {{$data->bidang == "UDARA AMBIEN" ? 'selected':''}}>UDARA AMBIEN</option>
                            <option value="KEBISINGAN" {{$data->bidang == "KEBISINGAN" ? 'selected':''}}>KEBISINGAN</option>
                        </select>
                    </div>
                    {{-- //{{dd(json_decode($data->parameter_uji)[1] ?? null)}} --}}
                    <div class="form-group">
                        <label>Parameter uji :</label>
                        <div class="checkbox">
                        <label>
                            <input type="checkbox" name="parameter_uji[]" value="suhu" {{ in_array('suhu', json_decode($data->parameter_uji)) ? 'checked' : '' }}>
                            Suhu
                        </label>
                        </div>
                        <div class="checkbox">
                        <label>
                            <input type="checkbox" name="parameter_uji[]" value="ph" {{ in_array('ph', json_decode($data->parameter_uji)) ? 'checked' : '' }}>
                            pH
                        </label>
                        </div>
                        <div class="checkbox">
                        <label>
                            <input type="checkbox" name="parameter_uji[]" value="dhl" {{ in_array('dhl', json_decode($data->parameter_uji)) ? 'checked' : '' }}>
                            DHL
                        </label>
                        </div>
                        <div class="checkbox">
                        <label>
                            <input type="checkbox" name="parameter_uji[]" value="tss" {{ in_array('tss', json_decode($data->parameter_uji)) ? 'checked' : '' }}>
                            TSS
                        </label>
                        </div>
                        <div class="checkbox">
                        <label>
                            <input type="checkbox" name="parameter_uji[]" value="tds" {{ in_array('tds', json_decode($data->parameter_uji)) ? 'checked' : '' }}>
                            TDS
                        </label>
                        </div>
                        <div class="checkbox">
                        <label>
                            <input type="checkbox" name="parameter_uji[]" value="do" {{ in_array('do', json_decode($data->parameter_uji)) ? 'checked' : '' }}>
                            DO
                        </label>
                        </div>
                        <div class="checkbox">
                        <label>
                            <input type="checkbox" name="parameter_uji[]" value="cod" {{ in_array('cod', json_decode($data->parameter_uji)) ? 'checked' : '' }}>
                            COD
                        </label>
                        </div>
                        <div class="checkbox">
                        <label>
                            <input type="checkbox" name="parameter_uji[]" value="kesahadan" {{ in_array('kesadahan', json_decode($data->parameter_uji)) ? 'checked' : '' }}>
                            Kesadahan
                        </label>
                        </div>
                        <div class="checkbox">
                        <label>
                            <input type="checkbox" name="parameter_uji[]" value="klorida" {{ in_array('klorida', json_decode($data->parameter_uji)) ? 'checked' : '' }}>
                            Klorida
                        </label>
                        </div> 
                        
                        
                        
                        
                    </div>
                    <div class="form-group">
                        <label></label>
                        <button type="submit" class="btn btn-primary btn-block">KIRIM</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /.col -->
  </div>
  
@include('pelanggan.modal.step1')

</section>


@endsection
@push('js')


<script>
  $(document).on('click', '.step1', function() {
    $('#step1').val($(this).data('id'));
     $("#modal-step1").modal();
  });
</script>
@endpush
