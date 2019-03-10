    <?php
        include("func/func_product.php");
        $list_product=get_all_product();
        if(isset($_POST['product_id'])){
          delete_product($_POST['product_id']);
          header("location:index.php?view=list_products");
        }
    ?>
     <div class="box">
            <div class="box-header">
              <h3 class="box-title">LIST PRODUCTS</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Price($)</th>
                  <th>Picture</th>
                  <th>Category</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        $pro_num=0;
                        foreach($list_product as $row)
                        {
                            $pro_num++;
                    ?>
                <tr>
                  <td><?=$pro_num?></td>
                  <td><?=$row['name']?></td>
                  <td><?=$row['price']." $"?></td>
                  <td><img width="64" src="files/<?=$row['picture']?>"></td>
                  <td><?=$row['cat_name']?></td>
                  <td>
                      <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#user_modal_<?=$pro_num;?>">Delete</a>
                      <a href="index.php?view=add_product&id=<?=$row['id']?>" class="btn btn-info">Edit</a>
                  </td>
                </tr>


                      <!-- comfirm dialog to delete user -->
                    <div class="modal fade modal-danger" id="user_modal_<?=$pro_num;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">DELETE PRODUCT</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            Do you want to delete this product : <i><?=$row['name']?></i> ?
                          </div>
                          <div class="modal-footer">
                            <form action="" method="POST">
                              <input type="hidden" value="<?=$row['id'];?>" name="product_id">
                              <button type="button" class="btn btn-outline" data-dismiss="modal">No</button>
                              <button type="submit" class="btn btn-outline">Yes</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                 <!-- /.comfirm dialog to delete user -->

                <?php
                        }
                ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Price($)</th>
                    <th>Picture</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>