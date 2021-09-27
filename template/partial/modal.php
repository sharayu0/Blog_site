<div class="modal_cont">

                <label for="show" class="close" onclick="off()">&times</label>

                <form action="admin_index.php" method="post">        
                  
                      <div class="head">Add User</div>
                        
                      <div class="form-group">
                          <label class="label">User Name</label>
                          <input type="text" class="form-control" id="username" name="username" required>
                      </div> 
                
                      <div class="form-group">
                          <label class="label">Password</label>
                          <input type="password" class="form-control" id="password" name="password" required>
                      </div>
                      
                      <div class="form-group">
                          <label class="label">Confirm Password</label>
                          <input type="password" class="form-control" id="password" name="cpassword" required>
                      </div>
                  

                      <div class="form-group">
                        
                        <label for="usertype" class="label">Usertype</label>
              
                        <select name="update_usertype" class="form-control">
                          <option value="admin">admin</option>
                          <option value="user">user</option>
                        </select>  

                      </div>
                  

                      <div class="form-btn">
                      
                        <button type="submit" class="btn">Sign Up</button>

                      </div>

                </form> 
            </div>