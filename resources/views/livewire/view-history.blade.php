<div>
    <x:modal wire:model="showHistoryModal" maxWidth="xl" class="max-h-32">
       <span class="text-lg leading-6 font-medium text-gray-900 p-2">
           History of Calculation
       </span>
        @if($histories->isEmpty())
            <div class="flex items-center justify-center p-4">
                <span class="text-lg italic text-gray-500">
                    Nothing here yet... Start calculating!
                </span>
            </div>
        @else
            @foreach($histories as $history)
                <div class="bg-white shadow rounded-lg">
                    <div class="p-4 sm:p-6">
                        <div class="mb-4">
                            <div class="pb-4 border-gray-200  border-b">
                                <h3 class="text-lg leading-6 font-medium text-gray-900 ">
                                    Result : {{$history->result}}
                                </h3>
                            </div>

                            <p class="flex justify-between mt-1 max-w-2xl text-sm leading-5 text-gray-500 ">
                                Input : {{$history->calculation}}
                                <x:icons.trash class="w-4 h-4 cursor-pointer"
                                               wire:click="removeHistory({{ $history->id }})"/>

                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

    </x:modal>
</div>
