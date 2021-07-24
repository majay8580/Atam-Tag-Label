</div>
                     <!-- END COPYRIGHT-->
        </div>

</div>

<div class="footercover" style="background-color:#e5e5e5">
<section class="p-t-60 p-b-20 " style="padding-top:0px;padding-bottom:0px;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright" style="padding-top:0px !important">
                                <p>Copyright © 2021 AtamTAg. All rights reserved. Developed by <a href="https://www.marsoneinnovators.com/">MarsoneInnovators .PVT .LTD</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            </div>

<!-- Jquery JS-->
<script src="../vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="../vendor/bootstrap-4.1/popper.min.js"></script>
<script src="../vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- ../Vendor JS       -->
<script src="../vendor/slick/slick.min.js">
</script>
</script>
<script src="../vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="../vendor/counter-up/jquery.counterup.min.js">
</script>
<script src="../vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="../vendor/select2/select2.min.js">
</script>

<!-- Main JS-->
<script src="../js/main.js"></script>

</body>

</html>
<!-- end document-->
<script type="text/javascript">
    $('#create_master_party').click(function(){
        var formData = {
          "action"   : "Create"
        };
        var url = '../master/master_party.php';
        $.ajax({
        type: 'POST',
        url: url,
        action:formData,
        success: function (data) {
            $('#AllData').empty();
            $('#AllData').html(data);
        }
        });
    });
    $(document).on('click','#view_master_party',function(){
        var formData = {
          'action'   : 'View'
        };
        var url = '../report/report_party.php';
        $.ajax({
        type: 'POST',
        url: url,
        action:formData,
        success: function (data) {
            $('#AllData').empty();
            $('#AllData').html(data);
        }
        });
    });
    $('#create_master_sheet').click(function(){
        var formData = {
          "action"   : "Create"
        };
        var url = '../master/master_Sheet.php';
        $.ajax({
        type: 'POST',
        url: url,
        action:formData,
        success: function (data) {
            $('#AllData').empty();
            $('#AllData').html(data);
        }
        });
    });
    $(document).on('click','#view_master_sheet',function(){
        var formData = {
          'action'   : 'View'
        };
        var url = '../report/report_sheet.php';
        $.ajax({
        type: 'POST',
        url: url,
        action:formData,
        success: function (data) {
            $('#AllData').empty();
            $('#AllData').html(data);
        }
        });
    });
</script>
