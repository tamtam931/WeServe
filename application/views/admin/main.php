<?= $this->load->view('top', '', TRUE) ?>

<?php $pwd_hist = $this->Admin_model->get_last_password_update_by_id(user('id')); ?>
<?php if($pwd_hist == NULL): ?>
    <div id="change_password" class="modal fade" role="dialog">
      <form action="<?= base_url('admin/change_password_required'); ?>" method="post" role="form">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Change Password</h4>
            </div>
            <div class="modal-body">
              <ul>
              <span>Before continuing, you need to change your current password. Please enter and confim your new password following the below rules:</span>
              <li> Minimum of 8 characters </li>
              <li> Combination of alphabet, number and special character </li>
              <li> Combination of upper and lowercase</li>
            </ul>
               <input type="hidden" class="form-control" name="logged_user" id="logged_user" value="<?= user('id'); ?>">
               <label for="new_password"> New Password</label>
               <input type="password" class="form-control" name="new_password" id="new_password" minlength="8" pattern="^(?=.*?[A-Z])(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\W]){1,})(?!.*\s).{8,}$" placeholder="Password" value="" title="- Password must be minimum of 8 characters. Combination of Alphabet, Numeric and Special Characters. Combination of Uppercase and Lowercase Letters" required>
               <label for="retype_password"> Re-type Password</label>
                <input type="password" class="form-control" name="retype_password" id="retype_password" minlength="8" pattern="^(?=.*?[A-Z])(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\W]){1,})(?!.*\s).{8,}$" placeholder="Password" value="" title="- Password must be minimum of 8 characters. Combination of Alphabet, Numeric and Special Characters. Combination of Uppercase and Lowercase Letters" required>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>

        </div>
    </form>
  </div> 

<?php elseif($pwd_hist): ?>
  <?php
  $last_update_dt = new DateTime($pwd_hist->date_changed);
  $date_now = new DateTime("now");
  if ($last_update_dt->diff($date_now)->days >= 90) : ?>

     <div id="change_password" class="modal fade" role="dialog">
      <form action="<?= base_url('admin/change_password_required'); ?>" method="post" role="form">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Change Password</h4>
            </div>
            <div class="modal-body">
              <ul>
              <span>Before continuing, you need to change your current password. Please enter and confim your new password following the below rules:</span>
              <li> Minimum of 8 characters </li>
              <li> Combination of alphabet, number and special character </li>
              <li> Combination of upper and lowercase</li>
            </ul>
               <input type="hidden" class="form-control" name="logged_user" id="logged_user" value="<?= user('id'); ?>">
               <label for="new_password"> New Password</label>
               <input type="password" class="form-control" name="new_password" id="new_password" minlength="8" pattern="^(?=.*?[A-Z])(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\W]){1,})(?!.*\s).{8,}$" placeholder="Password" value="" title="- Password must be minimum of 8 characters. Combination of Alphabet, Numeric and Special Characters. Combination of Uppercase and Lowercase Letters" required>
               <label for="retype_password"> Re-type Password</label>
                <input type="password" class="form-control" name="retype_password" id="retype_password" minlength="8" pattern="^(?=.*?[A-Z])(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\W]){1,})(?!.*\s).{8,}$" placeholder="Password" value="" title="- Password must be minimum of 8 characters. Combination of Alphabet, Numeric and Special Characters. Combination of Uppercase and Lowercase Letters" required>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>

        </div>
    </form>
  </div> 
  <?php endif; ?>
<?php endif; ?>
<div class="container py-5 mb5">
  <h3 class="mb-3">HOME</h3>
  HELLO THERE
</div>


<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> 
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
 $(window).on('load',function(){
    $('#change_password').modal({
      backdrop: 'static',
      keyboard: false,
      show: true
    }) 
});
</script>
<script type="text/javascript">
var base_url =  '<?php echo base_url() ?>';
 $(document).ready(function() {
    function blinker() {
      $('.blinker').fadeOut(500);
      $('.blinker').fadeIn(500);
    }
    setInterval(blinker, 1000);

     $('#calendar').fullCalendar({
       header: {
            left: 'today',
            center: 'title',
            right: 'month'
          },
          navLinks: true, // can click day/week names to navigate views
          editable: true,
          eventLimit: true, // allow "more" link when too many events
          eventSources: [
         {
             events: function(start, end, timezone, callback) {
                 $.ajax({
                 url: "<?php echo base_url('frontdesk/get_events'); ?>",
                 dataType: 'json',
                 data: {
                 // our hypothetical feed requires UNIX timestamps
                 start: start.unix(),
                 end: end.unix()
                 },
                 success: function(msg) {
                       var events = msg.events;
                       callback(events);
                   }
                 });
             }
         },
      ]
    });

  });
  </script>