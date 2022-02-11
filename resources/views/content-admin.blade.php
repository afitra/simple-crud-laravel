@extends('layouts.masterLayoutAdmin')

@section('content')
<div class="container-fluid">
     <!-- DataTales Example -->
     <div class="card shadow mb-4">
        <div class="card-header py-3">
            {{-- <h6 class="m-0 font-weight-bold text-primary">Data of Foods Menu</h6> --}}
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add-food-modal" onclick="clearForm()" >
              <i class="fas fa-plus"></i>
            </button>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Rating</th>
                            <th>Action</th>
                       
                        </tr>
                    </thead>
                   
                    <tbody>
                        @foreach ($foods as $food)
                        <tr>
                            <td>{{$food->name}}</td>
                            <td>{{$food->price}}</td>
                            <td>{{$food->category}}</td>
                            <td>{{$food->rating}}</td>
                            <td> 
                                <a href="javascript:void(0);" onclick=" " type="button"class="btn btn-success btn-circle btn-sm button-show-food" data-id="{{$food->id}}" data-name="{{$food->name}}" data-price="{{$food->price}}" data-category="{{$food->category}}" data-rating="{{$food->rating}}" >
                                    <i class="fas fa-info"></i>
                                </a>
                                <a href="javascript:void(0);" onclick=" " type="button"class="btn btn-warning btn-circle btn-sm button-update-food" data-id="{{$food->id}}" data-id="{{$food->id}}"data-name="{{$food->name}}" data-price="{{$food->price}}" data-category="{{$food->category}}" data-rating="{{$food->rating}}" >
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-circle  btn-sm button-delete-food" >
                                    <i class="fas fa-trash"></i>
                                </a>
      
                            </td>
                            <form
                           id="formActionDelete"
                            action="{{ route('foods.destroy',$food->id)}}"
                            method="POST"
                            
                          >
                          @csrf
                          @method('DELETE')
                            </form>
                      
                        </tr>

                        @endforeach
                    </tbody>
                </table>
                {{$foods->links()}}
            </div>
        </div>
    </div>
</div>
<!-- Modal Update-->
<div
  class="modal fade"
  id="show-food-modal"
  tabindex="-1"
  role="dialog"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Food</h5>
        <button
          type="button"
          class="close"
          data-dismiss="modal"
          aria-label="Close"
        >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form
        id="formActionUpdate"
        action="{{ route('foods.update',0)}}"
        method="POST"
        
      >
      @csrf
      @method('PUT')
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Name</label>
            <input
              type="text"
              class="form-control name"
              name="name"
              placeholder="name food"
              required
            />
          </div>
          <div class="form-group">
            <label for="price">Price</label>
            <input
              type="text"
              class="form-control price"
              name="price"
              placeholder="price food"
              required
            />
          </div>
          <div class="form-group">
            <label for="category">Category</label>
            <input
              type="text"
              class="form-control category"
              name="category"
              placeholder="category food"
              required
            />
          </div>
          <div class="form-group">
            <label for="rating">Rating</label>
            <input
              type="text"
               
              class="form-control rating"
              name="rating"
              placeholder="rating food"
              required
            />
          </div>
        
      
        </div>
        <div class="modal-footer">
          <input type="hidden" class="id" name="id" />
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Close
          </button>
          <button type="submit" class="btn btn-info button-save">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
 
{{-- modal Add --}}
<div
class="modal fade"
id="add-food-modal"
tabindex="-1"
role="dialog"
aria-labelledby="exampleModalAddLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalAddLabel">Add Food Data</h5>
      <button
        type="button"
        class="close"
        data-dismiss="modal"
        aria-label="Close"
      >
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form
      id="formActionUpdate"
      action="{{ route('foods.store')}}"
      method="POST"
      
    >
    @csrf
   
      <div class="modal-body">
        <div class="form-group">
          <label for="name">Name</label>
          <input
            type="text"
            id="inputAddName"
            class="form-control name"
            name="name"
            placeholder="name food"
            required
          />
        </div>
        <div class="form-group">
          <label for="price">Price</label>
          <input
            type="text"
            id="inputAddPrice"
            class="form-control price"
            name="price"
            placeholder="price food"
            required
          />
        </div>
        <div class="form-group">
          <label for="category">Category</label>
          <input
            type="text"
            id="inputAddCategory"
            class="form-control category"
            name="category"
            placeholder="category food"
            required
          />
        </div>
        <div class="form-group">
          <label for="rating">Rating</label>
          <input
            type="text"
             id="inputAddRating"
            class="form-control rating"
            name="rating"
            placeholder="rating food"
            required
          />
        </div>
      
    
      </div>
      <div class="modal-footer">
         
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          Close
        </button>
        <button type="submit" class="btn btn-info button-save">Post</button>
      </div>
    </form>
  </div>
</div>
</div>

@endsection