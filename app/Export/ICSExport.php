<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Add custom CSS styles here */
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header3{
            display: flex;
            font-size: 14px;
            text-align: left;
        }

        .header4{
            display: flex;
            font-size: 14px;
            text-align: right;
        }
        .logo {
            width: 100px; /* Adjust the width of your logo */
            height: auto; /* Maintain aspect ratio */

        }
        .title {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
            font-family: serif;

        }
        .entity-name {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th,
        .table td {
            border: 1px solid #ccc;
            padding: 8px;
        }
        .table th {
            background-color: #f0f0f0;
            text-align: left;
            font-family: serif;
        }
        .table td {
            text-align: left;
        }
    </style>

</head>
<body>
    <table class="table">
        <thead>
            <tr>
                <th>Quantity</th>
                <th>Unit</th>
                <th>Description</th>
                <th>Item No.</th>
                <th>Date Acquired</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($individuals as $instance)
                <tr>
                    <td>{{ $instance->count }}</td>
                    <td>{{ $instance->item->unit_measure }}</td>
                    <td>{{ $instance->item->item_description }}</td>
                    <td>{{ $instance->item->id }}</td>
                    <td>{{ $instance->item->date_acquired }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
