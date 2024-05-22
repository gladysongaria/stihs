{{-- View Modal --}}
<div class="modal fade" id="print{{ $user->id }}" data-bs-keyboard="false" tabindex="-1" role="dialog"
    aria-smallledby="view" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="card-body">

                    <span class="logo-lg1">
                        <img src="{{ asset('logo/KNE.png') }}" alt="logo-dark" height="50">
                    </span>

                    <span class="logo-lg2">
                        <img src="{{ asset('logo/DepEd.png') }}" alt="logo-dark" height="50" position=>
                    </span>

                    <div class="header">
                        <div class="title">Department of Education</div>
                    </div>

                    <div class="header1">
                        <div class="header1">Central Office</div>
                    </div>
                    <div class="header">
                        <div class="title">INVENTORY CUSTODIAN SLIP</div>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Quantity</th>
                                <th>Unit</th>
                                <th>Item</th>
                                <th>Item No.</th>
                                <th>Date Acquired</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $displayedItems = [];
                            @endphp

                            @foreach ($user->itemInstances as $instance)
                            @if (!in_array($instance->item->id, $displayedItems))
                            <tr>
                                <td>{{ $instance->countItemInstances() }}</td>
                                <td>{{ $instance->item->unit_measure }}</td>
                                <td>{{ $instance->item->item_name }}</td>
                                <td>{{ $instance->item->id }}</td>
                                <td>{{ $instance->item->date_acquired }}</td>
                            </tr>
                            @php
                            $displayedItems[] = $instance->item->id;
                            @endphp
                            @endif
                            @endforeach
                        </tbody>
                    </table>

                    <div class="table-container">
                        <table class="custom-table">
                            <thead>
                                <tr >
                                    <td>Received From:</td>
                                    <td>Received By:</td>
                                </tr>
                                <tr>
                                    <td>
                                        Gail Balanoba
                                        <br>Signature Over Printed Name <br><br>
                                        Property Custodian<br>
                                        Position/Office <br><br>
                                        {{ \Carbon\Carbon::now()->toDateString() }} <br>
                                        Date
                                    </td>

                                        <td>
                                            <br>
                                            {{ $user->first_name }} {{ $user->middle_initial}}. {{$user->last_name }} <br>
                                            Signature Over Printed Name <br><br>
                                            {{$user->usertype}}<br>
                                            Position/Office <br><br>
                                            {{ \Carbon\Carbon::now()->toDateString() }} <br> <!-- This line displays the current date -->
                                            Date
                                        </td>

                                </tr>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button id="btnPrint" class="btn btn-primary pull-right"><i class="fa fa-print"></i> Print</button>
            </div>
        </div>
    </div>
</div>

<style>
    .header {
        text-align: center;
        font-family: serif;
        font-display: solid black;
    }
    .header1{
        margin-bottom: 10px;
        text-align: center;
        font-family: serif;
        font-size: 17px;
        font-display: solid black;
    }
    .logo-lg1 img {
        width: 150px;
        height: auto;
    }

    .logo-lg2 img {
        width: 100px;
        height: auto;
        margin-right: 10px;
    }
        .logo-lg1 {
        float: left;
        margin-right: 10px;
        margin-bottom: 10px;
    }
    .logo-lg2 {
        float: right;
        margin-left: 10px;
        margin-bottom: 10px;
    }
    .title {
        margin-bottom: 10px;
        font-family: serif;
        font-size: 20px;
        font-display: solid black;
    }
    .table {
        font-family: serif;
        font-size: 14px;
        border: 1px solid black;
        margin-bottom: 1px;

    }
    .custom-table {
    width: 100%;
    margin: 0 auto;
    text-align: center;
    }

.custom-table th, .custom-table td {
    padding: 8px;
    text-align: center;
    /* border: solid black ; */
    /* border: 1px solid black; */
}
</style>

<script>
    document.getElementById("btnPrint").onclick = function() {
        printElement(document.getElementById("print{{ $user->id }}"));
    };

    function printElement(elem) {
        // Clone the modal content node
        var modalContent = elem.querySelector('.modal-content').cloneNode(true);

        // Create a new div to hold the modal content for printing
        var printWindow = window.open('', '_blank');
        printWindow.document.body.appendChild(modalContent);

        // Append CSS styles for the table to the print window
        var styles = document.createElement('style');
        styles.textContent = `
            .header {
                text-align: center;
                font-family: serif;
                font-display: solid black;
            }
            .header1 {
                margin-bottom: 10px;
                text-align: center;
                font-family: serif;
                font-size: 17px;
                font-display: solid black;
            }
            .logo-lg1 img {
                width: 150px;
                height: auto;
            }
            .logo-lg2 img {
                width: 100px;
                height: auto;
                margin-right: 10px;
            }
            .logo-lg1 {
                float: left;
                margin-right: 10px;
                margin-bottom: 10px;
            }
            .logo-lg2 {
                float: right;
                margin-left: 10px;
                margin-bottom: 10px;
            }
            .title {
                margin-bottom: 10px;
                font-family: serif;
                font-size: 20px;
                font-display: solid black;
            }
            .table {
                font-family: serif;
                font-size: 14px;
                border-collapse: collapse;
                width: 100%;
                max-width: 100%;
                height: 270mm;
                max-height: 270mm;
                border: 1px solid black;
                margin-bottom: 1px;


            }
            .table,th {
                border: 1px solid black;
                text-align: center;
            }

            .custom-table {
            width: 100%;
            margin: 0 auto;
            text-align: center;
            border: 1px solid black;
            }

            @media print {
            #btnPrint {
            display: none;
            }
        `;
        printWindow.document.head.appendChild(styles);

        // Print the modal content
        printWindow.print();
        printWindow.onload = function() {
            printWindow.close();
        };
    }
</script>



