# php2wasm

Composer package for convert PHP code into webassembly.
Package will generat `wat` files and [wat2wasm](https://webassembly.github.io/wabt/doc/wat2wasm.1.html) will transform text into the binary.

## Documentation

There is a docker file for setup local development environment.
Run following commands:

- Build php2wasm image: `docker build -t php2wasm:latest .`

- Run command in container: `docker run --rm -it -v "$PWD":/app php2wasm [COMMAND HERE]`

In container you can use `composer` and `wat2wasm` from [WABT](https://github.com/WebAssembly/wabt) toolset.

## Summary

I'm not working on this project right now.
it's in my backlog but with very low priority. 
