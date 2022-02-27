<!-- View Overview -->
<div class="modal fade" id="description">
  <div class="modal-dialog model-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b><span class="name"></span></b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <p id="desc"></p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Add -->
<div class="modal fade" id="addnew" style="display: none;" aria-hidden="true">
  <div class="modal-dialog model-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Add New Product</b></h4>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form action="products_add.php" method="POST" class="form-valide" enctype="multipart/form-data">
          
          <div class="form-group row">
            <label for="name" class="col-lg-2 col-form-label">Name</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <label for="category" class="col-lg-2 col-form-label">Category</label>
            <div class="col-sm-4">
              <select class="form-control" name="category" id="category" required>
                <option value="" selected>- Select -</option>
              </select>
            </div>
          </div>
          
          <div class="form-group row">
            <label for="sub_category" class="col-lg-2 col-form-label">Sub Category</label>
            <div class="col-sm-4">
              <select class="form-control" name="sub_category" id="sub_category" required>
                <option value="" selected>- Select -</option>
              </select>
            </div>
            <label for="brand" class="col-lg-2 col-form-label">Brand</label>
            <div class="col-sm-4">
              <select class="form-control" name="brand" id="brand" required>
                <option value="" selected>- Select -</option>
              </select>
            </div>
          </div>
            
          <div class="form-group row">
            <label for="price" class="col-lg-2 col-form-label">Price</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="price" name="price" required>
            </div>
            <label for="stock" class="col-lg-2 col-form-label">Stock</label>
            <div class="col-sm-4">
              <input type="number" class="form-control" id="stock" name="stock">
            </div>

            <!-- Product Details -->
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Product Details</h4>
                  <!-- Tabs -->
                  <div class="default-tab">
                    <ul class="nav nav-tabs mb-3" role="tablist">
                      <li class="nav-item">
                        <a href="#overview" class="nav-link active show" data-toggle="tab">Overview</a>
                      </li>
                      <li class="nav-item">
                        <a href="#add-description" class="nav-link" data-toggle="tab">Description</a>
                      </li>
                      <li class="nav-item">
                        <a href="#history" class="nav-link" data-toggle="tab">History</a>
                      </li>
                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane fade active show" id="overview" role="tabpanel">
                        <textarea id="overview-editor" name="overview"></textarea>
                      </div>
                      <div class="tab-pane fade" id="add-description" role="tabpanel">
                        <textarea id="description-editor" name="description"></textarea>
                      </div>
                      <div class="tab-pane fade" id="history">
                        <textarea id="history-editor" name="history"></textarea>
                      </div>
                  </div>
                </div>
              </div>
            </div>
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
<div class="modal fade" id="product_edit">
  <div class="modal-dialog model-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Edit Product</b></h4>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form action="products_edit.php" method="POST" class="form-valide" enctype="multipart/form-data">
          <input type="hidden" class="proid" name="id">
          <div class="form-group row">
            <label for="edit_name" class="col-lg-2 col-form-label">Name</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="edit_name" name="edit_name" required>
            </div>
            <label for="edit_category" class="col-lg-2 col-form-label">Category</label>
            <div class="col-sm-4">
              <select class="form-control" name="edit_category" id="edit_category" required>
                <option value="" selected id="catselected"></option>
              </select>
            </div>
          </div>
          
          <div class="form-group row">
            <label for="edit_sub_category" class="col-lg-2 col-form-label">Sub Category</label>
            <div class="col-sm-4">
              <select class="form-control" name="edit_sub_category" id="edit_sub_category" required>
                <option value="" selected id="sub_catselected"></option>
              </select>
            </div>
            <label for="edit_brand" class="col-lg-2 col-form-label">Brand</label>
            <div class="col-sm-4">
              <select class="form-control" name="edit_brand" id="edit_brand" required>
                <option value="" selected id="brandselected"></option>
              </select>
            </div>
          </div>
            
          <div class="form-group row">
            <label for="edit_price" class="col-lg-2 col-form-label">Price</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="edit_price" name="edit_price" required>
            </div>
            <label for="edit-stock" class="col-lg-2 col-form-label">Stock</label>
            <div class="col-sm-4">
              <input type="number" class="form-control" id="edit-stock" name="edit-stock">
            </div>

            <!-- Product Details -->
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Product Details</h4>
                  <!-- Tabs -->
                  <div class="default-tab">
                    <ul class="nav nav-tabs mb-3" role="tablist">
                      <li class="nav-item">
                        <a href="#edit-overview" class="nav-link active show" data-toggle="tab">Overview</a>
                      </li>
                      <li class="nav-item">
                        <a href="#edit-description" class="nav-link" data-toggle="tab">Description</a>
                      </li>
                      <li class="nav-item">
                        <a href="#edit-history" class="nav-link" data-toggle="tab">History</a>
                      </li>
                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane fade active show" id="edit-overview" role="tabpanel">
                        <textarea id="overview-editor1" name="edit_overview"></textarea>
                      </div>
                      <div class="tab-pane fade" id="edit-description">
                        <textarea id="description-editor1" name="edit_description"></textarea>
                      </div>
                      <div class="tab-pane fade" id="edit-history">
                        <textarea id="history-editor1" name="edit_history"></textarea>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>                                                    
        </div>
    </div>
    <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
          <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="far fa-check-square"></i> Update</button>
          </form>
    </div>
  </div>
</div>
</div>