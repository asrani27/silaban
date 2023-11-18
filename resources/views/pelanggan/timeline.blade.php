@extends('layouts.app')
@push('css')
    
@endpush
@section('content')
<section class="content">
  
  @include('pelanggan.welcome')
  <a href="/pelanggan/home" class="btn btn-sm btn-primary "><i class="fa fa-arrow-left"></i> Kembali</a><br/><br/>

  <div class="row">
    <div class="col-md-12">
        <div class="box box-body">
      <!-- The time line -->
            <ul class="timeline">
                <!-- timeline time label -->
                <li class="time-label">
                    <span class="bg-red">
                        {{\Carbon\Carbon::parse($data->tanggal)->translatedFormat('d F Y')}}
                    </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <li>

                @if ($data->step >= 1)
                <i class="fa bg-green" style="font-family:Arial, Helvetica, sans-serif"><strong>1</strong></i>
                @else
                <i class="fa bg-gray" style="font-family:Arial, Helvetica, sans-serif"><strong>1</strong></i>
                @endif

                <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> {{\Carbon\Carbon::parse($data->tanggal)->translatedFormat('d F Y')}} 12:05</span>

                    <h3 class="timeline-header"><a href="#">Pemohon</a></h3>

                    <div class="timeline-body">
                        @if ($data->step == null)
                            @if ($data->step_satu == null)
                            <a href="/pelanggan/timeline/{{$data->id}}/permohonan" class="btn btn-success btn-xs" data-id="{{$data->id}}"><i class="fa fa-edit"></i>  Isi Permohonan Pengujian </a>
                            @else
                            <a href="/pelanggan/timeline/{{$data->id}}/editpermohonan" class="btn btn-danger btn-xs" data-id="{{$data->id}}"><i class="fa fa-edit"></i>  Edit Permohonan Pengujian </a>
                            @endif
                        @endif
                        <a href="/pelanggan/timeline/{{$data->id}}/wordpermohonan" class="btn btn-primary btn-xs"><i class="fa fa-file"></i>  Word </a>

                        @if ($data->step == null)
                        <a href="/pelanggan/timeline/{{$data->id}}/kirimpermohonan" class="btn btn-success btn-xs" data-id="{{$data->id}}" onclick="return confirm('Yakin data anda sudah benar, setelah mengirim anda tidak bisa mengedit data permohonan?');"><i class="fa fa-send"></i>  Kirim </a>
                        @endif
                    </div>
                    
                </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline item -->

                <li>
                    
                @if ($data->step >= 2)
                <i class="fa bg-green" style="font-family:Arial, Helvetica, sans-serif"><strong>2</strong></i>
                @else
                <i class="fa bg-gray" style="font-family:Arial, Helvetica, sans-serif"><strong>2</strong></i>
                @endif
                    
                <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> {{\Carbon\Carbon::parse($data->tanggal)->translatedFormat('d F Y')}} 12:05</span>
                    <h3 class="timeline-header no-border"><a href="#">Petugas Administrasi</a></h3>
                    <div class="timeline-body">
                        
                        @if ($data->step_dua == null)
                        <span><i class="fa fa-hourglass"></i> Verifikasi Pembayaran </span><br/>
                        <span><i class="fa fa-hourglass"></i> Verifikasi Kaji Ulang, Permintaan, Tender Dan Kontrak </span>
                        @else
                        
                            @if ($data->step_dua->verifikasi_pembayaran == 1)
                            <span class="text-green"><i class="fa fa-check"></i> Verifikasi Pembayaran </span><br/>
                            @else
                            <span><i class="fa fa-hourglass"></i> Verifikasi Pembayaran </span><br/>
                                
                            @endif
                            @if ($data->step_dua->verifikasi_kaji == 1)
                            <span class="text-green"><i class="fa fa-check"></i> Verifikasi Kaji Ulang, Permintaan, Tender Dan Kontrak </span>
                            @else
                            <span><i class="fa fa-hourglass"></i> Verifikasi Kaji Ulang, Permintaan, Tender Dan Kontrak </span>
                                
                            @endif
                        @endif
                        
                        {{-- <i class="fa fa-send"></i> Mengirim Invoice ke pemohon<br/> 
                        <i class="fa fa-money"></i> Upload Bukti Bayar <br/>
                        <i class="fa fa-money"></i> Verifikasi Pembayaran --}}

                        
                    </div>
                </div>
                </li>
                
                
                <li>
                @if ($data->step >= 3)
                <i class="fa bg-green" style="font-family:Arial, Helvetica, sans-serif"><strong>3</strong></i>
                @else
                <i class="fa bg-gray" style="font-family:Arial, Helvetica, sans-serif"><strong>3</strong></i>
                @endif
                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> {{\Carbon\Carbon::parse($data->tanggal)->translatedFormat('d F Y')}} 12:05</span>
                        <h3 class="timeline-header no-border"><a href="#">Penyelia & Pengawas Teknis (-)</a></h3>
                        <div class="timeline-body">
                            
                            @if ($data->step_tiga == null)
                            <span><i class="fa fa-hourglass"></i> Verifikasi Rencana Pengambilan Sampel </span>
                            @else
                            
                                @if ($data->step_tiga->verifikasi_pengambilan_Sampel == 1)
                                <span class="text-green"><i class="fa fa-check"></i> Verifikasi Rencana Pengambilan Sampel </span>
                                @else
                                <span><i class="fa fa-hourglass"></i> Verifikasi Rencana Pengambilan Sampel </span>
                                @endif
                            @endif
                        </div>
                    </div>
                    </li>
                
                <li>
                @if ($data->step >= 4)
                <i class="fa bg-green" style="font-family:Arial, Helvetica, sans-serif"><strong>4</strong></i>
                @else
                <i class="fa bg-gray" style="font-family:Arial, Helvetica, sans-serif"><strong>4</strong></i>
                @endif
                <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> {{\Carbon\Carbon::parse($data->tanggal)->translatedFormat('d F Y')}} 12:05</span>
                    <h3 class="timeline-header no-border"><a href="#">Petugas Administrasi</a></h3>
                    <div class="timeline-body">Surat Perintah Pengambilan Sampel <br/>
                        <i class="fa fa-print"></i> Cetak Surat<br/> 
                    </div>
                </div>
                </li>

                <li>
                @if ($data->step >= 5)
                <i class="fa bg-green" style="font-family:Arial, Helvetica, sans-serif"><strong>5</strong></i>
                @else
                <i class="fa bg-gray" style="font-family:Arial, Helvetica, sans-serif"><strong>5</strong></i>
                @endif
                <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> {{\Carbon\Carbon::parse($data->tanggal)->translatedFormat('d F Y')}} 12:05</span>
                    <h3 class="timeline-header no-border"><a href="#">Petugas Pengambil Contoh</a></h3>
                    <div class="timeline-body">Daftar Formulir Pengambilan Sampel<br/>
                        <i class="fa fa-refresh"></i> Tindak Lanjut Pengambilan Sampel<br/> 
                        <i class="fa fa-check"></i> Sudah Dilaksanakan<br/> 
                    </div>
                </div>
                </li>

                <li>
                    @if ($data->step >= 6)
                    <i class="fa bg-green" style="font-family:Arial, Helvetica, sans-serif"><strong>6</strong></i>
                    @else
                    <i class="fa bg-gray" style="font-family:Arial, Helvetica, sans-serif"><strong>6</strong></i>
                    @endif
                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> {{\Carbon\Carbon::parse($data->tanggal)->translatedFormat('d F Y')}} 12:05</span>
                        <h3 class="timeline-header no-border"><a href="#">Petugas Pengambil Contoh (-)</a></h3>
                        <div class="timeline-body">Berita Acara Dan Rekaman Data Pengambilan Sampel <br/>

                        <i class="fa fa-check"></i> Berkas Telah Diserahkan<br/> 
                        </div>
                    </div>
                </li>

                <li>
                    @if ($data->step >= 7)
                    <i class="fa bg-green" style="font-family:Arial, Helvetica, sans-serif"><strong>7</strong></i>
                    @else
                    <i class="fa bg-gray" style="font-family:Arial, Helvetica, sans-serif"><strong>7</strong></i>
                    @endif
                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> {{\Carbon\Carbon::parse($data->tanggal)->translatedFormat('d F Y')}} 12:05</span>
                        <h3 class="timeline-header no-border"><a href="#">Petugas Administrasi</a></h3>
                        <div class="timeline-body">Penerimaan Sampel  (Sampai Terbit LHU 14 Hari)<br/>

                        <i class="fa fa-check"></i> Sampel telah diterima<br/> 
                        </div>
                    </div>
                </li>

                <li>
                    @if ($data->step >= 8)
                    <i class="fa bg-green" style="font-family:Arial, Helvetica, sans-serif"><strong>8</strong></i>
                    @else
                    <i class="fa bg-gray" style="font-family:Arial, Helvetica, sans-serif"><strong>8</strong></i>
                    @endif
                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> {{\Carbon\Carbon::parse($data->tanggal)->translatedFormat('d F Y')}} 12:05</span>
                        <h3 class="timeline-header no-border"><a href="#">Petugas Administrasi (-)</a></h3>
                        <div class="timeline-body">penanganan Sampel <br/>

                        <i class="fa fa-check"></i> Sampel telah di identifikasi<br/> 
                        </div>
                    </div>
                </li>
                <li>
                    
                    @if ($data->step >= 9)
                    <i class="fa bg-green" style="font-family:Arial, Helvetica, sans-serif"><strong>9</strong></i>
                    @else
                    <i class="fa bg-gray" style="font-family:Arial, Helvetica, sans-serif"><strong>9</strong></i>
                    @endif
                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> {{\Carbon\Carbon::parse($data->tanggal)->translatedFormat('d F Y')}} 12:05</span>
                        <h3 class="timeline-header no-border"><a href="#">Pengawas Teknis & Penyelia (-)</a></h3>
                        <div class="timeline-body">Surat Perintah Pengujian Sampel <br/>

                            <i class="fa fa-check"></i> CC Pengawas Teknis<br/> 
                            <i class="fa fa-check"></i> Verifikasi Penyelia<br/> 
                        </div>
                    </div>
                </li>
                <li>
                    @if ($data->step >= 10)
                    <i class="fa bg-green" style="font-family:Arial, Helvetica, sans-serif"><strong>10</strong></i>
                    @else
                    <i class="fa bg-gray" style="font-family:Arial, Helvetica, sans-serif"><strong>10</strong></i>
                    @endif
                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> {{\Carbon\Carbon::parse($data->tanggal)->translatedFormat('d F Y')}} 12:05</span>
                        <h3 class="timeline-header no-border"><a href="#">Analis</a></h3>
                        <div class="timeline-body">Pengujian Sampel Dan Rekaman Teknis  <br/>

                            <i class="fa fa-check"></i> Sudah dilaksanakan<br/> 
                        </div>
                    </div>
                </li>

                <li>
                    
                    @if ($data->step >= 11)
                    <i class="fa bg-green" style="font-family:Arial, Helvetica, sans-serif"><strong>11</strong></i>
                    @else
                    <i class="fa bg-gray" style="font-family:Arial, Helvetica, sans-serif"><strong>11</strong></i>
                    @endif
                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> {{\Carbon\Carbon::parse($data->tanggal)->translatedFormat('d F Y')}} 12:05</span>
                        <h3 class="timeline-header no-border"><a href="#">Penyelia (-)</a></h3>
                        <div class="timeline-body">Verifikasi Rekaman Teknis <br/>

                            <i class="fa fa-check"></i> CC Pengawas Teknis<br/> 
                            <i class="fa fa-check"></i> Sudah di verifikasi<br/> 
                        </div>
                    </div>
                </li>

                <li>
                    
                    @if ($data->step >= 12)
                    <i class="fa bg-green" style="font-family:Arial, Helvetica, sans-serif"><strong>12</strong></i>
                    @else
                    <i class="fa bg-gray" style="font-family:Arial, Helvetica, sans-serif"><strong>12</strong></i>
                    @endif
                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> {{\Carbon\Carbon::parse($data->tanggal)->translatedFormat('d F Y')}} 12:05</span>
                        <h3 class="timeline-header no-border"><a href="#">Penyelia (-)</a></h3>
                        <div class="timeline-body">Rekapitulasi Hasil Uji, dari data kaji ulang<br/>

                            <i class="fa fa-check"></i> CC Pengawas Teknis<br/> 
                            <i class="fa fa-check"></i> Sudah di verifikasi<br/> 
                        </div>
                    </div>
                </li>

                <li> 
                    @if ($data->step >= 13)
                    <i class="fa bg-green" style="font-family:Arial, Helvetica, sans-serif"><strong>13</strong></i>
                    @else
                    <i class="fa bg-gray" style="font-family:Arial, Helvetica, sans-serif"><strong>13</strong></i>
                    @endif
                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> {{\Carbon\Carbon::parse($data->tanggal)->translatedFormat('d F Y')}} 12:05</span>
                        <h3 class="timeline-header no-border"><a href="#">Petugas Administrasi </a></h3>
                        <div class="timeline-body">Pengisian data Laporan Hasil Uji<br/>

                            <i class="fa fa-check"></i> Selesai di isi <br/> 
                        </div>
                    </div>
                </li>
                <li>
                    
                    @if ($data->step >= 14)
                    <i class="fa bg-green" style="font-family:Arial, Helvetica, sans-serif"><strong>14</strong></i>
                    @else
                    <i class="fa bg-gray" style="font-family:Arial, Helvetica, sans-serif"><strong>14</strong></i>
                    @endif
                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> {{\Carbon\Carbon::parse($data->tanggal)->translatedFormat('d F Y')}} 12:05</span>
                        <h3 class="timeline-header no-border"><a href="#">Kepala Sub Bagian Tata Usaha (-)</a></h3>
                        <div class="timeline-body">Verifikasi Laporan Hasil Uji<br/>

                            <i class="fa fa-check"></i> verifikasi Kepala TU<br/> 
                            <i class="fa fa-check"></i> verifikasi Pengawas Teknis<br/> 
                        </div>
                    </div>
                </li>
                <li>
                    
                    @if ($data->step >= 15)
                    <i class="fa bg-green" style="font-family:Arial, Helvetica, sans-serif"><strong>15</strong></i>
                    @else
                    <i class="fa bg-gray" style="font-family:Arial, Helvetica, sans-serif"><strong>15</strong></i>
                    @endif
                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> {{\Carbon\Carbon::parse($data->tanggal)->translatedFormat('d F Y')}} 12:05</span>
                        <h3 class="timeline-header no-border"><a href="#">Kepala Laboratorium </a></h3>
                        <div class="timeline-body">Pengesahan Laporan Hasil Uji<br/>

                            <i class="fa fa-check"></i> Pengesahan Laporan<br/> 
                            <i class="fa fa-check"></i> Cetak dan TTD<br/> 
                        </div>
                    </div>
                </li>
                <li>
                    
                    @if ($data->step >= 16)
                    <i class="fa bg-green" style="font-family:Arial, Helvetica, sans-serif"><strong>16</strong></i>
                    @else
                    <i class="fa bg-gray" style="font-family:Arial, Helvetica, sans-serif"><strong>16</strong></i>
                    @endif
                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> {{\Carbon\Carbon::parse($data->tanggal)->translatedFormat('d F Y')}} 12:05</span>
                        <h3 class="timeline-header no-border"><a href="#">Petugas Administrasi </a></h3>
                        <div class="timeline-body">Tanda Terima Laporan Hasil Uji<br/>

                            <i class="fa fa-check"></i> Upload LHU TTD<br/> 
                        </div>
                    </div>
                </li>
                <li>
                    
                    @if ($data->step >= 17)
                    <i class="fa bg-green" style="font-family:Arial, Helvetica, sans-serif"><strong>17</strong></i>
                    @else
                    <i class="fa bg-gray" style="font-family:Arial, Helvetica, sans-serif"><strong>17</strong></i>
                    @endif
                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> {{\Carbon\Carbon::parse($data->tanggal)->translatedFormat('d F Y')}} 12:05</span>
                        <h3 class="timeline-header no-border"><a href="#">Pemohon</a></h3>
                        <div class="timeline-body">Survey Kepuasan Pelanggan <br/>

                            <i class="fa fa-check"></i> Mengisi Formulir<br/> 
                        </div>
                    </div>
                </li>
                
                
                <li>
                <i class="fa fa-clock-o bg-gray"></i>
                </li>
            </ul>
        </div>
    </div>
    <!-- /.col -->
  </div>
  
@include('pelanggan.modal.step1')

</section>

@endsection
@push('js')


<script>
  $(document).on('click', '.uploadbuktibayar', function() {
    $('#timeline_id').val($(this).data('id'));
     $("#modal-upload").modal();
  });
</script>
@endpush
