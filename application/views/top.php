
  <div class="bg-dark navbar-dark text-white">
    <div class="">
      <nav class="navbar px-0 navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="<?= base_url('admin/my_dashboard') ?>"  style="padding: 0px;">
          <img src="<?= base_url('assets/img/fli_logo.png'); ?>" width="100">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a href="#" class="pl-md-0 p-3 text-white">Home</a>
            <a href="<?= base_url('admin/my_dashboard') ?>" class="pl-md-0 p-3 text-white">My Dashboard</a>
            <a href="<?= base_url('admin/dashboard') ?>" class="p-3 text-decoration-none text-white">Turnover Dashboard</a>
            <a href="<?= base_url('admin/schedule') ?>" class="p-3 text-decoration-none text-white">Turnover Schedule</a>
            <a href="<?= base_url('admin/administration') ?>" class="p-3 text-decoration-none text-white">Administration</a>
          </div>

          <div class="navbar-nav ml-auto">
            <a href="#" class="p-3 text-decoration-none text-white " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome Back, <b><?= user('firstname') ?>!</b></a>
            <a class="p-3 text-decoration-none text-white" href="<?= base_url('auth/logout/'.user('id')); ?>"><span class="fa fa-sign-out-alt"></span> Logout</a>
          </div>

        </div>


      </nav>

    </div>
  </div>

<div class="ajax_loader hidden-loader">
  <i style="font-size: 100px;" class="fa fa-spinner fa-spin"></i>
</div>
<!-- 
  Message/Alert box 
  Added: Ben Zarmaynine E. Obra
  Date: 11-13-19
-->
<div class="container">
    <div class="messagebox alert alert-success alert-dismissible fade show" style="display: none"></div>
</div>
<!-- End -->


