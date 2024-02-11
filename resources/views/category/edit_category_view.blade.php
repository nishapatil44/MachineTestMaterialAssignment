<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Side Menu with Data List</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        #sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100%;
            background-color: #333;
            color: #fff;
            padding-top: 20px;
        }
        #sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        #sidebar ul li {
            padding: 10px;
            border-bottom: 1px solid #555;
        }
        #sidebar ul li:hover {
            background-color: #555;
        }
        #content {
            margin-left: 250px;
            padding: 20px;
        }
        .data-list {
            margin-top: 20px;
        }
        .data-list table {
            width: 100%;
            border-collapse: collapse;
        }
        .data-list th, .data-list td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .data-list th {
            background-color: #f2f2f2;
        }
        .data-list td button {
            cursor: pointer;
            margin-right: 5px;
        }
        .white-text {
            color: white;
            text-decoration: none; /* Remove underline */
        }
    </style>
</head>

<body>

<div id="sidebar">
    <ul>
        <li><a href="{{ route('categories.show') }}" class="white-text">Category</a></li>
        <li><a href="{{ route('materials.show') }}" class="white-text">Material</a></li>
        <li><a href="{{ route('iomaster.show') }}" class="white-text">Inward/Outward Master</a></li>
    </ul>
</div>

<div id="content">
    <div class="card-body">
        <div id="successMessage" class="alert alert-success" style="display: none;">
            Category Updated Successfully
        </div>
        <form method="post" action="{{ route('categories.update') }}" onsubmit="showSuccessMessage()">
        @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$category['name'] ?? null}}" required>
                    <input type="text" class="form-control" id="id" name="id" value="{{$category['id']}}" hidden>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('categories.show') }}"><button type="button" class="btn btn-primary">Back</button>
        </form>
    </div>
</div>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
