{{-- View Modal --}}
<div class="modal fade" id="pdf{{ $user->id }}" data-bs-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="view" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            @foreach ($user->itemInstances as $instance)
                            <tr>
                                <th rowspan="7" style="text-align: center;">
                                    <img src="{{ asset('logo/DepEd.png') }}" alt="DepEd Logo" height="50"
                                        style="display: block; margin: 0 auto;">
                                    <br>
                                    <img src="{{ asset('logo/KNE.png') }}" alt="KNE Logo" height="50"
                                        style="display: block; margin: 0 auto;">
                                    <br>
                                    <?php
                                    // Extract only digits from the serial number for EAN13, ensure it's 12 digits long
                                    $serialNumberDigits = substr(preg_replace('/[^0-9]/', '', $instance->serial_number), 0, 12);

                                    // Generate EAN13 barcode HTML
                                    if (strlen($serialNumberDigits) == 12) {
                                        $html = DNS1D::getBarcodeHTML($serialNumberDigits, 'EAN13', 2, 60);
                                    } else {
                                        $html = 'Invalid Serial Number';
                                    }
                                    ?>
                                    {!! $html !!}
                                    <div>{{ $instance->serial_number }}</div>
                                </th>
                                <td>PROPERTY NUMBER</td>
                                <td>{{ $instance->item->new_property_number }}</td>
                            </tr>
                            <tr>
                                <td>ASSET CLASSIFICATION</td>
                                <td>{{ $instance->item->category->category_name }}</td>
                            </tr>
                            <tr>
                                <td>ITEM</td>
                                <td>{{ $instance->item->item_specification }}</td>
                            </tr>
                            <tr>
                                <td>SERIAL NUMBER</td>
                                <td>{{ $instance->serial_number }}</td>
                            </tr>
                            <tr>
                                <td>ACQUISITION DATE</td>
                                <td>{{ $instance->item->date_acquired }}</td>
                            </tr>
                            <tr>
                                <td>ACCOUNTABLE PERSONNEL</td>
                                <td>{{ $user->first_name }} {{ $user->middle_initial }}. {{ $user->last_name }}</td>
                            </tr>
                            <tr>
                                <td>VALIDATION SIGNATURE</td>
                            </tr>
                            <tr>
                                <td colspan="3" style="text-align: center;">TAMPERING OF THIS PROPERTY TAG IS PUNISHABLE
                                    BY LAW</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button id="btnPdf" class="btn btn-primary pull-right"><i class="fa fa-print"></i> Print</button>
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
        border: 1px solid black;
        margin-bottom: 1px;
    }

    .custom-table {
        width: 100%;
        margin: 0 auto;
        text-align: center;
    }

    .custom-table th,
    .custom-table td {
        padding: 8px;
        text-align: center;
    }
</style>

<script>
    document.getElementById("btnPdf").onclick = function() {
        printElement(document.getElementById("pdf{{ $user->id }}"));
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
            .table, th, td {
                border: 1px solid black;
                text-align: center;
                height: 25px;
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
            }
        `;
        printWindow.document.head.appendChild(styles);

        // Print the modal content
        printWindow.print();
        printWindow.onafterprint = function() {
            printWindow.close();
        };
    }
</script>
