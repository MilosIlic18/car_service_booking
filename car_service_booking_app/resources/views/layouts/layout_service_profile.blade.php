<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>{{ config('app.name', 'Laravel') }} - {{request()->route('service')->name}} @yield('title')</title>
</head>
<body>
    @include('partials.navigations.navigation_service_profile')
    
        <section class="min-h-screen p-[10px] bg-gray-100">
            @yield('contents')
        </section>

    @include('partials.footer.footer')
    
</body>
</html>