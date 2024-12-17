<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sesc/Senac DN</title>
    <link rel="icon" sizes="any" type="image/svg+xml" href="assets/images/fav.svg">
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
            <img src="assets/images/sesc.svg" class="logo" style="margin-right: 30px" alt="">
            <img src="assets/images/senac.png" class="logo" alt="">
        </div>
        <span class="text-1xl hidden lg:block font-bold text-dark-grey-900">Acesso para Visitantes</span>
    </div>
    <div class="content container flex flex-col mx-auto bg-white rounded-lg px-5 mb:px-0">
        <div class="flex justify-center w-full h-full my-auto xl:gap-14 lg:justify-normal md:gap-5 draggable">
            <div class="flex items-center justify-center w-full lg:px-12">
                <div class="flex items-center pb-5 lg:pb-0 flex-col">
                    <div class="content">
                        <div class="bg-purple-blue-500" style="color: white; padding: 10px; border-radius: 8px 8px 0 0; margin: -20px -20px 20px -20px; font-size: 20px; text-align: center;">
                            Políticas de Uso - Leia com atenção
                        </div>
                        <p>
                            Este portal é destinado a visitantes e oferece acesso à rede sem fio. Ao utilizar este serviço, o usuário concorda com os seguintes termos e condições de uso.
                            A segurança e a privacidade dos dados dos usuários são de extrema importância para nós. Portanto, todas as atividades realizadas na rede são monitoradas e registradas para garantir a conformidade com as políticas de uso.
                        </p>
                        <p>
                            É proibido o uso da rede para atividades ilegais, incluindo, mas não se limitando a, distribuição de material protegido por direitos autorais sem autorização, disseminação de vírus ou outros softwares maliciosos, e acesso a conteúdos proibidos por lei.
                        </p>
                        <p>
                            O usuário é responsável por manter a confidencialidade de suas credenciais de acesso e por todas as atividades realizadas sob sua conta. Qualquer violação da política de uso poderá resultar em bloqueio de acesso.
                        </p>
                        <p>
                            Em conformidade com a Lei Geral de Proteção de Dados (LGPD), garantimos que todos os dados pessoais coletados serão utilizados apenas para os fins declarados e não serão compartilhados com terceiros sem o consentimento expresso do usuário, exceto quando exigido por lei.
                        </p>
                        <p>
                            Para mais informações ou em caso de dúvidas, entre em contato com a Gerência de Tecnologia da Informação.
                        </p>
                    </div>
                    <a href="{{route('portal.login', $query)}}" class=" px-6 py-4 mt-8 mb-10 text-sm font-bold leading-none text-white transition duration-300 md:w-96 rounded-2xl hover:bg-purple-blue-600 focus:ring-4 focus:ring-purple-blue-100 bg-purple-blue-500" style="max-width: 130px;">Voltar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <div class="flex flex-wrap mb-3 2xl:mb-5 px-5 mb:px-0">
        <div class="w-full max-w-full sm:w-3/4 mx-auto text-center">
            <p class="text-sm text-slate-500 pb-1">
                Sesc/Senac DN  - Em caso de dificuldades de conexão entre em contato com um de nossos colaboradores.
            </p>
        </div>
    </div>
</div>
</body>
</html>
