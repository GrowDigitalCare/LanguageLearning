<!DOCTYPE html>
<html lang="en">
<head>
  
    <meta charset="utf-8">
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    
    <meta name="title" content="">
    <link rel="canonical" href="https://growdigitalcare.com/">
@yield('title')
    @include('frontend.credentials.header')
</head>

<body>
    
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem("theme-color") === "dark" || (!("theme-color" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches)) {
          document.documentElement.classList.add("is_dark");
        } 
        if (localStorage.getItem("theme-color") === "light") {
          document.documentElement.classList.remove("is_dark");
        } 
    </script>

    <main class="main_wrapper overflow-hidden">


    @include('frontend.credentials.navbar')
    @yield('content')

    @include('frontend.credentials.footer')
    </main>        
    @include('frontend.credentials.script')
</body>
</html>
