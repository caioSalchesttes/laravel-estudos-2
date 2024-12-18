<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Unisinos</title>
    <link rel="icon" type="image/x-icon" href="assets/images/unisinos.png">
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
        height: 59px;
    }

    @media screen and (max-height: 768px) and (min-width: 768px) {
        .header {
            scale: 0.9;
        }

        .content {
            scale: 0.9;
        }

        .logo {
            height: 48px;
        }
    }

    input {
        height: 48px;
    }
</style>
<body>
<div class="all">
    <!-- Header -->
    <div class="header w-full container flex mx-auto px-5 justify-center lg:justify-between items-center pt-2">
        <div class="flex">
            <img src="assets/images/unisinos.png" class="logo" alt="">
        </div>
        <span class="text-1xl hidden lg:block font-bold text-dark-grey-900">Acesso para Visitantes</span>
    </div>


    <!-- Content -->
    <div class="content container flex flex-col mx-auto bg-white rounded-lg px-5 mb:px-0">
        <div class="flex justify-center w-full h-full my-auto xl:gap-14 lg:justify-normal md:gap-5 draggable">
            <div class="flex items-center justify-center w-full lg:px-12">
                <div class="flex items-center pb-5 lg:pb-0">
                    <form class="flex flex-col w-full h-full pb-1 text-center bg-white rounded-3xl"
                          action="{{route('register', $query)}}" method="post" id="form"
                          style="max-width: 500px;">
                        @csrf
                        <h3 class="mb-2 2xl:mb-3 mt-10 md:mt-0 text-3xl 2xl:text-4xl font-extrabold text-dark-grey-900">
                            Visitantes</h3>
                        <p class="mb-2 2xl:mb-4 text-grey-700">Quero Acessar a Rede de Visitantes</p>

                        @error('user')
                        <div class="text-sm text-red-500 mb-4">
                            <span class="text-sm text-start text-red-500">{{ $message }}</span>
                        </div>
                        @enderror

                        <label for="name" class="mb-2 mt-8 text-sm text-start text-grey-900">Nome</label>
                        <input id="name" name="name" type="text" placeholder="Nome Completo" value="{{ old('name') }}"
                               class="flex items-center w-full px-5 py-4 mr-2 text-sm font-medium outline-none focus:bg-grey-400 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-2xl"/>
                        <div class="mb-4 text-sm text-start text-red-500">
                            <span class="text-sm text-start text-red-500">{{ $errors->first('name') }}</span>
                        </div>

                        <label for="email" class="mb-2 mt text-sm text-start text-grey-900">Email</label>
                        <input id="email" name="email" type="email" placeholder="exemplo@email.com"
                               value="{{ old('email') }}"
                               class="flex items-center w-full px-5 py-4 mr-2 text-sm font-medium outline-none focus:bg-grey-400 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-2xl"/>
                        <div class="text-sm text-start text-red-500 mb-4">
                            <span class="text-sm text-start text-red-500">{{ $errors->first('email') }}</span>
                        </div>

                        <label for="phone" class="mb-2 mt text-sm text-start text-grey-900">Telefone</label>
                        <input id="phone" name="phone" type="text" placeholder="(00) 00000-0000"
                               value="{{ old('phone') }}"
                               class="flex items-center w-full px-5 py-4 mr-2 text-sm font-medium outline-none focus:bg-grey-400 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-2xl"/>
                        <div class="text-sm text-start text-red-500 mb-4">
                            <span class="text-sm text-start text-red-500">{{ $errors->first('phone') }}</span>
                        </div>
                        <label for="cpf" class="mb-2 text-sm text-start text-grey-900">CPF</label>
                        <input id="cpf" name="cpf" type="text" placeholder="000.000.000-00"
                               value="{{ old('cpf') }}"
                               class="flex items-center w-full px-5 py-4 mr-2 text-sm font-medium outline-none focus:bg-grey-400 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-2xl"/>
                        <div class="text-sm text-start text-red-500 mb-4">
                            <span class="text-sm text-start text-red-500">{{ $errors->first('cpf') }}</span>
                            <p id="error" class="text-sm text-start text-red-500" style="display: none;">CPF inválido!</p>
                        </div>
                        <button
                            class="w-full px-6 py-4 mb-5 text-sm font-bold leading-none text-white transition duration-300 md:w-96 rounded-2xl hover:bg-purple-blue-600 focus:ring-4 focus:ring-purple-blue-100 bg-purple-blue-500">
                            Acessar
                        </button>
                        <p class="text-sm leading-relaxed text-grey-900">Já possui cadastro? <a
                                href="{{route('portal.login', $query)}}"
                                class="font-bold text-purple-blue-500">Clique aqui</a></p>
                        <br>
                        <p class="text-sm leading-relaxed text-grey-900">Ao realizar o acesso você confirma que leu e
                            concorda com as <br> <a href="{{route('policies', $query)}}" class="font-bold text-grey-700">políticas
                                de segurança.</a></p>
                    </form>
                </div>
            </div>
        </div>
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
<script>
    const cpfInput = document.getElementById('cpf');
    const form = document.getElementById('form');
    const errorMessage = document.getElementById('error');
    const phone = document.getElementById('phone');

    cpfInput.value = cpfInput.value ? cpf(cpfInput.value) : '';

    form.addEventListener('submit', function (e) {
        e.preventDefault();
        const plainCPF = cpfInput.value.replace(/\D/g, ''); // Remove formatação

        const phoneValue = phone.value.replace(/\D/g, ""); // Remove tudo o que não é dígito

        if (!validateCPF(plainCPF)) {
            errorMessage.style.display = 'block';
        } else {
            errorMessage.style.display = 'none';
            cpfInput.value = plainCPF; // Envia o CPF sem formatação
            phone.value = phoneValue;
            this.submit();
        }
    });

    phone.addEventListener('input', function (e) {
        let value = e.target.value;

        value = value.replace(/\D/g, ""); // Remove tudo o que não é dígito

        if (value.length > 11) {
            value = value.slice(0, 11);
        }

        if (value.length > 2) {
            value = value.replace(/^(\d{2})/, '($1) ');
        }

        if (value.length > 7) {
            value = value.replace(/(\d{5})(\d{1,4})/, '$1-$2');
        }

        e.target.value = value;
    });

    cpfInput.addEventListener('input', function (e) {
        e.target.value = cpf(e.target.value);
    });

    function cpf(v) {
        if (v.length >= 14) {
            return v.substring(0, 14);
        }

        v = v.replace(/\D/g, "");                    // Remove tudo o que não é dígito
        v = v.replace(/(\d{3})(\d)/, "$1.$2");       // Coloca um ponto entre o terceiro e o quarto dígitos
        v = v.replace(/(\d{3})(\d)/, "$1.$2");       // Segundo ponto
        v = v.replace(/(\d{3})(\d{1,2})$/, "$1-$2"); // Coloca um hífen entre o terceiro e o quarto dígitos
        return v;
    }

    function validateCPF(cpf) {
        if (cpf.length !== 11 || /^(\d)\1{10}$/.test(cpf)) return false; // CPF inválido se todos os números forem iguais

        let sum = 0;
        let remainder;

        // Valida primeiro dígito
        for (let i = 1; i <= 9; i++) {
            sum += parseInt(cpf.charAt(i - 1)) * (11 - i);
        }
        remainder = (sum * 10) % 11;
        if (remainder === 10 || remainder === 11) remainder = 0;
        if (remainder !== parseInt(cpf.charAt(9))) return false;

        // Valida segundo dígito
        sum = 0;
        for (let i = 1; i <= 10; i++) {
            sum += parseInt(cpf.charAt(i - 1)) * (12 - i);
        }
        remainder = (sum * 10) % 11;
        if (remainder === 10 || remainder === 11) remainder = 0;
        if (remainder !== parseInt(cpf.charAt(10))) return false;

        return true;
    }
</script>
</body>
</html>
