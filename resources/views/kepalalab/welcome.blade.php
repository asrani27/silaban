<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="info-box bg-blue">
        <span class="info-box-icon"><i class="fa fa-user-o"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Selamat Datang Di Aplikasi SILABAN</span>
          <span class="info-box-number">Hi, {{Auth::user()->name}}  ({{Auth::user()->roles()->first()->name}})</span>

          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
              <span class="progress-description">
               -
              </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
  </div>