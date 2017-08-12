
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Purchase
    </h1>
</section>

<!-- Main content -->
<section class="content">

    <div id="main_row" class="row">

        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url('purchase/purchase_action'); ?>" >
                        <div class="col-md-12">
                            <div class="col-md-6 col-md-offset-2">
                                <div class="form-group">
                                    <label for="FIRST_NAME" class="col-sm-4 control-label" >Supplier</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="supplier_id" id="supplier_id" required>
                                            <option value="">Select Supplier</option>

                                            <?php
                                            $suppliers_rows = $this->suppliers_model->get();
                                            foreach ($suppliers_rows as $suppliers_row):
                                                ?>
                                                <option value="<?= $suppliers_row['id'] ?>"><?= $suppliers_row['supplier_name'] ?></option>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            

<!--                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="LAST_NAME" class="col-sm-4 control-label" >Product</label>
                                    <div class="col-sm-8">

                                        <select class="form-control" name="product_id" id="product_id" required>
                                            <option value="">Select Product</option>

                                            <?php
                                            $products_rows = $this->products_model->get();
                                            foreach ($products_rows as $products_row):
                                                ?>
                                                <option value="<?= $products_row['id'] ?>"><?= $products_row['product_name'] ?></option>
                                            <?php endforeach; ?>

                                        </select>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bought_price" class="col-sm-4 control-label" >Bought Price</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="bought_price" id="bought_price" placeholder="Bought Price" required>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="selling_price" class="col-sm-4 control-label" >Selling Price</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="selling_price" id="selling_price" placeholder="Selling Price" required>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="FIRST_NAME" class="col-sm-4 control-label" >Quantity</label>
                                    <div class="col-sm-8">
                                        <input type="number" min="0" class="form-control" name="quantity" id="fname" placeholder="Quantity" required>

                                    </div>
                                </div>
                            </div>-->

<!--                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pdate" class="col-sm-4 control-label" >Purchase Date</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="purchase_date" id="pdate" placeholder="Purchase Date" required>
                                    </div>
                                </div>
                            </div>-->


                        </div>

                        

                        <hr>

                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Bought Price</th>
                                    <th>Selling Price</th>
                                    <th>Quantity</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody> 
                                <tr> 
                                    <td>
                                        <div class="">
                                            <select class="form-control" name="product_id[]" id="product_id" required>
                                                <option value="">Select Product</option>

                                                <?php
                                                $products_rows = $this->products_model->get();
                                                foreach ($products_rows as $products_row):
                                                    ?>
                                                    <option value="<?= $products_row['id'] ?>"><?= $products_row['product_name'] ?></option>
                                                <?php endforeach; ?>

                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                            <input type="number" min="1" class="form-control" name="bought_price[]" id="bought_price" placeholder="Bought Price" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                            <input type="number" min="1" class="form-control" name="selling_price[]" id="selling_price" placeholder="Selling Price" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                            <input type="number" min="1" class="form-control" name="quantity[]" id="fname" placeholder="Quantity" required>
                                        </div>
                                    </td>
                                    <td><a onclick="javascript:add();" class="add"><i class="fa fa-plus fa-lg"></i></a></td>
                                </tr>
                            </tbody>
                        </table>

                        
                        <div class="col-md-6 col-md-offset-2">
                            <div class="form-group">
                                <label for="pdate" class="col-sm-4 control-label" >Purchase Date</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="purchase_date" id="pdate" placeholder="Purchase Date" value="<?=date('Y-m-d')?>" required>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-offset-7 col-sm-5">
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
    $(function () {
        $("#pdate").datepicker({
            dateFormat: "yy-mm-dd",
            maxDate: 0,
        });
        
    });
    
    function add()
    {
        var html = '';
//        html +=

            html +=    '<tr>'; 
            html +=         '<td>';
            html +=             '<div class="">';
            html +=                 '<select class="form-control" name="product_id[]" id="product_id" required>';
            html +=                     '<option value="">Select Product</option>';

                                <?php
                                $products_rows = $this->products_model->get();
                                foreach ($products_rows as $products_row):
                                    ?>
            html +=                         '<option value="<?= $products_row['id'] ?>"><?= $products_row['product_name'] ?></option>';
                                <?php endforeach; ?>

            html +=                '</select>';
            html +=             '</div>';
            html +=         '</td>';
            html +=         '<td>';
            html +=             '<div class="">';
            html +=                 '<input type="text" class="form-control" name="bought_price[]" id="bought_price" placeholder="Bought Price" required>';
            html +=             '</div>';
            html +=         '</td>';
            html +=         '<td>';
            html +=             '<div class="">';
            html +=                 '<input type="text" class="form-control" name="selling_price[]" id="selling_price" placeholder="Selling Price" required>';
            html +=              '</div>';
            html +=         '</td>';
            html +=         '<td>';
            html +=             '<div class="">';
            html +=                 '<input type="number" min="0" class="form-control" name="quantity[]" id="fname" placeholder="Quantity" required>';
            html +=             '</div>';
            html +=         '</td>';
            html +=         '<td><a class="remove" onclick="javascript:remove_tr($(this));"><i class="fa fa-minus fa-lg"></i></a></td>';
            html +=     '</tr>';
        
        
        
        $('tbody').append(html);
        
//        alert('add');
    }
    
    function remove_tr(element)
    {
        element.parents('tr').remove();
    }
    
</script>


<style>
    .add, .remove
    {
        cursor: pointer;
    }
    
    table
    {
      margin-top: 65px;
      border-top: 1px solid #ccc;
      border-bottom: 1px solid #ccc;
    }
</style>
