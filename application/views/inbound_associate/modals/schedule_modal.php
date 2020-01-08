

<!-- <input type="text" id="associate" name="associate" value="<?= $assign_to; ?>" class="form-control" > -->
<div class="d-block my-3">
  <div class="custom-control custom-radio">
    <input id="9amx" name="schedule_time" data-input="<?= $avail1 ?>" value="9" type="radio" class="custom-control-input" 
    required>
    <label class="custom-control-label" for="9amx"> 9AM</label>
    <span style="color:red;font-weight: 600;"><?= $reserved1; ?></span><br>
  </div>
  <div class="custom-control custom-radio">
    <input id="11amx" name="schedule_time" data-input="<?= $avail2 ?>" value="11" type="radio" class="custom-control-input" 
    required>
    <label class="custom-control-label" for="11amx"> 11AM</label>
    <span style="color:red;font-weight: 600;"><?= $reserved2; ?></span><br>
  </div>
  <div class="custom-control custom-radio">
    <input id="2pmx" name="schedule_time" data-input="<?= $avail3 ?>" value="14" type="radio" class="custom-control-input"
    required>
    <label class="custom-control-label" for="2pmx"> 2PM</label>
    <span style="color:red;font-weight: 600;"><?= $reserved3; ?></span><br>
  </div>
   <div class="custom-control custom-radio">
    <input id="4pmx" name="schedule_time" data-input="<?= $avail4 ?>" value="16" type="radio" class="custom-control-input"
    required>
    <label class="custom-control-label" for="4pmx"> 4PM</label>
    <span style="color:red;font-weight: 600;"><?= $reserved4; ?></span><br>
  </div>
 
</div>

<script type="text/javascript">

  $('body').on('click','#9amx,#11amx,#2pmx, #4pmx',function(){
    //dateVal = $(this).val();
    formData = $('form').serialize();
    avail = $(this).attr('data-input');
 
    // check available associate
    // check project for turnover of available associate (before and after selected sched)
    // tagging if time is available or not


    check_availability(avail,formData);
    
  });
</script>