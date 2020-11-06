@extends('layout/layout')

@section('content')
<div class="mt-4 ml-5 col-10">
    <div class="container-fluid mt-5">
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">

                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    
                    <html>
                    
                    <body>
                      
                    <div class="container">
                      
                      
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="panel panel-default credit-card-box">
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                           <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                                        </div>
                                    </div>
    
                                    <div class="form-group required">
                                        <label>Name on card</label>
                                        <input class="form-control" size="4" type="text">
                                    </div>
                                    
                                    <div class="form-group required">
                                        <label>Card Number </label>
                                        <input autocomplete="off" class="form-control card-number" size="20" type="text">
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-4 form-group cvc required">
                                            <label>CVC</label>
                                             <input autocomplete="off" class="form-control card-cvc" placeholder="ex. 311" size="4" type="text">
                                        </div>
                                        <div class="col-md-4 form-group expiration required">
                                            <label>Expiration Month</label>
                                            <input class="form-control card-expiry-month" placeholder="MM" size="2" type="text">
                                        </div>
                                        <div class="col-md-4 form-group expiration required">
                                            <label>Expiration Year</label> 
                                            <input class="form-control card-expiry-year" placeholder="YYYY" size="4" type="text">
                                        </div>
                                    </div>
    
                                    
                                    <div class="panel-body">
                                        <button class="btn btn-success" type="submit">Pay Now ( <b>GBP</b> 1002 ) </button>
                                    </div>
                                </div>       
                            </div>
                        </div>
                          
                    </div>
                      
                    </body>
                      
                    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
                      
                    <script type="text/javascript">
                    $(function() {
                        var $form         = $(".require-validation");
                      $('form.require-validation').bind('submit', function(e) {
                        var $form         = $(".require-validation"),
                            inputSelector = ['input[type=email]', 'input[type=password]',
                                             'input[type=text]', 'input[type=file]',
                                             'textarea'].join(', '),
                            $inputs       = $form.find('.required').find(inputSelector),
                            $errorMessage = $form.find('div.error'),
                            valid         = true;
                            $errorMessage.addClass('hide');
                     
                            $('.has-error').removeClass('has-error');
                        $inputs.each(function(i, el) {
                          var $input = $(el);
                          if ($input.val() === '') {
                            $input.parent().addClass('has-error');
                            $errorMessage.removeClass('hide');
                            e.preventDefault();
                          }
                        });
                      
                        if (!$form.data('cc-on-file')) {
                          e.preventDefault();
                          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                          Stripe.createToken({
                            number: $('.card-number').val(),
                            cvc: $('.card-cvc').val(),
                            exp_month: $('.card-expiry-month').val(),
                            exp_year: $('.card-expiry-year').val()
                          }, stripeResponseHandler);
                        }
                      
                      });
                      
                      function stripeResponseHandler(status, response) {
                            if (response.error) {
                                $('.error')
                                    .removeClass('hide')
                                    .find('.alert')
                                    .text(response.error.message);
                            } else {
                                // token contains id, last4, and card type
                                var token = response['id'];
                                // insert the token into the form so it gets submitted to the server
                                $form.find('input[type=text]').empty();
                                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                                $form.get(0).submit();
                            }
                        }
                      
                    });
                    </script>
                    </html>
                </div>

            </div>

        </div>
    </div>
</div>


@endsection


@section('scripts')

@endsection