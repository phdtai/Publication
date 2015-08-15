<!--add header -->
<?php include_once 'header.php'; ?>

      <!-- Left side column. contains the logo and sidebar -->
<?php include_once 'main_sidebar.php'; ?> <!-- main sidebar area -->
      <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            BOOK MANAGEMENT
            <small>manage all book information</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=$base_url ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Book Management</li>
          </ol>
        </section>
        
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <div class="box">
                    <div class="text-center">
                    <br>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                      Add new book
                    </button>
                    <br>
                    </div>
                    <div class="box-header with-border">
                        <h3 class="box-title text-center">Search Book By</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                
                <form role="form-inline">
                  <div class="box-body">
                      <div class="row">
                          <div class="col-md-4">
                              <div class="form-group">
                                <label for="bookname">Book Name:</label>
                                <input type="text" placeholder="Book Name" id="bookname" class="form-control">
                              </div>
                              
                              <div class="form-group">
                                <label>Category</label>
                                <select class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                  <option selected="selected">Alabama</option>
                                  <option>Alaska</option>
                                  <option>California</option>
                                  <option>Delaware</option>
                                  <option>Tennessee</option>
                                  <option>Texas</option>
                                  <option>Washington</option>
                                </select>
                                </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                <label for="book_id">Book Id</label>
                                <input type="text" id="book_id" class="form-control">

                              </div>
                              
                                <div class="form-group">
                                <label>Storing Place</label>
                                <select class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                  <option selected="selected">Alabama</option>
                                  <option>Alaska</option>
                                  <option>California</option>
                                  <option>Delaware</option>
                                  <option>Tennessee</option>
                                  <option>Texas</option>
                                  <option>Washington</option>
                                </select>
                                </div>
                          </div>
                          <div class="col-md-4">
                             <div class="form-group">
                                <label for="price">Quantity</label>
                                <input type="text" id="price" class="form-control">

                              </div>
                              
                               <div class="form-group">
                                <label>Company</label>
                                <select class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                  <option selected="selected">Alabama</option>
                                  <option>Alaska</option>
                                  <option>California</option>
                                  <option>Delaware</option>
                                  <option>Tennessee</option>
                                  <option>Texas</option>
                                  <option>Washington</option>
                                </select>
                                </div>
                          </div>
                      </div>
                    
                      
                    
                    
                     
              
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button class="btn btn-success pull-right" type="submit">Search</button>
                  </div>
                </form>
                    </div>
                    
                    </div>
                </div>
            </div>
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Book Details</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Book Name</th>
                      <th>Category</th>
                      <th style="width: 40px">Quantity</th>
                      <th>Price</th>
                      <th class="text-center">Modify</th>
                    </tr>
                    <tr>
                      <td>1.</td>
                      <td>English for today</td>
                      <td>Science</td>
                      <td><span class="badge bg-red">55</span></td>
                      <td>500tk</td>
                      <td class="text-center">
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#updatebook">edit</a> | <a href="#" class="btn btn-danger btn-xs" >delete</a> | <a href="#" class="btn btn-info btn-xs" >view</a></td>
                    </tr>
                     <tr>
                      <td>2.</td>
                      <td>English for today</td>
                      <td>Science</td>
                      <td><span class="badge bg-red">55</span></td>
                      <td>500tk</td>
                      <td class="text-center">
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#updatebook">edit</a> | <a href="#" class="btn btn-danger btn-xs" >delete</a> | <a href="#" class="btn btn-info btn-xs" >view</a></td>
                    </tr>
                     <tr>
                      <td>3.</td>
                      <td>English for today</td>
                      <td>Science</td>
                      <td><span class="badge bg-red">55</span></td>
                      <td>500tk</td>
                      <td class="text-center">
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#updatebook">edit</a> | <a href="#" class="btn btn-danger btn-xs" >delete</a> | <a href="#" class="btn btn-info btn-xs" >view</a></td>
                    </tr>
                     <tr>
                      <td>4.</td>
                      <td>English for today</td>
                      <td>Science</td>
                      <td><span class="badge bg-red">55</span></td>
                      <td>500tk</td>
                      <td class="text-center">
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#updatebook">edit</a> | <a href="#" class="btn btn-danger btn-xs" >delete</a> | <a href="#" class="btn btn-info btn-xs" >view</a></td>
                    </tr>
                      
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a href="#">&laquo;</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">&raquo;</a></li>
                  </ul>
                </div>
              </div><!-- /.box -->

              
            </div><!-- /.col -->
            
          </div><!-- /.row -->

     <!-- Insert Modal -->
              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Add New Book</h4>
                    </div>
                    <div class="modal-body">
                       <form role="form-inline">
                  <div class="box-body">
                      <div class="row">
                          <div class="col-md-4">
                              <div class="form-group">
                                <label for="bookname">Book Name:</label>
                                <input type="text" placeholder="Book Name" id="bookname" class="form-control">
                              </div>
                              
                              <div class="form-group">
                                <label>Category</label>
                                <select class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                  <option selected="selected">Alabama</option>
                                  <option>Alaska</option>
                                  <option>California</option>
                                  <option>Delaware</option>
                                  <option>Tennessee</option>
                                  <option>Texas</option>
                                  <option>Washington</option>
                                </select>
                                </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" id="price" class="form-control">

                              </div>
                              
                                <div class="form-group">
                                <label>Storing Place</label>
                                <select class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                  <option selected="selected">Alabama</option>
                                  <option>Alaska</option>
                                  <option>California</option>
                                  <option>Delaware</option>
                                  <option>Tennessee</option>
                                  <option>Texas</option>
                                  <option>Washington</option>
                                </select>
                                </div>
                          </div>
                          <div class="col-md-4">
                             <div class="form-group">
                                <label for="price">Quantity</label>
                                <input type="text" id="price" class="form-control">

                              </div>
                              
                               <div class="form-group">
                                <label>Company</label>
                                <select class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                  <option selected="selected">Alabama</option>
                                  <option>Alaska</option>
                                  <option>California</option>
                                  <option>Delaware</option>
                                  <option>Tennessee</option>
                                  <option>Texas</option>
                                  <option>Washington</option>
                                </select>
                                </div>
                          </div>
                      </div>
                    
                      
                    
                    
                     
              
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button class="btn btn-primary btn-block" type="submit">Submit</button>
                  </div>
                </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    
                    </div>
                  </div>
                </div>
              </div>

      <!-- update modal -->
           <!-- Modal -->
              <div class="modal fade" id="updatebook" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Update</h4>
                    </div>
                    <div class="modal-body">
                       <form role="form-inline">
                  <div class="box-body">
                      <div class="row">
                          <div class="col-md-4">
                              <div class="form-group">
                                <label for="bookname">Book Name:</label>
                                <input type="text" placeholder="Book Name" id="bookname" class="form-control">
                              </div>
                              
                              <div class="form-group">
                                <label>Category</label>
                                <select class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                  <option selected="selected">Alabama</option>
                                  <option>Alaska</option>
                                  <option>California</option>
                                  <option>Delaware</option>
                                  <option>Tennessee</option>
                                  <option>Texas</option>
                                  <option>Washington</option>
                                </select>
                                </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" id="price" class="form-control">

                              </div>
                              
                                <div class="form-group">
                                <label>Storing Place</label>
                                <select class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                  <option selected="selected">Alabama</option>
                                  <option>Alaska</option>
                                  <option>California</option>
                                  <option>Delaware</option>
                                  <option>Tennessee</option>
                                  <option>Texas</option>
                                  <option>Washington</option>
                                </select>
                                </div>
                          </div>
                          <div class="col-md-4">
                             <div class="form-group">
                                <label for="price">Quantity</label>
                                <input type="text" id="price" class="form-control">

                              </div>
                              
                               <div class="form-group">
                                <label>Company</label>
                                <select class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                  <option selected="selected">Alabama</option>
                                  <option>Alaska</option>
                                  <option>California</option>
                                  <option>Delaware</option>
                                  <option>Tennessee</option>
                                  <option>Texas</option>
                                  <option>Washington</option>
                                </select>
                                </div>
                          </div>
                      </div>
                    
                      
                    
                    
                     
              
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button class="btn btn-primary btn-block" type="submit">Update</button>
                  </div>
                </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    
                    </div>
                  </div>
                </div>
              </div>


          
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- insert book -->



<?php include_once 'footer.php'; ?>