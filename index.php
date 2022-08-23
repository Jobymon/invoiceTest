<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<title>Invoice System</title>
<script src="js/invoicetest.js"></script>
<div class="container content-invoice">
   <div class="cards">
     <div class="card-bodys">
       <form action="print.php" id="invoice-form" method="post" class="invoice-form" role="form" novalidate="">
      <div class="load-animate animated fadeInUp">
         <div class="row">
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
               <h2 class="title"></h2>
            </div>
         </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
               <h3>To,</h3>
               <div class="form-group">
                  <input type="text" class="form-control" name="companyName" id="companyName" placeholder="Company Name" autocomplete="off">
               </div>
               <div class="form-group">
                  <textarea class="form-control" rows="3" name="address" id="address" placeholder="Address"></textarea>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               <table class="table table-condensed table-striped" id="invoiceItem">
                  <tr>
                     <th width="2%">
                      <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="checkAll" name="checkAll">
                        <label class="custom-control-label" for="checkAll"></label>
                        </div>
                    </th>
                     <th width="38%">Item Name</th>
                     <th width="15%">Quantity</th>
                     <th width="15%">Price</th>
                     <th width="15%">Total</th>
                  </tr>
                  <tr>
                     <td><div class="custom-control custom-checkbox">
                        <input type="checkbox" class="itemRow custom-control-input" id="itemRow_1">
                        <label class="custom-control-label" for="itemRow_1"></label>
                        </div></td>
                     <td><input type="text" name="productName[]" id="productName_1" class="form-control" autocomplete="off"></td>
                     <td><input type="number" name="quantity[]" id="quantity_1" class="form-control quantity" autocomplete="off"></td>
                     <td><input type="number" name="price[]" id="price_1" class="form-control price" autocomplete="off"></td>
                     <td><input readonly type="text" name="total[]" id="total_1" class="form-control total" autocomplete="off"></td>
                  </tr>
               </table>
            </div>
         </div>
         <div class="row">
            <div class="col-xs-12">
               <button class="btn btn-danger delete" id="removeRows" type="button">- Delete</button>
               <button class="btn btn-success" id="addRows" type="button">+ Add More</button>
            </div>
         </div>
         <div class="row">
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="form-group mt-3 mb-3 ">
              <label>Subtotal without Tax: &nbsp;</label>
                 <div class="input-group mb-3">
            <div class="input-group-prepend">
            </div>
            <input value="" readonly type="text" class="form-control" name="subTotal" id="subTotal" placeholder="Subtotal">
          </div>
              </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="form-group mt-3 mb-3 ">
              <label>Tax in(%): &nbsp;</label>
                 <div class="input-group mb-3">
            <div class="input-group-prepend">
            </div>
           <input value="" type="number" class="form-control" name="taxRate" id="taxRate" placeholder="Tax Rate">
          </div>
              </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="form-group mt-3 mb-3 ">
              <label>Tax Amount: &nbsp;</label>
                 <div class="input-group mb-3">
            <div class="input-group-prepend">
            </div>
            <input value="" readonly type="text" class="form-control" name="taxAmount" id="taxAmount" placeholder="Tax Amount">
          </div>
              </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="form-group mt-3 mb-3 ">
              <label>Subtotal with tax: &nbsp;</label>
                 <div class="input-group mb-3">
            <div class="input-group-prepend">
            </div>
             <input type="text" readonly class="form-control" name="totalAftertax" id="totalAftertax" placeholder="Total">
          </div>
              </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="form-group mt-3 mb-3 ">
              <label>Discount in($) : &nbsp;</label>
                 <div class="input-group mb-3">
            <div class="input-group-prepend">
            </div>
            <input value="" type="number" class="form-control" name="discount" id="discount" placeholder="Discount">
          </div>
              </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="form-group mt-3 mb-3 ">
              <label>Final Total: &nbsp;</label>
                 <div class="input-group mb-3">
            <div class="input-group-prepend">
            </div>
             <input readonly class="form-control" name="finaltotal" id="finaltotal" placeholder="Final Total">
          </div>
              </div>
          </div>
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
               <div class="form-group">
                  <input type="submit" name="invoice_btn" value="Generate Invoice" class="btn btn-success">           
               </div>
            </div>
         </div>
         <div class="clearfix"></div>
      </div>
   </form>
     </div>
   </div>
</div>
</div>
        </div>
      </div>
    </div>
  </body>
</html>