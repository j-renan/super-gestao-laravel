#docker container run -it --rm --name gd_PHP7.2 -v "$(pwd)"/.:/var/www/html meuphp7.4:gd_install bash

docker run -it --rm --name meu_python -p 5300:5300 -v "$(pwd)"/scripts/.:/app python-sg bash
