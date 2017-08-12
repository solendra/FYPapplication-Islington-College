
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Sell to Customer
    </h1>
</section>

<!-- Main content -->
<section class="content">

    <div id="main_row" class="row">

        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-body">

                    <div class="form-horizontal">
                        <div class="col-md-12">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="form-group">
                                    <label for="FIRST_NAME" class="col-sm-4 control-label" >Product Code</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control num_and_string_only_validation" id="product_code">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="product_info_table" style="display: none;">

                    </div>




                    <br>
                    <br>
                    <br>
                    <hr>

                    <form class="form-horizontal" method="post" action="<?php echo base_url('sales/sell_action'); ?>" >

                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th>S.N</th>
                                    <th>Product Code</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Sub Total</th>
                                    <th>Action</th>
                                </tr>


                                <?php
                                $i = 1;
                                foreach ($this->cart->contents() as $items):
                                    ?>
                                    <tr>
                                        <td><?= $i; ?> </td>

                                        <?php /* if product has option then display */ if ($this->cart->has_options($items['rowid']) == TRUE): ?>
                                            <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
                                                <td id="product_code_<?=$i?>"><?php echo $option_value; ?></td>
                                            <?php endforeach; ?>                                           
                                        <?php endif; ?>

                                        <td><?= $items['name']; ?><input type="hidden" name="current_stock_ids[]" value="<?= $items['id']; ?>" /> </td>
                                        <td><?= number_format($items['price']); ?></td>
                                        <td><?= $items['qty']; ?><input type="hidden" name="quantity[]" value="<?= $items['qty']; ?>" /> <a href="#" class="update_quantity" data-relation="<?=$i?>"> | Update Quantity</a></td>
                                        <!--<td><input type="text" class="num_only update_quantity"> <button type="button" class="btn btn-default btn-sm">Update</button></td>-->
                                        <td><?= number_format($items['subtotal']); ?></td>
                                        <td><a href="<?php echo base_url(); ?>sales/remove_from_bill/<?= $items['rowid']; ?>"><span class="badge bg-red">Remove</span></a></td>
                                    </tr>
                                    <?php
                                    $i++;
                                endforeach;
                                ?>



                                <tr>
                                    <td colspan="5" class="text-right">Total Amount : </td>
                                    <td>
                                        <?= number_format($this->cart->total()) ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('sales/reset_bill') ?>" class="btn btn-default btn-xs clearfix">Reset Bill</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="8" class="text-right"></td>
                                </tr>
                            </tbody>
                        </table>


                        <br>
                        <br>
                        <br>


                        <br>
                        <br>
                        <br>



                        <div class="col-md-12">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="form-group">
                                    <label for="bought_price" class="col-sm-4 control-label" >Customer Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control string_only_validation" name="customer_name" id="customer_name" required>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="form-group">
                                    <label for="bought_price" class="col-sm-4 control-label" >Customer Mobile No.</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control num_only_validation" name="customer_mobile_no" id="customer_mobile_no" required>

                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-md-12">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="form-group">
                                    <label for="bought_price" class="col-sm-4 control-label" >Customer Address</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control string_only_validation" name="customer_address" id="customer_address" required>

                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="form-group">
                                    <label for="discount_percent" class="col-sm-4 control-label" >Discount Percent</label>
                                    <div class="col-sm-8">
                                        <input type="number" min="0" max="100" class="form-control num_only_validation" id="discount_percent">

                                    </div>
                                </div>
                            </div>
                        </div>
                        
                       
                        
                        <div class="col-md-12">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="form-group">
                                    <label for="discount" class="col-sm-4 control-label" >Discount</label>
                                    <div class="col-sm-8">
                                        <input type="number" min="0" class="form-control num_only_validation" name="discount" id="discount">

                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="col-md-12">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="form-group">
                                    <label for="bought_price" class="col-sm-4 control-label" >Due Amount</label>
                                    <div class="col-sm-8">
                                        <input type="number" min="0" class="form-control num_only_validation" name="due_amount" id="due_amount">

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-6">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div><!--row-->

</section>

<script>

//    $(document).on('change')

    $(document).on('keyup', '#product_code', function () {

        var product_code = $(this).val();

        // product code atleast has to be 3 character
        // when user enters 3 character send an ajax request
        if (product_code.length >= 3)
        {
            var post_data = {product_code: product_code};
            $.ajax({
                type: "post",
                url: "<?php echo base_url('sales/check_product_ajax'); ?>",
                data: post_data,
                beforeSend: function () {
                },
                success: function (resp) {

                    if (resp.msg == 'not_found') {
                        $('#product_info_table').hide();
                        $.notify("Product Not Found", {position: "right bottom"});
                    }
                    else
                    {

                        var tbl_rows = "<table class='table table-striped'><tr><th>Product Code</th><th>Name</th><th>Price</th><th>Available Quantity</th><th>Sales Quantity</th><th> Action</th></tr>";

//                        alert(resp.quantity);
                        tbl_rows += "<tr>";
                        tbl_rows += "<td>" + resp.product_code + "</td>";
                        tbl_rows += "<td>" + resp.product_name + "</td>";
                        tbl_rows += "<td>" + resp.price + "</td>";
                        tbl_rows += "<td id='available_quantity'>" + resp.quantity + "</td>";
                        tbl_rows += "<td width='150px'><input type='text' class='form-control input-sm' name='quantity' id='quantity' /><input type='hidden' id='current_stock_id' name='id' value='" + resp.id + "'/></td>";
                        tbl_rows += "<td><span class='btn btn-sm btn-info' onClick='add_to_cart()'>Add To Bill</span></td>";
                        tbl_rows += "</tr>";

                        tbl_rows += "</tbody></table>";

                        $('#product_info_table').html(tbl_rows);
                        $('#product_info_table').show();
                        
                        $('#quantity').focus();
                        
                        // initialize quantity validation
                        initialize_quantity_validation();

                    }

                }
            });

        }

        // if product code is less than 3
        else
        {
            $('#product_info_table').hide();
        }
    });


    function add_to_cart()
    {
        var available_quantity = $('#available_quantity').html() * 1;
        var quantity = $('#quantity').val() * 1;
        var current_stock_id = $('#current_stock_id').val();

        if (quantity > available_quantity)
        {
            $.notify("Sales quantity is greater than Available Quantity!", {position: "right bottom"});
        }
        else
        {
//        $.notify("Sales!",{ position:"right bottom" });

            window.location.href = '<?php echo base_url('sales/add_to_bill'); ?>/' + current_stock_id + '/' + quantity;
        }

    }
    
    $(function()
    {
        
        var total_amount = <?=$this->cart->total()?>;
        
        var discount_amount = 0;
        
        $('#discount_percent').keyup(function()
        {
            var discount_percent = $(this).val();
            
            if(discount_percent > 100)
            {
                $.notify("Discount can not be more than 100%", {position: "right bottom"});
                $('#discount').val('');
                discount_amount = 0;
            }
            else
            {
                discount_amount = total_amount * discount_percent / 100;
                $('#discount').val(discount_amount);
            }
            
        });
        
        
        $('#discount').keyup(function()
        {
            if(discount_amount != $(this).val())
            {
                $('#discount_percent').val('');
            }
        });
        
        
    });
    
    
    function initialize_quantity_validation()
    {
        $("#quantity").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                 // Allow: Ctrl+A, Command+A
                (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
                 // Allow: home, end, left, right, down, up
                (e.keyCode >= 35 && e.keyCode <= 40)) {
                     // let it happen, don't do anything
                     return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });
    }
    
    
    
    // update quantity
    $(function()
    {
        $('.update_quantity').click(function(e)
        {
            e.preventDefault();
            var relation = $(this).data('relation');
            var product_code = $('#product_code_'+relation).text();
            
            $('#product_code').val(product_code);
            $('#product_code').trigger('keyup');
            
            
            
        });
        
    })


</script>