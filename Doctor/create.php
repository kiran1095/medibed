<?php 
  $content = '<div class="row" style="margin-left:25%;margin-top:6%">
                <!-- left column -->
                <div class="col-md-6">
                  <!-- general form elements -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Profile</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                      <div class="box-body">
                        
                        <div class="form-group">
                          <label for="exampleInputName1">Phone</label>
                          <input type="text" class="form-control" id="phone" placeholder="Enter Phone">
                        </div>
                        <div class="form-group">
                          <label for="address">Address</label>
                          <input type="text" class="form-control" id="address" placeholder="Enter Address">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Gender</label>
                            <div class="radio">
                                <label>
                                <input type="radio" name="gender" id="optionsRadios1" value="Male" checked="">
                                Male
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                <input type="radio" name="gender" id="optionsRadios2" value="Female">
                                Female
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputSpecialist">Specialist</label>
                          <input type="text" class="form-control" id="specialist" placeholder="Enter Specialization">
                        </div>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                        <input type="button" class="btn btn-primary" onClick="AddDoctor()" value="Submit"></input>
                      </div>
                    </form>
                  </div>
                  <!-- /.box -->
                </div>
              </div>';
  include('../doctor.php');
?>
<script>
  function AddDoctor(){

        $.ajax(
        {
            type: "POST",
            url: '../api/doctor/create.php',
            dataType: 'json',
            data: {
                phone: $("#phone").val(),
                address: $("#address").val(),
                gender: $("input[name='gender']:checked").val(),
                specialist: $("#specialist").val()
            },
            error: function (result) {
                alert(result.responseText);
            },
            success: function (result) {
                if (result['status'] == true) {
                    alert("Successfully completed the profile of Doctor!");
                    window.location.href = '/medibed/Doctor';
                }
                else {
                    alert(result['message']);
                }
            }
        });
    }
</script>