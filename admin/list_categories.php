    <?php 
        include("func/func_category.php");
        $list_category=get_all_categories();
        if(isset($_POST['cat_id'])){
          delete_category($_POST['cat_id']);
          header('location:index.php?view=list_categories');
        }
    ?>
    
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">CATEGORIES LIST</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>link</th>
                  <th>icon</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $cat_num=0;
                    foreach($list_category as $row){
                        $cat_num++;
                ?>
                <tr>
                  <td><?=$cat_num?></td>
                  <td><?=$row['cat_name']?></td>
                  <td><?=$row['link']?></td>
                  <td> <img width="32" src="files/<?=$row['icon']?>"></td>
                  <td>
                      <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#user_modal_<?=$cat_num;?>">Delete</a>
                      <a href="index.php?view=add_category&id=<?=$row['id']?>" class="btn btn-info">Edit</a>
                  </td>
                </tr>


                    <!-- comfirm dialog to delete user -->
                    <div class="modal fade modal-danger" id="user_modal_<?=$cat_num;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">DELETE CATEGORY</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            Do you want to delete this category: <i><?=$row['cat_name']?></i> ?
                          </div>
                          <div class="modal-footer">
                            <form action="" method="POST">
                              <input type="hidden" value="<?=$row['id'];?>" name="cat_id">
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
                    <th>link</th>
                    <th>icon</th>
                    <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>