<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supply Request Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .modal-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
        }

        .modal-title {
            font-weight: bold;
        }

        .modal-body {
            padding: 20px;
        }

        .form-control {
            margin-bottom: 10px;
        }

        #labelTable th, #labelTable td {
            text-align: center;
            vertical-align: middle;
        }

        #labelTable input {
            width: 100%;
        }

        .table-container {
            margin-top: 20px;
        }

        .custom-table td {
            padding: 10px;
        }

        .btn {
            margin: 5px;
        }

        .modal-dialog {
            max-width: 800px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header .title {
            font-size: 1.5rem;
            font-weight: bold;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
        }

        .table {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    {{-- Create Modal --}}
    <div class="modal fade" id="form" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog"
        aria-labelledby="createUserLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createUserLabel">Supply Request Form</h5>
                    <button type="button " class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('form.store') }}" method="POST">
                        @csrf

                        <table id="labelTable" class="table" style="border: 1px solid black;">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Specification</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="label-row">
                                    <td><input name='item_name[]' class="form-control" type="text" value="{{ old('item_name') }}"></td>
                                    <td><input name='item_specification[]' class="form-control" type="text" value="{{ old('item_specification') }}"></td>
                                    <td><input name='quantity[]' class="form-control" type="text" value="{{ old('quantity') }}"></td>
                                    <td>
                                        <button type="button" class="btn btn-primary addLabelBtn">Add</button>
                                        <button type="button" class="btn btn-danger removeLabelBtn">Remove</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <label for="">Purpose:</label><input type="text" name="purpose" class="form-control" value="{{ old('purpose') }}">

                        <div class="table-container">
                            <table class="custom-table">
                                <thead>
                                    <tr style="text-align: left;">
                                        <td>Requested By:</td>
                                    </tr>
                                </thead>
                            </table>
                        </div>

                        <div style="text-align: right;">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
       document.addEventListener('DOMContentLoaded', function() {
        // Add button functionality
        document.querySelector('.addLabelBtn').addEventListener('click', function() {
            var labelRow = document.querySelector('.label-row').cloneNode(true);
            var tableBody = document.querySelector('#labelTable tbody');
            tableBody.appendChild(labelRow);
        });

        // Remove button functionality
        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('removeLabelBtn')) {
                var labelRow = event.target.closest('.label-row');
                if (labelRow) {
                    labelRow.remove();
                }
            }
        });
    });
    </script>
</body>
</html>
