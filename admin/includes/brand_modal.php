<!-- Add -->
<div class="modal fade" id="addnew" style="display: none;" aria-hidden="true">
    <div class="modal-dialog model-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Add New Brand</b></h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="brand_add.php" method="POST" class="form-valide">
                    <div class="form-group row">
                        <label for="name" class="col-lg-3 col-form-label">Name</label>
                        <div class="col-lg-9">
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
                <h4 class="modal-title"><b>Edit Brand Name</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="brand_edit.php" method="POST" class="form-horizontal">
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

<!-- Delete Brand -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Deleting...</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="brand_delete.php">
                <input type="hidden" class="catid" name="id">
                <div class="text-center">
                    <p>DELETE BRAND</p>
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