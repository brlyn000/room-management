@props(['disabled' => false])

<input 
    @disabled($disabled) 
    {{ $attributes->merge([
        'class' => '
            bg-white 
            border border-gray-300 
            text-gray-900 
            placeholder-gray-400 
            rounded-lg 
            focus:ring-2 
            focus:ring-cyan-500 
            focus:border-cyan-500 
            transition-all 
            duration-200 
            shadow-sm 
            px-4 
            py-2
        '
    ]) }}>
