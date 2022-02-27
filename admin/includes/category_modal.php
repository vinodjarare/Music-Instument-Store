<!-- Add -->
<div class="modal fade" id="addnew" style="display: none;" aria-hidden="true">
    <div class="modal-dialog model-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Add New Category</b></h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="category_add.php" method="POST" class="form-horizontal">
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Name</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                    </div>
                                                    
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Edit Category</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="category_edit.php" method="POST" class="form-horizontal">
                    <input type="hidden" class="catid" name="id">
                    <div class="form-group">
                        <label for="edit_name" class="col-sm-3 control-label">Name</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_name" name="name">
                        </div>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                <button type="submit" class="btn btn-primary btn-flat" name="edit"><i class="far fa-check-square"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Deleting...</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="category_delete.php">
                <input type="hidden" class="catid" name="id">
                <div class="text-center">
                    <p>DELETE CATEGORY</p>
                    <p style="color: red;">Warning: This will also delete all the subcategories and related brands.</p>
                    <h2 class="bold catname"></h2>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Add new sub category -->
<div class="modal fade" id="addnewsub">
    <div class="modal-dialog model-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Add New Sub Category</b></h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="category_add.php" method="POST" class="form-horizontal">
                    <input type="hidden" class="catid" name="id">
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Name</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                    </div>
                                                    
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                <button type="submit" class="btn btn-primary btn-flat" name="addsub"><i class="fa fa-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Sub Category -->
<div class="modal fade" id="edit_sub">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Edit Sub Category</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="category_edit.php">
                <input type="hidden" class="subcatid" name="id">
                <div class="form-group row">
                    <label for="edit_catsub" class="col-sm-3 control-label">Subcategory</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="edit_catsub" name="name">
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit_sub"><i class="far fa-check-square"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Sub Category -->
<div class="modal fade" id="delete_sub">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Deleting...</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="category_delete.php">
                <input type="hidden" class="subcatid" name="id">
                <div class="text-center">
                    <p>DELETE SUBCATEGORY</p>
                    <p style="color: red;">Warning: This will also delete all the related brands.</p>
                    <h2 class="bold subcatname"></h2>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete_sub"><i class="fa fa-trash"></i> Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>