<section id="contact" class="contact-area pt-125 pb-130 gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-20">
                        <h5 class="sub-title mb-15">Online Recharge</h5>
                        <h2 class="title">Reacharge Your Mobile</h2>
                        <h5 class="sub-title mb-15"><?php echo $message?></h5>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form">
                        <form id="transaction-form" data-toggle="validator">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single-form form-group">
                                        <input type="number" name="number" id="number" placeholder="Your Number" data-error="Number is required." required="required">
                                        <div class="help-block with-errors"></div>
                                    </div> <!-- single form -->
                                </div>
                                <div class="col-md-6">
                                    <div class="single-form form-group">
                                        <input type="number" name="amount" id="amount" placeholder="Recharge Amount" data-error="Amount is required." required="required">
                                        <div class="help-block with-errors"></div>
                                    </div> <!-- single form -->
                                </div>
                                
                                   <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-6">
                                            <div class="section-title text-center pt-20">
                                                <h5 class="sub-title mb-15">Select The Payment Gateway</h5>
                                                <!-- <h2 class="title">What We Do?</h2> -->
                                            </div> <!-- section title -->
                                        </div>
                                    </div> <!-- row -->
                                    <div class="row justify-content-center">
                                        <div class="col-lg-4 col-md-6 col-sm-8 payment_gateway" data-gateway="fonepay">
                                            <div class="single-services text-center mt-20 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.4s">
                                                <div class="services-icon">
                                                    <i class="lni-paint-roller"></i>
                                                </div>
                                                <div class="services-content mt-15">
                                                    <h4 class="services-title">Fone Pay</h4>
                                                </div>
                                            </div> <!-- single services -->
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-8 payment_gateway" data-gateway="imepay">
                                            <div class="single-services text-center mt-20 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.4s">
                                                <div class="services-icon">
                                                    <i class="lni-paint-roller"></i>
                                                </div>
                                                <div class="services-content mt-15">
                                                    <h4 class="services-title">IME Pay</h4>
                                                </div>
                                            </div> <!-- single services -->
                                        </div>
                                      </div>
                                    </div>

                                <p class="form-message"></p>
                                <div class="col-md-12">
                                    <div class="single-form form-group text-center">
                                        <button type="button" class="main-btn" id="submit">Recharge</button>
                                    </div> <!-- single form -->
                                </div>
                            </div> <!-- row -->
                        </form>
                    </div> <!-- row -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <div class="modal fade" id="detail_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form method="post" action="<?php echo site_url('transactions/step_1')?>" style="width: 100%">
                <input type="hidden" name="number" id="modal-number">
                <input type="hidden" name="amount" id="modal-amount">
                <input type="hidden" name="gateway" id="gateway">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div class="modal-body">
                    <div id="number_view"></div>
                    <div id="amount_view"></div>
                    <div id="gateway_view"></div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="main-btn" data-dismiss="modal">Cancle</button>
                        <button type="submit" class="main-btn">Confirm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        $('.payment_gateway').click(function(){
            var gateway = $(this).data('gateway');
            $('#gateway').val(gateway);
        })
    </script>

    <script type="text/javascript">
        $('#submit').click(function() {
            var number_val = $('#number').val();
            var amount_val = $('#amount').val();
            var gateway = $('#gateway').val();
            $('#modal-number').val(number_val);
            $('#modal-amount').val(amount_val);
            $('#number_view').html(number_val);
            $('#amount_view').html(amount_val);
            $('#gateway_view').html(gateway);

            $('#detail_modal').modal('show');
        });
    </script>