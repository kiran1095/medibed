<?php 
  $content = '
                <div class="row" style="margin-top:10%;margin-left:20%;">
                <!-- left column -->
                <div class="col-md-6">
                  <!-- general form elements -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Sign Up</h3>
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
                    <div class="box-body">
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" id="password" placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                    <label for="user_type">Type of user</label>
                    <select class="form-control" id="user">
                      <option>Doctor</option>
                      <option>Patient</option>
                      <option>Nurse</option>
                    </select>
                    </div>
                    <!-- /.box-body -->
                      <div class="box-footer">
                        <input type="button" class="btn btn-primary" onClick="AddUser()" value="Submit"></input>
                      </div>
                    </form>
                  </div>
                  <!-- /.box -->
                </div>
              </div>';
  include('../home.php');
?>
<script>
  function AddUser(){

        $.ajax(
        {
            type: "POST",
            url: '../api/user/create.php',
            dataType: 'json',
            data: {
                name: $("#name").val(),
                email: $("#email").val(),        
                password: $("#password").val(),
                user: $("#user").val(),
                },
            error: function (result) {
                alert("please check the error in the code");
                //window.location.href = '/medibed/home.php';
            },
            success: function (result) {
                if (result['status'] == true) {
                    alert("Successfully Added user Record!");
                    window.location.href = '/medibed/home.php';
                }
                else {
                    alert(result['message']);
                }
            }
        });
    }
</script>