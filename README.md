# Guia de Instalação do PHP, Composer e Laravel no Ubuntu 22

## 1. Atualizando o Sistema

Antes de começar, é recomendável atualizar os pacotes do seu sistema. Execute os seguintes comandos:

```bash
sudo apt update
sudo apt upgrade -y
```

## 2. Instalando o PHP

O Laravel requer o PHP versão 8.0 ou superior. Para instalar o PHP e algumas extensões necessárias, siga estes passos:

## 2.1. Adicionar o PPA do PHP

Primeiro, adicione o repositório para a versão mais recente do PHP:

```bash
sudo add-apt-repository ppa:ondrej/php
sudo apt update
```

## 2.2. Instalar PHP e Extensões

```bash
sudo apt install php8.3 php8.3-cli php8.3-fpm php8.3-mbstring php8.3-xml php8.3-zip php8.3-bcmath php8.3-curl -y
```

## 3. Instalando o Composer

https://www.digitalocean.com/community/tutorials/how-to-install-and-use-composer-on-ubuntu-22-04

## 4. Instalando o Laravel

```bash
composer global require laravel/installer
```

## 5. Instalando o node

```bash
sudo apt install nodejs
sudo apt install npm
```

## 7. Build do Laravel

```bash
npm install
npm run build
```

## 5. Instalar o rsyslog

```bash
sudo apt install rsyslog
```

# Abrindo a Porta 514 no Rsyslog para Leitura de Logs

Neste tutorial, vamos configurar o `rsyslog` para escutar na porta 514 e permitir a leitura de logs remotamente.

## Pré-requisitos

- Sistema operacional Linux (preferencialmente uma distribuição baseada em Debian ou CentOS).
- Acesso root ou privilégios de sudo.
- `rsyslog` instalado.

### 1. Verificar se o `rsyslog` está instalado

Para verificar se o `rsyslog` está instalado, execute:

```bash
sudo systemctl status rsyslog

sudo ufw allow 514/tcp
sudo ufw allow 514/udp
sudo ufw reload
```

### 2. Configurar o `rsyslog` para escutar na porta 514

```bash
sudo nano /etc/rsyslog.conf
```

Descomente as seguintes linhas:

```bash
module(load="imtcp")
input(type="imtcp" port="514")
```

Salve e feche o arquivo.

### 3. Reiniciar o `rsyslog`

```bash
sudo systemctl restart rsyslog
```

## Serviços do PHP/Laravel em Nginx

```bash
sudo systemctl start php8.3-fpm
sudo systemctl enable php8.3-fpm
```
