# PHP Code

Implementação de um sistema web para automatizar o processo de inserção de QR Code em PDF's.

# Imagem do sistema
![image](https://user-images.githubusercontent.com/78118717/204956763-50c24392-88b4-4a48-a3a6-ea9c7b216a8a.png)


## 🚀 Começando

Essas instruções permitirão que você obtenha uma cópia do projeto em operação na sua máquina local para fins de desenvolvimento e teste.

Consulte **[utilização](#-utiliza%C3%A7%C3%A3o)** ou **[instalação](#-instala%C3%A7%C3%A3o)** para saber como utilizar ou instalar o projeto.

### 📋 Pré-requisitos

De que coisas você precisa para instalar o software?
* PHP 8.0 ou superior
* Composer

### 🔧 Instalação

Antes de tudo, é necessário baixar o **[codigo-fonte](https://github.com/eduardo92005-debug/PDFCode/archive/refs/heads/main.zip)**  do sistema. Daí, basta
seguir os passos abaixo:
* Extraia o zip do sistema em qualquer lugar que desejar.
* Abra o terminal CMD/Bash dentro da pasta extraida e escreva o comando: ``` composer install ```
* Aguarde até a instalação dos pacotes necessários ser instalados.
* Pronto, se tudo deu certo, uma pasta com o nome _vendor_ será criada dentro da pasta do sistema
* Agora, é necessário subir um servidor HTTP PHP para isso, utilize o comando:  ``` php -S 127.0.0.1:5500 ```
* Se a porta (5500) e o endereço (127.0.0.1) estiverem corretos, então, sera possivel através do navegador acessando o endereço 127.0.0.1:5500 utilizar o aplicativo.
* 
## ⚙️ Explicação dos arquivos

* __index.html__ -> Página HTML principal para marcação da interface primária do aplicativo.
* __main.php__ -> Arquivo PHP principal que correlaciona todos os outros arquivos php secundarios.
* __process_pdf.php__ -> Arquivo PHP responsável por processar e montar o PDF, utilizando a biblioteca Mpdf.
* __upload_pdf.php__ -> Arquivo PHP responsável por gerenciar o upload de arquivos PDF e imagem.


## 📦 Utilização

Dado um arquivo PDF e uma imagem, o sistema preenche no PDF a imagem selecionada numa dada coordenada.
### Como utilizar o aplicativo?
* Primeiro, selecione o PDF desejado clicando no botão "Procurar..." como na foto abaixo:
![image](https://user-images.githubusercontent.com/78118717/204957759-83653d97-dace-457c-b525-15203509c05e.png)
* Segundo, selecione uma imagem que deseja colocar no PDF clicando no botão "Procurar..." como na foto abaixo:
![image](https://user-images.githubusercontent.com/78118717/204958033-480bafa6-5547-41fe-a56c-99d207c1dbf6.png)
* Pronto, agora basta clicar em "Processar" e o seu arquivo PDF com a imagem será criado.
* ![image](https://user-images.githubusercontent.com/78118717/204958203-e2cc2c3f-0611-4e57-a802-4e14fda35a60.png)


## 🛠️ Construído com

* [PHP](https://www.php.net/docs.php) - PHP
* [Composer](https://getcomposer.org/) - Composer
* [Mpdf](https://mpdf.github.io/) - Mpdf
