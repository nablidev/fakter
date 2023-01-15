<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>myfatoora</title>
        @vite('resources/css/app.css')
        <livewire:styles />
    </head>
    <body>
        {{-- <livewire:counter /> --}} 

        <livewire:invoice /> 
        
        <livewire:scripts />
    </body>
</html>
