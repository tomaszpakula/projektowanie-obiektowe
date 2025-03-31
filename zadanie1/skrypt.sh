docker pull kprzystalski/projobj1
docker run --rm -v "$PWD":/app -w /app kprzystalski/projobj1 fpc program.pas
docker run --rm -v "$PWD":/app -w /app kprzystalski/projobj1 ./program