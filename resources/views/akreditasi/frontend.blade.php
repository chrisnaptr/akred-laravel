<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akreditasi Program Studi</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .status-kedaluwarsa {
            font-weight: bold;
        }
        .status-masih-berlaku {
            background-color: #28a745;
            color: white;
            padding: 2px 8px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Daftar Akreditasi Program Studi</h1>

    <!-- Filter Section -->
    <div class="row mb-4">
        <div class="col-md-4">
            <select class="form-select" aria-label="Filter Perguruan Tinggi">
                <option selected>Pilih Program Studi</option>
                <option value="1">Program Studi Teknik Geologi-S2</option>
                <option value="2">Program Studi Teknik Sipil-S1</option>
                <option value="3">Program Studi Teknik Mesin-S1</option>
                <option value="4">Program Studi Teknik Elektro-S1</option>
                <option value="5">Program Studi Teknik Geologi-S1</option>
                <option value="6">Program Studi Perencanaan Wilayah dan Kota</option>
                <option value="7">Program Studi Teknik Pertambangan-S1</option>
                <option value="8">Program Studi Teknik Mesin-D3</option>
                <option value="9">Program Studi Teknik Elektronika-D3</option>
                <option value="10">Institut Teknologi Nasional Yogyakarta</option>
            </select>
        </div>
    <div class="col-md-2">
            <select class="form-select" aria-label="Filter Status Kedaluwarsa">
                <option selected>Status Kedaluwarsa</option>
                <option value="1">Masih berlaku</option>
                <option value="2">Kedaluwarsa</option>
            </select>
        </div>
    </div>

    <!-- Table Section -->
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Program Studi</th>
                 <th>No. SK</th>
                <th>Tanggal Berlaku</th>
                <th>Tanggal Kedaluwarsa</th>
                <th>Download FIle Akreditasi</th>
            </tr>
        </thead>
    </table>

    <!-- Pagination -->
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>
</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
