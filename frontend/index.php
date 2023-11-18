<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date Functions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row m-3">
            <h1>Select the month</h1>
            <div class="col-3">
                <form id="week-form">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Month</span>
                        <input type="month" name="month" id="month" class="form-control" placeholder="mm-yyyy" aria-label="Month">
                    </div>
                    <button class="btn btn-primary">Calculate</button>
                </form>
            </div>
            <div class="col-9" id="week"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="../backend/ajax.js"></script>
</body>

</html>