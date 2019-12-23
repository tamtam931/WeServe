<?php 

$time = array(); $associates = array();  $db_associates = array();
$reserved1 = ''; $reserved2 = ''; $reserved3 = ''; $disabled1=''; $disabled2=''; $disabled3='';
$default_time = array('9','11','14');
$assign_to = '';
	//$scheds = $this->Admin_model->get_schedules_per_date($sched);
  $users = $this->Admin_model->get_all_handover_associate();
  foreach ($users as $associate) {
    $associates[] = $associate->user_id;
  }
  
  $scheds = $this->Admin_model->get_schedules_per_date($sched);
  if($scheds) {
    // if with schedule, get all reserved associate per date
    foreach($scheds as $sched) :
     // $time[] = date("H",strtotime($sched->schedule));
      $datas = $this->Admin_model->get_schedules_per_exact_datetime($sched->schedule);
      foreach($datas as $data) :
        $time[] = date("H",strtotime($data->schedule));
        $db_associates[] = $data->assigned_to;

      endforeach;
      // findout the associate without schedule yet
      $diff = array_diff($associates, $db_associates);

      // disable input without available handover associate left
      if(!$diff && in_array('9',$time)) { $reserved1 = 'NOT AVAILABLE'; } 
      elseif(!$diff && in_array('11',$time)) { $reserved2 = 'NOT AVAILABLE';} 
      elseif(!$diff && in_array('14',$time)) { $reserved3 = 'NOT AVAILABLE';} 
    endforeach;

    
  } else {
    //if no sched, assign to random associate and set time to available
    //$assign_to = array_rand_value($associates,1);
    $time = array();
  }

  

		
	 ?>
<div class="d-block my-3">
  <div class="custom-control custom-radio">
    <input id="9am" name="schedule_time" value="9" type="radio" class="custom-control-input" 
    required>
    <label class="custom-control-label" for="9am"> 9AM</label>
    <span style="color:red;font-weight: 600;"><?= $reserved1; ?></span><br>
  </div>
  <div class="custom-control custom-radio">
    <input id="11am" name="schedule_time" value="11" type="radio" class="custom-control-input" 
    required>
    <label class="custom-control-label" for="11am"> 11AM</label>
    <span style="color:red;font-weight: 600;"><?= $reserved2; ?></span><br>
  </div>
  <div class="custom-control custom-radio">
    <input id="2pm" name="schedule_time" value="14" type="radio" class="custom-control-input"
    required>
    <label class="custom-control-label" for="2pm"> 2PM</label>
    <span style="color:red;font-weight: 600;"><?= $reserved3; ?></span><br>
  </div>
 
</div>
