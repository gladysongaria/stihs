{{-- View Modal --}}
<div class="modal fade" id="itemCondition{{ $user->id }}" data-bs-keyboard="false" tabindex="-1" role="dialog"
    aria-smallledby="view" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="card-body">



                    <table class="table">
                        <thead>
                            <tr>
                                <th>Serial No.</th>
                                <th>Item Name</th>
                                <th>Condition</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->itemInstances as $instance)
                            <tr>
                                <?php
                                        // Extract only digits from the serial number
                                        $serialNumberDigits = preg_replace('/[^0-9]/', '', $instance->serial_number);


                                        // Generate EAN13 barcode HTML
                                        $html = DNS1D::getBarcodeHTML($serialNumberDigits, 'EAN13', 1, 30);
                                        ?>

                                    <td style="text-align: center; vertical-align: middle;">
                                        {!! $html !!}
                                        {{$instance->serial_number}}
                                    </td>
                                <td>{{ $instance->item->item_name }}</td>
                                <td>{{$instance->status}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>



                </div>
            </div>
            <div class="modal-footer">
                <button id="conditionPrint" class="btn btn-primary pull-right"><i class="fa fa-print"></i> Print</button>
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
    document.getElementById("conditionPrint").onclick = function() {
        printElement(document.getElementById("itemCondition{{ $user->id }}"));
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
                height: 70px;
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



