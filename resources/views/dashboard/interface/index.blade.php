<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>My Portofolio</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('foto') }}/assets/img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet"
        type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('interface') }}/css/styles.css" rel="stylesheet" />

    {{-- ini css devicon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css">

    <style>
        /* Ikon default tanpa warna */
        .dev-icons .list-inline-item i.plain {

            /* Ganti dengan warna default yang Anda inginkan */
            transition: color 0.1s ease;
            /* Efek transisi ketika berubah warna */
            cursor: pointer;
            /* Mengubah kursor menjadi pointer saat dihover */
        }

        /* Ikon berwarna saat dihover */
        .dev-icons .list-inline-item i.colored {
            /* Ganti dengan warna yang Anda inginkan saat dihover */
            transition: color 0.1s ease;
            /* Efek transisi ketika berubah warna */
            cursor: pointer;
            /* Mengubah kursor menjadi pointer saat dihover */
        }
    </style>
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
            <span class="d-block d-lg-none">{{ $about->judul }}</span>
            {{-- <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2"
                    src="{{ asset('foto') . '/' . get_meta_value('_foto') }}" alt="..." /></span> == default --}}
            <span class="d-none d-lg-block rounded-circle img-profile-container">
                <img class="img-fluid img-profile" src="{{ asset('foto') . '/' . get_meta_value('_foto') }}"
                    alt="Profile Picture" />
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#experience">Experience</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#education">Education</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#skills">Skills</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#interests">Interests</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#awards">Awards</a></li>
            </ul>
        </div>
    </nav>
    <!-- Page Content-->
    <div class="container-fluid p-0">
        <!-- About-->
        <section class="resume-section" id="about">
            <div class="resume-section-content">
                <h1 class="mb-0">
                    {!! set_about_nama($about->judul) !!}
                </h1>
                <div class="subheading mb-5">
                    {{ get_meta_value('_kota') }} ·
                    {{ get_meta_value('_provinsi') }} ·
                    {{ get_meta_value('_nohp') }} ·
                    <a href="{{ get_meta_value('_email') }}">
                        {{ get_meta_value('_email') }}</a>
                </div>
                <div class="lead mb-5">
                    {{-- jadi biasanya di blade
                        kita itu menggunakna {{  }}
                        karena ini dalam text nya akan memunculkan 
                        tag, maka kita gunakna satu dan berikan 
                        tanda seru pada depan belakang,
                        akan tetapi ini tidak mempengaruhi textarea 
                        kita yang diberikan bold. atau static  --}}
                    {!! $about->isi !!}
                </div>
                {{-- <div class="social-icons">
                    <a class="social-icon" href="{{ get_meta_value('_linkedin') }}"><i
                            class="fab fa-linkedin-in"></i></a>
                    <a class="social-icon" href="{{ get_meta_value('_github') }}"><i class="fab fa-github"></i></a>
                    <a class="social-icon" href="{{ get_meta_value('_instagram') }}"><i
                            class="fab fa-instagram"></i></a>
                    <a class="social-icon" href="{{ get_meta_value('_facebook') }}"><i class="fab fa-whatsapp"></i></a>
                </div> --}}
                <div class="social-icons">
                    <a class="social-icon" href="{{ get_meta_value('_linkedin') }}" target="_blank"><i
                            class="fab fa-linkedin-in"></i></a>
                    <a class="social-icon" href="{{ get_meta_value('_github') }}" target="_blank"><i
                            class="fab fa-github"></i></a>
                    <a class="social-icon" href="{{ get_meta_value('_instagram') }}" target="_blank"><i
                            class="fab fa-instagram"></i></a>
                    <a class="social-icon" href="{{ get_meta_value('_facebook') }}" target="_blank"><i
                            class="fab fa-whatsapp"></i></a>
                </div>

            </div>
        </section>
        <hr class="m-0" />
        <!-- Experience-->
        <section class="resume-section" id="experience">
            <div class="resume-section-content">
                <h2 class="mb-5">Experience</h2>
                @foreach ($experience as $item)
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">{{ $item->judul }}</h3>
                            <div class="subheading mb-3">{{ $item->info1 }}</div>
                            {!! $item->isi !!}
                        </div>
                        <div class="flex-shrink-0">
                            {{-- <span class="text-primary">{{ $item->tgl_mulai_indo }}
                                -{{ $item->tgl_akhir_indo }}
                            </span> --}}
                            @if (!empty($item->tgl_mulai_indo))
                                <span class="text-primary">{{ $item->tgl_mulai_indo }}</span>
                                @if (!empty($item->tgl_akhir_indo))
                                    <span>-{{ $item->tgl_akhir_indo }}</span>
                                @else
                                    <span>-Present</span>
                                @endif
                            @else
                                @if (!empty($item->tgl_akhir_indo))
                                    <span class="text-primary">Until {{ $item->tgl_akhir_indo }}</span>
                                @else
                                    <span class="text-primary">Current</span>
                                @endif
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <hr class="m-0" />
        <!-- Education-->
        <section class="resume-section" id="education">
            <div class="resume-section-content">
                <h2 class="mb-5">Education</h2>
                @foreach ($education as $item)
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">{{ $item->judul }}</h3>
                            <div class="subheading mb-3">{{ $item->info1 }}</div>
                            <div>{{ $item->info2 }}</div>
                            <p>IPK:{{ $item->info3 }}</p>
                        </div>
                        <div class="flex-shrink-0">
                            {{-- <span class="text-primary">August 2006 - May 2010</span> --}}
                            @if (!empty($item->tgl_mulai_indo))
                                <span class="text-primary">{{ $item->tgl_mulai_indo }}</span>
                                @if (!empty($item->tgl_akhir_indo))
                                    <span>-{{ $item->tgl_akhir_indo }}</span>
                                @else
                                    <span>-Present</span>
                                @endif
                            @else
                                @if (!empty($item->tgl_akhir_indo))
                                    <span class="text-primary">Until {{ $item->tgl_akhir_indo }}</span>
                                @else
                                    <span class="text-primary">Current</span>
                                @endif
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <hr class="m-0" />
        <!-- Skills-->
        <section class="resume-section" id="skills">
            <div class="resume-section-content">
                <h2 class="mb-5">Skills</h2>
                <div class="subheading mb-3">Programming Languages & Tools</div>
                {{-- <ul class="list-inline dev-icons">
                    @foreach (explode(', ', get_meta_value('_language')) as $item)
                        <li class="list-inline-item">
                            <i class="devicon-{{ strtolower($item) }}-plain"></i>
                        </li>
                    @endforeach
                </ul> 
                ** ini syntax awal --}}
                <ul class="list-inline dev-icons">
                    @foreach (explode(', ', get_meta_value('_language')) as $item)
                        <li class="list-inline-item">
                            <i class="devicon-{{ strtolower($item) }}-plain plain"></i>
                        </li>
                    @endforeach
                </ul>

                <div class="subheading mb-3">Workflow</div>
                {!! set_list_workflow(get_meta_value('_workflow')) !!}
            </div>
        </section>
        <hr class="m-0" />
        <!-- Interests-->
        <section class="resume-section" id="interests">
            <div class="resume-section-content">
                <h2 class="mb-5">{{ $interest->judul }}</h2>
                <div>
                    {!! $interest->isi !!}
                </div>
            </div>
        </section>
        <hr class="m-0" />
        <!-- Awards-->
        <section class="resume-section" id="awards">
            <div class="resume-section-content">
                <h2 class="mb-5">{{ $awards->judul }}</h2>
                {!! set_list_award($awards->isi) !!}
            </div>
        </section>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('interface') }}/js/scripts.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // function changeIconColor(icon, hover) {
        //     var iconName = icon.className.split(' ')[0]; // Mengambil nama kelas ikon
        //     var newClassName = hover ? iconName + ' colored' : iconName +
        //         ' plain'; // Menyesuaikan kelas sesuai kondisi hover
        //     icon.className = newClassName;
        // }
        $(document).ready(function() {
            $(".dev-icons .list-inline-item i.plain").hover(
                function() {
                    $(this).removeClass("plain").addClass("colored");
                },
                function() {
                    $(this).removeClass("colored").addClass("plain");
                }
            );
        });
    </script>

    </script>
</body>

</html>
