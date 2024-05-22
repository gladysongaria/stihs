{{-- Create Modal --}}
<div class="modal fade" id="create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="createUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createUserLabel" >Add Item</h5>
                <button type="button " class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" >&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('item.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf

                    <div class="row">
                        {{-- Item Image --}}
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label">Item Image</label>
                                <input name='item_image' class="form-control" type="file" value="{{ old('item_image') }}">
                                @error('item_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- category_id --}}
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label">Category</label>
                                <select name="category_name" class="form-control" required>
                                    <option value="" disabled selected>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- item_name --}}
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label">Item Name</label>
                                <input name='item_name' class="form-control" type="text" value="{{ old('item_name') }}">
                                @error('item_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- item_description --}}
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label">Description</label>
                                <input name='item_description' class="form-control" type="text" value="{{ old('item_description') }}">
                                @error('item_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- item_specification --}}
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label">Specification</label>
                                <input name='item_specification' class="form-control" type="text" value="{{ old('item_specification') }}">
                                @error('item_specification')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- old_property_number --}}
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label">Old Property No.</label>
                                <input name='old_property_number' class="form-control" type="text" value="{{ old('old_property_number') }}">
                                @error('old_property_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- new_property_number --}}
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label">New Property No.</label>
                                <input name='new_property_number' class="form-control" type="text" value="{{ old('new_property_number') }}">
                                @error('new_property_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- quantity --}}
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label">Quantity</label>
                                <input name='quantity' class="form-control" type="number" value="{{ old('quantity') }}">
                                @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Unit_measure --}}
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label">Unit of Measure</label>
                                <input name='unit_measure' class="form-control" type="text" value="{{ old('unit_measure') }}">
                                @error('unit_measure')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- source --}}
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label">Source of Acquisition</label>
                                <select name="source" class="form-control" required>
                                    <option value="" disabled selected>Select Source</option>
                                    @foreach ($sources as $source)
                                        <option value="{{ $source->id }}">{{ $source->source }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        {{-- date_acquired --}}
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label">Date Acquired</label>
                                <input type="date" name="date_acquired" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-info waves-effect waves-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
