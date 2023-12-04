<div x-data="{
        input: '',
        result: @entangle('result'),
        incorrectInput: false, // Add a new reactive property for incorrect input state
        handleKeydown(event) {
            const key = event.key;
            if (['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '.', '+', '-', '*', '/'].includes(key)) {
                this.input += key;
            } else if (key === '(') {
                if (this.input && !isNaN(this.input.slice(-1))) {
                    this.input += '*(';
                } else {
                    this.input += '(';
                }
            } else if (key === ')') {
                this.input += ')';
            } else if (key === 'Enter') {
                if (this.validateInput(this.input))
                 {
                    $wire.calculateResult(this.input).then(() => {
                        this.result = $wire.result;
                    });
                } 
            } else if (key === 'Escape') {
                this.result = '';
                this.input = '';
            }
        },
        validateInput(input) {
            const invalidPatterns = ['++', '--', '**', '//', '()', '((', '+-', '-+', '*+', '+*', '/+', '+/', '*)', '(*', '(/', '(/'];
            this.incorrectInput = invalidPatterns.some(pattern => input.includes(pattern));
        }
    }" @keydown.window="handleKeydown"
     x-cloak
>
    <div class="min-w-screen min-h-screen bg-gray-100 flex items-center justify-center px-5 py-5">
        <div class="w-full mx-auto rounded-xl bg-gray-100 shadow-xl text-gray-800 relative overflow-hidden"
             style="max-width:300px">
            <div class="w-full">
                <!-- Conditional badge display -->
                <div x-show="incorrectInput" class="badge bg-red-500 text-white p-2 rounded">
                    Incorrect input
                </div>
            </div>
            <div class="w-full h-40 bg-gradient-to-b from-gray-800 to-gray-700 flex items-end text-right">
                <div class="w-full py-5 px-6 text-6xl text-white font-thin" x-text="result ? result : input"></div>
            </div>
            <div class="w-full bg-gradient-to-b from-indigo-400 to-indigo-500">
                <div class="flex w-full">
                    <div class="w-1/4 border-r border-b border-indigo-400">
                        <button @click="result = ''; input = ''"
                                class="w-full h-16 outline-none focus:outline-none hover:bg-indigo-700 hover:bg-opacity-20 text-white text-opacity-50 text-xl font-light">
                            C
                        </button>
                    </div>
                    <div class="w-1/4 border-r border-b border-indigo-400">
                        <button @click="input += '(' "
                                class="w-full h-16 outline-none focus:outline-none hover:bg-indigo-700 hover:bg-opacity-20 text-white text-opacity-50 text-xl font-light">
                            (
                        </button>
                    </div>
                    <div class="w-1/4 border-r border-b border-indigo-400">
                        <button @click="input += ')' "
                                class="w-full h-16 outline-none focus:outline-none hover:bg-indigo-700 hover:bg-opacity-20 text-white text-opacity-50 text-xl font-light">
                            )
                        </button>
                    </div>
                    <div class="w-1/4 border-r border-b border-indigo-400">
                        <button @click="input += '÷' "
                                class="w-full h-16 outline-none focus:outline-none bg-indigo-700 bg-opacity-10 hover:bg-opacity-20 text-white text-2xl font-light">
                            ÷
                        </button>
                    </div>
                </div>
                <div class="flex w-full">
                    <div class="w-1/4 border-r border-b border-indigo-400"
                         @click="input += '7'">
                        <x-button>7</x-button>
                    </div>
                    <div class="w-1/4 border-r border-b border-indigo-400"
                         @click="input += '8'">
                        <x-button>8</x-button>
                    </div>
                    <div class="w-1/4 border-r border-b border-indigo-400"
                         @click="input += '9'">
                        <x-button>9</x-button>
                    </div>
                    <div class="w-1/4 border-r border-b border-indigo-400">
                        <button class="w-full h-16 outline-none focus:outline-none bg-indigo-700 bg-opacity-10 hover:bg-opacity-20 text-white text-xl font-light"
                                @click="input += '*' ">
                            ⨉
                        </button>
                    </div>
                </div>
                <div class="flex w-full">
                    <div class="w-1/4 border-r border-b border-indigo-400"
                         @click="input += '4' ">
                        <x-button>4</x-button>
                    </div>
                    <div class="w-1/4 border-r border-b border-indigo-400"
                         @click="input += '5' ">
                        <x-button>5</x-button>
                    </div>
                    <div class="w-1/4 border-r border-b border-indigo-400"
                         @click="input += '6' ">
                        <x-button>6</x-button>
                    </div>
                    <div class="w-1/4 border-r border-b border-indigo-400">
                        <button class="w-full h-16 outline-none focus:outline-none bg-indigo-700 bg-opacity-10 hover:bg-opacity-20 text-white text-xl font-light"
                                @click="input += '-' ">
                            -
                        </button>
                    </div>
                </div>
                <div class="flex w-full">
                    <div class="w-1/4 border-r border-b border-indigo-400"
                         @click="input += '1' ">
                        <x-button>1</x-button>
                    </div>
                    <div class="w-1/4 border-r border-b border-indigo-400"
                         @click="input += '2' ">

                        <x-button>2</x-button>
                    </div>
                    <div class="w-1/4 border-r border-b border-indigo-400"
                         @click="input += '3' ">
                        <x-button>3</x-button>
                    </div>
                    <div class="w-1/4 border-r border-b border-indigo-400">
                        <button class="w-full h-16 outline-none focus:outline-none bg-indigo-700 bg-opacity-10 hover:bg-opacity-20 text-white text-xl font-light"
                                x-on:click="input += '+'">
                            +
                        </button>
                    </div>
                </div>
                <div class="flex w-full">
                    <div class="w-1/4 border-r border-indigo-400"
                         @click="input += '0' ">
                        <x-button>0</x-button>
                    </div>
                    <div class="w-1/4 border-r border-indigo-400"
                         @click="input += '.' ">
                        <x-button>.</x-button>
                    </div>
                    <div class="w-2/4 border-r border-indigo-400"
                    >
                        <button class="w-full h-16 outline-none focus:outline-none bg-indigo-700 bg-opacity-30 hover:bg-opacity-40 text-white text-xl font-light"
                                @click="$wire.calculateResult(input).then(() => { result = $wire.result })">
                            =
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>