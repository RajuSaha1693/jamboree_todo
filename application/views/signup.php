<div class="container-fluid">
    <div class="row justify-content-md-center">
        <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
            <div class="card text-center">
                <div class="card-header">
                    Jamboree Todo Your Everyday Partner
                </div>
                <div class="card-body">
                    <h5 class="card-title">Join us for FREE and start creating your Todo Task</h5>
                    <p class="card-text">Smooth way to start Just Signup with basic details and that's all.</p>
                    <?php echo form_open('Welcome/register'); ?>
                        <div class="form-group"  style="text-align:left !important">
                            <label for="name"> Full Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Full Name" id="name">
                            <span class="text-danger"><?php echo form_error('name');?></span>
                        </div>
                        <div class="form-group"  style="text-align:left !important">
                            <label for="email"> Email Address</label>
                            <input type="email" class="form-control" name="email" placeholder="Valid Email Adress" id="email">
                            <span class="text-danger"><?php echo form_error('email');?></span>
                        </div>
                        <div class="form-group"  style="text-align:left !important">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                            <span class="text-danger"><?php echo form_error('password');?></span>
                        </div>
                        <div class="form-group"  style="text-align:left !important">
                            <label for="confirm">Confirm Password :</label>
                            <input type="password" class="form-control" name="confirm" id="confirm">
                            <span class="text-danger"><?php echo form_error('confirm');?></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Sign Up" class="btn btn-success" name="signup">
                        </div>
                        
                    <?php echo form_close(); ?>
                </div>
                
            </div>
        </div>
    </div>
    
</div>