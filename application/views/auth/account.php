<?= $this->load->view('header', '', TRUE) ?>

<div class="container py-5 mb5">
  <h2 style="color: red; font-weight: bolder;"><center>DEVELOPMENT ENVIRONMENT</center></h2>          
  <header class="page-header">
     <!-- date time here -->
  </header>
     
  <div class="row py-4">
    <div class="col-md-4 order-md-2 mb-4">

      <div class="card card-primary" style="width: 68rem;">
        <div class="card-header text-center" style= "background-color: #536391;color: #fff;height: 100px;">
          <span style= "font-size: 25px;font-weight: 600;letter-spacing: 2px;"> WeServe </span><br>
          <i>Signin</i>
        </div>
        <div class="card-body">
          <form action="<?=base_url('auth/login')?>" method="post" role="form">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="" value="" required>

                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="" value="" required>
                <br/>
                <?php if (isset($error) && !empty($error) ): ?>
                <div class="alert alert-danger fade show">
                    <span class="fa fa-exclamation-triangle"></span> <?= $error ?>
                </div>
                <?php elseif(isset($success)): ?>
                    <div class="alert alert-success fade show">
                      <span class="fa fa-exclamation-triangle"></span> <?= $success ?>
                    </div>
                <?php endif; ?>

                <hr class="mb-4">
                <button class="btn btn-primary btn-lg" type="submit"><span class="fa fa fa-sign-in"></span> LOGIN</button>
              </div>

              <div class="col-md-6 mb-3">
                <img src="<?= base_url('assets/img/FLI.png') ?>" class="img-responsive" style=" right: 0; bottom: 0; width: 90%; height: 140px;" alt="">
              </div>


            </div>
          </form>

        </div>
      </div>

    </div>
  </div>

</div>