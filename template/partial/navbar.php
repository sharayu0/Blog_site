<div class="navbar">
                
 
            <div class="name">
                <?php echo $username; ?> 

                
                <label>&#9776</label>
            </div>

            
            
            <div class="minimize"> 
                <div class="profile">
                    <div class="profle_pic">
                      <div class="initial">
                          <?php echo strtoupper(substr($username,0,1));?>          
                      </div>
                    </div>

                   
                    <div class="profile_info">
                        Hi, my name is <?php echo $username ?> Welcome to my Blog and enjoy Reading!
                    </div>
                </div>

                <div class="hr"></div>


                <div class="nav">
                
                    <div class="nav_block">
                      <i class="fas fa-home">
                            <a class="navitem text_deco_none" href="../author/home.php">Home</a>
                        </i>
                    </div>


                    <div class="nav_block">
                        <i class="fas fa-blog">
                            <a class="navitem text_deco_none" href="../author/mypost.php">My Posts</a>
                        </i>
                    </div>


                    <div class="nav_block">
                        <i class="fas fa-envelope-open-text">
                            <a class="navitem text_deco_none" href="#">Contact</a> 
                        </i>
                    </div>


                    <div class="nav_block">
                    <i class="fas fa-sign-out-alt">
                            <a class="navitem text_deco_none" href="../login/logout.php">Log Out</a> 
                        </i>
                    </div>

                    
                </div>
                
                <div class="hr"></div>
                <div class="mode">
                    <div><i class="fas fa-adjust"><a class="navitem text_deco_none" href="#">Dark Mode</a></i></div>
                    <div class="mode_btn" id="toggle">
                        <i class="indicator"></i>
                    </div>    
                </div>

            </div>

                

        </div>