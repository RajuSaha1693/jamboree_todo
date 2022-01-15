<div class="container-fluid">


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary" style="float:left">Task List</h6>
            <?php echo form_open('todo'); ?>
            <input type="submit" value="Filter" name="filtersave" class="btn btn-success btn-sm mx-2" style="float:right;height: 37px;"/>
            <input type="date" name="filterdate" id="filterdate" style="float:right;height: 37px;" class="form-control col-sm-3">
            <?php echo form_close(); ?>
            
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Status</th>
                            <th>Date</th>
                            <th style="width:70%">Task</th>
                            <th>Action</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($todo_item as $t){ ?>
                        <tr>
                            <td>
                                <div class="double">
                                    <input type="checkbox" name="hello" value="1" <?php if($t['status']==1){?> checked <?php }?> onclick="updatestatus(<?php echo $t['id']; ?>)"/>
                                </div>
                            </td>
                            <td><?php echo $t['todo_date']; ?></td>
                            <td>
                                <?php if($t['status']==1){?><strike style="color:red"><?php echo $t['task']; ?></strike>
                                <?php }else{?>
                                <?php echo $t['task']; ?>
                                <?php }?>
                            </td>
                            <td>
                                
                                <a href="<?php echo site_url('todo/edit/'.$t['id']); ?>"
                                    class="btn btn-info btn-sm">Edit</a>
                                <a href="<?php echo site_url('todo/remove/'.$t['id']); ?>"
                                    class="btn btn-warning btn-sm">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</div>