<?php 
  $content = '
                <div class="row" style="margin-top:10%;margin-left:20%;">
                <!-- left column -->
                <div class="col-md-6">
                  <!-- general form elements -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Admin Login</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputEmail">Email</label>
                          <input type="text" class="form-control" id="email" placeholder="Enter Email address">
                          <label for="password">Password</label>
                          <input type="password" class="form-control" id="email" placeholder="Enter Password">
                        </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                        <input type="button" class="btn btn-primary" onClick="CheckUser()" value="Submit"></input>
                      </div>
                    </form>
                  </div>
                  <!-- /.box -->
                </div>
              </div>';
  include('../home.php');
?>
<script>
  function CheckUser(){

        $.ajax(
        {
            type: "POST",
            url: '../api/admin/login.php',
            dataType: 'json',
            data: {
                
                email: $("#email").val(),        
                password: $("#password").val(),
                },
                error: function (result) {
                alert("Please check the error in your code");
            },
            success: function (result) {
                if (result[status] == "true") {
                    alert("Welcome Admin");
                    window.location.href = '/medibed/Doctor/master.php';
                }
                else {
                    alert(result['message']);
                }
            }
        });
    }
</script>
