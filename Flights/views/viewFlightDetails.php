<?php
  include_once "../inc/incSession.php";
  include_once "../connection.php";
  include "../inc/incHeader.php";
?>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="../resources/custom_css/style_views.css">
  <section id="dashboard" class="padd-section text-center wow fadeInUp">
      <div class="container">
        <div class="section-title text-center" style="margin-top: 50px;">
          <h2>Itinerary Update</h2>
        </div>
      </div>
      <div class="row">
          <div class="column1" >
            <h2></h2>
            <i class="fa fa-edit" id="show">Update Itinerary</i>
            <div class="center hideform">
                <button id="close">X</button>
                <form action="/action_page.php" style="margin-top: 20px;">
                  <label class="clr">Maximum Stops</label><br>
                    <label class="radio-inline">
                      <input type="radio" name="optradio" checked>Non-Stop
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="optradio">Upto 1 Stop
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="optradio">Upto 2 Stop
                    </label>
                    <div class="slidecontainer"><br>
                      <label>Departure Time:</label><br>
                      <input type="range" min="1" max="24" value="10" class="myRange"><br>
                      <span><p class="clr">21:00 hrs-23:00 hrs</p></span>
                      <label>Duration</label><br>
                      <input type="range" min="1" max="24" value="10" class="slider" ><br>
                      <span><p class="clr">1 hrs 00 mins-23 hrs 00 mins</p></span>
                    </div>

                </form>
            </div>
          </div>
          <div class="column2">
            <h2></h2>
            <div class="col-md-12">
                <table class="table table-striped"  id="flight_table">
                <thead>
                  <tr>
                    <th>Flight Name</th>
                    <th>Departure</th>
                    <th>Arrival</th>
                  </tr>
                </thead>
                 <tbody id="tables"></tbody>
              </table>
             </div> 
          </div>
      </div>
  </section>
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <?php
    include "../inc/incFooter.php";
    mysqli_close($con);
  ?>  
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
   <script type="text/javascript">
         
      $('#show').on('click', function () {
          $('.center').show();
          $('#show').show();
      })
      $('#close').on('click', function () {
          $('.center').hide();
          $('#show').show();
      })
      window.onload = function() {
        getFlightDetails();
      };
      function getFlightDetails() {
        $.ajax({
            url: "../api/modelGetFlightDetails.php",
            type: "POST",
            dataType: "JSON",
            success: function(response) {
                if(response.apiError.length>0) {
                    console.log(response.apiError);
                } 
                else 
                {
                    var flight_list_array = response.flight_list_array;
                    var tbody_html = '';
                    if(flight_list_array.length>0) {
                        $.each(flight_list_array,function(ind,val){
                            tbody_html += '<tr>';
                                tbody_html += '<td>'+val.flight_name+'('+val.carrier_id+')</td>';
                                tbody_html += '<td>'+val.departure_date_time+'<br><span>'+val.from+'</span>'+'</td>';
                                tbody_html += '<td>'+val.arrival_date_time+'<br><span>'+val.to+'</span>'+'</td>';
                            tbody_html += '</tr>';
                        })
                    }
                    console.log(tbody_html);
                    $("#tables").html(tbody_html);
                    if (!$.fn.DataTable.isDataTable('#flight_table')) {
                        $("#flight_table").dataTable({
                          "aaSorting": [],
                          "iDisplayLength": 3000,
                          "bPaginate": false,
                          "bLengthChange": false,
                          "bFilter": true,
                          "bSort": true,
                          "bInfo": true,
                          "bAutoWidth": true
                        });
                    }
                }
            }
        })
      }
   </script> 
