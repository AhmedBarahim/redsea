@extends('layout')

@section('content')
    <div class="container-fluid">
        <div class="row text-center">

            <div class="col">

                <div class="row">
                    <canvas id="my-canvas" class="position-absolute"></canvas>
                </div>
                <div class="row">
                    @if (isset($time_remaining))
                        <i class="fas fa-ban fa-5x text-danger mb-3"></i>
                        <h5 class="text-danger"> لا يمكنك الفحص الآن .. حاول بعد</h5>
                        <h5>{{ $time_remaining ?? '' }}</h5>
                    @elseif (isset($prize))
                        @if (!$prize->prizeType->status)
                            <script src="{{ asset('js/lottie-player.js') }}"></script>
                            <lottie-player src="{{ asset('js/happy-face.json') }}"
                                class="mx-auto mb-2" background="transparent" speed="1"
                                style="width: 150px; height: 150px;" loop autoplay></lottie-player>
                            <h4 class="text-danger">{{ $prize->prizeType->name }}</h4>
                            <h5 class="text-danger">حاول مرة اخرى</h5>
                            <p>{{ $prize->id }}</p>
                        @else
                        <script src="{{ asset('js/lottie-player.js') }}"></script>
                        <lottie-player src="{{ asset('js/sad-face.json') }}"
                        class="mx-auto mb-2" background="transparent" speed="1"
                                style="width: 150px; height: 150px;" loop autoplay></lottie-player>
                            <h2 class="text-success fw-bold">مبروووك لقد ربحت</h2>
                            <h4 class="text-success">{{ $prize->prizeType->name }}</h4>
                            <p>{{ $prize->id }}</p>
                            <script src="{{ asset('js/confetti-js/dist/index.min.js') }}"></script>
                            <script src="{{ asset('js/index.min.js') }}"></script>

                            <script>
                                window.addEventListener('resize', function() {
                                    viewportWidth = window.innerWidth || document.documentElement.clientWidth;
                                    if (viewportWidth < 792) {
                                        var confettiSettings = {
                                            "target": "my-canvas",
                                            "max": "80",
                                            "size": "5",
                                            "animate": true,
                                            "props": ["circle", "square", "triangle", "line"],
                                            "colors": [
                                                [165, 104, 246],
                                                [230, 61, 135],
                                                [0, 199, 228],
                                                [253, 214, 126]
                                            ],
                                            "clock": "25",
                                            "rotate": true,
                                            "width": "1920",
                                            "height": "600",
                                            "start_from_edge": false,
                                            "respawn": true
                                        };
                                        var confetti = new ConfettiGenerator(confettiSettings);
                                        confetti.render();

                                    } else {
                                        var confettiSettings = {
                                            "target": "my-canvas",
                                            "max": "80",
                                            "size": "1",
                                            "animate": true,
                                            "props": ["circle", "square", "triangle", "line"],
                                            "colors": [
                                                [165, 104, 246],
                                                [230, 61, 135],
                                                [0, 199, 228],
                                                [253, 214, 126]
                                            ],
                                            "clock": "25",
                                            "rotate": true,
                                            "width": "1920",
                                            "height": "200",
                                            "start_from_edge": false,
                                            "respawn": true
                                        };
                                        var confetti = new ConfettiGenerator(confettiSettings);
                                        confetti.render();

                                    }
                                }, true);
                                viewportWidth = window.innerWidth || document.documentElement.clientWidth;
                                if (viewportWidth < 792) {
                                    var confettiSettings = {
                                        "target": "my-canvas",
                                        "max": "80",
                                        "size": "5",
                                        "animate": true,
                                        "props": ["circle", "square", "triangle", "line"],
                                        "colors": [
                                            [165, 104, 246],
                                            [230, 61, 135],
                                            [0, 199, 228],
                                            [253, 214, 126]
                                        ],
                                        "clock": "25",
                                        "rotate": true,
                                        "width": "1920",
                                        "height": "600",
                                        "start_from_edge": false,
                                        "respawn": true
                                    };
                                    var confetti = new ConfettiGenerator(confettiSettings);
                                    confetti.render();

                                } else {
                                    var confettiSettings = {
                                        "target": "my-canvas",
                                        "max": "80",
                                        "size": "1",
                                        "animate": true,
                                        "props": ["circle", "square", "triangle", "line"],
                                        "colors": [
                                            [165, 104, 246],
                                            [230, 61, 135],
                                            [0, 199, 228],
                                            [253, 214, 126]
                                        ],
                                        "clock": "25",
                                        "rotate": true,
                                        "width": "1920",
                                        "height": "200",
                                        "start_from_edge": false,
                                        "respawn": true
                                    };
                                    var confetti = new ConfettiGenerator(confettiSettings);
                                    confetti.render();

                                }
                            </script>
                        @endif
                    @else
                        <h4 class="text-muted">لا توجد جائزة</h4>
                    @endif
                </div>
                {{-- @else
                    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                    <lottie-player src="https://assets3.lottiefiles.com/private_files/lf30_tn9xtxsa.json"
                        class="mx-auto mb-2" background="transparent" speed="1" style="width: 150px; height: 150px;" loop
                        autoplay></lottie-player>
                    <h2 class="text-danger fw-bold">مبروووك لقد ربحت</h2>
                    <h4 class="text-danger">جهاز ايفون ١٣ برو</h4>
                @endif --}}
            </div>
        </div>
    </div>

@endsection
