   <!-- JS here -->
   <script src="{{asset('assets')}}/js/vendor/modernizr-3.5.0.min.js"></script>
   <script src="{{asset('assets')}}/js/vendor/jquery-3.6.0.min.js"></script>
   <script src="{{asset('assets')}}/js/popper.min.js"></script>
   <script src="{{asset('assets')}}/js/bootstrap.min.js"></script>
   <script src="{{asset('assets')}}/js/isotope.pkgd.min.js"></script>
   <script src="{{asset('assets')}}/js/slick.min.js"></script>
   <script src="{{asset('assets')}}/js/jquery.meanmenu.min.js"></script>
   <script src="{{asset('assets')}}/js/ajax-form.js"></script>
   <script src="{{asset('assets')}}/js/wow.min.js"></script>
   <script src="{{asset('assets')}}/js/jquery.scrollUp.min.js"></script>
   <script src="{{asset('assets')}}/js/imagesloaded.pkgd.min.js"></script>
   <script src="{{asset('assets')}}/js/jquery.magnific-popup.min.js"></script>
   <script src="{{asset('assets')}}/js/waypoints.min.js"></script>
   <script src="{{asset('assets')}}/js/jquery.counterup.min.js"></script>
   <script src="{{asset('assets')}}/js/plugins.js"></script>
   <script src="{{asset('assets')}}/js/swiper-bundle.min.js"></script>
   <script src="{{asset('assets')}}/js/main.js"></script>

   <script>
       // On page load or when changing themes, best to add inline in `head` to avoid FOUC
       if (localStorage.getItem("theme-color") === "dark" || (!("theme-color" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches)) {
         document.getElementById("light--to-dark-button")?.classList.add("dark--mode");
       } 
       if (localStorage.getItem("theme-color") === "light") {
         document.getElementById("light--to-dark-button")?.classList.remove("dark--mode");
       } 
     </script>

{{-- <script src="{{asset('assets')}}/js/custom.js"></script> --}}

<script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
<div class="elfsight-app-37d5a27c-dd16-4a07-8ab7-28f713e7cf99" data-elfsight-app-lazy></div>

{{-- Toaster Script --}}
<script>
    @if (Session::has('message'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.success("{{ session('message') }}", "", {
            timeOut: 5000
        });
    @endif

    @if (Session::has('error'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.error("{{ session('error') }}", "", {
            timeOut: 5000
        });
    @endif

    @if (Session::has('info'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.info("{{ session('info') }}", "", {
            timeOut: 5000
        });
    @endif

    @if (Session::has('warning'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.warning("{{ session('warning') }}", "", {
            timeOut: 5000
        });
    @endif
</script>


{{-- End Toaster Script --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        var html = "";
        var htmlmob = "";

        // Fetch portfolio categories
        $.ajax({
            url: "/coursecat",
            type: 'GET',
            dataType: 'json',
            success: function (res) {
                for (var i = 0; i < res.data1.length; i++) {
                    html += `<li class="nav-item">
                                <a href="/course_languages/${res.data1[i]['slug']}" style="cursor:pointer" data-id="${res.data1[i]['id']}" class="nav-link">${res.data1[i]['name']}</a>
                            </li>`;
                }
                console.log(html);
                $(".course").append(html);
            }
        });
    });
</script>



<script>
    $(document).ready(function () {
        var html = "";
        var htmlmob = "";

        // Fetch package categories
        $.ajax({
            url: "/packagecat",
            type: 'GET',
            dataType: 'json',
            success: function (res) {
                for (var i = 0; i < res.data1.length; i++) {
                    html += `<li class="nav-item">
                                <a href="/packagecategory/${res.data1[i]['slug']}" style="cursor:pointer" data-id="${res.data1[i]['id']}" class="nav-link">${res.data1[i]['name']}</a>
                            </li>`;
                }
                console.log(html);
                $(".package").append(html);
            }
        });
    });
</script>

<script async src='https://d2mpatx37cqexb.cloudfront.net/delightchat-whatsapp-widget/embeds/embed.min.js'></script>
<script>
  var wa_btnSetting = {"btnColor":"#16BE45","ctaText":"WhatsApp Us","cornerRadius":40,"marginBottom":20,"marginLeft":20,"marginRight":20,"btnPosition":"right","whatsAppNumber":"923002385534","welcomeMessage":"Hello","zIndex":999999,"btnColorScheme":"light"};
  window.onload = () => {
    _waEmbed(wa_btnSetting);
  };
</script>
