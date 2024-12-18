<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Unisinos</title>
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.png">
    @vite('resources/css/app.css')
</head>
<style>
    .all {
        width: 100%;
        display: flex;
        min-height: 100vh;
        flex-direction: column;
        justify-content: space-between;
    }
    .logo {
        height: 48px;
    }
</style>
<body>
<div class="all mb-4"    >
    <!-- Header -->
    <div class="header w-full container flex mx-auto px-5 justify-center lg:justify-between items-center pt-2">
        <div class="flex">
            <img src="assets/images/unisinos.png" class="logo" alt="">
        </div>
        <span class="text-1xl hidden lg:block font-bold text-dark-grey-900">Acesso para Visitantes</span>
    </div>
    <!-- Content -->
    <div class="content container flex flex-col mx-auto bg-white rounded-lg px-5 mb:px-0 text-center items-center">

        <img src="assets/images/Off.png" alt="" style="height: 140px;">
        <!-- <img src="images/Ok.png" alt="" style="height: 140px;"> -->
        <h3 class="mb-2 2xl:mb-3 text-3xl 2xl:text-4xl font-extrabold text-dark-grey-900">{{$alert}}</h3>
        <p class="mb-2 2xl:mb-4 text-grey-700" style="max-width: 500px;">{{$message}} </p>
{{--        <a href="{{route($company.'.index')}}" class="w-full px-6 py-4 mt-4 mb-10 text-sm font-bold leading-none text-white transition duration-300 md:w-96 rounded-2xl hover:bg-{{$color}}-600 focus:ring-4 focus:ring-{{$color}}-100 bg-{{$color}}-500" style="max-width: 130px;">Voltar</a>--}}

    </div>
    <!-- Footer -->
    <div class="flex flex-wrap mb-3 2xl:mb-5 px-5 mb:px-0">
        <div class="w-full max-w-full sm:w-3/4 mx-auto text-center">
            <p class="text-sm text-slate-500 pb-1">
                Unisinos - Em caso de dificuldades de conexão entre em contato com um de nossos colaboradores.
            </p>
        </div>
    </div>
</div>
</body>
</html>
