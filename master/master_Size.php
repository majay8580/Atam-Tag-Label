
        <!-- HEADER DESKTOP-->
        <?php
             include('../header/header.php');
        ?>
               <!-- PAGE CONTENT-->
               <div class="container createform">
                   <div class="row">
                       <div class="col-lg-2">
</div>
               <div class="col-lg-8">
               <div class="card">
                                    <div class="card-header">
                                        <strong>Create</strong> Sheet 
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="action_party.php" id="CreateParty" name="CreateParty" method="post" class="form-horizontal" autocomplete="off">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Sheet Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <div class="row">

                                               <div class="col-6 col-md-6">
                                               <input type="number" id="SizeWidth" name="SizeWidth" autocomplete="off"  placeholder="Enter Width..." class="form-control">
                                               </div>

                                               <div class="col-6 col-md-6">
                                               <input type="number" id="SizeHeight" name="SizeHeight" autocomplete="off"  placeholder="Enter Height..." class="form-control">
                                               </div>

<!-- <span class="help-block">Please enter your email</span> -->
</div>
                                                    <!-- <span class="help-block">Please enter your email</span> -->
                                                </div>
                                            </div>

                                          

                                        </form>
                                    </div>
                                    <div align="right" class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm" id="PartySubmit">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm" id="PartyReset">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>

                                </div>
                                <div class="col-lg-2">
</div>
</div>
</div>
</div>
            <!-- END STATISTIC-->

            
          
            <!-- COPYRIGHT-->
            <?php
                  include('../footer/footer.php');
            ?>
            
   