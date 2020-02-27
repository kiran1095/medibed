<?php 
  $content = '<div class="row">
                <!-- left column -->
                <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Add Nurse</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                      <div class="box-body">
                       
                        <div class="form-group">
                          <label for="Phone">Phone</label>
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
                          <label for="Completed_course">Studied</label>
                          <input type="text" class="form-control" id="Study" placeholder="Enter Completed Course">
                        </div>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                        <input type="button" class="btn btn-primary" onClick="AddNurse()" value="Submit"></input>
                      </div>
                    </form>
                  </div>
                  <!-- /.box -->
                </div>
              </div>';
  include('../nurse.php');
?>
<script>
  function AddNurse(){

        $.ajax(
        {
            type: "POST",
            url: '../api/nurse/create.php',
            dataType: 'json',
            data: {
              phone: $("#phone").val(),
              address: $("#address").val(),
              gender: $("input[name='gender']:checked").val(),
              study: $("#study").val()
            },
            error: function (result) {
                alert(result.responseText);
            },
            success: function (result) {
                if (result['status'] == true) {
                    alert("Successfully Added New Nurse!");
                    window.location.href = '/medibed/.php';
                }
                else {
                    alert(result['message']);
                }
            }
        });
    }
</script>