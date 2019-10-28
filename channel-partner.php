<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Channel Patners | Maangalya Ventures | Maangalya Constructions</title>
      <meta name="keywords" content="" />
      <meta name="description" content="If you have good client relationships, SmartOwner offers you and your clients an exciting opportunity to participate in Bangalore's rapidly growing real estate industry.">
      <meta name="author" content="">
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
      <?php
         $title = 'Channel Partner';
         
         $page = "channel-partner";
         
         $meta_keywords = "keyword";
         
         $meta_description = "description";
         
         include 'include/header.php';
         
         ?>
      <div role="main" class="main">
         <section class=" conatctUsBanner section-no-border " >
            <img src="img/new_images/Channel-Partner-bg.jpg" style="width:100%" />
         </section>
         <div class="container py-2">
            <h2 class="text-center">&nbsp; </h2>
            <div class="row">
               <div class="col-lg-6 order-1 order-lg-2">
                  <div class="overflow-hidden mb-1">
                     <h2 class="font-weight-normal text-7 mb-0">
                        <strong class="font-weight-extra-bold">Add </strong> Leads
                     </h2>
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
                        <div class="form-group col-lg-12 text-center">
                           <input type="submit" value="Save" id="saveInput" class="btn btn-primary btn-modern " data-loading-text="Loading...">
                        </div>
                     </div>
                  </form>
               </div>
               <div class="col-lg-6 order-1 order-lg-2">
                  <div class="overflow-hidden mb-1">
                     <h2 class="font-weight-normal text-7 mb-0"><strong class="font-weight-extra-bold">Register</strong> as a  Channel Partner</h2>
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
                        <div class="form-group col-lg-12 text-center">
                           <input type="submit" id="submitInput" name="register_channel_partner" value="Submit" class="btn btn-primary btn-modern " data-loading-text="Loading...">
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <?php
         include 'include/footer.php';
         
         ?>
      <script>
         grecaptcha.ready(function() {	   grecaptcha.execute('6Ld9Wb4UAAAAAOVMj4Q-DeN9-bMo1IItwe65Q-GP', {action: 'homepage'}).then(function(token) {		  $('#fcon').prepend('<input type="hidden" name="g-recaptcha-response"  value="' + token + '">');		  $('#con').prepend('<input type="hidden" name="g-recaptcha-response"  value="' + token + '">');		  $('#ccon').prepend('<input type="hidden" name="g-recaptcha-response"  value="' + token + '">');		  $('#cp').prepend('<input type="hidden" name="g-recaptcha-response"  value="' + token + '">');		  $('#al').prepend('<input type="hidden" name="g-recaptcha-response"  value="' + token + '">');	   });	});
             $("#cp").submit(function () {
         $("#submitInput").val("Please Wait");
                         $('#submitInput').attr('disabled', 'disabled');
                 var str = $(this).serialize();
         
                 $.ajax({
         
                     type: "POST",
         
                     url: "leads.php",
         
                     data: str,
         
                     success: function (msg) {
         $('#submitInput').removeAttr('disabled');
          $("#submitInput").val("Enquire Now");
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
         $("#saveInput").val("Please Wait");
                         $('#saveInput').attr('disabled', 'disabled');
                 var str = $(this).serialize();
         
                 $.ajax({
         
                     type: "POST",
         
                     url: "leads.php",
         
                     data: str,
         
                     success: function (msg) {
         $('#saveInput').removeAttr('disabled');
          $("#saveInput").val("Enquire Now");
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