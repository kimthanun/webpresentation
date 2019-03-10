<?php
    include("func/func_category.php");
    include("func/func_product.php");
    $list_category=get_all_categories();

    if(isset($_GET['id'])){
      $pro=get_product_by_id($_GET['id']);
      
    }

    $product='';
    $price='';
    $picture='';
    $pro_error=[];

    if(isset($_POST['btn_submit'])){
        $cat_name=$_POST['category'];
        $cat_id=get_category_by_name($cat_name);
        

        $product=$_POST['product_name'];
        $price=$_POST['price'];
        $picture=$_FILES['picture']['name'];

        if(empty($_POST['product_name'])){
          $pro_error['pro_name']='has-error';
        }
        if(empty($_POST['price'])){
          $pro_error['price']='has-error';
        }
        if(empty($picture)){
          $picture="noimage.png";
        }
        if(count($pro_error)==0){
          if(!empty($picture)){
            move_uploaded_file($_FILES['picture']['tmp_name'],'files/'.time().$picture);
          }
          if(isset($_GET['id'])){
            update_product($_GET['id'],$product,$price,$picture,$cat_id[0]['id']);
            header('location:index.php?view=list_products');
          }
          else{
            insert_product($product,$price,$picture,$cat_id[0]['id']);
            header('location:index.php?view=list_products');
          }
        }
        
    }
?>
<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">ADD PRODUCT</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="box-body">
              <div class="form-group">
                  <label>Category</label>
                  <select class="form-control" name="category">
                    <?php 
                        foreach($list_category as $row)
                        {
                    ?>
                    <option><?=$row['cat_name']?></option>
                    <?php
                        }
                    ?>
                  </select>
                </div>
                <div class="form-group 
                        <?php
                          if(isset($pro_error['pro_name'])){
                            echo $pro_error['pro_name'];
                          }
                        ?>
                ">
                  <label>Product Name *</label>
                  <input type="text" id="product" class="form-control" placeholder="product name" name="product_name" value="<?php echo isset($_GET['id'])? $pro[0]['name']:$product ?>">
                </div>
                <div class="form-group
                        <?php
                          if(isset($pro_error['price'])){
                            echo $pro_error['price'];
                          }
                        ?>
                
                ">
                  <label>Price *</label>
                  <input type="text"  id="allownumericwithdecimal" class="form-control" placeholder="Price" name="price" value="<?php echo isset($_GET['id'])? $pro[0]['price']:$price ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Picture *</label>
                  <input type="file" name="picture">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="btn_submit">Submit</button>
              </div>
            </form>
          </div>
    </div>
</div>