<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MediBed</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="/medibed/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/medibed/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/medibed/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/medibed/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="/medibed/dist/css/skins/skin-blue.min.css">
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
                '<div class="row">
                <!-- left column -->
                <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Registration</h3>
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
                        <label for="user_select">Type of user</label>
                        <select class="form-control" id="user_select">
                          <option>Doctor</option>
                          <option>Patient</option>
                          <option>Nurse</option>
                        </select>
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
</body>
</html>