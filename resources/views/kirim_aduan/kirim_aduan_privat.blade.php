{{-- Template Kerangka Site --}}
@extends('layout.app')

{{-- Title Site --}}
@section('title', 'Kirim Aduan Privat')

{{-- Form aduan --}}
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
        .aduan-card {
            background: #f6f7ff;
            border-radius: 22px;
            box-shadow: 0 4px 32px 0 rgba(83,29,171,0.13);
            padding: 2.5rem 2rem;
            margin: 0 auto;
        }
        .aduan-card label {
            color: #531DAB;
            font-weight: 600;
        }
        .aduan-card .form-control:focus {
            border-color: #842FE3;
            box-shadow: 0 0 0 0.15rem rgba(132, 47, 227, 0.13);
        }
        .aduan-card .btn-primary {
            background: linear-gradient(to right, #531DAB, #842FE3);
            border: none;
            font-weight: 600;
            letter-spacing: 1px;
            box-shadow: 0 2px 8px 0 rgba(83,29,171,0.10);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .aduan-card .btn-primary:active {
            transform: scale(0.97);
        }
        .aduan-card .btn-primary:hover {
            box-shadow: 0 4px 16px 0 rgba(83,29,171,0.18);
        }
        @media (max-width: 575.98px) {
            .aduan-card {
                padding: 1.2rem 0.5rem;
            }
        }
    </style>
    <section id="formLapor" class="container-lg my-5 animate__animated animate__fadeInUp animate__faster">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-7">
                <div class="aduan-card animate__animated animate__fadeInUp animate__delay-0_2s">
                    <div class="alert text-center animate__animated animate__fadeInDown animate__delay-0_2s" role="alert" style="background-color: rgb(224, 224, 224);">
                        Aduan privat bersifat rahasia dan hanya diakses oleh pihak berwenang dan akan dihubungi secara private apabila pengadu berkenan
                    </div>
                    <h1 class="text-center mb-4 mt-lg-2 fw-bold animate__animated animate__fadeInDown animate__delay-0_2s" style="color: #842FE3">Mari Buat Aduanmu!</h1>
                    <form action="{{ route('kirim-aduan-privat.store') }}" method="POST" enctype="multipart/form-data" class="animate__animated animate__fadeIn animate__delay-0_4s">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-12 col-md-4 d-flex align-items-center">
                                <label for="title" class="form-label mb-0 w-100">Judul Aduan</label>
                            </div>
                            <div class="col-12 col-md-8">
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="col-12 col-md-4 d-flex align-items-center">
                                <label for="content" class="form-label mb-0 w-100">Deskripsi Aduan</label>
                            </div>
                            <div class="col-12 col-md-8">
                                <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
                            </div>
                            <div class="col-12 col-md-4 d-flex align-items-center">
                                <label for="image" class="form-label mb-0 w-100">Lampiran (Opsional)</label>
                            </div>
                            <div class="col-12 col-md-8">
                                <input type="file" class="form-control" id="image" name="image" accept=".jpg, .jpeg, .png">
                            </div>
                        </div>
                        @auth
                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        @endauth
                        {{-- 1 untuk privat --}}
                        <input type="hidden" name="visibility_type" value="1">  
                        <button type="submit" class="btn btn-primary w-100 fw-bold animate__animated animate__pulse animate__delay-0_6s">Kirim Aduan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

