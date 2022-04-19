@extends('layout')

@section('content')
    @php
    $winner = true;
    @endphp
    <div class="container-fluid">
        <div class="row text-center">

            <div class="col">
                @if ($winner)
                    <div class="row">
                        <canvas id="my-canvas" class="position-absolute"></canvas>
                    </div>
                    <div class="row">
                        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                        <lottie-player src="https://assets4.lottiefiles.com/private_files/lf30_znqpk4ym.json"
                            class="mx-auto mb-2" background="transparent" speed="1" style="width: 150px; height: 150px;"
                            loop autoplay></lottie-player>
                        <h2 class="text-success fw-bold">مبروووك لقد ربحت</h2>
                        @if ($prize)
                        <h4 class="text-success">{{ $prize->prizeType->name }}</h4>
                        <p>{{ $prize->id }}</p>
                        @else
                        <h4 class="text-muted">لا توجد جائزة</h4>

                        @endif


                        <hr>
                        <h5 class="text-info">لإستلام جائزتك قم بتعبئة بياناتك </h5>
                        <form action="/action_page.php">
                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="name" placeholder="ادخل اسمك الكامل"
                                    name="name">
                                <label for="name">الاسم</label>
                            </div>
                            <div class="form-floating mt-3 mb-3">
                                <input type="text" class="form-control" id="phone" placeholder="ادخل رقم هاتفك"
                                    name="phone">
                                <label for="phone">رقم الجوال</label>
                            </div>
                            <button type="submit" class="btn btn-primary">إرسال</button>
                        </form>
                    </div>
                @else
                    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                    <lottie-player src="https://assets3.lottiefiles.com/private_files/lf30_tn9xtxsa.json"
                        class="mx-auto mb-2" background="transparent" speed="1" style="width: 150px; height: 150px;" loop
                        autoplay></lottie-player>
                    <h2 class="text-danger fw-bold">مبروووك لقد ربحت</h2>
                    <h4 class="text-danger">جهاز ايفون ١٣ برو</h4>
                @endif
            </div>
        </div>
    </div>
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
@endsection
