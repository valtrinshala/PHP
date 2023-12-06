<div>
    <x:modal wire:model="showHistoryModal" maxWidth="xl" class="max-h-32">
       <span class="text-lg leading-6 font-medium text-gray-900 p-2">
           History of Calculation
       </span>

        @foreach($histories as $history)
            <div class="bg-white shadow rounded-lg">
                <div class="p-4 sm:p-6">
                    <div class="mb-4">
                        <div class="pb-4 border-gray-200  border-b">
                            <h3 class="text-lg leading-6 font-medium text-gray-900 ">
                                Result : {{$history->result}}
                            </h3>
                        </div>

                        <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500 ">
                           Input : {{$history->calculation}}
                        </p>
                    </div>
                </div>
            </div>

        @endforeach
    </x:modal>
</div>
