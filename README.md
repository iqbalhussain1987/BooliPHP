# Booli PHP wrapper for API v2

## Introduction

A wrapper for Booli API version 2 written in PHP.

Implemented as an **abstract class**, _BooliPHP_, with low level functionality (authentication and HTTP calls to Booli) and a **extending class**, _Booli_, that does an actual call to Booli. Also included are _example.php_ with a simple example of usage.

#### Classes
* **BooliPHP**: Abstract class with low level implementation (authentication and HTTP functionality)
* **Booli**: Class that extends **BooliPHP** and implements a call to Booli
* **BooliException**: Exceptions thrown by BooliPHP when error occures
* **HTTPStatusCode**: HTTP status codes and corresponding messages


## Questions? Feedback?

Bug? Did I miss something? Probably. Create a new issue on GitHub or [contact me](https://github/niklasfo)

Also see the offical [documentation for Booli API](http://www.booli.se/api/).

## License

This Booli PHP wrapper is released under [the MIT License (MIT)](http://www.opensource.org/licenses/MIT).

Copyright (c) 2012 Niklas Fors

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
