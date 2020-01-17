
<!-- <input type="text" id="associate" name="associate" value="<?= $assign_to; ?>" class="form-control" > -->
<div class="d-block my-3">
  <div class="custom-control custom-radio">
    <input id="9amx" name="schedule_time" value="9 AM" type="radio" class="custom-control-input" 
    required>
    <label class="custom-control-label" for="9amx"> 9AM</label>
    <span style="color:red;font-weight: 600;"></span><br>
  </div>
  <div class="custom-control custom-radio">
    <input id="11amx" name="schedule_time" value="11 AM" type="radio" class="custom-control-input" 
    required>
    <label class="custom-control-label" for="11amx"> 11AM</label>
    <span style="color:red;font-weight: 600;"></span><br>
  </div>
  <div class="custom-control custom-radio">
    <input id="2pmx" name="schedule_time"  value="2 PM" type="radio" class="custom-control-input"
    required>
    <label class="custom-control-label" for="2pmx"> 2PM</label>
    <span style="color:red;font-weight: 600;"><</span><br>
  </div>
   <div class="custom-control custom-radio">
    <input id="4pmx" name="schedule_time" value="4 PM" type="radio" class="custom-control-input"
    required>
    <label class="custom-control-label" for="4pmx"> 4PM</label>
    <span style="color:red;font-weight: 600;"></span><br>
  </div>
 
</div>

<script type="text/javascript">
  $('body').on('click','#9amx,#11amx,#2pmx, #4pmx',function(){
   formData = $('form').serialize();
    avail = $(this).attr('data-input');

    check_availability(avail,formData);
    
  });
</script>