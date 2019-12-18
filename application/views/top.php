
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
            <?php if(user('position') == 0): //admin ?>
              <a href="#" class="pl-md-0 p-3 text-white">Home</a>
              <a href="<?= base_url('admin/my_dashboard') ?>" class="pl-md-0 p-3 text-white">My Dashboard</a>
              <a href="<?= base_url('admin/dashboard') ?>" class="p-3 text-decoration-none text-white">Turnover Dashboard</a>
              <a href="<?= base_url('admin/schedule') ?>" class="p-3 text-decoration-none text-white">Turnover Schedule</a>
              
              <a href="<?= base_url('admin/customer_file') ?>" class="p-3 text-decoration-none text-white">Customer Master File</a>
              <a href="<?= base_url('admin/administration') ?>" class="p-3 text-decoration-none text-white">Administration</a>
            <?php elseif(user('position') == 6): //inbound associate ?>
              <a href="#" class="pl-md-0 p-3 text-white">Home</a>
              <a href="<?= base_url('inbound/my_dashboard') ?>" class="pl-md-0 p-3 text-white">My Dashboard</a>
              <a href="<?= base_url('inbound/dashboard') ?>" class="p-3 text-decoration-none text-white">Turnover Dashboard</a>
              <a href="<?= base_url('inbound/schedule') ?>" class="p-3 text-decoration-none text-white">Turnover Schedule</a>

            <?php elseif(user('position') == 7): // outbound associate?>
              <a href="#" class="pl-md-0 p-3 text-white">Home</a>
              <a href="<?= base_url('outbound/my_dashboard') ?>" class="pl-md-0 p-3 text-white">My Dashboard</a>
              <a href="<?= base_url('outbound/dashboard') ?>" class="p-3 text-decoration-none text-white">Turnover Dashboard</a>

             <?php elseif(user('position') == 10): // handover associate?>
              <a href="#" class="pl-md-0 p-3 text-white">Home</a>
              <a href="<?= base_url('handover/my_dashboard') ?>" class="pl-md-0 p-3 text-white">My Dashboard</a>
              <a href="<?= base_url('handover/dashboard') ?>" class="p-3 text-decoration-none text-white">Turnover Dashboard</a>
            <?php endif; ?>
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



