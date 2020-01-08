<!doctype html>
<html lang="en">
    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="<?= base_url('assets/img/FLI.png') ?>" alt="">
        <h2>Confirmation form</h2>
        <p class="lead">To Confirm your schedule you need to enter your given customer number below.</p>
      </div>
      <div class="row">
        <div class="col-md-12 order-md-12">
          <form action="<?= base_url('default_user/confirmed'); ?>" method="post" role="form" class="needs-validation">
            <div class="row">
              <div class="col-md-12 mb-12">
                <label for="customer_number">Enter your Customer Number</label>
                <input type="hidden" class="form-control" id="ticket_number" value="<?= $get_customers->customer_number?>" >
                <input type="text" class="form-control" id="customer_number" placeholder="Customer Number Here" required>
                <small class="text-muted">Your customer number</small>
                <div class="invalid-feedback">
                  Customer number is must!
                </div>
              </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Confirm Your Schedule</button>
          </form>
        </div>
      </div>
    </div>
</html>
