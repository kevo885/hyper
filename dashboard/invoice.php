<?php
include_once "inc/head.php";
include_once "inc/header.php";
include_once "inc/side-bar.php";
?>
<div class="content-page">
<div class="content">
<style type="text/css" media="print">
            @page 
            {
                size: auto;   /* auto is the initial value */
                margin: 0mm;  /* this affects the margin in the printer settings */
            }
        </style>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <!-- Invoice Logo-->
                                        <div class="clearfix">
                                            <div class="float-start mb-3">
                                                <img src="assets/images/logo-light.png" alt="" height="18">
                                            </div>
                                            <div class="float-end">
                                                <h4 class="m-0 d-print-none">Invoice</h4>
                                            </div>
                                        </div>

                                        <!-- Invoice Detail-->
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="float-end mt-3">
                                                    <p><b>Hello, Kyle Tran</b></p>
                                                    <p class="text-muted font-13">Please find below a cost-breakdown for the recent work completed, and do not hesitate to contact me with any questions.</p>
                                                </div>
            
                                            </div><!-- end col -->
                                            <div class="col-sm-4 offset-sm-2">
                                                <div class="mt-3 float-sm-end">
                                                    <p class="font-13"><strong>Order Date: </strong> &nbsp;&nbsp;&nbsp; Jan 3, 2022</p>
                                                    <p class="font-13"><strong>Order Status: </strong> <span class="badge bg-success float-end">Paid</span></p>
                                                    <p class="font-13"><strong>Order ID: </strong> <span class="float-end">#938429</span></p>
                                                </div>
                                            </div><!-- end col -->
                                        </div>
                                        <!-- end row -->
            
                                        <div class="row mt-4">
                                            <div class="col-sm-4">
                                                <h6>Billing Address</h6>
                                                <address>
                                                    Kyle Tran<br>
                                                    795 ***** Ave, Suite ****<br>
                                                    San Antonio, TX 78210<br>
                                                    <abbr title="Phone">P:</abbr> (210)-xxx-1743
                                                </address>
                                            </div> <!-- end col-->
            
                                            <div class="col-sm-4">
                                                <h6>Shipping Address</h6>
                                                <address>
                                                    Kyle Tran<br>
                                                    795 ***** Ave, Suite ****<br>
                                                    San Antonio, TX 78210<br>
                                                    <abbr title="Phone">P:</abbr> (210)-xxx-1743
                                                </address>
                                            </div> <!-- end col-->
            
                                            <div class="col-sm-4">
                                                <div class="text-sm-end">
                                                    <img src="../assets/images/barcode.png" alt="barcode-image" class="img-fluid me-2" />
                                                </div>
                                            </div> <!-- end col-->
                                        </div>    
                                        <!-- end row -->        
    
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <table class="table mt-4">
                                                        <thead>
                                                        <tr><th>#</th>
                                                            <th>Item</th>
                                                            <th>Description</th>
                                                            <th>Cost</th>
                                                        </tr></thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>
                                                                <b>PHP decoder</b> <br/>
                                                            </td>
                                                            <td>I will debug your php problem</td>
                                                            <td>$250.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>
                                                                <b>2 page backend for database</b> <br/>
                                                            </td>
                                                            <td>I will code and provide up to 2 pages for your php website</td>
                                                            <td>$500.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>
                                                                <b>3 hours website consulation</b> <br/>
                                                            </td>
                                                            <td>I will work with you for 3 hours and go over details needed to design and launch your website</td>
                                                            <td>$425.00</td>
                                                        </tr>
    
                                                        </tbody>
                                                    </table>
                                                </div> <!-- end table-responsive-->
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row -->

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="clearfix pt-3">
                                                    <h6 class="text-muted">Notes:</h6>
                                                    <small>
                                                        All accounts are to be paid within 7 days from receipt of
                                                        invoice. To be paid by cheque or credit card or direct payment
                                                        online. If account is not paid within 7 days the credits details
                                                        supplied as confirmation of work undertaken will be charged the
                                                        agreed quoted fee noted above.
                                                    </small>
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-sm-6">
                                                <div class="float-end mt-3 mt-sm-0">
                                                    <p><b>Sub-total:</b> <span class="float-end">$1175.00</span></p>
                                                    <p><b>Tax (8.25):</b> <span class="float-end">$96.94</span></p>
                                                    <h3>$1271.94 USD</h3>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row-->
                                        <div class="d-print-none mt-4">
                                            <div class="text-end">
                                                <a href="javascript:window.print()" class="btn btn-primary"><i class="mdi mdi-printer"></i> Print</a>
                                                <a href="javascript: void(0);" class="btn btn-info">Submit</a>
                                            </div>
                                        </div>   
                                        <!-- end buttons -->

                                    </div> <!-- end card-body-->
                                </div> <!-- end card -->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->
                        
                    </div> <!-- End Content -->
    <?php include_once "inc/footer.php" ?>