<?php 

$time = array(); $reserved1 = ''; $reserved2 = ''; $reserved3 = ''; $reserved4 = '';
  $default_time = array('9','11','14', '16');

  $scheds = $this->Admin_model->get_schedules_per_date($sched);
    foreach($scheds as $sched) :
      $time[] = date("H",strtotime($sched->schedule));
    endforeach;
   ?>
<div class="d-block my-3">
  <div class="custom-control custom-radio">

    <input id="9am" name="schedule_time" value="9" type="radio" class="custom-control-input" <?php if (in_array('9',$time)): $reserved1='- RESERVED'; echo 'disabled'; endif;?> required>
    <label class="custom-control-label" for="9am"> 9AM</label>
    <span style="color:red;font-weight: 600;"><?= $reserved1; ?></span><br>
  </div>
  <div class="custom-control custom-radio">
    <input id="11am" name="schedule_time" value="11" type="radio" class="custom-control-input" <?php if (in_array('11',$time)): $reserved2='- RESERVED'; echo 'disabled'; endif;?> required>
    <label class="custom-control-label" for="11am"> 11AM</label>
    <span style="color:red;font-weight: 600;"><?= $reserved2; ?></span><br>
  </div>
  <div class="custom-control custom-radio">
    <input id="2pm" name="schedule_time" value="14" type="radio" class="custom-control-input" <?php if (in_array('14',$time)): $reserved3='- RESERVED'; echo 'disabled'; endif;?> required>
    <label class="custom-control-label" for="2pm"> 2PM</label>
    <span style="color:red;font-weight: 600;"><?= $reserved3; ?></span><br>
  </div>
  <?php if(user('position') == '5'):  ?>
      <div class="custom-control custom-radio">
        <input id="4pm" name="schedule_time" value="16" type="radio" class="custom-control-input" <?php if (in_array('16',$time)): $reserved4='- RESERVED'; echo 'disabled'; endif;?> required>
        <label class="custom-control-label" for="4pm"> 4PM</label>
        <span style="color:red;font-weight: 600;"><?= $reserved4; ?></span><br>
      </div>
  <?php endif; ?>
</div>
