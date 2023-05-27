{{-- <x-mail::message> --}}
Dear {{ $name }}
<br>
<br>
<br>
{{ $email }}
<br>
<br>
<x-mail::button :url="'http://127.0.0.1:8001/'">
Visit Our Site
</x-mail::button>

Thanks,<br>
Rizme Blog
{{-- </x-mail::message> --}}
