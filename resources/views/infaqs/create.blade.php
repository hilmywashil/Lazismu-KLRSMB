<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Infaq</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background:rgb(181, 122, 74);
        }

        .container {
            max-width: 600px;
        }

        .card {
            border-radius: 12px;
            overflow: hidden;
        }

        .card-header {
            background-color: #f5a327;
            color: white;
            text-align: center;
            padding: 20px 0;
            font-size: 24px;
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #f5a327;
            border-color: #f5a327;
        }

        .btn-primary:hover {
            background-color: #f5a327 ;
            border-color: #f5a327;
        }

        .btn-warning {
            background-color: #f39c12;
            border-color: #f39c12;
        }

        .btn-warning:hover {
            background-color: #e67e22;
            border-color: #e67e22;
        }

        .alert-danger {
            margin-top: 10px;
            font-size: 14px;
            border-radius: 5px;
        }

        .form-control {
            border-radius: 10px;
            box-shadow: none;
        }

        .form-control:focus {
            border-color: #f5a327;
            box-shadow: 0 0 10px #f5a327;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <div class="container mt-5 mb-5">
        <div class="card shadow">
            <div class="card-header">
                Infaq Online
            </div>
            <div class="card-body">
                <form action="{{ route('infaq.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Nama Donatur</label>
                        <input type="text" class="form-control" id="name" name="name" required
                            placeholder="Masukkan Nama Anda">

                        <div class="form-check mt-2">
                            <input type="checkbox" class="form-check-input" id="anonim" onchange="setAnonim()">
                            <label class="form-check-label" for="anonim">Donasi sebagai Hamba Allah</label>
                        </div>
                        @error('name')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" class="form-control @error('amount') is-invalid @enderror" name="amount"
                            value="{{ old('amount') }}" placeholder="Masukkan Jumlah Infaq">

                        @error('amount')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Metode Pembayaran</label>
                        <select class="form-control @error('payment_method') is-invalid @enderror" name="payment_method"
                            value="{{ old('payment_method') }}" placeholder="Masukkan metode pembayaran Infaq">
                            <option value="QRIS">QRIS</option>
                            <option value="Bank">Bank</option>
                        </select>
                        @error('payment_method')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-block mt-4">LANJUTKAN</button>
                </form>
            </div>
        </div>
        <div class="footer">
            <p>&copy; 2025 Infaq Online</p>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<script>
    function setAnonim() {
        let checkbox = document.getElementById('anonim');
        let namaInput = document.getElementById('name');

        if (checkbox.checked) {
            namaInput.value = "Hamba Allah";
            namaInput.readOnly = true;
        } else {
            namaInput.value = "";
            namaInput.readOnly = false;
        }
    }
</script>

</html>