- [code-rewrite](#code-rewrite)
  - [Summary](#summary)
  - [How do I get Started?](#how-do-i-get-started)
    - [Windows](#windows)
    - [Linux](#linux)
  - [Compiling the code](#compiling-the-code)
    - [Windows](#windows-1)
    - [Linux](#linux-1)

# code-rewrite

## Summary

Within this folder there are the executables and source code for the code rewrite and the code provided. It is important to note that the ```product``` that was analysed within the report differs slightly from the source code provided and therefore may behave differently.

## How do I get Started?

To run the executable and overflow the buffer use the following commands, depending on your machine. Note that the buffer should not overflow for ```product-rewrite```. 

The address for the function to execute may change on your machine but simply change the characters, within the python print statement, in reverse pairs of 2. Therefore ```0x8764f4c8``` becomes ```\xc8\xf4\x64\x87```.

### Windows

```powershell
./product-code (python -c "print('A'*20+'\x60\x14\x40\x00')")
```

```powershell
./product-rewrite (python -c "print('A'*20+'\x60\x14\x40\x00')")
```

### Linux

```bash
./product-code $(python -c "print('A'*20+'\x60\x14\x40\x00')")
```

```bash
./product-rewrite $(python -c "print('A'*20+'\x60\x14\x40\x00')")
```

## Compiling the code

If you wish to compile the code yourself use the commands below, depending on your machine.

### Windows

You can compile the to files using the commands below

```powershell
gcc product-code.c -o product-code.exe
```

```powershell
gcc product-rewrite.c -o product-rewrite.exe
```

### Linux

```bash
gcc -fno-stack-protector -z execstack -no-pie product-code.c -o product-code -m32
```

```bash
gcc -fno-stack-protector -z execstack -no-pie product-rewrite.c -o product-rewrite -m32
```
