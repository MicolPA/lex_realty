<style>
  .input{
        background: #f2f3f4 !important;
        border: none !important;
        font-size: 13px !important;
        font-weight: bold !important;
        width: 100%;
  }
</style>

<div class="mt-lg-5 mt-md-5 pb-lg-5 pb-md-5">
  <div class="container">

    <div class="row">
      <div class="col-md-12">
        <div class="bg-darkblue w-100">
          <p class="title-light text-white text-center p-2 m-0">CHECKOUT</p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="bg-white p-3">


          <div class="row">
            <div class="col-md-6">
              <h3 class="font-weight-lighter">Información</h3>

              <div class="form-group">
                <input type="text" class="input pl-4 pr-4 pt-2 pb-2" value="<?= $model->nombre ?>" readonly>
              </div>
              <div class="form-group">
                <input type="text" class="input pl-4 pr-4 pt-2 pb-2" value="<?= $model->identificacion ?>" readonly>
              </div>
              <div class="form-group">
                <input type="text" class="input pl-4 pr-4 pt-2 pb-2" value="<?= $model->correo ?>" readonly>
              </div>
              <div class="form-group">
                <input type="text" class="input pl-4 pr-4 pt-2 pb-2" value="TOTAL A PAGAR: USD$<?= $precio ?>" readonly style="background: #ccc !important;">
              </div>
            </div>

            <div class="col-md-6">
              <h3 class="font-weight-lighter mb-5">Hacer el pago</h3>
              <div id="smart-button-container">
                <div style="text-align: center;">
                  <div id="paypal-button-container"></div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>
</div>



   
  <script src="https://www.paypal.com/sdk/js?client-id=AdRkZ7gVMeRR-QGPq55-0v3XNgvuUfv2W52mSOAWRzjXIcxq6WH0XFFn8bWdwyGMWXDHJG_n0SBGjbfF&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
  <script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'gold',
          layout: 'vertical',
          label: 'buynow',
          
        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"description":"DOCUMENTO DEBIDA DILIGENCIA","amount":{"currency_code":"USD","value":<?= $precio ?>}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {

            $.ajax({
              url: "/frontend/web/site/save-transaction",
              type: 'GET',
              dataType: 'json',
              data: {
                  data: details,
                  payer: details.payer,
                  transactions: details.transactions,
                  form_id: <?= $model->id ?>,
                  _csrf: '<?=Yii::$app->request->getCsrfToken()?>'
              },
              success: function (data) {
                  console.log(data);
                  console.log('success');
                  window.location = '/frontend/web/site/payment-success?id='+<?= $model->id ?>;
              }, error: function (xhr, ajaxOptions, thrownError){
                console.log(thrownError);
                console.log(xhr);
                console.log(ajaxOptions);
              }
          });

            console.log(details);
            // alert('Transaction completed by ' + details.payer.name.given_name + '!');
          });
        },

        onError: function(err) {
          swal ( "Error" ,  "El pago no se ha podido completar correctamente" ,  "error");
          // window.location = '/frontend/web/site/payment-fail?id='+<?= $model->id ?>;
          console.log(err);
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();
  </script>
