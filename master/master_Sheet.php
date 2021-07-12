
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
                                                    <input type="email" id="Name" name="SheetName" autocomplete="off"  placeholder="Enter Sheet Name..." class="form-control">
                                                    <!-- <span class="help-block">Please enter your email</span> -->
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                            <div class="col col-md-3">
                                            <label>Sheet Size</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                            <select class="form-control" id="SheetSize">
                                            <option>Select Size</option>
                                            <option>240*520</option>
                                            <option>120*200</option>
                                            <option>4</option>
                                            <option>5</option>
                                            </select>
                                            </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label  class=" form-control-label">Sheet Rate</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="SheetRate" name="SheetRate" placeholder="Enter Sheet Rate..." class="form-control">
                                                    <!-- <span class="help-block">Please enter your password</span> -->
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
            
   