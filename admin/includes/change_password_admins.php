
<form action="process/process_change_password_admins.php" method="POST" enctype="multipart/form-data" role="form-control" >
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Old Password</label>
                      <input name="oldpass" type="password" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">New Password</label>
                      <input name="newpass" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Confirm Password</label>
                      <input name="cpass" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <input type="submit" class="btn btn-primary" name="cmdsubmit" value="change password">
                  </div>
                </form>