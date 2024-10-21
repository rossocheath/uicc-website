<x-filament::widget class="filament-filament-info-widget">
    <x-filament::card class="relative">
        <div class="relative h-12 flex flex-col justify-center items-center space-y-2">
            <div class="space-y-1">
                <a
                    target="_blank"
                    rel="noopener noreferrer"
                    @class([
                        'sm:text-xl font-bold flex items-end space-x-2 rtl:space-x-reverse text-gray-800 hover:text-primary-500 transition',
                        'dark:text-primary-500 dark:hover:text-primary-400' => config('filament.dark_mode'),
                    ])
                >
                    {{Auth::user()->role->name}}
                </a>
            </div>

            <div class="text-sm flex space-x-2 rtl:space-x-reverse">
                <a
                    target="_blank"
                    rel="noopener noreferrer"
                    @class([
                        'text-gray-600 hover:text-primary-500 focus:outline-none focus:underline',
                        'dark:text-gray-300 dark:hover:text-primary-500' => config('filament.dark_mode'),
                    ])
                >
                    YOUR
                </a>

                <span>
                    &bull;
                </span>

                <a
                    target="_blank"
                    rel="noopener noreferrer"
                    @class([
                        'text-gray-600 hover:text-primary-500 focus:outline-none focus:underline',
                        'dark:text-gray-300 dark:hover:text-primary-500' => config('filament.dark_mode'),
                    ])
                >
                    Role Permission
                </a>
            </div>
        </div>

    </x-filament::card>
</x-filament::widget>
