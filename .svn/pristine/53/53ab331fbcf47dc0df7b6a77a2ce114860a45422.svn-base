<!-- Styles Start  -->
<link rel="stylesheet" href="/static/theme/js/plugins/pickadate.js/themes/classic.css" id="theme_base">
<link rel="stylesheet" href="/static/theme/js/plugins/pickadate.js/themes/classic.date.css" id="theme_date">
<link rel="stylesheet" href="/static/theme/js/plugins/pickadate.js/themes/classic.time.css" id="theme_time">
<style type="text/css">
  #coupon_code_generation{
    height: 550px;
  }
</style>
<link rel="stylesheet" type="text/css" href="/static/css/common/student_reg_form.css">
<!-- Styles Ended  -->
      <!-- <section class="content"> -->
        <!-- Content Header (Page header) -->
        <br> <br>
        <form method="POST" action="/coupon/generate_coupon" name="couponcode_GenerationFrom" id="couponcode_GenerationFrom" role="form">
          <div class="panel panel-info">
            <div class="panel panel-body">
              <div class="row" style="margin-left:20px">
                
                <!-- Panel Design Start -->
               
                <!-- Panel Body -->
                    <h5 id="error" style="color:red"></h5>
                    <div class="col-xs-12 col-sm-8 col-md-8"><!-- OUTER Col Begin-->                   
                      <fieldset> 
                        <div class="row">
                          <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group control-group">
                              <div class="control input-group">
                                <label>No.of Promo Codes to be generated</label>
                              </div>
                              <span class="help-block"></span>
                            </div>
                          </div>

                          <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group control-group">
                              <div class="control input-group">
                                <input type="text" autocomplete="off" name="no_of_coupons" id="no_of_coupons" class="form-control input" placeholder="100" tabindex="5">
                              </div>
                              <span class="help-block"></span>
                            </div>
                          </div>

                        </div>

                        <div class="row">
                          <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group control-group">
                              <div class="control input-group">
                                
                                <label>Final Amount for each Promo Code</label>   
                              </div>
                              <span class="help-block"></span>
                            </div>
                          </div>

                          <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group control-group">
                              <div class="control input-group">
                                <input type="text" autocomplete="off" name="discount_amount" id="discount_amount" class="form-control input" placeholder="100" tabindex="5">
                              </div>
                              <span class="help-block"></span>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          
                          <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group control-group">
                              <div class="control input-group">
                                <label>Valid till</label>   
                              </div>
                              <span class="help-block"></span>
                            </div>
                          </div>

                          <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group control-group">
                              <div class="control input-group">
                              
                                <input type="text" required=""  autocomplete="off" name="valid_till" id="valid_till" class="form-control input valid_till_date" placeholder="Promo code Expiry Date" tabindex="4" aria-required="true" ></input>
                                <span class="input-group-btn">
                                    <button class="date-button btn btn-default" type="button"><i class="glyphicon glyphicon-th"></i></button>
                                </span>
                              </div>
                              <div id="date-picker"></div>
                              <span class="help-block"></span>
                            </div>
                          </div>

                        </div>

                      </fieldset>

                      <div class="row">
                          <div class="col-xs-6 col-sm-3 col-md-3">
                            <div class="form-group control-group">
                                <div class="control">
                                <button type="button" onclick="generate_couponcodes();" class="btn btn-success"  tabindex="19">
                                  <!-- <span class="glyphicon glyphicon-star" aria-hidden="true"></span>  -->
                                  Generate
                                </button>
                                </div>
                            </div>
                          </div>

                          <div class="col-xs-6 col-sm-3 col-md-3">
                            <div class="form-group control-group">
                                <div class="control">
                                <a href="/login" class="btn btn-danger" tabindex="20">
                                  <!-- <span class="glyphicon glyphicon-star" aria-hidden="true"></span>  -->
                                  Cancel
                                </a>
                                </div>
                            </div>
                          </div>
                      </div>

                    </div>
                </div>
              </div>
            </div>
          </form>
        <!-- </section> -->
        
        <!-- Content Header (Page footer) -->
        <style type="text/css">
        /*.footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 60px;
            background-color: #16171c;
        }
        .skol_logo {
            width: 5% !important;
        }*/
        
        </style>
                
        <!--<section class="footer">
            <div class="content col-xs-15 col-md-12" style="background: transparent;">
                <img src="/static/theme/img/skol_logo.png" class="skol_logo"/>
            </div>
        </section>-->
<script src="/static/theme/js/plugins/pickadate.js/picker.js"></script>
<script src="/static/theme/js/plugins/pickadate.js/picker.date.js"></script>
<script src="/static/theme/js/plugins/pickadate.js/picker.time.js"></script>
<script src ="/static/js/common/validate.js" ></script>

<script type="text/javascript">
// Latest Working code for piackadate works with : chrome and firefox
    var input = $('.valid_till_date').pickadate({
        editable: true, 
        format: 'yyyy-mm-dd',
        min: true,
        max: false,
        container: '#date-picker',
        onClose: function() {
            // $("#ass_file_upload").valid(); // Please Give Form id
        }
    });
    var picker = input.pickadate('picker');

    $('.valid_till_date').off('click focus'); // making input box focasable 
    $('.date-button').on('click', function(e) {
      if (picker.get('open')) { 
        picker.close()
      } else {
        picker.open()
      }
      e.stopPropagation()    
    });
    function validate_promocodeform(){
      var no_of_coupons   = $("#no_of_coupons").val();
      var discount_amount = $("#discount_amount").val();
      var valid_till      = $('#valid_till').val();
      var count = 0;
      var reg_number      = /^[0-9]*$/;
      var reg_date        = /^\d{2}([./-])\d{2}\1\d{4}$/;
      if(no_of_coupons!=''){
        $('#error').text('');
        if(reg_number.test(no_of_coupons)){
          count++;          
        }else{
          $('#error').text('No of Promo codes to be generated should be in digits only');
          return;  
        }
      }else{
        $('#error').text('Please enter No of Promo codes to be generated');
        return;
      }
      if(discount_amount!=''){
        if(reg_number.test(discount_amount)){
          count++;
        }else{
          $('#error').text('Final Amount should be in digits only');
          return;
        }
      }else{
        $('#error').text('Please enter Final Amount for All PromoCodes');
        return;
      }
      if(valid_till!=''){
        count++;
      }else{
       $('#error').text('Please enter proper Date');
        return; 
      }
      if(count == 3){
        $('#error').text('');
        generate_couponcodes();
      }
          
    }

</script>