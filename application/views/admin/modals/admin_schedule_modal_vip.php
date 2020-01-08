<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                    <input onkeydown="return false;" type="text" class="form-control datetimepicker-input" data-target="#datetimepicker3"/>
                    <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker3').datetimepicker({
                    format: 'LT'
                });
            });
        </script>
    </div>
</div>

<script type="text/javascript">
  $('body').on('input','#datetimepicker3',function(){
    form = $(this).closest('form');
    avail = $(this).attr('data-input');
    formData = form.serialize();
    console.log();
    check_availability(avail,formData);
  });

</script>
