<!DOCTYPE html>
<html>
    <head>
        <title>Crud Application - View Users</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->

    </head>
    <body>
        <div class="navbar navbar-dark bg-dark">
            <div class="container">
                <a href="#" class="navbar-brand">CRUD APPLICATION</a>
            </div>
        </div>
        <div class="container" style="padding-top: 10px;">

            <div class="row">
              <div class="col-md-8">
              <div class="row">
                  <div class="col-6"><h3>View Users</h3></div>
                    <div class="col-6 text-right">
                      <a href="<?php echo base_url().'index.php/user/create';?>" class="btn btn-primary ">Create</a>
                    </div>
                  </div>  
                  <hr>
                </div>
                
              </div>

            
             
            <div class="row">
              
              <div class="col-md-8">
                <table class="table table-striped">
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th width="60">Edit</th>
                    <th width="100">Delete</th>
                  </tr>
                  
                  <?php if (!empty($users)) { foreach($users as $user) {?>
                  <tr>
                    <td><?php echo $user['user_id']?></td>
                    <td><?php echo $user['name']?></td>
                    <td><?php echo $user['email']?></td>
                    <td>
                      <a href="<?php echo base_url().'index.php/user/edit/'.$user['user_id']?>" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                      <a href="<?php echo base_url().'index.php/user/delete/'.$user['user_id']?>" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                  <?php } }else { ?>
                    <tr>
                      <td colspan="5">Records not found</td>
                    </tr>
                    <?php } ?>
                  </table>
                
             </div>

            </div>
            
        </div>
        
            

    </body>
</html>