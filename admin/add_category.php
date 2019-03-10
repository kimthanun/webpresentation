<?php
    include("func/func_category.php");
    $category='';
    $link='';
    $icon='';
    if(isset($_GET['id'])){
        $list=get_category_by_id($_GET['id']);
        // echo $list[0]['cat_name'];
    }
    //die();
    $cat_error=[];
    if(isset($_POST['btn_submit']))
    {
       $category=$_POST['category'];
       $link=$_POST['link'];
       $icon=$_FILES['icon']['name'];
       if(empty($category)){
           $cat_error['category']='has-error';
       }
       if(empty($link)){
           $cat_error['link']='has-error';
       }
       if(empty($icon)){
           $icon="noimage.png";
       }
       if(count($cat_error)==0){
           if(!empty($icon)){
                move_uploaded_file($_FILES['icon']['tmp_name'],'files/'.time().$icon);
           }
           if(isset($_GET['id'])){
                //$list=get_category_by_id($_GET['id']);
               update_category($category,$link,$icon,$_GET['id']);
               header('location:index.php?view=list_categories');
           }
           else{
            insert_category($category,$link,$icon);
            header('location:index.php?view=list_categories');
           }
          
       }
    }
?>



<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">ADD CATEGORY</h3>
            </div>
            <!-- form start -->
            <form role="form" action="" method="POST" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group 
                        <?php 
                            if(isset($cat_error['category'])){
                                echo $cat_error['category'];
                            }
                        ?>
                    ">
                        <label>Category *</label>
                        <input type="text" id="category" class="form-control" placeholder="Category" name="category" value="<?php echo isset($_GET['id'])? $list[0]['cat_name']:$category ?>">
                    </div>
                    <div class="form-group
                        <?php
                            if(isset($cat_error['link'])){
                                echo $cat_error['link'];
                            }
                        ?>
                    ">
                        <label>Link *</label>
                        <input type="text" id="link" class="form-control"placeholder="Link" name="link" value="<?php echo isset($_GET['id'])? $list[0]['link']:$link ?>">
                    </div>
                    <div class="form-group">
                        <label>Icon</label>
                        <input type="file" name="icon">
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" id="button" class="btn btn-primary" name="btn_submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
