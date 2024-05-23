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
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-title {
            font-weight: bold;
        }

        .modal-body {
            padding: 20px;
        }

        #labelTable {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }

        #labelTable th,
        #labelTable td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        .table-container {
            margin-top: 20px;
        }

        .custom-table td {
            padding: 10px;
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
            display: block;
        }

        .btn-close {
            border: none;
            background: none;
        }

        .modal-content {
            border-radius: 8px;
            overflow: hidden;
        }

        .modal-header .close {
            font-size: 1.5rem;
        }

        .table-container table {
            width: 100%;
        }

        .table-container td {
            text-align: left;
        }

        .table-container td:first-child {
            font-weight: bold;
        }

        .hidden {
            display: none;
        }
    </style>
</head>

<body>

    @if (auth()->user()->usertype == 'Property Custodian')
    {{-- Create Modal --}}
    <div class="modal fade" id="requestShow{{$user->id}}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" role="dialog" aria-labelledby="createUserLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createUserLabel">Supply Request Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <table id="labelTable" class="table">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Specification</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->pendingRequests as $request)
                            <tr class="label-row">
                                <td>{{ $request->item_name }}</td>
                                <td>{{ $request->item_specification }}</td>
                                <td>{{ $request->quantity }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <label>Purpose: {{$request->purpose}}</label>

                    <div class="table-container">
                        <table class="custom-table">
                            <thead>
                                <tr>
                                    <td>Requested By: {{$user->first_name}} {{$user->last_name}}
                                        {{$user->middle_initial}}.</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        onclick="submitRequest('pending', {{$request->id}})">Pending</button>
                    <button type="button" class="btn btn-sm btn-danger waves-light" data-bs-toggle="modal"
                        data-bs-target="#accept{{ $request->id }}">Accept</button>
                    <button type="button" class="btn btn-danger" onclick="showDeclineReason()">Decline</button>
                </div>

                <div class="hidden modal-body" id="acceptDateSection">
                    <label>Date Accepted: <input type="date" id="acceptDate" class="form-control"></label>
                    <button type="button" class="btn btn-primary"
                        onclick="submitRequest('accept', {{$request->id}})">Submit</button>
                </div>
                <div class="hidden modal-body" id="declineReasonSection">
                    <label>Reason for Decline:</label>
                    <textarea id="declineReason" class="form-control"></textarea>
                    <button type="button" class="btn btn-primary"
                        onclick="submitRequest('decline', {{$request->id}})">Submit</button>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    @elseif (auth()->user()->usertype == 'User' || auth()->user()->usertype == 'Teacher')

    <div class="modal fade" id="requestShow{{$user->id}}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" role="dialog" aria-labelledby="createUserLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createUserLabel">Supply Request Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <table id="labelTable" class="table">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Specification</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->requests as $request)
                            <tr class="label-row">
                                <td>{{ $request->item_name }}</td>
                                <td>{{ $request->item_specification }}</td>
                                <td>{{ $request->quantity }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <label>Purpose: {{$request->purpose}}</label>
                    @endforeach

                    <div class="table-container">
                        <table class="custom-table">
                            <thead>
                                <tr>
                                    <td>Requested By: {{$user->first_name}} {{$user->last_name}}
                                        {{$user->middle_initial}}.</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <script>
        function showAcceptDate() {
            document.getElementById('acceptDateSection').classList.remove('hidden');
            document.getElementById('declineReasonSection').classList.add('hidden');
        }

        function showDeclineReason() {
            document.getElementById('declineReasonSection').classList.remove('hidden');
            document.getElementById('acceptDateSection').classList.add('hidden');
        }

        function submitRequest(action, requestId) {
            var acceptDate = document.getElementById('acceptDate') ? document.getElementById('acceptDate').value : '';
            var declineReason = document.getElementById('declineReason') ? document.getElementById('declineReason').value : '';

            if (action === 'accept' && !acceptDate) {
                alert('Please select a date for acceptance.');
                return;
            }

            if (action === 'decline' && !declineReason) {
                alert('Please provide a reason for decline.');
                return;
            }

            var data = {
                action: action,
                requestId: requestId,
                acceptDate: acceptDate,
                declineReason: declineReason,
                _token: '{{ csrf_token() }}' // CSRF token for security
            };

            fetch('/update-supply-request', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Request has been ' + (action === 'accept' ? 'accepted' : action === 'decline' ? 'declined' : 'marked as pending'));
                    location.reload();
                } else {
                    alert('An error occurred while updating the request status.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while updating the request status.');
            });
        }
    </script>
</body>

</html>
