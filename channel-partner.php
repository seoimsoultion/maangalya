<?php
$title = 'Channel Partner';
$page = "channel-partner";
$meta_keywords = "keyword";
$meta_description = "description";
include 'includes/header.php';
?>
<div role="main" class="main">




    <section class="page-header page-header-modern page-header-background page-header-background-sm overlay overlay-color-primary overlay-show overlay-op-8 mb-5" style="background-image: url(img/page-header/page-header-elements.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1>Channel Partner</h1>

                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb breadcrumb-light d-block text-center">
                        <li><a href="#">Home</a></li>
                        <li class="active">Channel Partner</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-2">
        <h2 class="text-center">Channel Partner </h2>
        <div class="row">

            <div class="col-lg-6 order-1 order-lg-2">

                <div class="overflow-hidden mb-1">
                    <h2 class="font-weight-normal text-7 mb-0">
                        <strong class="font-weight-extra-bold">Add </strong> Leads</h2>
                </div>
                <div class="overflow-hidden mb-4 pb-3">
                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>

                <form id="al" role="form" >
                    <div id="note2"></div>
                     <input type="hidden" name="lead" value="lead">
                    <div class="form-group row">
                        <label class="col-lg-4 font-weight-bold text-dark col-form-label form-control-label text-2 required">Your ID </label>
                        <div class="col-lg-8">
                            <input class="form-control" required type="text" name="partner_id"  placeholder="Your ID">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 font-weight-bold text-dark col-form-label form-control-label text-2 required">Customer Number </label>
                        <div class="col-lg-8">
                            <input class="form-control" required type="text" name="customer_contact_number"  placeholder="Customer Contact Number">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 font-weight-bold text-dark col-form-label form-control-label text-2 required">Customer Name </label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" placeholder="Customer Name " name="customer_name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 font-weight-bold text-dark col-form-label form-control-label text-2 required">Customer Email </label>
                        <div class="col-lg-8">

                            <input class="form-control" required type="email" name="customer_email" placeholder="Customer Email *" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 font-weight-bold text-dark col-form-label form-control-label text-2">Project</label>
                        <div class="col-lg-8">
                            <select id="user_time_zone" name="project" class="form-control" size="0" required>
                                <option value="Maangalya Signature">Maangalya Signature</option>
                                <option value="Maangalya Park-Avenue">Maangalya Park-Avenue</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 font-weight-bold text-dark col-form-label form-control-label text-2">Notes</label>
                        <div class="col-lg-8">
                            <textarea rows="2" name="notes" class="form-control"></textarea>
                        </div>
                    </div>




                    <div class="form-group row">
                        <div class="form-group col-lg-8">

                        </div>
                        <div class="form-group col-lg-4">
                            <input type="submit" value="Save" class="btn btn-primary btn-modern float-right" data-loading-text="Loading...">
                        </div>
                    </div>
                </form>

            </div>


            <div class="col-lg-6 order-1 order-lg-2">

                <div class="overflow-hidden mb-1">
                    <h2 class="font-weight-normal text-7 mb-0"><strong class="font-weight-extra-bold">Register</strong> as a  Channel Partner</h2>
                </div>
                <div class="overflow-hidden mb-4 pb-3">
                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>

                <form id="cp"  class="">
                     <div id="note"></div>
                    <input type="hidden" name="register_channel_partner" value="register_channel_partner">
                    <div class="form-group row">
                        <label class="col-lg-4 font-weight-bold text-dark col-form-label form-control-label text-2 required">RERA Number  </label>
                        <div class="col-lg-8">
                            <input class="form-control" required type="text" name="rera_number"  placeholder="RERA Number ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 font-weight-bold text-dark col-form-label form-control-label text-2 required">Company Name </label>
                        <div class="col-lg-8">
                            <input class="form-control" required type="text" name="company_name"  placeholder="Company Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 font-weight-bold text-dark col-form-label form-control-label text-2 required">Contact Number </label>
                        <div class="col-lg-8">
                            <input class="form-control" name="contact_number" type="text" placeholder="Contact Number " required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 font-weight-bold text-dark col-form-label form-control-label text-2 required">Contact Person Name</label>
                        <div class="col-lg-8">
                            <input class="form-control" name="contact_person_name" type="text" placeholder="Contact Person Name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 font-weight-bold text-dark col-form-label form-control-label text-2 required"> Email </label>
                        <div class="col-lg-8">

                            <input class="form-control" name="email" required type="email" placeholder=" Email">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-4 font-weight-bold text-dark col-form-label form-control-label text-2">Address</label>
                        <div class="col-lg-8">
                            <textarea rows="2" class="form-control" name="address"></textarea>

                        </div>
                    </div>




                    <div class="form-group row">
                        <div class="form-group col-lg-8">

                        </div>
                        <div class="form-group col-lg-4">
                            <input type="submit" name="register_channel_partner" value="Submit" class="btn btn-primary btn-modern float-right" data-loading-text="Loading...">
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>





</div>

<?php
include 'includes/footer.php';
?>
<script>
    $("#cp").submit(function () {
        var str = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "leads.php",
            data: str,
            success: function (msg) {
                if (msg == 'OK') {
                    result = '<p style="color:green; font-weight: 600;font-size: 18px;">Email Sent Successfully!</p>';
                    $('#note').delay(18000).fadeOut();
                    $('#cp')[0].reset();
                    //$('input,textarea').val('');

                } else {
                    result = msg;
                }
                $('#note').html(result);
            }
        });
        return false;
    });
     $("#al").submit(function () {
        var str = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "leads.php",
            data: str,
            success: function (msg) {
                if (msg == 'OK') {
                    result = '<p style="color:green; font-weight: 600;font-size: 18px;">Email Sent Successfully!</p>';
                    $('#note2').delay(18000).fadeOut();
                    $('#al')[0].reset();
                    //$('input,textarea').val('');

                } else {
                    result = msg;
                }
                $('#note2').html(result);
            }
        });
        return false;
    });

</script>