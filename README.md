# php2wasm

## Development setup

There is a docker file for setup local development environment.
Run following commands:

- Build php2wasm image: `docker build -t php2wasm:latest .`
- Run command in container: `docker run -it --rm --name php2wasm -v "$PWD":/app php2wasm [COMMAND HERE]`

In container you can use `composer` and `wat2wasm` from WABT toolset.