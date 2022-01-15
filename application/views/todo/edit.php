<div class="container-fluid">


    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="row justify-content-md-center">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Update Task</h1>
                        </div>
                        
                        <?php echo form_open('todo/edit/'.$todo_item['id'],array('class'=>'user')); ?>
                            <div class="form-group row">
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <input type="date" class="form-control" value="<?php echo ($this->input->post('todo_date') ? $this->input->post('todo_date') : $todo_item['todo_date']); ?>" id="todo_date" name="todo_date">
                                    <span class="text-danger"><?php echo form_error('todo_date');?></span>
                                </div>
                                <div class="col-sm-8 mb-3 mb-sm-0">
                                    <input type="text" class="form-control " id="todo" name="task"
                                        placeholder="Write here....." value="<?php echo ($this->input->post('task') ? $this->input->post('task') : $todo_item['task']); ?>">
                                    <span class="text-danger"><?php echo form_error('todo');?></span>
                                </div>
                                <div class="col-sm-1 mb-3 mb-sm-0">
                                    <input type="submit" class="btn btn-success" id="save" name="save" value="Updated">
                                </div>

                            </div>



                            <?php echo form_close(); ?>



                    </div>
                </div>
            </div>
        </div>
    </div>

</div>