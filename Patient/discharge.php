<?php
  $content = '<div class="row">
                <div class="col-xs-12">
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Discharged Patients List</h3>
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
        url: "../api/patient/discharge.php",
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
                "</tr>";
            }
            $(response).appendTo($("#patients"));
        }
    });
  });
</script>