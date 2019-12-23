<div class="d-block my-3">
  <div class="custom-control custom-radio">
    <input id="9am" name="schedule_time" data-input="<?= $avail1 ?>" value="9" type="radio" class="custom-control-input" 
    required>
    <label class="custom-control-label" for="9am"> 9AM</label>
    <span style="color:red;font-weight: 600;" id="for9"><?= $reserved1; ?></span><br>
  </div>
  <div class="custom-control custom-radio">
    <input id="11am" name="schedule_time" data-input="<?= $avail2 ?>" value="11" type="radio" class="custom-control-input" 
    required>
    <label class="custom-control-label" for="11am"> 11AM</label>
    <span style="color:red;font-weight: 600;" id="for11"><?= $reserved2; ?></span><br>
  </div>
  <div class="custom-control custom-radio">
    <input id="2pm" name="schedule_time" data-input="<?= $avail3 ?>" value="14" type="radio" class="custom-control-input"
    required>
    <label class="custom-control-label" for="2pm"> 2PM</label>
    <span style="color:red;font-weight: 600;" id="for2"><?= $reserved3; ?></span><br>
  </div>
   <!-- <div class="custom-control custom-radio">
    <input id="4pm" name="schedule_time" data-input="<?= $avail4 ?>" value="16" type="radio" class="custom-control-input"
    required>
    <label class="custom-control-label" for="4pm"> 4PM</label>
    <span style="color:red;font-weight: 600;"><?= $reserved4; ?></span><br>
  </div> -->
 
</div>

<script type="text/javascript">
  
  $('body').on('click','#9am,#11am,#2pm, #4pm',function(){
    form = $(this).closest('form');
    avail = $(this).attr('data-input');
    formData = form.serialize();

    check_availability(avail,formData);
    console.log(formData);
  });
</script>