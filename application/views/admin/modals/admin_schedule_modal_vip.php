
<div class="d-block my-3">
<div class="custom-control custom-radio">
    <input id="8am" name="schedule_time" value="8" type="radio" class="custom-control-input" 
    required>
    <label class="custom-control-label" for="8am"> 8AM</label>
    <span style="color:red;font-weight: 600;" id="8am"></span><br>
  </div>
  <div class="custom-control custom-radio">
    <input id="9am" name="schedule_time" value="9" type="radio" class="custom-control-input" 
    required>
    <label class="custom-control-label" for="9am"> 9AM</label>
    <span style="color:red;font-weight: 600;" id="9AM"></span><br>
  </div>
  <div class="custom-control custom-radio">
    <input id="10am" name="schedule_time" value="10" type="radio" class="custom-control-input" 
    required>
    <label class="custom-control-label" for="10am"> 10AM</label>
    <span style="color:red;font-weight: 600;" id="10AM"></span><br>
  </div>
  <div class="custom-control custom-radio">
    <input id="11am" name="schedule_time" value="11" type="radio" class="custom-control-input" 
    required>
    <label class="custom-control-label" for="11am"> 11AM</label>
    <span style="color:red;font-weight: 600;" id="11AM"></span><br>
  </div>
  <div class="custom-control custom-radio">
    <input id="12am" name="schedule_time" value="12" type="radio" class="custom-control-input" 
    required>
    <label class="custom-control-label" for="12am"> 12AM</label>
    <span style="color:red;font-weight: 600;" id="12am"></span><br>
  </div>
  <div class="custom-control custom-radio">
    <input id="13pm" name="schedule_time" value="13" type="radio" class="custom-control-input"
    required>
    <label class="custom-control-label" for="13pm"> 1PM</label>
    <span style="color:red;font-weight: 600;" id="13pm"></span><br>
  </div>
  <div class="custom-control custom-radio">
    <input id="14pm" name="schedule_time" value="14" type="radio" class="custom-control-input"
    required>
    <label class="custom-control-label" for="14pm"> 2PM</label>
    <span style="color:red;font-weight: 600;" id="14pm"></span><br>
  </div>
  <div class="custom-control custom-radio">
    <input id="15pm" name="schedule_time"  value="3" type="radio" class="custom-control-input"
    required>
    <label class="custom-control-label" for="15pm"> 3PM</label>
    <span style="color:red;font-weight: 600;" id="15pm"></span><br>
  </div>

    <div class="custom-control custom-radio">
      <input id="16pm" name="schedule_time" value="16" type="radio" class="custom-control-input"
      required>
      <label class="custom-control-label" for="16pm"> 4PM</label>
      <span style="color:red;font-weight: 600;" id="16pm"></span><br>
    </div> 

    <div class="custom-control custom-radio">
      <input id="17pm" name="schedule_time"  value="17" type="radio" class="custom-control-input"
      required>
      <label class="custom-control-label" for="17pm"> 5PM</label>
      <span style="color:red;font-weight: 600;" id="17PM"></span><br>
    </div>
 
</div>

<script type="text/javascript">
  
  $('body').on('click','#8am, #9am, #10am, #11am, #12am, #13pm, #14pm, #15pm ,#16pm , #17pm',function(){
    form = $(this).closest('form');
    avail = $(this).attr('data-input');
    formData = form.serialize();

    check_availability(avail,formData);
    console.log(formData);
  });
</script>