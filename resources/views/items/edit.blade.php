<!-- Edit Modal -->
<div class="modal fade" id="edit{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    role="dialog" aria-labelledby="createUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="createUserLabel">
                    Edit Item</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <form action="{{ route('item.update', $item->id) }}" method="POST">
                @csrf

                @method('PUT')
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="mb-0 position-relative">
                                <label class="form-label">Category</label>
                                <div class="col-sm-12">

                                    {{-- category_name --}}
                                    <select name="category_name" class="form-control" required>
                                        @foreach ($categories as $category);
                                            <option value="{{ $category->id }}"
                                                {{ $category->id === $item->category_id ? 'selected' : '' }}>
                                                {{ $category->category_name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    {{-- item_name --}}
                                    <div class="col-md-12">
                                        <div class="mb-0 position-relative">
                                            <label class="form-label">Item</label>
                                            <div class="col-sm-12">
                                                <input name='item_name' class="form-control" type="text"
                                                    value="{{ $item->item_name }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- item_description --}}
                                    <div class="col-md-12">
                                        <div class="mb-0 position-relative">
                                            <label class="form-label">Description</label>
                                            <div class="col-sm-12">
                                                <input name='item_description' class="form-control" type="text"
                                                    value="{{ $item->item_description }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- item_specification --}}
                                    <div class="col-md-12">
                                        <div class="mb-0 position-relative">
                                            <label class="form-label">Specification</label>
                                            <div class="col-sm-12">
                                                <input name='item_specification' class="form-control" type="text"
                                                    value="{{ $item->item_specification }}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- save changes button --}}
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info waves-effect waves-light"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
