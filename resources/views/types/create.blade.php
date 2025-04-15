<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Tipe Donasi</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color:rgb(181, 122, 74);
        }
        .container {
            max-width: 600px;
            margin-top: 50px;
        }
        .card {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #f5a327;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 24px;
            font-weight: 600;
        }
        .form-group label {
            font-weight: bold;
            color: #333;
        }
        .form-control {
            border-radius: 10px;
            box-shadow: none;
            background-color: #fff;
        }
        .form-control:focus {
            border-color: #6c5ce7;
            box-shadow: 0 0 10px rgba(108, 92, 231, 0.3);
        }

        /* Tombol SIMPAN - Oranye */
        .btn-custom-orange {
            background-color: #f5a327; /* Warna Oranye */
            border: none;
            color: #1f2937;
            font-weight: 600;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 8px;
            width: 48%;
            transition: all 0.3s ease;
        }

        .btn-custom-orange:hover {
            filter: brightness(110%);
            box-shadow: 0 4px 12px rgba(245, 163, 39, 0.4);
        }

        /* Tombol RESET - Biru */
        .btn-custom-blue {
            background-color: #007bff; /* Warna Biru */
            border: none;
            color: white;
            font-weight: 600;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 8px;
            width: 48%;
            transition: all 0.3s ease;
        }

        .btn-custom-blue:hover {
            filter: brightness(110%);
            box-shadow: 0 4px 12px rgba(0, 123, 255, 0.4);
        }

        .alert-danger {
            margin-top: 10px;
            font-size: 14px;
            border-radius: 5px;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
        }

        .btn-group-custom {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="card">
            <div class="card-header">
                Tambah Tipe Donasi
            </div>
            <div class="card-body">
                <form action="{{ route('donasi-disini.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                        
                        @error('image')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Masukkan Tujuan Donasi">
                        
                        @error('title')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Target</label>
                        <input type="number" class="form-control @error('target') is-invalid @enderror" name="target" value="{{ old('target') }}" placeholder="Masukkan Target Donasi">
                        
                        @error('target')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="btn-group-custom">
                        <button type="reset" class="btn-custom-blue">RESET</button>
                        <button type="submit" class="btn-custom-orange">SIMPAN</button>
                    </div>
                </form>

                <!-- Box Tombol Kembali -->
<div class="card mt-3">
    <div class="card-body text-center">
        <a href="{{ url()->previous() }}" class="btn btn-secondary btn-block" style="font-weight: 600; font-size: 16px;">
            ← KEMBALI
        </a>
    </div>
</div>

            </div>
        </div>
        <div class="footer">
            <p>&copy; 2025 Donasi Online</p>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
