<?php
  $content = '<div class="row">
                <div class="col-xs-12">
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Patients List</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="patients" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Health_issue</th>
                        <th>assigned_doctor</th>
                        <th>assigned_nurse</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
            </div>';
  include('../master.php');
?>
<!-- page script -->
<script>
  $(document).ready(function(){
    $.ajax({
        type: "GET",
        url: "../api/patient/read.php",
        dataType: 'json',
        success: function(data) {
            var response="";
            for(var user in data){
                response += "<tr>"+
                "<td>"+data[user].id+"</td>"+
                "<td>"+data[user].name+"</td>"+
                "<td>"+data[user].email+"</td>"+
                "<td>"+data[user].phone+"</td>"+
                "<td>"+((data[user].gender == 0)? "Male": "Female")+"</td>"+
                "<td>"+data[user].health_issue+"</td>"+
                "<td>"+data[user].assigned_doctor+"</td>"+
                "<td>"+data[user].assigned_nurse+"</td>"+
                
                "<td><a href='update.php?id="+data[user].id+"'>Edit</a> | <a href='#' onClick=Remove('"+data[user].id+"')>Remove</a></td>"+
                "</tr>";
            }
            $(response).appendTo($("#patients"));
        }
    });
  });
  function Remove(id){
    var result = confirm("Are you sure you want to Delete the patient Record?"); 
    if (result == true) { 
        $.ajax(
        {
            type: "POST",
            url: '../api/patient/delete.php',
            dataType: 'json',
            data: {
                id: id
            },
            error: function (result) {
                alert(result.responseText);
            },
            success: function (result) {
                if (result['status'] == true) {
                    alert("Successfully discharged patient!");
                    window.location.href = '/medibed/master.php';
                }
                else {
                    alert(result['message']);
                }
            }
        });
    }
  }
</script>