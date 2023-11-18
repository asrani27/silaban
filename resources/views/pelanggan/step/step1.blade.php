@extends('layouts.app')
@push('css')
<link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">
<style>
    .kbw-signature { width: 100%; height: 200px;}

    #sig canvas{

        width: 100% !important;

        height: auto;

    }
</style>
@endpush
@section('content')
<section class="content">
  
  @include('pelanggan.welcome')
  <a href="/pelanggan/timeline/{{$id}}" class="btn btn-sm btn-primary "><i class="fa fa-arrow-left"></i> Kembali</a><br/><br/>

  <div class="row">
    <div class="col-md-12">

        <div class="box">
            <div class="box-header text-center bg-warning" >
                <h3 class="box-title">ISI PERMOHONAN</h3>
            </div>
            <form method="post" action="/pelanggan/timeline/{{$id}}/permohonan">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label>Nama Pelanggan / Instansi</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kegiatan</label>
                        <input type="text" class="form-control" name="jenis" required>
                    </div>
                    <div class="form-group">
                        <label>Personel Penghubung</label>
                        <input type="text" class="form-control" name="personel" required>
                    </div>
                    <div class="form-group">
                        <label>No Telp</label>
                        <input type="text" class="form-control" name="telp" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label>Pembayaran</label>
                        <select class="form-control" name="pembayaran" required>
                            <option value="">-pilih-</option>
                            <option value="TUNAI">TUNAI</option>
                            <option value="NON TUNAI">NON TUNAI</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tujuan Pengujian Sample</label>
                        <input type="text" class="form-control" name="tujuan" required>
                    </div>
                    <div class="form-group">
                        <label>Bidang Pengujian</label>
                        <select class="form-control" name="bidang" required>
                            <option value="">-pilih-</option>
                            <option value="AIR LIMBAH">AIR LIMBAH</option>
                            <option value="AIR SUNGAI">AIR SUNGAI</option>
                            <option value="UDARA AMBIEN">UDARA AMBIEN</option>
                            <option value="KEBISINGAN">KEBISINGAN</option>
                        </select>
                    </div>
                    {{-- <div class="form-group">
                        <label>Parameter uji :</label>
                        <div class="checkbox">
                        <label>
                            <input type="checkbox" name="parameter_uji[]" value="suhu">
                            Suhu
                        </label>
                        </div>
                        <div class="checkbox">
                        <label>
                            <input type="checkbox" name="parameter_uji[]" value="ph">
                            pH
                        </label>
                        </div>
                        <div class="checkbox">
                        <label>
                            <input type="checkbox" name="parameter_uji[]" value="dhl">
                            DHL
                        </label>
                        </div>
                        <div class="checkbox">
                        <label>
                            <input type="checkbox" name="parameter_uji[]" value="tss">
                            TSS
                        </label>
                        </div>
                        <div class="checkbox">
                        <label>
                            <input type="checkbox" name="parameter_uji[]" value="tds">
                            TDS
                        </label>
                        </div>
                        <div class="checkbox">
                        <label>
                            <input type="checkbox" name="parameter_uji[]" value="do">
                            DO
                        </label>
                        </div>
                        <div class="checkbox">
                        <label>
                            <input type="checkbox" name="parameter_uji[]" value="cod">
                            COD
                        </label>
                        </div>
                        <div class="checkbox">
                        <label>
                            <input type="checkbox" name="parameter_uji[]" value="kesahadan">
                            Kesadahan
                        </label>
                        </div>
                        <div class="checkbox">
                        <label>
                            <input type="checkbox" name="parameter_uji[]" value="klorida">
                            Klorida
                        </label>
                        </div>
                    </div> --}}

                    {{-- <div class="form-group">
                        <label>Tanda Tangan</label>
                        <div id="sig" ></div>
                        <button id="clear" class="btn btn-danger btn-sm">Clear Signature</button>
                    </div> --}}
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

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
<link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet"> 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
<script type="text/javascript">

    var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});

    $('#clear').click(function(e) {

        e.preventDefault();

        sig.signature('clear');

        $("#signature64").val('');

    });

</script>
<script>
  $(document).on('click', '.step1', function() {
    $('#step1').val($(this).data('id'));
     $("#modal-step1").modal();
  });
</script>
@endpush
