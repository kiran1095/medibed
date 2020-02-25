<?php 
  $content = '<div class="row">
                <!-- left column -->
                <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Add Patient</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputName1">Name</label>
                          <input type="text" class="form-control" id="name" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email address</label>
                          <input type="email" class="form-control" id="email" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputName1">Phone</label>
                          <input type="text" class="form-control" id="phone" placeholder="Enter Phone">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Gender</label>
                            <div class="radio">
                                <label>
                                <input type="radio" name="gender" id="optionsRadios1" value="0" checked="">
                                Male
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                <input type="radio" name="gender" id="optionsRadios2" value="1">
                                Female
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputName1">Health_issue</label>
                          <input type="text" class="form-control" id="health_issue" placeholder="Enter Health Issue">
                        </div>
                        <div class="form-group">
                        <label for="exampleInputName1">Consultant Doctor</label>
                        <input type="text" class="form-control" id="assigned_doctor" placeholder="Enter Doctor Name">
                      </div>
                      <div class="form-group">
                      <label for="exampleInputName1">Consultant Nurse</label>
                      <input type="text" class="form-control" id="assigned_nurse" placeholder="Enter Nurse Name">
                    </div>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                        <input type="button" class="btn btn-primary" onClick="AddPatient()" value="Submit"></input>
                      </div>
                    </form>
                  </div>
                  <!-- /.box -->
                </div>
              </div>';
  include('../master.php');
?>
<script>
  function AddPatient(){

        $.ajax(
        {
            type: "POST",
            url: '../api/patient/create1.php',
            dataType: 'json',
            data: {
                name: $("#name").val(),
                email: $("#email").val(),        
                phone: $("#phone").val(),
                gender: $("input[name='gender']:checked").val(),
                health_issue: $("#health_issue").val(),
                assigned_doctor: $("#assigned_doctor").val(),
                assigned_nurse: $("#assigned_nurse").val()
            },
            error: function (result) {
                alert("successfully added patient");
                window.location.href = '/medibed/master.php';
            },
            success: function (result) {
                if (result['status'] == true) {
                    alert("Successfully Added Patient Record!");
                    window.location.href = '/medibed/master.php';
                }
                else {
                    alert(result['message']);
                }
            }
        });
    }
</script>