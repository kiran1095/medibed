<?php 
  $content = '
                <div class="row" style="margin-top:10%;margin-left:20%;">
                <!-- left column -->
                <div class="col-md-6">
                  <!-- general form elements -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Login</h3>
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
                        <input type="button" class="btn btn-primary" value="Submit"></input>
                      </div>
                    </form>
                  </div>
                  <!-- /.box -->
                </div>
              </div>';
  include('home.php');
  ?>