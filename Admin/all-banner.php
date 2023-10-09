<?php

    include_once('functions/function.php');
    needlogged();
    if($_SESSION['role']=='1'){
    get_header();
    get_sidebar();

    $select_query = "SELECT * FROM users";
    $all_data = mysqli_query($con, $select_query);

?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3">
                              <div class="card-header">
                                <div class="row">
                                    <div class="col-md-8 card_title_part">
                                        <i class="fab fa-gg-circle"></i>All Banner Information
                                    </div>  
                                    <div class="col-md-4 card_button_part">
                                        <a href="add-user.php" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add Banner</a>
                                    </div>  
                                </div>
                              </div>
                              <div class="card-body">
                                <table class="table table-bordered table-striped table-hover custom_table">
                                  <thead class="table-dark">
                                    <tr>
                                      <!-- <th>No</th> -->
                                      <th> Title </th>
                                      <th> Subtitle </th>
                                      <th> Button </th>
                                      <th> Image </th>
                                      <th>Manage</th>
                                    </tr>
                                  </thead>
                                  <tbody>

                                    <?php
                                    $sel="SELECT * FROM banners ORDER BY ban_id DESC";
                                    $Q=mysqli_query($con,$sel);
                                    while($data=mysqli_fetch_assoc($Q)) {
                                      ?>
                                       <tr>
                                          <td><?= $data['ban_title']?></td>
                                          <td><?= $data['ban_subtitle']?></td>
                                          <td><?= $data['ban_button']?></td>
                                          
                                          <td>

                                          <?php if($data['ban_id']!=''){ ?>
                                          <img height="40" src="uploads/<?= $data['user_photo']; ?>" alt="User"/> 
                                          <?php }else{?>
                                            <img height="40" class="img200" src="images/avatar.jpg" alt="Banner"/>
                                          <?php }?>

                                          </td>
                                          <td>
                                              <div class="btn-group btn_group_manage" role="group">
                                                <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                                                <ul class="dropdown-menu">
                                                  <li><a class="dropdown-item" href="view-banner.php?v=<?= $data['ban_id'];?>">View</a></li>
                                                  <li><a class="dropdown-item" href="edit-banner.php?e=<?= $data['ban_id'];?>">Edit</a></li>
                                                  <li><a class="dropdown-item" href="delete-banner.php?d=<?= $data['ban_id'];?>">Delete</a></li>
                                                </ul>
                                              </div>
                                          </td>
                                        </tr>
                                    <?php
                                    }

                                    ?>
                                   
                                  </tbody>
                                </table>
                              </div>
                              <div class="card-footer">
                                <div class="btn-group" role="group" aria-label="Button group">
                                  <button type="button" class="btn btn-sm btn-dark">Print</button>
                                  <button type="button" class="btn btn-sm btn-secondary">PDF</button>
                                  <button type="button" class="btn btn-sm btn-dark">Excel</button>
                                </div>
                              </div>  
                            </div>
                        </div>
                    </div>

<?php

    get_footer();
  }else{
    header('Location: index.php');
  }

?>